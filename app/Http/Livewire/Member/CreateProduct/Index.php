<?php

namespace App\Http\Livewire\Member\CreateProduct;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{
    //Categories and artists for dropdown
    public $categories,
            $artists;
    //Product data
    public $categoryId,
            $artistId,
            $codeNumber,
            $brand,
            $name,
            $description,
            $details,
            $latest_price,
            $amount,
            $weight,
            $length,
            $width,
            $height,
            $colorFamily,
            $size;
    //initialize the newly created product for use in Image Upload ID;
    public $newProductId,
            $newProductSlug;

    protected $rules = [
        'categoryId' => 'required',
        'artistId' => 'required',
        'codeNumber' => 'required',
        'name' => 'required',
        'latest_price' => 'required',
        'amount' => 'required',
        'weight' => 'required',
        'length' => 'required',
        'width' => 'required',
        'height' => 'required',
        'colorFamily' => 'required',
        'size' => 'required',
    ];

    public function render()
    {
        return view('livewire.member.create-product.index')
            ->extends('layouts.admin');
    }

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();

        $this->artists = Artist::orderBy('name')->get();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function generateCodeNumber()
    {
        $this->codeNumber = strtoupper(Str::random(5));
    }

    public function handleSubmit()
    {
        if($this->description === '' || $this->description === null  || $this->details === '' || $this->details === null)
        {
            $this->dispatchBrowserEvent('validationErrorDetected', ['message' => 'Please fill in all fields']);
        }elseif(Str::length($this->description) <= 50 || Str::length($this->details) <= 100){
            $this->dispatchBrowserEvent('validationErrorDetected', ['message' => 'Please give more details to the product']);
        }else{
            $this->validate();
            DB::beginTransaction();
            try{
                $product                = new Product();
                $product->category_id   = $this->categoryId;
                $product->artist_id     = $this->artistId;
                $product->store_id      = auth('member')->user()->store->id;
                $product->code_number   = $this->codeNumber;
                $product->slug          = Str::slug($this->name);
                $product->brand         = $this->brand;
                $product->name          = $this->name;
                $product->description   = $this->description;
                $product->details       = $this->details;
                $product->latest_price  = $this->latest_price;
                $product->amount        = $this->amount;
                $product->weight        = $this->weight;
                $product->length        = $this->length;
                $product->width         = $this->width;
                $product->high          = $this->height;
                $product->color_family  = $this->colorFamily;
                $product->size          = $this->size;
                $product->save();
                //Get the ID and Slug of the newly Created Product and assignt it
                //to the newly created product for use in Image Upload
                $this->newProductId     = $product->id;
                $this->newProductSlug   = $product->slug;

                DB::commit();

                $this->dispatchBrowserEvent('productCreated', ['message' => 'Product Created Successfully']);
            }catch(Exception $e){
                DB::rollBack();
                $this->dispatchBrowserEvent('errorSavingProduct', ['message' => $e->getMessage()]);
            }

        }
    }
}

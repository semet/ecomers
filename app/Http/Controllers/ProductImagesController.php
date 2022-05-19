<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImagesController extends Controller
{
    public function upload(Request $request)
    {
        $image =  $request->file('file');
        $product = Product::find($request->productId);
        $numberOfImage = 1;
        foreach($image as $file){
            $fileName = $request->productSlug.'-'.$numberOfImage++.'.'.$file->extension();
            Storage::putFileAs('public/products', $file, $fileName);
            $product->images()->create([
                'name' => $fileName
            ]);
        }
    }
}

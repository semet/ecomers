<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    //TODO:
    // 1. Compare item availability vs order (if stock not available, then let customer know and send notification to seller)
    //2. Customize UI if the item is not available and let Customer get notified once the item available
    public function __construct()
    {

    }

    /**
     * @return array|null
     */
    public static function getItems(): mixed
    {
        return collect(Session::get('cart'));
    }

    /**
     * @return int
     */
    public static function totalItems(): int
    {
        $items = self::getItems()->map(function ($value, $key){
            return $value['quantity'];
        })->sum();

        return $items;
    }

    /**
     * @return int
     */
    public static function totalPrice(): int
    {
        $items = self::getItems()->map(function ($value, $key){
            return $value['price'] * $value['quantity'];
        })->sum();

        return $items;
    }

    /**
     * @param $id
     * @return void
     */
    public static function addToCart($id, $quantity):void
    {
        $cart = Session::get('cart');
        $product = Product::find($id);

        if(! $cart)
        {
            $cart = [
                [
                    'id' => $id,
                    'name' => $product->name,
                    'price' => $product->latest_price,
                    'quantity' => $quantity
                ]
            ];
            Session::put('cart', $cart);
        }else{
            $items = collect($cart);
            $isExitsInCart = $items->contains(function ($value, $key) use ($id){
                return $value['id'] == $id;
            });

            if($isExitsInCart){
                $existingItem = $items->first(function ($value, $key) use($id){
                   return $value['id'] === $id;
                });
                //Retrieve the key of the existing Items
                $key = array_search($existingItem, $cart);
                $cart[$key]['quantity']++;
                Session::put('cart', $cart);

            }else{
                $newItem = [
                    'id' => $id,
                    'name' => $product->name,
                    'price' => $product->latest_price,
                    'quantity' => $quantity
                ];
                Session::push('cart', $newItem);
            }
        }
    }

    public static function incrementItem($id)
    {
        $cart = Session::get('cart');
        $items = collect($cart);
        $existingItem = $items->first(function ($value, $key) use($id){
            return $value['id'] === $id;
        });
        //Retrieve the key of the existing Items
        $key = array_search($existingItem, $cart);
        $cart[$key]['quantity']++;
        Session::put('cart', $cart);
    }

    public static function decrementItem($id)
    {
        $cart = Session::get('cart');
        $items = collect($cart);
        $existingItem = $items->first(function ($value, $key) use($id){
            return $value['id'] === $id;
        });
        //Retrieve the key of the existing Items
        $key = array_search($existingItem, $cart);
        $cart[$key]['quantity']--;
        Session::put('cart', $cart);
    }

    /**
     * @param $id
     * @return void
     */
    public static function removeFromCart($id): void
    {
        $cart = Session::get('cart');
        $items = collect($cart);
        $existingItem = $items->first(function ($value, $key) use($id){
            return $value['id'] === $id;
        });
        //Retrieve the key of the existing Items
        $key = array_search($existingItem, $cart);
        if(isset($cart[$key])){
            unset($cart[$key]);
            Session::put('cart', $cart);
        }

    }

    /**
     * @return Session|void
     */
    public static function clearCart()
    {
        return Session::forget('cart');
    }
}

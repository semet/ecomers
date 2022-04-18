<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function __construct()
    {

    }

    /**
     * @return array|null
     */
    public static function getItems(): mixed
    {
        return Session::get('cart');
    }

    /**
     * @return int
     */
    public static function totalItems(): int
    {
        $items = collect(self::getItems());
        if($items->isEmpty())
        {
            return 0;
        }
        else
        {
            return $items->sum('quantity');
        }
    }

    /**
     * @return int
     */
    public static function totalPrice(): int
    {
        $items = collect(self::getItems());
        return $items
            ->map(fn($item) => $item['price'] * $item['quantity'])
            ->sum();
    }

    /**
     * @param $id
     * @return void
     */
    public static function addToCart($id):void
    {
        $cart = Session::get('cart');
        $product = Product::find($id);

        if(! $cart)
        {
            $cart = [
                $id => [
                    'name' => $product->name,
                    'price' => $product->latest_price,
                    'quantity' => 1
                ]
            ];
            Session::put('cart', $cart);
        }else{
            if(isset($cart[$id]))
            {
                $cart[$id]['quantity']++;

                Session::put('cart', $cart);

            }else{
                $cart[$id] = [
                    "name" => $product->name,
                    'price' => $product->latest_price,
                    "quantity" => 1,
                ];
                Session::put('cart', $cart);

            }
        }
    }

    public static function incrementItem($id)
    {
        $cart = Session::get('cart');
        $cart[$id]['quantity']++;
        Session::put('cart', $cart);
    }

    public static function decrementItem($id)
    {
        $cart = Session::get('cart');
        $cart[$id]['quantity']--;
        Session::put('cart', $cart);
    }

    /**
     * @param $id
     * @return void
     */
    public static function removeFromCart($id): void
    {
        $cart = Session::get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
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

<?php
namespace App\Services;

use App\Models\Item;
use App\Models\Cart;

class CheckCart
{
    public static function addCart($item, $user_id)
    {
        if ($item->stock > 0) {
            Cart::firstOrCreate(
                [
                'item_id' => $item->id,
                'user_id' => $user_id
            ],
                [
                'qty' => 0
            ]
            )->increment('qty');
            $item->decrement('stock');
        }
        return true;
    }
    

    public static function softDelete($cart, $user_id, $count)
    {
        Cart::where(
            [
            'id' => $cart->id,
            'item_id' => $cart->item_id,
            'user_id' => $user_id
        ],
            [
            'qty' => 1
        ]
        )->delete();
        Item::where(['id' => $cart->item_id])->increment('stock', $count);
        return true;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Item;

class Cart extends Model
{
    use SoftDeletes;
    protected $table = 'carts';
    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id', 'item_id', 'qty']; //追加
    
    public function item()
    {
        return $this->belongsTo('App\Models\Item'); //リレーション
    }
}

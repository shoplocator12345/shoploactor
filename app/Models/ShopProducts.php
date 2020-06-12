<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopProducts extends Model
{
    protected $fillable = ['shop_id','Prod_id','qty'];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shops','shop_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Products','Prod_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name','brand','description','category','price','featured_image','qty','gallery'];

    public function shop(){
    	return $this->hasMany('App\Models\ShopProducts','Prod_id')->with('shop');
    }
}


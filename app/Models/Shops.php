<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    protected $fillable = ['name','owner_name','address','image','email','category','close_at','open_at','lat','lng'];


    public function products(){
    	return $this->hasMany('App\Models\ShopProducts','shop_id')->with('product');
    }

}

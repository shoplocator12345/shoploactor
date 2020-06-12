<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Shops;
use App\Models\ShopProducts;
use App\User;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ='';
        
        $shops = Shops::orderBy('id','desc')->get();
        $data.='<div class="col-md-4"  >
        <a style="text-decoration:none" href="/admin/shop/create">
            <div class="card addcard" style="border:2px dotted #666666; background-color:#e4e4e4; height:333px;">
            <img class="card-img-top" style="height:120px;margin-top:20%;width:120px;margin-left:31%;" src="https://cdn3.iconfinder.com/data/icons/houses-11/64/131-Houses-Original_house-home-new-add-512.png">
            <div class="card-body"> <br>
                <h4 style="text-align:center;margin-top:30px;font-weight:bold;color:darkgray">ADD NEW SHOP</h4>
            </div>
            </div>
        </a>
        </div>';
        foreach($shops as $ky => $shop )
        {
            $sid=(($shop->id)*382724-227)*9873;
            $data .=' <div class="col-md-4" >
            <div class="card">
              <img class="card-img-top" style="height:200px;" src="/uploads/shops/'.$shop->image.'">
              <div class="card-body">
                <p class="category category__01 " style="background:#84e514;">'.$shop->category.'</p>
                <h5 style="text-align:center;">'.$shop->name.'</h5> 
                <br><div class="row">
                 <div class ="col-md-6" style="text-align:center;">
                    <a style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#60ACEF;"  href="/admin/shop/manage/'.$sid.'" class="btn">Manage</a> 
                 </div> 
                  
                 <div class ="col-md-6" style="text-align:center;">
                    <button style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#F6454F;" data-id="'.$shop->id.'" data-toggle="modal" data-target="#deleteShop" class="btn">Delete</button>  
                </div>
                </div>
                 </div>
            </div>
          </div>';
        } 
        return $data ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $featured_img =  time().explode('.',$request['featured-image-name'])[0].'.' . explode('/', explode(':',substr($request['featured-image'],0,strpos(
            $request['featured-image'],';')))[1])[1];  

        \Image::make($request['featured-image'])->save(public_path('uploads\shops\\').$featured_img);

        $this->validate($request,[
            'name'=>'required',
            'ownname'=>'required',
            'close_at'=>'required',
            'open_at'=>'required',
            'category'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            ]);
        Shops::create([
            'name'=>$request['name'],
            'owner_name'=>$request['ownname'],
            'close_at'=>$request['close_at'],
            'open_at'=>$request['open_at'],
            'category'=>$request['category'],
            'lat'=>$request['lat'],
            'lng'=>$request['lng'],
            'email'=>$request['email'],
            'address'=>$request['address'],
            'image'=>$featured_img,
        ]);
        
        User::create([
            'name'=>$request['ownname'],
            'email'=>$request['email'],
            'type'=>"shop",
            'status'=>1,
            'password'=>Hash::make($request['password']),
        ]);
        return ['success'=>'Home Successfully Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function ALlShop()
    {
        return Shops::all();
    }

    public function AddToSHop(Request $request)
    {
       ShopProducts::create([
            "shop_id"=>$request['shop_id'],
            "Prod_id"=>$request['product_id'],
            "qty"=>$request['qty'],
       ]); 
    }

    public function show($id)
    {
        $sid = (($id)/9873+227)/382724;
        $shop= Shops::where('id',$sid)->get();
        return view('admin.shop.manageshop')->with('shops',$shop);
    }
    public function ShowSingle($id)
    {
        return Shops::where('id',$id)->get()->first();
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shop = Shops::where('id',$id)->get()->first();
        if($request['featured-image']!="a")
        {
            $featured_img =  time().explode('.',$request['featured-image-name'])[0].'.' . explode('/', explode(':',substr($request['featured-image'],0,strpos(
            $request['featured-image'],';')))[1])[1];  

            \Image::make($request['featured-image'])->save(public_path('uploads\shops\\').$featured_img);
        }
        else
        {
            $featured_img=$shop->image;
        }
        $this->validate($request,[
            'name'=>'required',
            'ownname'=>'required',
            'close_at'=>'required',
            'open_at'=>'required',
            'category'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            ]);
        Shops::where('id',$id)->update([
            'name'=>$request['name'],
            'owner_name'=>$request['ownname'],
            'close_at'=>$request['close_at'],
            'open_at'=>$request['open_at'],
            'category'=>$request['category'],
            'lat'=>$request['lat'],
            'lng'=>$request['lng'],
            'address'=>$request['address'],
            'image'=>$featured_img,
        ]);
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shops::findOrFail($id);
        $user=User::where('email',$shop->email);
        $shopprod=ShopProducts::where('shop_id',$shop->id);
        $shopprod->delete();
        $user->delete();
        $shop->delete();  

    }
}

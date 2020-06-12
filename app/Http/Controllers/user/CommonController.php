<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\ShopProducts;
use App\Models\Shops;
use App\Models\Contact;
use App\Models\RecentVisits;

class CommonController extends Controller
{

  public function RecentVisit($id)
    {
        $data ='';
        $recent=RecentVisits::where('user_id',$id)->take(5)->orderBy('id','desc')->get();
            $data.=' <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="card" style="background-color:#557A95;">
                  <div class="card-body" style="height:258px;"><br><br><br><br>
                    <p style="color:white; border-color:white;"
                     class="btn btn-outline w-100"><b>YOUR RECENT DAY</b></p><br><br>
                  </div>
                </div>  
              </div>
            </div>
          </div>';
            foreach($recent as $ky => $rec)
            {
              $product=Products::where('id',$rec->product_id)->get()->first();
              $data .='<div class="col-md-4">
                  <a style="text-decoration:none;" href="/visit/'.$product->id.'">
                  <div class="card">
                    <div class="card-body" style="height:300px;">
                      <img style="width:100%;height:100%;" class="mySlides" src="/uploads/products/'.$product->featured_image.'"/>
                      <div class="w3-center">
                        <div class="w3-section">
                          <div class="fav">PRICE :: $ '.$product->price.'</div>
                          <div class="bottom-left" style="color:#FB641B;"><b>'.$product->name.'</b></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
                ';
            } 
            return $data ;   
    }

    public function ProductOfDay()
    {
        $data ='';
        $products = Products::orderBy('id','desc')->take(5)->get();
            $data.=' <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="card" style="background-color:#557A95;">
                  <div class="card-body" style="height:258px;"><br><br><br><br>
                    <p style="color:white; border-color:white;"
                     class="btn btn-outline w-100"><b>PRODUCT OF THE DAY</b></p><br><br>
                  </div>
                </div>  
              </div>
            </div>
          </div>';
            foreach($products as $ky => $product)
            {
                $data .='<div class="col-md-4">
                  <a style="text-decoration:none;" href="/visit/'.$product->id.'">
                  <div class="card">
                    <div class="card-body" style="height:300px;">
                      <img style="width:100%;height:100%;" class="mySlides" src="/uploads/products/'.$product->featured_image.'"/>
                      <div class="w3-center">
                        <div class="w3-section">
                          <div class="fav">PRICE :: $ '.$product->price.'</div>
                          <div class="bottom-left" style="color:#FB641B;"><b>'.$product->name.'</b></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
                ';
            } 
            return $data ;   
    }


    public function show($id)
    {
      if(Auth::user())
      {
        $userid=Auth::user()->id;
      }
      else
      {
          $userid=0;
      }
      if(RecentVisits::where('user_id',$userid)->where('product_id',$id)->get()->count()==0)
      {
        RecentVisits::create([
          "user_id"=>$userid,
          "product_id"=>$id,
        ]);
      }
        $prod=Products::where('id',$id)->get();
        return view('user.productDetail')->with('products',$prod);
    }

    
    public function search($search)
    {
        if($search=="all")
        {
          $product=Products::all();
        }
        else if($search=="latest")
        {
          $product=Products::orderBy('id','desc')->take(12)->get();
        }
        else
        {
          $product=Products::orderBy('id','desc')->where('category',$search)->get();
        }
        return view('user.search')->with('products',$product);
    }

    
    public function searchForm(Request $request)
    {
      if(Products::where('name','LIKE','%'.$request['search'].'%')->orWhere('category',$request['search'])->orWhere('brand',$request['search'])->get()->count()==0)
      {
         
        if(Shops::where('name','LIKE','%'.$request['search'].'%')->get())
        {
          $product=Shops::where('name','LIKE','%'.$request['search'].'%')->with('products')->get()->first();
          $shop=Shops::where('name','LIKE','%'.$request['search'].'%')->get();
          return view('user.shop')->with('products',$product->products)->with('shops',$shop);
        }
        return view('index');
      }
      else
      {
        $product=Products::where('name','LIKE','%'.$request['search'].'%')->orWhere('category',$request['search'])->orWhere('brand',$request['search'])->get();
        return view('user.search')->with('products',$product);
      }
    }


    public function shop($lat,$lng)
    {
       $product=Shops::where('lat',$lat)->where('lng',$lng)->with('products')->get()->first();
       $shop=Shops::where('lat',$lat)->where('lng',$lng)->get();
       return view('user.shop')->with('products',$product->products)->with('shops',$shop);
    }

    public function map($id)
    {
      $prod=Products::where('id',$id)->with('shop')->get()->first();
      return $prod->shop;
    }

    public function contact(Request $request)
    {
        $this->validate($request,[
          'name'=>'required',
          'email'=>'required',
          'message'=>'required',
          ]);
      Contact::create([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'message'=>$request['message'],
      ]);
      return "success";
    }
}

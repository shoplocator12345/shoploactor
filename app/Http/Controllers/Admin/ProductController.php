<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Shops;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request['search'])
        {
            $data ='';
            $products = Products::where('name','LIKE','%'.$request['search'].'%')->orWhere('category',$request['search'])->orWhere('brand',$request['search'])->orderBy('id','desc')->get();
            $count = Products::where('name','LIKE','%'.$request['search'].'%')->orWhere('category',$request['search'])->orWhere('brand',$request['search'])->get()->count();
            if($count==0)
            {
                return "No Record Found";
            }
            else
            {
                $data.='<div class="col-md-4"  >
                <a href="#" style="text-decoration:none"  onclick="AddProduct()">
                <div class="card addcard" style="border:2px dotted #666666; background-color:#e4e4e4; height:320px;">
                <img class="card-img-top" style="height:120px;margin-top:20%;width:120px;margin-left:31%;" src="https://cdn3.iconfinder.com/data/icons/houses-11/64/131-Houses-Original_house-home-new-add-512.png">
                <div class="card-body"> <br>
                    <h4 style="text-align:center;margin-top:30px;font-weight:bold;color:darkgray"> ADD NEW PRODUCT</h4>
                </div>
                </div>
                </a>
                </div>';
                foreach($products as $ky => $product)
                {
                    $data .=' <div class="col-md-4" >
                    <div class="card">
                    <img class="card-img-top" style="height:185px;" src="/uploads/products/'.$product->featured_image.'">
                    <div class="card-body">
                        <p class="category category__01 " style="background:#FB641B;">Price :: $ '.$product->price.'</p>
                        <h5 style="text-align:center;">'.$product->name.' ('.$product->qty.') </h5> 
                        <h6 style="text-align:center;font-weight:bold">'.$product->brand.'</h6> 
                        <div class="row">
                        <div class ="col-md-6" style="text-align:center;">
                            <a style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#60ACEF;"  href="/admin/product/manage/'.$product->id.'" class="btn">Manage</a> 
                        </div> 
                        
                        <div class ="col-md-6" style="text-align:center;">
                            <button style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#F6454F;" data-id="'.$product->id.'" data-toggle="modal" data-target="#deleteProduct" class="btn">Delete</button>  
                        </div>
                        </div>
                        </div>
                    </div>
                </div>';
                } 
                return $data ;
            }
            
        }
        else
        {
            $data ='';
            $products = Products::orderBy('id','desc')->get();
            $data.='<div class="col-md-4"  >
            <a href="#" style="text-decoration:none"  onclick="AddProduct()">
            <div class="card addcard" style="border:2px dotted #666666; background-color:#e4e4e4; height:320px;">
            <img class="card-img-top" style="height:120px;margin-top:20%;width:120px;margin-left:31%;" src="https://cdn3.iconfinder.com/data/icons/houses-11/64/131-Houses-Original_house-home-new-add-512.png">
            <div class="card-body"> <br>
                <h4 style="text-align:center;margin-top:30px;font-weight:bold;color:darkgray"> ADD NEW PRODUCT</h4>
            </div>
            </div>
            </a>
            </div>';
            foreach($products as $ky => $product)
            {
            $data .=' <div class="col-md-4" >
                <div class="card">
                <img class="card-img-top" style="height:185px;" src="/uploads/products/'.$product->featured_image.'">
                <div class="card-body">
                    <p class="category category__01 " style="background:#FB641B;font-size:18px;">Price :: $ '.$product->price.'</p>
                    <h5 style="text-align:center;">'.$product->name.' ('.$product->qty.') </h5> 
                    <h6 style="text-align:center;font-weight:bold">'.$product->brand.'</h6> 
                    <div class="row">
                    <div class ="col-md-6" style="text-align:center;">
                        <a style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#60ACEF;"  href="/admin/product/manage/'.$product->id.'" class="btn">Manage</a> 
                    </div> 
                    
                    <div class ="col-md-6" style="text-align:center;">
                        <button style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#F6454F;" data-id="'.$product->id.'" data-toggle="modal" data-target="#deleteProduct" class="btn">Delete</button>  
                    </div>
                    </div>
                    </div>
                </div>
            </div>';
            } 
            return $data ;
        }
        
    }



    public function ShopProduct(Request $request,$id)
    {
        if($request['search'])
        {
            $data ='';
            $products = Products::where('name','LIKE','%'.$request['search'].'%')->orWhere('category',$request['search'])->orWhere('brand',$request['search'])->orderBy('id','desc')->get();
            $count = Products::where('name','LIKE','%'.$request['search'].'%')->orWhere('category',$request['search'])->orWhere('brand',$request['search'])->get()->count();
            if($count==0)
            {
                return "No Record Found";
            }
            else
            {
                $data.='<div class="col-md-4"  >
                <a style="text-decoration:none"  onclick="AddToShop()">
                <div class="card addcard" style="border:2px dotted #666666; background-color:#e4e4e4; height:320px;">
                <img class="card-img-top" style="height:120px;margin-top:20%;width:120px;margin-left:31%;" src="https://cdn3.iconfinder.com/data/icons/houses-11/64/131-Houses-Original_house-home-new-add-512.png">
                <div class="card-body"> <br>
                    <h4 style="text-align:center;margin-top:30px;font-weight:bold;color:darkgray"> ADD NEW PRODUCT</h4>
                </div>
                </div>
                </a>
                </div>';
                foreach($products as $ky => $product)
                {
                    $data .=' <div class="col-md-4" >
                    <div class="card">
                    <img class="card-img-top" style="height:185px;" src="/uploads/products/'.$product->featured_image.'">
                    <div class="card-body">
                        <p class="category category__01 " style="background:#FB641B;">Price :: $ '.$product->price.'</p>
                        <h5 style="text-align:center;">'.$product->name.' ('.$product->qty.') </h5> 
                        <h6 style="text-align:center;font-weight:bold">'.$product->brand.'</h6> 
                        <div class="row">
                        <div class ="col-md-6" style="text-align:center;">
                            <a style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#60ACEF;"  href="/admin/product/manage/'.$product->id.'" class="btn">Manage</a> 
                        </div> 
                        
                        <div class ="col-md-6" style="text-align:center;">
                            <button style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#F6454F;" data-id="'.$product->id.'" data-toggle="modal" data-target="#deleteProductToShop" class="btn">Delete</button>  
                        </div>
                        </div>
                        </div>
                    </div>
                </div>';
                } 
                return $data ;
            }
            
        }
        else
        {
            $data ='';
            $shop=Shops::where('id',$id)->with('products')->get()->first();
            $products = Products::orderBy('id','desc')->get();
            $data.='<div class="col-md-4"  >
            <a style="text-decoration:none"  onclick="AddToShop()">
            <div class="card addcard" style="border:2px dotted #666666; background-color:#e4e4e4; height:320px;">
            <img class="card-img-top" style="height:120px;margin-top:20%;width:120px;margin-left:31%;" src="https://cdn3.iconfinder.com/data/icons/houses-11/64/131-Houses-Original_house-home-new-add-512.png">
            <div class="card-body"> <br>
                <h4 style="text-align:center;margin-top:30px;font-weight:bold;color:darkgray"> ADD NEW PRODUCT</h4>
            </div>
            </div>
            </a>
            </div>';
            foreach($shop->products as $key=>$product)
            {
            $data .=' <div class="col-md-4" >
                <div class="card">
                <img class="card-img-top" style="height:185px;" src="/uploads/products/'.$product->product->featured_image.'">
                <div class="card-body">
                    <p class="category category__01 " style="background:#FB641B;font-size:18px;">Price :: $ '.$product->product->price.'</p>
                    <h5 style="text-align:center;">'.$product->product->name.' ('.$product->product->qty.') </h5> 
                    <h6 style="text-align:center;font-weight:bold">'.$product->product->brand.'</h6> 
                    <div class="row">
                        <div class ="col-md-12" style="text-align:center;">
                            <button style="color:white;width:100%;text-align:center;font-weight:bold; background-color:#F6454F;" data-id="'.$product->product->id.'" data-toggle="modal" data-target="#deleteProductToShop" class="btn">Delete</button>  
                        </div>
                    </div>
                    </div>
                </div>
            </div>';
            } 
            return $data ;
        }
        
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[];
        $featured_img =  time().explode('.',$request['featured-image-name'])[0].'.' . explode('/', explode(':',substr($request['featured-image'],0,strpos(
            $request['featured-image'],';')))[1])[1];  

        \Image::make($request['featured-image'])->save(public_path('uploads\products\\').$featured_img);
       
        $gallery=$request['gallery'];
        $gallery_name=$request['gallery_name'];
        foreach($gallery as $key => $gal)
        {
            $gal_img =  time().explode('.',$gallery_name[$key])[0].'.' . explode('/', explode(':',substr($gal,0,strpos(
                $gal,';')))[1])[1];  
    
            \Image::make($gal)->save(public_path('uploads\products\gallery\\').$gal_img);
            array_push($data,$gal_img);
        }
        $this->validate($request,[
            'name'=>'required',
            'brand'=>'required',
            'quantity'=>'required',
            'category'=>'required',
            'price'=>'required',
            ]);
        Products::create([
            'name'=>$request['name'],
            'brand'=>$request['brand'],
            'qty'=>$request['quantity'],
            'category'=>$request['category'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'featured_image'=>$featured_img,
            'gallery'=>implode(',', $data),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Products::where('id',$id)->get();
        return view('admin.product.manageproduct')->with('products',$product);
    }
    public function ShowEdit($id)
    {
        return Products::where('id',$id)->get()->first();
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
        $product =  Products::whereId($id)->first();
        if($request['featured-image-name']=="a")
        {
            $featured_img=$product->featured_image;

        }
        else 
        {
            $featured_img =  time().explode('.',$request['featured-image-name'])[0].'.' . explode('/', explode(':',substr($request['featured-image'],0,strpos(
                $request['featured-image'],';')))[1])[1];  
    
            \Image::make($request['featured-image'])->save(public_path('uploads\homes\\').$featured_img);
           
        }
        $this->validate($request,[
            'name'=>'required',
            'brand'=>'required',
            'quantity'=>'required',
            'category'=>'required',
            'description'=>'required',
            'price'=>'required',
            ]);
        Products::where('id',$id)->update([
            'name'=>$request['name'],
            'brand'=>$request['brand'],
            'qty'=>$request['quantity'],
            'category'=>$request['category'],
            'price'=>$request['price'],
            'description'=>$request['description'],
            'featured_image'=>$featured_img,
        ]);
        return ['success'=>'Product Successfully Edit'];
    }

    public function ALlProduct()
    {
        return Products::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete(); 
    }
}

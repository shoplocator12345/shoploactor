<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ShopProducts;
use App\Models\Shops;
use App\Models\Products;
use App\Users;
use App\Models\Contact;
Use \Carbon\Carbon;

class CommonController extends Controller
{
    public function dashoard()
    {
        $shop = Shops::get();
        $product = Products::get();
        $user = User::get();
        $contact = Contact::get();
        return view('admin.dashboard')->with('user',$user)->with('contact',$contact)->with('shop',$shop)->with('product',$product);
    }
    public function DashboardUser(Request $request)
    {
        $data ='';
        $users= User::where('type','shop')->get();
        foreach($users as $key=>$user)
        {
            ++$key;
            $data.=' <tr>
                        <td>'.$key.'</td>
                        <td>'.$user->name.'</td>
                        <td>'.$user->email.'</td>
                        <td>';
                        if($user->status==0)
                        {
                           $data.='<div class="container" style="text-align:center;">
                           <a onclick="BlockUserModal('.$user->id.')" class="change_user_status" type="button" style="color:white;text-align:center;font-weight:bold; color:#F6454F;" data-id="'.$user->id.'"  ><i class="fa fa-ban">&nbsp;Deactive</i></a></div> ';
                        }
                       else
                       {
                           $data.='<div class="container" style="text-align:center;">
                           <a class="change_user_status" type="button" style="color:white;text-align:center;font-weight:bold; color:#2DCC70;" onclick="BlockUserModal('.$user->id.')" >
                           <i class="fa fa-check">&nbsp;Active</i></a></div>';
                       }
                        $data.='</td>
                    </tr>';
                  --$key;  
            
        }
        return $data;        
    }

    
    public function enquiry()
    {
        $data ='';
        $display;
        $enquiries= Contact::orderBy('created_at','desc')->get();
        $date = Carbon::now();

        foreach($enquiries as $key=> $enquiry)
        {
            $minute=$date->diffInMinutes($enquiry->created_at);
            $days=$date->diffInDays($enquiry->created_at);
            $hours=$date->diffInHours($enquiry->created_at);
            $month=$date->diffInMonths($enquiry->created_at);
            if($minute<60)
            {
                $display=$minute.' minute ago';
            }
            else if($minute>59 && $hours<24)
            {
                $display=$hours.' hours ago';
            }
            else if($hours>23 && $days<30)
            {
                $display=$days.' days ago';
            }
            else if($days>30)
            {
                $display=$month.' month ago';
            }
            
                $data.='<div class="accordion" id="accordionExample" >
                <div class="card" >
                  <div class="card-header" id="headingOne" >
                    <div class="row" >
                        <div class="col-md-12" style="height:28px;" >
                            <strong style="text-decoration:none;color:black">Message from <span style="color:#00909e;">'.$enquiry->name.'('.$enquiry->email.')</span></strong>
                        </div>
                    </div>
                    <div class="row showbtn" style="text-align:center;">
                    <div class="col-md-4" style="color:red;font-weight:bold">'.date($enquiry->created_at).'</div>
                    <div class="col-md-4" style="color:red;font-weight:bold">'.$display.'</div>
                        <div class="col-md-4">
                            <button class="btn btn-link" onclick="enqUpdate('.$enquiry->id.')"  type="button" data-toggle="collapse" data-target="#collapse'.$enquiry->id.'" aria-expanded="true" aria-controls="collapseOne">
                            Click here to see message
                            </button>
                        </div>
                    </div>
                  </div>
                  <div id="collapse'.$enquiry->id.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="messages">
                            <span><b>MESSAGE :</b></span><br>
                            <p style="margin-left:100px;margin-right:100px;font-size:16px;">
                             '.$enquiry->message.'
                            <p>
                            <hr>
                            
                        </div>
                    </div>
                  </div>
                </div>';
             
        }
        return $data;
    }

    public function AddUser(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'name'=>'required',
            'password' => ['required', 'string', 'min:8',],
            ]);

        User::create([
            'email'     =>  $request['email'],
            'name'      =>  $request['name'],
            'password' => Hash::make($request['password']),
            'type'      =>  'user',
            'status'    =>  1,
        ]);
        return "success";
    }
    public function ShopToProduct($prod_id,$shop_id)
    {
        $data = ShopProducts::where("shop_id",$shop_id)->where('Prod_id',$prod_id);
        $data->delete();
    }

    public function UserBlock($id)
    { 
        $home = User::where('id',$id)->get()->first();
        if($home->status==0)
        {
            $block=1;
        }
        else
        {
            $block=0;
        }
        User::where('id',$id)->update([
            'status'=>$block
        ]);
        return "success";
    }
}


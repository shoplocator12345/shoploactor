@extends('layouts.admin')
@section('content')
<style>
.pull-up{
   width: 100%;
}

.cards-row {
   text-align:center;
}

.pull-up:hover {
  transform: scale(1.03); 
}
 

</style>

<body style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;">
      <div class="container">
         <h4><br><strong>Admin Dashboard</strong></h4>
      </div>
<hr><br>

<div class="container" style="text-align:center;">
   <div class="row">
      <div class="col-md-4">
         <div class="card" style="background-color: #ee4f4c; color:white;">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-4" style="text-align:left;">
                     <div>
                        <i class="fa fa-address-card" style="font-size: 30px; color: white;"></i>
                     </div>
                  </div>
                  <div class="col-md-8" style="text-align:right;">
                     <span><b>188</b></span><br><br>
                     <span><b>Today's Visits</b></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card" style="background-color: #7158f1;color:white;">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6" style="text-align:left;">
                     <div>
                        <i class="fa fa-user-plus" style="font-size: 30px; color: white;"></i>
                     </div>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                  <span><b>{{$user->where('type','user')->count()}}</b></span><br><br>
                     <span><b>Total Users</b></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card" style="background-color:#09d99f;color:white;">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6" style="text-align:left;">
                     <div>
                        <i class="fa fa-shopping-bag" style="font-size: 30px; color: white;"></i>
                     </div>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                     <span><b>{{$contact->count()}}</b></span><br><br>
                     <span><b>Total Enquiries</b></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br>

      <div id="crypto-stats-3" class="container">
         <div class="row">
         <div class="col-md-4">
         
            <div class="card pull-up" id="card1" style="background-color:#283949 ;">
               <div class="card-content">
                  <a href="/admin/shop">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6" style="text-align:left;">
                              <div>
                                 <i class="fa fa-home" style="font-size: 30px; color: white;"></i>
                              </div>
                           </div>
                           <div class="col-md-6" style="text-align:right;">
                           <span style="color:white;"><b>{{$shop->count()}}</b></span><br><br>
                              <span style="color:white;"><b>Shops</b></span>
                           </div>            
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>

         <div class="col-md-4">
            <div class="card pull-up" id="card2" style="background-color: #855fbd;">
               <div class="card-content">
                  <a href="/admin/community">
                     <div class="card-body">
                     <div class="row">
                           <div class="col-md-6" style="text-align:left;">
                              <div>
                                 <i class="fa fa-box" style="font-size: 30px; color: white;"></i>
                              </div>
                           </div>
                           <div class="col-md-6" style="text-align:right;">
                              <span style="color:white;"><b>{{$product->count()}}</b></span><br><br>
                              <span style="color:white;"><b>Products</b></span>
                           </div>            
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>

         <div class="col-md-4">
            <div class="card pull-up" id="card2" style="background-color: #fbb836;">
               <div class="card-content">
                  <a href="/admin/floor">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6" style="text-align:left;">
                              <div>
                                 <i class="fa fa-user" style="font-size: 30px; color: white;"></i>
                              </div>
                           </div>
                           <div class="col-md-6" style="text-align:right;">
                              <span style="color:white;"><b>{{$user->where('type','shop')->count()}}</b></span><br><br>
                              <span style="color:white;"><b>ShopKeepers</b></span>
                           </div>            
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
         </div>

      <br>

      <div class="card" style="margin-left:10px; margin-right:10px;">
         
            <div class="table-responsive" id="custom_table">
                  
                  <!-- <div class="alert alert-success alert-dismissible" style="margin-top:18px;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                      <strong>Success!</strong>
                  </div> -->
               <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th style="width:40px;background-color:#30394c;color:white;">S.No.</th>
                        <th style="background-color:#30394c;color:white;">Name</th>
                        <th style="background-color:#30394c;color:white;">Email</th>
                        <th style="background-color:#30394c;color:white;">Status</th>
                     </tr>
                  </thead>
                  <tbody id="userdash">
                    
                  </tbody>
               </table>
            </div>
      </div>
      </div>

      <div class="modal fade bd-example-modal-xl" id="BlockUser" tabindex="-1" role="dialog" aria-labelledby="addNewCommunityTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 style="font-family: Open Sans, sans-serif;">Change Status Confirm Action</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true"><i class="fa fa-times"></i></span>
               </button>
             </div>
             <div class="modal-body">
               <div class="row" style="margin-left:10px;">
                 <h6 class="delete_heading" style="font-family: Open Sans, sans-serif;">Are you sure, you want to change it's Status ?</h6>
                 <div class="clearfix"></div>
                 <div class="m-auto">
                   <button type="button" data-dismiss="modal" style="font-family: Open Sans, sans-serif;color:white;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100"> No </button>
                   <button type="submit" id="ys-chng-user-btn" style=" color:white; background-color:#2DCC70; font-family: Open Sans, sans-serif;;font-weight:bold" class="btn w3-100"> Yes</button>
                  </div>  
                 </div>    
               </div>
            </div>
          </div>
        </div>
     
</body>

   @endsection
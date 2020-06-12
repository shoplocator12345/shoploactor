<!DOCTYPE html>
<html lang="en">
<style>
.main-sidebar {
  position: fixed;
}
.addcard:hover {
  transform: scale(1.03); 
}
@media (min-width: 768px) {
        .control-sidebar {
               .tab-content {
                       height: calc(100vh - 85px);
                }
        }
}
</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Admin | ShopLocator</title>

  <!-- Font Awesome Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/bower_components/admin-lte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
   
     <!-- custom style sheet -->
  <link rel="stylesheet" href="/css/style.css" class="rel">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7ZAdsxYc_U1xxyA3ga9gcmG260tW783I&libraries=places"></script>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   

      <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css" rel="stylesheet">

</head>


<body class="hold-transition sidebar-mini" style="font-family: Open Sans, sans-serif;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Home</a>
      </li>
       
    </ul>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
           
        @else
            <li class="nav-item " style="text-transform:capitalize;font-weight:bold;margin-right:20px;">
                    {{ Auth::user()->name }} 
            </li>
        @endguest
    </ul>

    <!-- SEARCH FORM -->
     

    <!-- Right navbar links -->
     
  </nav>
</div>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <div  class="brand-link" id="logo">
        <img src="/dist/img/user2-160x160.jpg"  class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Shop Locator</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
              <li class="nav-item">
                <a href="/admin" class="nav-link">
 
                <i class="fa fa-address-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><p>Dashboard</p></span>

                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/shop" class="nav-link">
                <i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><p>Shop</p></span>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/product" class="nav-link">
                <i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><p>Product</p></span>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/Enquiry" class="nav-link">
                <i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><p>Enquiry</p></span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" data-toggle="modal" data-target="#logout" aria-expanded="true" aria-controls="logout"
                >
                  <i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><p>Logout</p></span>
                </a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div id="danger" style="text-align:center">
    </div>
    <div id="success" style="text-align:center;">
    </div>
    @yield('content')
        

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>

<div class="modal fade bd-example-modal-xl" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;" id="logout" tabindex="-1" role="dialog" aria-labelledby="addNewCommunityTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Logout Confirm Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-left:10px;">
          <h6 class="delete_heading">Are you sure, you want's to Logout ?</h6>
          <div class="clearfix"></div>
          <div class="m-auto">
            <button type="button" data-dismiss="modal" style="color:white;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100"> No </button>
            <button type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style=" color:white; background-color:#2DCC70;font-weight:bold" class="btn w3-100"> Yes</button>
           </div>  
          </div>    
        </div>
     </div>
   </div>
 </div>


<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<script>
  var APP_URL = "{{ url('/') }}";
</script>
@if(Route::currentRouteName() == 'dashboard')
  <script>
    LoadUserList();
    function LoadUserList()
    {
      $.ajax({
              type: 'GET',
              url: APP_URL+'/api/admin/dashboard/user',
              success: function(result){   
              $('#userdash').html(result);
              }   
          });
    }
  </script>
@endif


@if(Route::currentRouteName() == 'shops')
  <script>
    loadShopList();
      function loadShopList(){
        $.ajax({
              type: 'GET',
              url: APP_URL+'/api/admin/shop',
              success: function(result){   
              $('#shop_list').html(result);
              }   
          });
        }

        $('#deleteShop').on('show.bs.modal', function (e) {

          var $trigger = $(e.relatedTarget);
          var Hid=$trigger.data('id');
          $('#ys-shop-btn').attr('data-id',Hid);
          });
          $('#ys-shop-btn').click(function()
          {
            var id = $(this).attr('data-id');

            $('#deleteShop').modal('hide');
            $('.modal-backdrop').css('display','none');
            $.ajax({
              url: APP_URL + '/api/admin/shop/'+ id,
              type: 'DELETE'
            });
           loadShopList();
           $('#danger').html('Shop deleted').show().delay(2000).addClass('alert').addClass('alert-danger').fadeOut();
          });
    </script> 
@endif



@if(Route::currentRouteName() == 'shops-create')
<script>
  var latitude,longitude;
  $(document).ready(function() {
    loadmap();
  function loadmap(){
    var myLatLng=new google.maps.LatLng(-37.7315907,145.0920073);
    var map = new google.maps.Map(
      document.getElementById('mapshow'),
      {zoom: 15, center: myLatLng}
    );
      google.maps.event.addListener(map, "click", function (event) {
       latitude = event.latLng.lat();
       longitude = event.latLng.lng();
      radius = new google.maps.Circle({map: map,
          radius: 100,
          center: event.latLng,
          fillColor: '#777',
          fillOpacity: 0.1,
          strokeColor: '#AA0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          draggable: true,    // Dragable
          editable: true      // Resizable
      });

      // Center of map
      map.panTo(new google.maps.LatLng(latitude,longitude));
      
    });
    
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
  }
  var id = window.location.href.split('/').pop();
  var image,image_name;
    $('#file').on('change',function(e){
            let files = e.target.files[0];
            let reader = new FileReader();
            if(files){
              reader.onloadend = ()=>{
                $('#chosen_feature_img').attr('src',reader.result);
                image = reader.result;
                image_name = files.name;
              }
              reader.readAsDataURL(files); 
          }
        });

     
        $(function () {
          $('#addshop').on('submit', function (e) {
            var name,ownname,category,close_at,lat,open_at,lng,address;
            e.preventDefault();
                name            =  document.getElementById("name").value;         
                ownname         =  document.getElementById("ownname").value;         
                category        =  document.getElementById("category").value;         
                close_at        =  document.getElementById("close_at").value;         
                open_at         =  document.getElementById("open_at").value;         
                lat             =  document.getElementById("lat").value;         
                lng             =  document.getElementById("lng").value;    
                email           =  document.getElementById("email").value;    
                address         =  document.getElementById("address").value;    
                $.ajax({
                  type: 'post',
                  url: '/api/admin/shop/',
                  data:{
                    'name'                : name,
                    'ownname'             : ownname,
                    'category'            : category,
                    'close_at'            : close_at,
                    'open_at'             : open_at,
                    'featured-image'      : image,
                    'featured-image-name' : image_name,
                    'lat'                 : latitude,
                    'lng'                 : longitude,
                    'email'               : email,
                    'address'             : address,
                  },
                  success: function ( ) {
                    window.location.href = "/admin/shop";
                  }
                });

          });

      });
      
					
        });
</script>
@endif


@if(Route::currentRouteName() == 'shop-manage')
  <script>
  var sid = window.location.href.split('/').pop();
  var id = ((sid)/9873+227)/382724;
  $('#deleteProductToShop').on('show.bs.modal', function (e) {
      var $trigger = $(e.relatedTarget);
      var pid=$trigger.data('id');
      $('#ys-stp-btn').attr('data-id',pid);
      });
      $('#ys-stp-btn').click(function()
      {
        var Pid = $(this).attr('data-id');

        $('#deleteProductToShop').modal('hide');
        $('.modal-backdrop').css('display','none');
        $.ajax({
          url: APP_URL + '/api/admin/shoptoproduct/'+ Pid +'/'+id,
          type: 'DELETE',
          success: function(result){   
            loadProductList();
             $('#danger').html('Product deleted from this shop').show().delay(2000).addClass('alert').addClass('alert-danger').fadeOut();
            } 
        });
        
      });
    loadProductList();
      function loadProductList(){
        $.ajax({
              type: 'GET',
              url: APP_URL+'/api/admin/ShopProduct/'+id,
              success: function(result){   
              $('#product_list').html(result);
              }   
          });
        }

        loadShopProductList();
        function loadShopProductList(){
          var display;
            $.ajax({
                    type: 'GET',
                    url: APP_URL+'/api/admin/Productlist',
                    success: function(result){
                      $.each(result,function(k){
                        display += '<option value="'+result[k].id+'">'+result[k].name+' ('+result[k].qty+')</option>';
                      })
                    $('#ProductShopname').html(display);
                    }   
                  });
          }
          function AddToShop(pid)
      {
        $('#AddproductModal').modal('show');
        $(function () {
              $('#Addtoshop').on('submit', function (e) {
                var product_id,qty;
                e.preventDefault();
                    product_id            =  document.getElementById("ProductShopname").value;         
                    qty                =  document.getElementById("qty").value;         
                    $.ajax({
                      type: 'post',
                      url: '/api/admin/shopProduct/',
                      data:{
                        'shop_id'               : id,
                        'product_id'            : product_id,
                        'qty'                   : qty,
                      },
                      success: function ( ) {
                        $('#AddproductModal').modal('hide');
                        $('#success').html('Product Added To Your Shop').show().delay(5000).addClass('alert').addClass('alert-success').fadeOut();
                        loadProductList();
                      }
                    });

              });

          });
      } 
  </script>

@endif
 


@if(Route::currentRouteName() == 'dashboard')
  <script>
    function BlockUserModal(uid)
    {
      $('#BlockUser').modal('show');  
      $('#ys-chng-user-btn').attr('data-id', uid);
    
    }
    $('#ys-chng-user-btn').click(function()
      {
        var uid = $(this).attr('data-id');
        BlockUser(uid);
        $('#BlockUser').modal('hide');
        $('.modal-backdrop').css('display','none');
          
      });

      function BlockUser(id)
      {
             $.ajax({
              url: APP_URL + '/api/admin/user-block/'+ id,
              type: 'GET'
            });
           LoadUserList();
           $('#success').show().html('User Status changed').show().delay(2000).addClass('alert').addClass('alert-success').fadeOut();
      }
    </script>
@endif



@if(Route::currentRouteName() == 'shops-edit')
<script>
    var image="a",image_name="a";
  var latitude,longitude;
$(document).ready(function() {
  loadmap();
  function loadmap(){
    var myLatLng=new google.maps.LatLng(-37.7315907,145.0920073);
    var map = new google.maps.Map(
      document.getElementById('mapshow'),
      {zoom: 15, center: myLatLng}
    );
      google.maps.event.addListener(map, "click", function (event) {
       latitude = event.latLng.lat();
       longitude = event.latLng.lng();
       document.getElementById("lat").value = latitude;
       document.getElementById("lng").value = longitude;

      radius = new google.maps.Circle({map: map,
          radius: 100,
          center: event.latLng,
          fillColor: '#777',
          fillOpacity: 0.1,
          strokeColor: '#AA0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          draggable: true,    // Dragable
          editable: true      // Resizable
      });

      // Center of map
      map.panTo(new google.maps.LatLng(latitude,longitude));
      
    });
    
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
  }
      var APP_URL = "{{ url('/') }}";
      var sid = window.location.href.split('/').pop();
      var id = ((sid)/9873+227)/382724;
      $.ajax({
          type: 'GET',
          url: APP_URL+'/api/admin/single-shop/'+id,

      success: function(result){     
        document.getElementById("name").value = result.name;
        document.getElementById("ownname").value = result.owner_name;
        document.getElementById("category").value = result.category;
        document.getElementById("close_at").value = result.close_at;
        document.getElementById("open_at").value = result.open_at; 
        document.getElementById("lat").value = result.lat;
        document.getElementById("lng").value = result.lng;
        document.getElementById("address").value = result.address;
      }
      
    }); 
    $('#file').change(function(e){
            let files = e.target.files[0];
            let reader = new FileReader();
            if(files){
              reader.onloadend = ()=>{
                $('#chosen_feature_img').attr('src',reader.result);
                image = reader.result;
                image_name = files.name;
              }
              reader.readAsDataURL(files); 
          }
        });
 
        $(function () {
          $('#Edithome').on('submit', function (e) {
            var name,owname,catgory,open_at,lat,lng,address;
            e.preventDefault();
                name              =  document.getElementById("name").value;         
                ownname           =  document.getElementById("ownname").value;         
                category          =  document.getElementById("category").value;         
                open_at           =  document.getElementById("open_at").value;         
                close_at          =  document.getElementById("close_at").value;         
                lat               =  document.getElementById("lat").value;         
                lng               =  document.getElementById("lng").value;         
                address           =  document.getElementById("address").value;         
                $.ajax({
                  type: 'post',
                  url: '/api/admin/shop/'+id,
                  data:{
                    'name'                : name,
                    'ownname'             : ownname,
                    'category'            : category,
                    'open_at'             : open_at,
                    'close_at'            : close_at,
                    'lat'                 : lat,
                    'lng'                 : lng,
                    'address'             : address,
                    'featured-image'      : image,
                    'featured-image-name' : image_name,
                  },
                  success: function () {
                   sid=((id)*382724-227)*9873;
                    window.location.href = "/admin/shop/manage/"+sid;
                    $('#success').html('Home Edited').show().delay(2000).addClass('alert').addClass('alert-success').fadeOut();
                  }
                });

          });

      });
});


</script>
@endif

@if(Route::currentRouteName() == 'enquiry')
  <script>
      loadEnquiryList();
      function loadEnquiryList(){
    $.ajax({
          type: 'GET',
          url: APP_URL+'/api/admin/enquiry',
          success: function(result){
          $('#enquiry').html(result);
          }   
      });
  } 
  </script>
@endif

@if(Route::currentRouteName() == 'products')
  <script>
      loadProductList();
      function loadProductList(){
        $.ajax({
              type: 'GET',
              url: APP_URL+'/api/admin/product',
              success: function(result){   
              $('#product_list').html(result);
              }   
          });
        }

        $(function () {
          $('#productSearch').on('submit', function (e) {
            var search;
            e.preventDefault();
                search            =  document.getElementById("ProductSearch").value;  
                $.ajax({
                  type: 'get',
                  url: '/api/admin/product/',
                  data:{
                    'search'           : search,
                  },
                  success: function(result){   
                    $('#product_list').html(result);
                  }  
                });
          });
      });

        $('#deleteProduct').on('show.bs.modal', function (e) {
          var $trigger = $(e.relatedTarget);
          var Hid=$trigger.data('id');
          $('#ys-product-btn').attr('data-id',Hid);
          });
          $('#ys-product-btn').click(function()
          {
            var id = $(this).attr('data-id');

            $('#deleteProduct').modal('hide');
            $('.modal-backdrop').css('display','none');
            $.ajax({
              url: APP_URL + '/api/admin/product/'+ id,
              type: 'DELETE'
            });
          loadProductList();
          $('#danger').html('Product deleted').show().delay(2000).addClass('alert').addClass('alert-danger').fadeOut();
          });

        

       
  </script>
@endif

<script>
  function AddProduct()
        {
          $('#AddproductModal').modal('show');
          var image,image_name;
          var gal=[];
          var gal_name=[];
            $('#file').on('change',function(e){
                    let files = e.target.files[0];
                    let reader = new FileReader();
                    if(files){
                      reader.onloadend = ()=>{
                        $('#chosen_feature_img').attr('src',reader.result);
                        image = reader.result;
                        image_name = files.name;
                      }
                      reader.readAsDataURL(files); 
                  }
                });

                $('#files').on('change',function(evt){
                  var files = evt.target.files; 
                  for (var i = 0, f; f = files[i]; i++) {
                      // Only process image files.
                      if (!f.type.match('image.*')) {
                        continue;
                      }

                    var reader = new FileReader();
                      // Closure to capture the file information.
                        reader.onload = (function(theFile) {
                          return function(e) {
                            // Render thumbnail.
                            gal.push(e.target.result);
                            gal_name.push(theFile.name);
                          };
                        })(f);

                    // Read in the image file as a data URL.
                      reader.readAsDataURL(f);
                }
                });

                $(function () {
              $('#addproduct').on('submit', function (e) {
                var name,brand,quantity,shop,price,category;
                e.preventDefault();
                    name            =  document.getElementById("name").value;         
                    brand           =  document.getElementById("brand").value;         
                    quantity        =  document.getElementById("quantity").value;         
                    price           =  document.getElementById("price").value;         
                    description     =  document.getElementById("description").value;         
                    category        =  document.getElementById("category").value;         
                    $.ajax({
                      type: 'post',
                      url: '/api/admin/product/',
                      data:{
                        'name'               : name,
                        'brand'              : brand,
                        'quantity'           : quantity,
                        'price'              : price,
                        'description'        : description,
                        'category'           : category,
                        'featured-image'     : image,
                        'featured-image-name': image_name,
                        'gallery'            : gal,
                        'gallery_name'       : gal_name,
                      },
                      success: function ( ) {
                        $('#AddproductModal').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        loadProductList();
                        $('#success').html('New Product Added').addClass('alert').addClass('alert-success').show().delay(5000).fadeOut();
                      }
                    });

              });

          });
        }
  function EditProduct()
  {
    $('#EditproductModal').modal('show');
    var image="a",image_name="a";
      var id = window.location.href.split('/').pop();
      var gal=[];
      var gal_name=[];
      $.ajax({
          type: 'GET',
          url: APP_URL+'/api/admin/ProductEdit/'+id,
          success: function(result){     
            document.getElementById("name").value = result.name;
            document.getElementById("brand").value = result.brand;
            document.getElementById("quantity").value = result.qty;
            document.getElementById("price").value = result.price;
            document.getElementById("category").value = result.category;
            document.getElementById("description").value = result.description;
          }
          
        }); 
      $('#file').change(function(e){
            let files = e.target.files[0];
            let reader = new FileReader();
            if(files){
              reader.onloadend = ()=>{
                $('#chosen_feature_img').attr('src',reader.result);
                image = reader.result;
                image_name = files.name;
              }
              reader.readAsDataURL(files); 
          }
        });

        $('#files').change(function(evt){
          var files = evt.target.files; 
          for (var i = 0, f; f = files[i]; i++) {
              // Only process image files.
              if (!f.type.match('image.*')) {
                continue;
              }

            var reader = new FileReader();
              // Closure to capture the file information.
                reader.onload = (function(theFile) {
                  return function(e) {
                    // Render thumbnail.
                    gal.push(e.target.result);
                    gal_name.push(theFile.name);
                  };
                })(f);

            // Read in the image file as a data URL.
              reader.readAsDataURL(f);
        }
        });
        $(function () {
          $('#editproduct').on('submit', function (e) {
            var title,description,bedroom,bathroom,garage,status,stories,mls,area
            ,builder,meta_description,meta_title,price;
            e.preventDefault();
                name              =  document.getElementById("name").value;         
                brand             =  document.getElementById("brand").value;         
                description       =  document.getElementById("description").value;         
                category          =  document.getElementById("category").value;         
                price             =  document.getElementById("price").value;         
                quantity          =  document.getElementById("quantity").value;         
                $.ajax({
                  type: 'post',
                  url: '/api/admin/product/'+id,
                  data:{
                    'name'               : name,
                    'brand'              : brand,
                    'description'        : description,
                    'category'           : category,
                    'price'              : price,
                    'quantity'           : quantity,
                    'featured-image'      : image,
                    'featured-image-name' : image_name,
                    'gallery'             : gal,
                    'gallery_name'        : gal_name,
                  },
                  success: function () {
                    $('#EditproductModal').modal('hide');
                    $('#success').html('Product Edited').show().delay(5000).addClass('alert').addClass('alert-success').fadeOut();
                  }
                });

          });

      });
 
  }

  function Addtoshop(pid)
  {
    $('#Addtoshop').modal('show');
    $(function () {
          $('#Addtoshop').on('submit', function (e) {
            var shop_id,product_id,qty;
            e.preventDefault();
                shop_id            =  document.getElementById("shoplist").value;         
                qty                =  document.getElementById("qty").value;         
                $.ajax({
                  type: 'post',
                  url: '/api/admin/shopProduct/',
                  data:{
                    'shop_id'               : shop_id,
                    'product_id'            : pid,
                    'qty'                   : qty,
                  },
                  success: function ( ) {
                    $('#Addtoshop').modal('hide');
                    $('#success').html('Product Added To Shop').show().delay(5000).addClass('alert').addClass('alert-success').fadeOut();
                  }
                });

          });

      });
  }

  loadShopShowList();
  function loadShopShowList(){
    var display;
      $.ajax({
              type: 'GET',
              url: APP_URL+'/api/admin/Shoplist',
              success: function(result){
                $.each(result,function(k){
                  display += '<option value="'+result[k].id+'">'+result[k].name+'</option>';
                })
              $('#shoplist').html(display);
              }   
            });
     }  
</script>
</body>
</html>

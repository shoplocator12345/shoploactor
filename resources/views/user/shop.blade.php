@extends('layouts.front') 
@section('content')
<style>
    .details {
      text-align: left;
    }
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
    }
    
     
    
    table {
      font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    .thumb {
            height: 150px;
            width: 200px;
        }
    
         
        .home-contain {
          text-align:left;
        }
        .w3-bottombar {
          width: 25%;
        }
        .card-details {
          margin-left:10px;
          margin-right:10px;
          margin-top:20px;
        }
        .w3-third:hover {
          background-color:#347AB8;
        }
        .col-md-4 {
            padding-left:0px;
            padding-right:0px;
          }
          

          .card-body .dropdown {
              position: absolute;
              top: 15%;
              left: 75%;
              transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%);
              color: white;
              font-size: 20px;
              border: none;
              cursor: pointer;
              text-align: center;
          }

          .card-body .dropdown:hover {
              background-color:#DC143C;
          }


          .card-body .fav {
              position: absolute;
              top: 15%;
              left: 67%;
              font-size: 17px;
              font-weight: bold;
              color: white;
              border: none;
              cursor: pointer;
              background:#FB641B;
              text-align: right;
          }

          .card-body .fav:hover {
              background-color:white;
          }


          .bottom-left {
            position: absolute;
            bottom: 25px;
            left: 30px;
          }

          .dropdown {
            position: relative;
            display: inline-block;
          }

          .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 10px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
          }

          .dropdown:hover .dropdown-content {
            display: block;
          }
    </style>
    <div class="card">
      <div class="row card-details" style="font-family: Open Sans, sans-serif;">
        @foreach($shops as $shop)
         <div class="col-md-6 card-img">
           <div class="card ">
             <img class="card-img-top" style="height: 280px;" src="/uploads/shops/{{$shop->image}}" alt="">
           </div>
         </div>
         <div class="col-md-6">
           <table>
             <tr>
               <td><strong>SHOP NAME</strong></td>
               <td id=''>{{$shop->name}}</td>
             </tr>
             <tr>
               <td><strong>OWNER NAME</strong></td>
               <td id="description">{{$shop->owner_name}}</td>
             </tr>
             <tr>
               <td><strong>OWNER EMAIL</strong></td>
               <td id="description">{{$shop->email}}</td>
             </tr>
             <tr>
               <td><strong>CATEGORY</strong></td>
               <td id="area">{{$shop->category}}</td>
             </tr>
             <tr>
               <td><strong>OPEN AT</strong></td>
               <td id="builder">{{$shop->open_at}}</td>
             </tr>
             <tr>
               <td><strong>CLOSE AT</strong></td>
               <td id="bedroom">{{$shop->close_at}}</td>
             </tr>
             <tr>
              <td><strong>ADDRESS</strong></td>
              <td id="bedroom">{{$shop->address}}</td>
            </tr>
           </table>
          <br>         
         </div>
       </div>
         @endforeach
         
     </div>
        <hr>
        <div style="text-align:center;font-weight:bold;font-size:20px;">Product Available In Shop</div>
        <hr>
        <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <a style="text-decoration:none;" href="/visit/{{$product->product->id}}">
                <div class="card">
                <div class="card-body" style="height:300px;">
                    <img style="width:100%;height:100%;" class="mySlides" src="/uploads/products/{{$product->product->featured_image}}"/>
                    <div class="w3-center">
                    <div class="w3-section">
                        <div class="fav">PRICE :: $ {{$product->product->price}}</div>
                        <div class="bottom-left" style="color:#FB641B;"><b>{{$product->product->name}}</b></div>
                    </div>
                    </div>
                </div>
                </div>
                </a>
            </div>
        @endforeach
        </div>
    @endsection
@extends('layouts.front')
  @section('content')

<style>
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

<div class="row" >
    @foreach ($products as $product)
    <div class="col-md-4">
        <a style="text-decoration:none;" href="/visit/{{$product->id}}">
        <div class="card" style="margin:5px;">
          <div class="card-body" style="height:300px;">
            <img style="width:100%;height:100%;" class="mySlides" src="/uploads/products/{{$product->featured_image}}"/>
            <div class="w3-center">
              <div class="w3-section">
                <div class="fav">PRICE :: $ {{$product->price}}</div>
                <div class="bottom-left" style="color:#FB641B;"><b>{{$product->name}}</b></div>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
        
    @endforeach
</div>

<script>
 
</script>

  @endsection
 


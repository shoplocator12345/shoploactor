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

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" style="height:350px">
      <div class="carousel-item active" >
        <img class="d-block w-100" height=" 350px" src="/uploads/crousel2.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height=" 350px" src="/uploads/crousel1.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height="350px" src="/uploads/crousel.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br><br>

<div class="row" id="LatestDay">
</div>  
<br><br>
<div class="row" id="RecentVisit">
</div>

<script>
 
</script>

  @endsection
 


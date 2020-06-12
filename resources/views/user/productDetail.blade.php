@extends('layouts.front') 
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
 

.card .w3-button {
    position: absolute;
    top: 50%;
    left: 14%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background: orange;
    font-size: 16px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
}


.card .w3-button1 {
    position: absolute;
    top: 50%;
    left: 86%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background: orange;
    font-size: 16px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
}
 
</style>
<?php
?>
 
 <br>
        <div class="card"  style="height:320px;">
            <div class="row inner">
                <div class="col-md-6">      
                        <?php
                        $gallery=[];
                        foreach($products as $home)
                        {
                            $gallery = explode(',', $home->gallery);
                        }                 
                        ?>
                <img class="mySlides" src="/uploads/products/{{$home->featured_image}}" style="height:320px; width:100%;">
                        @foreach($gallery as $gals)
                            <img class="mySlides" src="/uploads/products/gallery/{{$gals}}" style="height:320px; width:100%;">
                        @endforeach
                            <div class="w3-center">
                                <div class="w3-section">
                                    <a style="font-size:24px; color:white;" class="w3-button" onclick="plusDivs(-1)">❮</a>
                                    <a style="font-size:24px; color:white;" class="w3-button1" onclick="plusDivs(1)">❯</a>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6"><br>
                        @foreach($products as $product)
                        <h4 style="text-align:center" style="font-size:30px">{{$product->name}} ({{$product->qty}})</h4><hr>
                        
                        <ul>
                            <li>{{$product->brand}}</li><br>
                            <li>{{$product->category}}</li><br>
                            <li>{{$product->description}}</li><br>
                            <li style="font-weight:bold;font-size:20px;">PRICE :: ${{$product->price}}</li> 
                        </ul>
                         @endforeach
                    </div>
                </div>
            </div>
        <a href="/map/{{$product->id}}" class="btn btn-info w-100" type="button">Check Availaibity</a><br><br>
<script>
var slideIndex = 1;
showDivs(slideIndex);
 
function plusDivs(n)
 {
  showDivs(slideIndex += n);
}
 
function currentDiv(n)
 {
  showDivs(slideIndex = n);
}
 
function showDivs(n)
 {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
 
 
 
var slideIndex1 = 1;
showDivss(slideIndex1);
 
function plusDivss(n)
 {
  showDivss(slideIndex1 += n);
}
 
function currentDivs(n)
 {
  showDivss(slideIndex1 = n);
}
 
function showDivss(n)
 {
  var i;
  var x = document.getElementsByClassName("mySlides1");
  var dots = document.getElementsByClassName("demo1");
  if (n > x.length) {slideIndex1 = 1}    
  if (n < 1) {slideIndex1 = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex1-1].style.display = "block";  
}
</script>
 
<script> 
       
        function show(divId) { 
            $("#" + divId).show(); 
        } 
  
        
        function userFloorComponent(type,floor_id,component_no) { 
            var APP_URL = "{{ url('/') }}";
            loadFloorComponent();
            function loadFloorComponent(){
                $.ajax({
                type: 'GET',
                url: APP_URL+'/api/floorComponent/'+type+'/'+floor_id+'/'+component_no,
                  success: function(result){
                    $('#componentImage').html(result);
                  }   
               });
              } 
       } 
    </script> 
 
 
<script type="text/javascript">
        function PrintDiv() {
            var contents = document.getElementById("dvContents").innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><head><title></title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                document.body.removeChild(frame1);
            }, 500);
            return false;
        }
    </script>

<script>
    $('.download').on('click', function(){
       $('<a />').attr({
              download: 'export.html', 
              href: "data:text/html," + $('#dvContents').html() 
       })[0].click()
    });
</script>

<script>
function copy_Share_Button() {

//----< copy_Share_Button() >----

var sURL = window.location.href;

sTemp = "<input id=\"copy_to_Clipboard\" value=\"" + sURL + "\" />"

$("body").append(sTemp);

$("#copy_to_Clipboard").select();

document.execCommand("copy");

$("#copy_to_Clipboard").remove();        

//----</ copy_Share_Button() >----

}

//
</script>
@endsection
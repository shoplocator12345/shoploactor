@extends('layouts.admin')
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
.details {
  text-align: left;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

.tabss {
  margin-left: 20px;
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

    .add-new {
      text-align:right;
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
</style>

<div class="container" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;">
<br>
  <div class="row">
    <div class="col-md-10" style="text-align:center">
      <h4 style="color: black;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;"><strong>Product Detail</strong></h4>
    </div>
    <div class="col-md-2" style="text-align:right;">
      <a type="button" href="/admin/product" style="color: white; background-color:#00BCD4;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;" class="btn">Go Back</a>
    </div>
  </div>
<hr>

  <div id="product" class="w3-container city active"
   style="display:block;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;"><br>
    <div class="card">
      <div class="row card-details" style="font-family: Open Sans, sans-serif;">
       @foreach($products as $product)
        <div class="col-md-6 card-img">
          <div class="card ">
            <img class="card-img-top" style="height: 343px;" src="/uploads/products/{{$product->featured_image}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td style="width: 50%;"><strong>PRODUCT</strong></td>
              <td style="width: 50%;">{{$product->name}}</td>
            </tr>
            <tr>
              <td style="width: 50%;"><strong>BRAND</strong></td>
              <td style="width: 50%;">{{$product->brand}}</td>
            </tr>
            <tr>
                <td style="width: 50%;"><strong>QUANTITY</strong></td>
                <td style="width: 50%;">{{$product->qty}}</td>
            </tr>
            <tr>
                <td style="width: 50%;"><strong>PRICE</strong></td>
                <td style="width: 50%;">{{$product->price}}</td>
              </tr>
            <tr>
              <td style="width: 50%;"><strong>CATEGORY</strong></td>
              <td style="width: 50%;">{{$product->category}}</td>
            </tr>
            <tr style="max-height:70px;overflow-y:scroll">
              <td style="width: 50%;"><strong>Description</strong></td>
              <td style="width: 50%;">{{$product->description}}</td>
            </tr>
          </table>
         <br>         
        </div>
      </div>
        @endforeach
        <div class="row" >
            <div class="col-md-1"></div>
            <div class="col-md-4" style="text-align:center; margin-bottom: 20px;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;">
            <a type="button" onclick="Addtoshop({{$product->id}})" style="width: 100%;color:white;text-align:center;font-weight:bold; background-color:#77C334;" class="btn">Add Product To Shop</a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4"  style="text-align:center; margin-bottom: 20px;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;">
                <a type="button"  onclick="EditProduct()" style="width: 100%;color:white;text-align:center;font-weight:bold; background-color:#60ACEF;" class="btn">Edit</a>
            </div>
        </div>
    </div>
</div>
</div> 



<div class="modal fade" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;" 
id="EditproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="editproduct">
        <div class="form-row"> 
            <div class="form-group col-md-6">
                <label for="inputEmail4">Product Name</label>
                <input type="text" class="form-control" id="name" placeholder="Product name" required>
            </div>
            
              <div class="form-group col-md-6">
                <label for="inputDivision">Brand</label>
                <input type="text" class="form-control" id="brand" placeholder="Brand" required>
              </div>
        </div>   
  
        <div class="form-row">

          <div class="form-group col-md-4">
            <label for="inputArea">Quantity</label>
            <input type="text" class="form-control" id="quantity" placeholder="Quantity" required>
          </div>
        
            <div class="form-group col-md-4">
                <label for="inputCity">Price</label>
                <input type="number" class="form-control"placeholder="Price" id="price" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Category</label>
                <select id="category" class="form-control">
                    <option value="General">General Store</option>
                    <option value="Cosmetic">Cosmetic Store</option>
                    <option value="Stationary">Stationary Store</option>
                    <option value="Garment">Garment Store</option>
                    <option value="sports">Sports Store</option>
                    <option value="Medical">Medical Store</option>
                    <option value="Confectionary">Confectionary Store</option>
                    <option value="Electrical">Electrical Shop</option>
                    <option value="Ice cream">Ice cream Parlour</option>
                    <option value="Plumber">Plumber shop</option>
                </select>
            </div>
            
      </div>

      <div class="form-row">

        <div class="form-group col-md-12">
          <label for="inputArea">Description</label>
          <textarea class="form-control" id="description" placeholder="Add description of the product" required row="2"></textarea>
        </div>
    </div>


      <div class="row">
        <div class="col-md-6">
          <div class="image-upload">
            <label for="inputState">Featured Image</label>
            <p><input type="file"  name="image" id="file"></p>
            <p><img id="output" /></p>
          </div>
        </div>
      
      </div>
    <div class="modal-footer">
    <button type="button" style="color:white;width:100px;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100" data-dismiss="modal">Close</button>
      <button type="submit" style="width: 120px;color:white;text-align:center;font-weight:bold; background-color:#2DCC70;" class="btn w3-100">Save changes</button>
    </div>
    </form>
        </div>
       
      </div>
    </div>
  </div>


  
<div class="modal fade" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;" 
id="Addtoshop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="Addtoshop">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputArea">Select Shop</label>
                    <select class="form-control" id="shoplist">
                    </select>
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputCity">No of Quantity</label>
                    <input type="number" class="form-control"  id="qty" required>
                </div>
            </div>
    <div class="modal-footer">
    <button type="button" style="color:white;width:100px;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100" data-dismiss="modal">Close</button>
      <button type="submit" style="width: 120px;color:white;text-align:center;font-weight:bold; background-color:#2DCC70;" class="btn w3-100">Save changes</button>
    </div>
    </form>
        </div>
       
      </div>
    </div>
  </div>


<script>
// Tabs
$('#deleteFeature').on('show.bs.modal', function (e) {
    var $trigger = $(e.relatedTarget);
    var id=$trigger.data('id');
    $('#ys-btn').click(function()
    {
      $('#deleteFeature').modal('hide');
      $('.modal-backdrop').css('display','none');
        deleteFeature(id);

    });
});

$('#deleteGallery').on('show.bs.modal', function (e) {
    var $trigger = $(e.relatedTarget);
    var id=$trigger.data('id');
    $('#ys-gal-btn').click(function()
    {
      $('#deleteGallery').modal('hide');
      $('.modal-backdrop').css('display','none');
      deleteGallery(id)
    });
});

$('#deleteAvail').on('show.bs.modal', function (e) {
    var $trigger = $(e.relatedTarget);
    var id=$trigger.data('id');
    $('#ys-Avail-btn').click(function()
    {
      $('#deleteAvail').modal('hide');
      $('.modal-backdrop').css('display','none');
        deleteAvail(id);

    });
});
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}


</script>


<script>
  function handleFileSelect(evt) {
      var files = evt.target.files; // FileList object
  
      // Loop through the FileList and render image files as thumbnails.
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
            var span = document.createElement('span');
            span.innerHTML = ['<img class="thumb" width="250px" height="250px" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>&nbsp;&nbsp;&nbsp;&nbsp;'].join('');
            document.getElementById('list').insertBefore(span, null);
          };
        })(f);
  
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
    }
  
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
    
  
  
    var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
    
  };
</script>
@endsection
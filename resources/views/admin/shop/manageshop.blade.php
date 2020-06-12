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
.category {
  font-size: .75rem;
  text-transform: uppercase;
}

.category {
    position: absolute;
    top: 30px;
    left: 0;
    color: white;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
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
      <h4 style="color: black;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;"><strong>Shop Detail</strong></h4>
    </div>
    <div class="col-md-2" style="text-align:right;">
      <a type="button" href="/admin/shop" style="color: white; background-color:#00BCD4;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;" class="btn">Go Back</a>
    </div>
  </div>
<hr>

  <div id="homes" class="w3-container city active" style="display:block;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;"><br><br>
    <div class="card">
      <div class="row card-details" style="font-family: Open Sans, sans-serif;">
       @foreach($shops as $shop)
        <div class="col-md-6 card-img">
          <div class="card ">
            <img class="card-img-top" style="height: 271px;" src="/uploads/shops/{{$shop->image}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td><strong>SHOP NAME</strong></td>
              <td >{{$shop->name}}</td>
            </tr>
            <tr>
              <td><strong>OWNER NAME</strong></td>
              <td>{{$shop->owner_name}}</td>
            </tr>
            <tr>
              <td><strong>OWNER EMAIL</strong></td>
              <td>{{$shop->email}}</td>
            </tr>
            <tr>
              <td><strong>CATEGORY</strong></td>
              <td >{{$shop->category}}</td>
            </tr>
            <tr>
              <td><strong>OPEN AT</strong></td>
              <td >{{$shop->open_at}}</td>
            </tr>
            <tr>
              <td><strong>CLOSE AT</strong></td>
              <td >{{$shop->close_at}}</td>
            </tr>
            <tr>
              <td><strong>ADDRESS</strong></td>
              <td>{{$shop->address}}</td>
            </tr>
          </table>
         <br>         
        </div>
      </div>
        <?php
          $sid=(($shop->id)*382724-227)*9873;
        ?>
        <div class="column" style="text-align:center; margin-bottom: 20px;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;">
          <a type="button" href="/admin/shop/edit/{{$sid}}" style="width: 40%;color:white;text-align:center;font-weight:bold; background-color:#60ACEF;" class="btn">Edit</a>
        </div>
    </div>
    @endforeach
</div>
<hr>
<div style="text-align:center;font-weight:bold;font-size:20px;">Product Available In Shop</div>
<hr>
<div id="product_list" class="row"></div>
</div> 
 
<div class="modal fade" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;" 
id="AddproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="Addtoshop">
        <div class="form-row"> 
            <div class="form-group col-md-12">
                <label for="inputEmail4">Product Name</label>
                <select name="name" id="ProductShopname" class="form-control"></select>
            </div>
        </div>
        <div class="form-row"> 
              <div class="form-group col-md-12">
                <label for="inputDivision">Quantity</label>
                <input type="text" class="form-control" id="qty" placeholder="Brand" required>
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

<div class="modal fade bd-example-modal-xl" id="deleteProductToShop" tabindex="-1" role="dialog" aria-labelledby="addNewCommunityTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Delete Confirm Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-left:10px;">
          <h6 class="delete_heading">Are you sure, you want to delete this poduct From Your Shop?</h6>
          <div class="clearfix"></div>
          <div class="m-auto">
            <button type="button" data-dismiss="modal" style="color:white;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100"> No </button>
            <button type="submit" id="ys-stp-btn" style=" color:white; background-color:#2DCC70;font-weight:bold" class="btn w3-100"> Yes</button>
           </div>  
          </div>    
        </div>
     </div>
   </div>
 </div>

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
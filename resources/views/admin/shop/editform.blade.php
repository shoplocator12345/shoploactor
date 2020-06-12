@extends('layouts.admin')
@section('content')
<style>
.details-containerr {
  margin-left: 25px;
  margin-right: 25px;
}

.hm-contain {
  margin-left: 45%;
}

.input-icons i { 
            position: absolute; 
            text-align:right;
        } 
          
        .input-icons { 
            width: 100%; 
            margin-bottom: 10px; 
        } 
          
        .icon { 
            padding: 10px; 
            min-width: 40px; 
        } 
          
        .input-field { 
            width: 100%; 
            padding: 10px; 
            text-align: center; 
        } 
</style>

<div class="container details-container" >
<br>
  <div class="row" style="font-family: Open Sans, sans-serif;">
  <div class="col-md-4 hm-contain">
  <h4 style="color: black;"><strong>Add Shop Info</strong></h4>
  </div>
  <div class="col-md-2">
  <a type="button" href="/admin/shop" style="color: white; background-color:#00BCD4;font-family: Open Sans, sans-serif;" class="btn">Go Back</a>
  </div>
  </div><hr>
  <br>
  <div class="card">
  <br>
<form class="details-container" style="font-family: Open Sans, sans-serif;" id="Edithome">
  <div class="form-row "> 
    <div class="form-group col-md-4">
      <label for="inputTitle">Shop Name</label>
      <input type="text" class="form-control" id="name" required>
    </div>
    <div class="form-group col-md-4">
        <label for="inputTitle">Owner Name</label>
        <input type="text" class="form-control" id="ownname" required>
    </div>
    <div class="form-group col-md-4">
      <label for="community">Category</label>
      <select id="category" class="form-control">
          <option value="General">General Store</option>
          <option value="Cosmetic">Cosmetic Store</option>
          <option value="Stationary">Stationary Store</option>
          <option value="Garment">Garment Store</option>
          <option value="Sports">Sports Store</option>
          <option value="Medical">Medical Store</option>
          <option value="Confectionary">Confectionary Store</option>
          <option value="Electrical">Electrical Shop</option>
          <option value="Ice cream">Ice cream Parlour</option>
          <option value="Plumber">Plumber shop</option>
      </select>
    </div>
  </div>
  
   

  <div class="form-row">
   
    <div class="form-group col-md-4">
      <label for="inputCity">Open at</label>
      <input type="time" class="form-control" id="open_at" required>
    </div>
    <div class="form-group col-md-4">
        <label for="inputCity">Close at</label>
        <input type="time" class="form-control" id="close_at" required>
    </div> 
    <div class="col-md-4">
        <label for="inputLocation">Add Location</label><br>
        <a type="button" data-toggle="modal" data-target="#myModal" style="color: white;width:100%;font-family: Open Sans, sans-serif;" class="btn btn-dark"><i class='fas fa-map-marker-alt'></i>&nbsp;&nbsp;&nbsp;Add</a>
        <input type="hidden" class="form-control" id="lat" required>
        <input type="hidden" class="form-control" id="lng" required>
      </div>  
  </div>


  <div class="row">
    <div class="col-md-12">
      <label for="inputCity">Address</label>
      <textarea name="" id="address" cols="30" rows="2" class="form-control"></textarea>
    </div>
  </div><br>


  <div class="row">
    
    <div class="col-md-6">
      <div class="image-upload">
        <p>Featured Image</p>
        <p><input type="file"  name="image" id="file"  onchange="loadFile(event)"></p>
            <input type="hidden" id="files" name="files[]" multiple />
            
          <output id="list" width="200px" height="200px"></output>
          <p><img id="output" width="300px" height="200px"/></p>
      </div>
    </div>
  </div>
   <hr>
  
  <div class="row" style="font-family: Open Sans, sans-serif;">
    <div class="col-md-8"></div>
    <div class="col-md-2">
      <button type="submit" style="font-family: Open Sans, sans-serif;color:white;width:100px;text-align:center;font-weight:bold; background-color:#2DCC70;" class="btn w3-100">Save</button>
    </div>
    <div class="col-md-2">
      <button style="color:white;width:100px;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100">Cancel</button>
    </div>
  </div>
</form>
<br>
</div>


<!--Add Location Modal-->

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Select Location</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
        <div id="mapshow" style="width:450px;height:400px"> 
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" style="color:white;width:100px;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100" data-dismiss="modal">Close</button>
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
          span.innerHTML = ['<img class="thumb" width="200px" height="200px" src="', e.target.result,
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
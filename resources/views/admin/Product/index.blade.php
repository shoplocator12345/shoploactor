@extends('layouts.admin')
@section('content')
<style>
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
</style>

<div class="container" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;">
<br>
      <h4 style="text-align: center;font-weight:bold">Products</h4>
<hr>
<div class="row">
  <div class="col-md-8"></div>
    <div class="col-md-4">
    <form class="form-inline my-2 my-lg-0" id="productSearch">
      <input class="form-control mr-sm-2" type="search" id="ProductSearch" placeholder="Search Product" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</div>
<br>
  <div class="row" id="product_list" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;">
  </div>

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
        <form id="addproduct">
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
            <p><input type="file"  name="image" id="file"  onchange="loadFile(event)"></p>
            <p><img id="output" /></p>
          </div>
        </div>
      <div class="col-md-6">
      <div class="image-upload">
      <label for="inputState">Product Gallery</label>
        <input type="file" id="files" name="files[]" multiple />
        <br><br>
      <output id="list" width="200px" height="200px"></output>
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


  <div class="modal fade bd-example-modal-xl" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="addNewCommunityTitle" aria-hidden="true">
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
            <h6 class="delete_heading">Are you sure, you want to delete this poduct ?</h6>
            <div class="clearfix"></div>
            <div class="m-auto">
              <button type="button" data-dismiss="modal" style="color:white;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100"> No </button>
              <button type="submit" id="ys-product-btn" style=" color:white; background-color:#2DCC70;font-weight:bold" class="btn w3-100"> Yes</button>
             </div>  
            </div>    
          </div>
       </div>
     </div>
   </div>

   
  @endsection
 
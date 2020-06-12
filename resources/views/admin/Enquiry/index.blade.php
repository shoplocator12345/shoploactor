@extends('layouts.admin')
@section('content')

<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 1000px;
}

th, td {
  padding: 15px;
}
</style>
<br>

<div class="container enquiry-contain" style="text-aligh:left;font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;">
  <h4><strong> Manage Enquiry</strong></h4>
    <hr><br>

    <div id="enquiry" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;"> 

</div>
</div>
<br>


<div class="modal fade bd-example-modal-xl" style="font-family: 'Quicksand', Georgia, 'Times New Roman', Times, serif;" 
id="deleteEnquiry" tabindex="-1" role="dialog" aria-labelledby="addNewCommunityTitle" aria-hidden="true">
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
          <h6 class="delete_heading">Are you sure, you want to Delete this Enquiry?</h6>
          <div class="clearfix"></div>
          <div class="m-auto">
            <button type="button" data-dismiss="modal" style="color:white;text-align:center;font-weight:bold; background-color:#F6454F;" class="btn w3-100"> No </button>
            <button type="submit" id="ys-enq-btn" style=" color:white; background-color:#2DCC70;font-weight:bold" class="btn w3-100"> Yes</button>
           </div>  
          </div>    
        </div>
     </div>
   </div>
 </div>
@endsection
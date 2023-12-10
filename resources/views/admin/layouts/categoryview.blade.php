@extends('admin.layouts.master')
@section('categoryview')

<!----Edit Modal-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit & Update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('categoryupdate')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" id="cat_id" name="cat_id" />
  <div class="mb-3">
    <label  class="form-label">Category Name</label>
    <input type="text" name="name" class="form-control" id="name" required>
  
  </div>
  </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <!--End Modal --> 



 

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                <a href="{{route('category')}}" class="btn btn-primary ">Add Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Actions</th>
    </tr>
    </thead>    
 

  <tbody>
@foreach( $categories as $cat)
  <tr>
    <td>{{$cat->id}}</td>
    <td>{{$cat->name}}</td>
    <td>
        

        <button type="button"  class="confirm_edit_btn btn btn-primary" value="{{$cat->id}}">Edit</button> 
   <a href="{{route('categorydestroy',$cat->id)}}" class="btn btn-danger">Delete</a>
    </td>
  </tr>
     @endforeach
     
            
      
                  </tfoot>
                
                </table>

              </div>
              <!-- /.card-body -->
            </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (\Session::has('message'))
 <script>
  swal({
  title: "Done!",
  text: "Category Succesfully Created!",
  icon: "success",
  button: "ok",
});
 </script>
@endif
@if (\Session::has('delete'))
 <script>
  swal({
  title: "Done!",
  text: "Category Deleted with all products",
  icon: "success",
  button: "ok",
});
 </script>
@endif



@endsection
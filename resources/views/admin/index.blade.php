@extends('admin.layouts.master')
@section('content')
<!----Edit Modal-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit & Update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" id="task_id" name="task_id" />
  <div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" required>
  
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text"  name="description" class="form-control" id="description" required>

  </div>

  <div class="form-group">
                  <label for="category">category</label>
                  <select name="category_id" class="form-control" id="category_id">
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
                  </select>
                    </div>
                  
  <div class="mb-3">
    <label  class="form-label">date</label>
    <input type="date" name="date" class="form-control" id="date"  required>

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
  <!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('destroy')}}" method="POST">
       @csrf
       @method('DELETE')

       <input type="hidden" id="delete_id" value="" name="delete_stud_id"/>
    
        Are you sure want to Delete ?
      </div>
      <div class="modal-footer">
      
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
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
                <a href="{{route('create')}}" class="btn btn-primary ">Add Task</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
    </thead>    
 

  <tbody>
    @foreach($tasks as $task)
    <tr>
     
      <td>{{$task->id}}</td>
      <td>{{$task->title}}</td>
      <td>{{$task->description}}</td>
      <td>{{$task->category->name}}</td>
      <td>{{$task->date}}</td>
      <td>
            
                <button type="submit"  class="confirm_edit_btn btn btn-outline-primary" value="{{$task->id}}">Edit</button> 
 

               <button type="button"  class="confirm_del_btn btn btn-outline-danger" value="{{$task->id}}">Delete</button> 
                  </tr>
                  @endforeach
                  </tfoot>
                
                </table>

              </div>
              <!-- /.card-body -->
            </div>

@endsection
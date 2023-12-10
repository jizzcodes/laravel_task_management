 @extends('admin.layouts.master')
 @section('create')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Your Task</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('taskadd')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="text">Title</label>
                    <input type="text" name="title" class="form-control" id="" placeholder="Enter Title" required>
                  </div>
                  <div class="form-group">
                    <label for="text">Description</label>
                    <input type="text" name="description" class="form-control" id="" placeholder="Description" required>
                  </div>
              
                  <div class="form-group">
                  <label for="category">category</label>
                  <select name="category_id" class="form-control" id="" required>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
                  </select>
                    </div>
                  
                  
                    <div class="form-group">
                    <label for="date">Due Date</label>
                    <input type="date" name="date" class="form-control"  placeholder="Due Date" required>
                  </div>
         
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-end">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            @endsection
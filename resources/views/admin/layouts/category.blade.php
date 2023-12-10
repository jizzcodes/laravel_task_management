@extends('admin.layouts.master')
@section('category')
 <!-- TO DO List -->
 <div class="card">
              <div class="card-header">
                <h3 class="card-title my-3">
                
                  Add Category
                </h3>

                
              <!-- /.card-body -->
              <form action="{{route('store')}}" method="post">
                @csrf
              <div class="card-footer clearfix">
                <input type="text" name="name" placeholder="Enter Category Name" class="form-control" required>
                <button type="submit" class="btn btn-primary float-right my-3"><i class="fas fa-plus"></i> Add Category</button>
              </div>
            </div>

              </form>
          
            <!-- /.card -->
          </section>
@endsection
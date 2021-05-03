@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 20px;">
  {{-- <b>total users: {{count($userData)}}</b> --}}
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">
          <form action="{{route('updateCategory',['id'=>$edit->id])}}" method="post">
            @csrf
            <div class="form-group">
              <label for="categoryName">Category Name</label>
              <input type="text" name="categoryName" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" value="{{$edit->category_name}}">
              @error('categoryName')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
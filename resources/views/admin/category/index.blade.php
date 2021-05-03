@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 20px;">
  {{-- <b>total users: {{count($userData)}}</b> --}}
  <div class="row">
    <div class="col-md-8">
      {{-- to show success message --}}
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="card">
        <div class="card-header">Category</div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">S.N</th>
              <th scope="col">Category Name</th>
              <th scope="col">User</th>
              <th scope="col">Created At</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
              <td>{{$category->category_name}}</td>
              <td>{{$category->user->name}}</td>  {{-- user is method created in category model and name of user table is accessing And only name is needed with query builder method --}}
              <td>
                @if($category->created_at== NULL)
                <span class="text-danger">No date set</span>
                @else
                {{$category->created_at->diffForHumans()}}  {{-- carbon is used when using query builder is used--}}
                @endif
              </td>
              <td>
                <a href="{{route('categoryEdit',['id'=>$category->id])}}" class="btn btn-info">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$categories->links('pagination::bootstrap-4')}}
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Add Category</div>
        <div class="card-body">
          <form action="{{route('storeCategory')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="categoryName">Category Name</label>
              <input type="text" name="categoryName" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
              @error('categoryName')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
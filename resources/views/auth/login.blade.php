@extends('layouts.layout')
@section('content')
<form action="{{route('login')}}" method="post">
    
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
@endsection
@extends('layouts.layout')

@section('content')
    <div class="container">
      <b>total users: {{count($userData)}}</b>
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                  ?>
                    @foreach ($userData as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
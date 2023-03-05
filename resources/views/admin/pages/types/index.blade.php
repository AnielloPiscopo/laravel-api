{{-- 
|--------------------------------------------------------------------------
| Type index in Admin
|--------------------------------------------------------------------------
|
| This is the index 'Type' section of the website
| available to the Admin.
|
--}}

@extends('layouts.app')

@section('title' , config('app.name', 'Laravel') . '- Types')

@section('content')
@php
$columns=[
    'id','name','color','bg_color','num_of_projects'
];    
@endphp

<section class="card container">
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col-6">
        <h2 class="my_title fw-bold">List of Types</h2>
      </div>
    </div>
  </div>

  <div class="card-body">
    @if (session('message'))
    <div>{{session('message')}}</div>
    @endif
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          @foreach ($columns as $col)
          <th scope="col">{{$col}}</th>
          @endforeach
          <th scope="col">#Actions</th>
        </tr>
      </thead>
  
      <tbody>
        @foreach ($types as $type)
          <tr>
              <th scope="row">{{$type->id}}</th>
              <td>{{$type->name}}</td>
              <td style="color:{{$type->color}}">{{$type->color}}</td>
              <td style="background-color:{{$type->bg_color}}">{{$type->bg_color}}</td>
              <td>{{count($type->projects)}}</td>
              <td>
                <a href="{{route('admin.pages.types.show' , $type->slug)}}" class="my_btn btn btn-primary">Show</a>
                <a href="{{route('admin.pages.types.edit' , $type->slug)}}" class="my_btn btn btn-dark">Edit</a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
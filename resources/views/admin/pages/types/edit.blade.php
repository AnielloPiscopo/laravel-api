{{-- 
|--------------------------------------------------------------------------
| type edit in Admin
|--------------------------------------------------------------------------
|
| This is the edit 'type' section of the website
| available to the Admin.
|
--}}

@extends('layouts.app')

@section('title' , config('app.name', 'Laravel') . '- Types')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
      <h3>Check Errors</h3>
    </div>
@endif

<form action="{{route('admin.pages.types.update' , $type->slug)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="card">
    <div class="card-header">
      <h2 class="text-center m-0 p-3 fw-bold">{{"Edit the type '$type->title'"}}</h2>
    </div>

    <div class="card-body">
      <div class="form-outline mb-3">
        <label for="color" class="form-label">Color</label>
        <input type="color" class="my_form-el form-control" id="color" name="color" value="{{ old('color', $type->color) }}">
      </div>

      <div class="form-outline mb-3">
        <label for="bg_color" class="form-label">Bg-color</label>
        <input type="color" class="my_form-el form-control" id="bg_color" name="bg_color" value="{{ old('bg_color', $type->bg_color) }}">
      </div>
      <button type="submit" class="my_btn btn btn-primary my_btn">Submit</button>
  </div>
</form>
@endsection
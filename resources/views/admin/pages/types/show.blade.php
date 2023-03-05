{{-- 
|--------------------------------------------------------------------------
| type show in Admin
|--------------------------------------------------------------------------
|
| This is the show 'type' section of the website
| available to the Admin.
|
--}}

@extends('layouts.app')

@section('title' , config('app.name', 'Laravel') . '- Types')

@section('content')
@php
    $listElements = [
        'name',
    ]
@endphp

<article class="my_card">
    <ul>
        @foreach ($listElements as $listEl)
            <li>{{$listEl . ':' . $type->$listEl}}</li> 
        @endforeach
    </ul>

    <div class="my_btn-container d-flex justify-content-center">
        <a href="{{route('admin.pages.types.edit' , $type->slug)}}" class="my_btn btn btn-dark">Edit</a>
    </div>
</article>
@endsection
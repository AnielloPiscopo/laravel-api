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

<section>
    @foreach ($type->projects as $project)
    <article class="card text-center">
        <div class="card-header">
                <span class="badge" style="color:{{$type->color}};background-color:{{$type->bg_color}}">{{$type->name}}</span>
                @foreach ($project->technologies as $technology)
                    <span class="badge" style="color:{{$technology->color}};background-color:{{$technology->bg_color}}">{{$technology->name}}</span>
                @endforeach
            </div>
        </div>
        <div class="card-image my-4">
            @if ( $project->isImageAUrl())
            <img src="{{ $project->img_path }}"
            @else
            <img src="{{ asset("storage/$project->img_path") }}"
            @endif
            alt="{{ $project->title }} image" class="img-fluid">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">
                {{$project->description}}
            </p>
        </div>
    </article>
    @endforeach
</section>
@endsection
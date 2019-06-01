@extends('layouts.base')

@section('content')
            <h1>&lt;?{{ $project->title }}</h1>

            <div class="canvas" id="project">
  
                <div class="project-image">
                    <img src="{{ asset('img/projects/' . $project->imgurl) }}" alt="{{ $project->title }}"/>
                </div>

                <h3 class="project-title">
                    {{ $project->title }}
                </h3>

                <div class="project-description">
                    {!! $project->desc !!}
                </div>

                <div class="project-link">
                    <a href="{{ $project->projecturl }}" target="_blank">Link to project</a>
                </div>
  
                <div class="crumb">
                    <a href="{{ route('front') }}">back to home</a>
                </div>
          </div>
@endsection
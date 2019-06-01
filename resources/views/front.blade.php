@extends('layouts.base')

@section('content')
            <h1>&lt;?PHP Projects</h1>

            <div class="canvas">

    @if(isset($projects) && count($projects) > 0)
  
        @foreach($projects as $project)
    
                <div class="project">
                    <a href="{{ route('project', ['id' => $project->id]) }}">
      
                        <div class="project-image" style="background-image: url({{ asset('img/projects/' . $project->imgurl) }});">
                        </div>

                        <div class="project-title">
                                {{ $project->title }}
                        </div>

                    </a>
                </div>
  
        @endforeach
  
    @else

                <p>No projects found.</p>
  
    @endif

            </div>
@endsection
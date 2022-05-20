{{-- Start header --}}
<x-layouts.header>
  @section('hero-style')
    style="display: none;"
  @endsection
</x-layouts.header>
{{-- end header --}}

{{-- Start body --}}
<x-layouts.blank-body>
  @section('content')
  <div class="container">
    <div class="row card vh-50">
      {{-- Breadcrumbs --}}
      <div class="row mt-3">
        <div class="col-md">
          [ 
            <a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none">Dashboard</a> >
            <a href="{{ route('projects.list') }}" class="text-secondary text-decoration-none">Projects</a> >
            <a href="{{ route('heavy-duty-projects.create') }}" class="text-secondary text-decoration-none">Create</a>
          
          ]
        </div>
      </div>
      {{-- End breadcrumbs --}}
      
      {{-- Success Message --}}
      @if (Session::has('message'))
      <div class="row">
        <div class="alert alert-success col-md-6 mx-auto">
            <h2>{{Session::get('message')}}</h2>
        </div>
      </div>
      {{-- OTHERWISE.... --}}
      @else
      <div class="row">
        <div class="col-md">
          <h3 class="mt-5 p-1 text-uppercase mb-3">Editing &rarr; {{$project->title}}</h3>
          <p class="lead p-4 alert alert-warning shadow-1 text-center w-50 mx-auto">You are now editing a live project.</p>
          <p class="lead p-1 mt-1">
            @if ($project->images->isEmpty())
              <span class="alert alert-warning p-3 text-center mx-auto w-50 shadow-1 d-block">This project has no images</span>
            @endif
          </p>
        </div>
      </div>
      @endif
      {{-- END SUCCESS MESSAGE --}}
      <div class="row mb-4">
        @if ($errors->isNotEmpty())
          <div class="col-md-4">
            <div class="alert alert-warning mt-3">
              <h4>We've encountered errors</h4>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        @elseif ($project->images->isNotEmpty())
        <div class="col-md-4">
          <div class="card shadow-1 p-3">
            <div class="row">
              @foreach ($project->images as $image)
                <div class="col-md position-relative text-center project__img">
                  {{-- Centered delete button for image --}}
                  <div class="delImg abs-center">
                    {{-- form for each individual image as per delete --}}
                    {!! Form::open([
                      'route' => ['projectImg.destroy', 'id' => $image->id],
                      'method' => "delete"
                      ]) !!}
                      <button class="btn btn-danger">&cross;</button>
                    {!! Form::close() !!}
                  </div>
                  {{-- image --}}
                  <img src="{{ asset($image->img_path) }}" class="project--img d-inline-block mb-3">
                </div>
              @endforeach
            </div>
            {{-- <div class="row p-2 mt-4">         
              {!! Form::open([
                'route' => ['projectImg.destroy', 'id' => $ids],
                'method' => "delete"
                ]) !!}
                
              <button class="btn btn-danger">
                <i class="fas fa-trash me-2"></i> DELETE ALL
              </button>
              {!! Form::close() !!}
            </div> 
            
            Until Another day..... We will problem solve this
            --}}
          </div>
        </div>
        @endif
        <div class="col-md shadow-1 p-3">
          {!! Form::model($project, ['route' => ['heavy-duty-projects.update', 'heavy_duty_project' => $project->id], 'method' => 'PATCH', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
          <div class="mb-3">
            {!! Form::label('projectName', 'Project Name', ['class' => 'form-label']) !!}
            {!! Form::text('title', $project->title, ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
            {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
            {!! Form::textarea('body', $project->body, ['class' => 'form-control']) !!}
          </div>
          <div class="input-group mb-3">
            {!! Form::label('projectImg', 'Image Upload', ['class' => 'input-group-text']) !!}
            {!! Form::file('projectImg[]', ['class' => 'form-control', 'multiple']) !!}
            {!! Form::hidden('project_id', $project->id) !!}
          </div>
          <div class="mb-3">
            {!! Form::submit('Submit', ['class' => 'btn btn-info w-100']) !!}
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  @endsection
</x-layouts.blank-body>
{{-- End body --}}

{{-- Start footer --}}
<x-layouts.footer>

</x-layouts.footer>
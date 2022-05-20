<x-layouts.header>
  @section('hero-style')
    style="display: none;"
  @endsection
</x-layouts.header>
<x-layouts.blank-body>
  @section('content')
  <div class="container">
    <div class="row vh-50 card p-2">
       {{-- Breadcrumbs --}}
       <div class="row mt-3">
        <div class="col-md">
          [ 
            <a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none">Dashboard</a> >
            <a href="{{ route('projects.list') }}" class="text-secondary text-decoration-none">Projects</a>          
          ]
        </div>
      </div>
      {{-- Session Message... We should create a component for this... oh well --}}
      @if(Session::has('message'))
      <div class="row">
        <div class="col-md-6 alert alert-success mx-auto">
          <h4>{!! Session::get('message') !!}</h4>
        </div>
      </div>
      @endif
      <h4 class='mt-4 text-uppercase fw-bold'>Current Projects.</h4>
      <hr class='hr-line'>
      <div class="col-md d-block mt-4">
        <div class="row border-bottom border-secondary mb-4 border-0 border-3 pb-2">
          <div class="text-uppercase fw-bold col-md-2">Title</div>
          <div class="text-uppercase fw-bold col-md-4">Description</div>
          <div class="text-uppercase fw-bold col-md">Images</div>
          <div class="text-uppercase fw-bold col-md-2 text-end">Functions</div>
        </div>
        @if($projects->isNotEmpty())
          @foreach ($projects as $project)
          <div class="row pb-3 mb-4 border-secondary border-start border-0 border-3">
            <div class="col-md-2 d-inline-block text-truncate">{{$project->title}}</div>
            <div class="col-md-4 d-inline-block text-truncate">{{$project->body}}</div>
            <div class="col-md">
              <div class="row">
                @if ($project->images->isNotEmpty())
                  @foreach ($project->images as $image)
                    <div class="col-md">
                      <img src="{{ asset($image->img_path) }}" class="project--img mb-2">
                    </div>
                  @endforeach
                @else
                    <h5 class="fw-bold text-center">Project has no images</h5>
                @endif
                
              </div>
            </div>
            <div class="col-md-2 text-end">
              {!! Form::open([
                  'route' => ['heavy-duty-projects.edit', 'heavy_duty_project' => $project->id],
                  'method' => 'GET',
                  'class' => 'd-inline-block'
                 ]) !!}
              <button class='btn btn-warning text-uppercase btn-sm shadow-1 text-white'><i class="fas fa-sticky-note me-2"></i>Edit</button>
              {!! Form::close() !!}
              {!! Form::open([
                'route' => ['heavy-duty-projects.destroy','heavy_duty_project' => $project->id],
                'method' => 'delete',
                'class' => 'd-inline-block'
                ]) !!}
              <button class='btn btn-danger text-uppercase btn-sm  shadow-1'><i class="fas fa-trash me-2"></i> DELETE</button>
              {!! Form::close() !!}
            </div>
          </div>
          @endforeach
        @else
          <div class="row pb-3 mb-3">
            <div class="col-md">
              <h3 class="text-center">You currently have 0 Projects</h3>
              <p class="text-center"><a href="{{ route('heavy-duty-projects.create') }}" class="btn btn-info">ADD ONE?</a></p>
            </div>
          </div>
        @endif
      </div>
    </div>  {{-- END ROW .CARD  --}}
  </div>
  @endsection
</x-layouts.blank-body>
<x-layouts.footer>

</x-layouts.footer>
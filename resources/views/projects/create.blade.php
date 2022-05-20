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
      <div class="row">
        <div class="col-md">
          <h3 class="mt-5 p-1 text-uppercase">Create new project</h3>
          <p class="lead p-1">Here you are able to create a new project listing to be displayed under the "Heavy Duty Projects" page.</p>
          <p class="lead p-1 mt-1">Images are <strong class="fs-5 fw-bold">NOT</strong> required to create the new project, but it is highly recommended to add some.</p>
        </div>
      </div>
      <div class="row">
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
        @endif
        <div class="col-md">
          {!! Form::open(['route' => 'heavy-duty-projects.store', 'method' => 'post', 'files' => true, ]) !!}
          <div class="mb-3">
            {!! Form::label('title', 'Project Name', ['class' => 'form-label']) !!}
            {!! Form::text('title', '', ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
            {!! Form::label('body', 'Description', ['class' => 'form-label']) !!}
            {!! Form::textarea('body', '', ['class' => 'form-control']) !!}
          </div>
          <div class="input-group mb-3">
            {!! Form::label('projectImg', 'Image Upload', ['class' => 'input-group-text']) !!}
            {!! Form::file('projectImg[]', ['class' => 'form-control', 'multiple']) !!}
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
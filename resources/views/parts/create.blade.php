<x-layouts.header>
  @section('hero-style')
    style="height: 20vh;"
  @endsection
  @section('hero-content')
    <h2>Creating new inventory listing</h2>
  @endsection
</x-layouts.header>
<x-layouts.blank-body>
  @section('content')
  <main>
    <section>
      <div class="container">
        <div class="row mt-3">
          <div class="col-md">
            [ 
              <a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none">Dashboard</a> >
              <a href="{{ route('parts.list') }}" class="text-secondary text-decoration-none">Parts</a> > 
              <a href="{{ route('parts.create') }}" class="text-secondary text-decoration-none">Create</a> > 
            ]
          </div>
        </div>
        <div class="row mt-3 card py-3">
          <div class="col-md">
            @if (count($errors) > 0)
            <div class="alert alert-danger col-md-7 mt-3 mx-auto">
              <h3 class='text-center'>Errors Detected</h3>
              <div class="row d-flex">
                <div class="col-md-1">
                  <i class="fas fa-exclamation fa-2x"></i>
                </div>
                <div class="col-md">
                  <ul class="list-group">
                    @foreach ($errors->all() as $error )
                    <li class="list-group-item">{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
              </div>      
            </div>
            @endif
            @if(Session::has('message'))
            <div class="alert alert-info col-md-7 mt-3 mx-auto">
              <h3 class='text-center'>System Message</h3>
              <div class="row d-flex">
                <div class="col-md-1">
                  <i class="fas fa-exclamation fa-2x"></i>
                </div>
                <div class="col-md">
                  {{Session::get('message')}}
                </div>
              </div>      
            </div>
            @endif
            {!! Form::open(['route' => 'parts.store', 'method' => 'post', 'file' => true, 'enctype' => 'multipart/form-data']) !!}

            {!! Form::label('part_number', 'Part #') !!}
            {!! Form::text('part_number', null, ['placeholder' => 'part #', 'class' => 'form-control']) !!}<br>
            
            {!! Form::label('manufacture', 'Manufacture') !!}
            {!! Form::text('manufacture', null, ['placeholder' => 'Manufacture', 'class' => 'form-control']) !!}<br>

            {!! Form::label('quantity', 'Quantity') !!}
            {!! Form::number('quantity', null, ['placeholder' => 'quantity', 'class' => 'form-control']) !!}<br>
            
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}<br>
            
            {!! Form::file('img', ['class' => 'form-control']) !!}<br>
            
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
  </main>  
  @endsection
</x-layouts.blank-body>
<x-layouts.footer/>
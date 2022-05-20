<x-layouts.header>
  @section('hero-style')
    style="height: 20vh;"
  @endsection
  @section('hero-content')
    <h2>Modifying Part {{$data->part_number}}</h2>
  @endsection
</x-layouts.header>
<x-layouts.blank-body>
  @section('content')

  <main>
    <section>
      <div class="container">
        [ 
            <a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none">Dashboard</a> >
            <a href="{{ route('parts.list') }}" class="text-secondary text-decoration-none">Part</a> >
            <a href="{{ route('parts.edit', ['part' => $data->id]) }}" class="text-secondary text-decoration-none">Edit</a> >
            [{{ $data->manufacture }} > {{$data->part_number}}]
          
          ]
        <div class="row my-5 card py-3">
         
          <div class="col-auto">
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
              <div class="alert alert-success col-md-7 mt-3 mx-auto">
              <h3 class="h3 text-center">Success</h3>
                {{ Session::get('message') }}
              </div>
            @endif
            
            <div class="row">
              <div class="col-md-2 ms-auto">
                {!! Form::open(["route" => ["parts.destroy", $data->id], "method" => "delete"]) !!}
                {!! Form::submit("DELETE LISTING", ["class" => "btn btn-danger del-listing"]) !!}
                {!! Form::close() !!}
              </div>
            </div>
            <div class="row">
              @if ($data->img_path)
              <div class="col-md-3 text-center">
                <div class="position-relative">
                  <a href='{{ route('parts.imgdel', $data->id) }}' class="btn btn-danger fw-bold fs-xl part__thumbnail--delete">&cross;</a>
                  <img src="{{ asset($data->img_path) }}" class="img-fluid img-thumbnail bg-secondary part__thumbnail--large">
                </div>
              </div>
              @endif
              <div id="part" class="col-md">
                {!! Form::model($data, ['route' => ['parts.update', $data->id], 'method' => 'PATCH', 'file' => true, 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden('id') !!}

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
        </div>
      </div>
    </section>
  </main>  
  @endsection
</x-layouts.blank-body>
<x-layouts.footer/>
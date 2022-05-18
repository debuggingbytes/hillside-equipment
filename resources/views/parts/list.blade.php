<x-layouts.header>
  @section('hero-style')
  style='display: none;'
  @endsection
</x-layouts.header>
<x-layouts.blank-body>

@section('content')
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-md">
        [ 
          <a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none">Dashboard</a> >
          <a href="{{ route('parts.list') }}" class="text-secondary text-decoration-none">Parts</a>
          {{-- <a href="{{ route('parts.create') }}" class="text-secondary text-decoration-none">Create</a> >  --}}
        ]
      </div>
    </div>
    <div class="row py-5 card vh-50">
      <div class="col-md mx-auto">
        <div class="row p-1 mx-1 border-secondary border-2 border-bottom">
          <div class="col-md-1">
            <span class="fw-bold">ID</span>
          </div>
          <div class="col-md-2">
            <span class="fw-bold">Part #</span>
          </div>
          <div class="col-md-2">
            <span class="fw-bold">Manufacture</span>
          </div>
          <div class="col-md">
            <span class="fw-bold">Description</span>
          </div>
        </div>
        @foreach ($inventory as $item)    
            <x-part-list :item="$item" />
        @endforeach
      </div>
    </div>
  </div>
      
      

@endsection

</x-layouts.blank-body>
<x-layouts.footer/>
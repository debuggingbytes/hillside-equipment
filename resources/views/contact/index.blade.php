<x-layouts.header>
  @section('hero-style')
    style="display: none;"
  @endsection
</x-layouts.header>
<x-layouts.blank-body>

  @section('content')
    <div class="container-fluid vh-50 card">
      <div class="row mt-3">
        <div class="col-md">
          [ 
            <a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none">Dashboard</a> >
            <a href="{{ route('contact.index') }}" class="text-secondary text-decoration-none">Contact Requests</a> 
          
          ]
        </div>
      </div>
      @if (Session::has('message'))
        <div class="row mt-3 p-2">
          <div class="col-md-3 mx-auto alert alert-success">
            {{Session::get('message')}}
          </div>
        </div>
      @endif
      <div class="row mt-3 p-2">
        @foreach ($contacts as $contact)
          <x-contact-card  :contact="$contact" />
        @endforeach  
      </div>
    </div>
  @endsection

</x-layouts.blank-body>
<x-layouts.footer>

</x-layouts.footer>
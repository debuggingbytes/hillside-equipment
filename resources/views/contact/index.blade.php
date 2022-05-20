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
        @if ($contacts->isNotEmpty())
          @foreach ($contacts as $contact)
            <x-contact-card  :contact="$contact" />
          @endforeach
        @else
          <div class="col-md-6 mx-auto alert alert-danger">
            <h3 class='text-center'><i class="fas fa-exclamation me-5 fs-1"></i>There are currently no contact requests in the database.</h3>
          </div>
        @endif
          
      </div>
    </div>
  @endsection

</x-layouts.blank-body>
<x-layouts.footer>

</x-layouts.footer>
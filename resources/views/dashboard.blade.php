<x-layouts.header>
  @section('hero-style')
    style='display: none;'
  @endsection
  @section('hero-content')
 
@endsection
</x-layouts.header>
<x-layouts.blank-body>

  @section('content')
    <main class='container card'>
      <div class="row py-3 px-2">
        <div class="col-md">
          <div class="d-block">
            <h2 class="mb-2">Dashboard Settings</h2>
            <p class="lead">Welcome {{ Auth::user()->name }}, Here is your current dashboard statistics</p>
            <p><a href='{{ route('change.password') }}'>Change Password?</a></p>
          </div>          
        </div>
      </div>  
      <div class="row py-3 px-2">
        <div class="col-md card h-100 p-2 bg-light mx-md-3 my-md-0 my-2 mx-sm-0 shadow-1 border-start border-success border-3 border-top-0 border-end-0 border-bottom-0">
          <a href='{{ route('contact.index') }}' class="link-dark text-decoration-none">
          <div class="d-block">
            <div class="p-2">
              <h5 class="fw-bold">Contact Requests</h5>
            </div>
            <div class="p-2">
              There is currently {{$contact}} requests in the database
            </div>
          </div>
          </a>
        </div>
        {{-- Second --}}
        <div class="col-md card h-100 p-2 bg-light mx-md-3 my-md-0 my-2  mx-sm-0 shadow-1 border-start border-success border-3 border-top-0 border-end-0 border-bottom-0">
          <div class="d-block">
            <div class="p-2">
              <h5 class="fw-bold">Inventory</h5>
            </div>
            <div class="p-2">
              There is currently {{$parts->count()}} parts within the database.
            </div>
          </div>
        </div>
        {{-- Third --}}
        <div class="col-md card h-100 p-2 bg-light mx-md-3 my-md-0 my-2 mx-sm-0 shadow-1 border-start border-success border-3 border-top-0 border-end-0 border-bottom-0">
          <div class="d-block">
            <div class="p-2">
              <h5 class="fw-bold">Placeholder</h5>
            </div>
            <div class="p-2">Doug is clearly the best heavy duty mechanic ever. </div>
          </div>
        </div>
      </div>
      <div class="row px-2 py-3">
        {{-- First Card --}}
        <div class="col-md">
          <div class="card bg-secondary bg-gradient h-100">
            <div class="bg-dark bg-gradient p-2">
              <h3 class='h3 text-green fw-bold text-center'>Parts Inventory</h3>
            </div>
            <div class="p-2">
              <a href="{{ route('parts.create') }}" class="btn btn-info d-block m-1 my-2 text-uppercase">Add New Item</a>
              <a href="{{ route('parts.list') }}" class="btn btn-info d-block m-1 my-2 text-uppercase">View Inventory</a>
            </div>
            <div class="p-2 mt-5">
              <label for="search" class="form-label text-white text-uppercase">Search Part</label>
              <input type="text" name="" id="search" class="form-control">
            </div>
          </div>
        </div>
        {{-- Second Card --}}
        <div class="col-md">
          <div class="card bg-secondary bg-gradient h-100">
            <div class="bg-dark bg-gradient p-2">
              <h3 class='h3 text-green fw-bold text-center'>Gallery</h3>
            </div>
            <p class="lead p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quos dignissimos tempore perferendis officiis quibusdam. Deleniti, odio. Ab laudantium sed dolores sint nobis sit. Suscipit, repellendus ex! Quas sequi in voluptas eaque, est ex quaerat debitis qui modi eum exercitationem consequatur officiis maxime minima soluta accusamus facere repellat harum nam.</p>
          </div>
        </div>
        {{-- First Card --}}
        <div class="col-md">
          <div class="card bg-secondary bg-gradient h-100">
            <div class="bg-dark bg-gradient p-2">
              <h3 class='h3 text-green fw-bold text-center'>Projects</h3>
            </div>
            <p class="lead p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quos dignissimos tempore perferendis officiis quibusdam. Deleniti, odio. Ab laudantium sed dolores sint nobis sit. Suscipit, repellendus ex! Quas sequi in voluptas eaque, est ex quaerat debitis qui modi eum exercitationem consequatur officiis maxime minima soluta accusamus facere repellat harum nam.</p>
          </div>
        </div>
      </div>
      {{-- New row for dynamic parts --}}
      <div class="row mt-5 p-3">
        <div id="parts">

        </div>
      </div>
    </main>
  @endsection

</x-layouts.blank-body>
<x-layouts.footer>
@section('scripts')
<script type="text/javascript">
  $('#search').on('keyup',function(){
    $value = $(this).val();
    if($value == ""){
      $('#parts').html("");
    }else{
      $.ajax({
      type : 'get',
      url : '{{URL::to('search')}}',
      data:{'search':$value},
        success:function(data){
          $('#parts').html(data);
          // console.log(data);
        }
      });
    }
    
  })

  </script>
  <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>
@endsection
</x-layouts.footer>
<x-layouts.header >
  @section('head')
  <meta name="_token" content="{{ csrf_token() }}">
  @endsection
  @section('hero-style')
    style='max-height: 45vh;'
  @endsection


  @section('hero-content')
  <h1>
    <span class="heading__large h1">
      Crane Parts
    </span>
    <span class="heading__small h4">
      We stock a variety of parts for your equipments needs.
    </span>
  </h1>
@endsection

</x-layouts.header>
<x-layouts.blank-body>

@section('content')
<main>
  <!-- Green spacer -->
  <section class="bg-gray">
    <div class="container-fluid">
      &nbsp;
    </div>
  </section>
  <!-- end green spacer -->
  <section class="vh-50">
    <div class="container">
      <div class="row">
        <div class="card rounded rounded-3 shadow pb-5 vh-90">
          <!-- Parts Search -->
          <div class="row p-3 mb-5">
            <div class="col-md-8 mx-auto">
              <h3 class="spaced mt-3">Parts Search</h3>
              <hr style="width: 20%; background-color: rgb(22, 230, 22); height: 3px;" class="mb-3">
              <p class="lead">
                Our inventory is always up to date, you can view the list below or filter by part # or manufacture.
              </p>
              <p class="lead">
                Can't find what you are looking for? inquire at <a
                  href="mailto: parts@hillsideequipment.com?subject=Parts%20Inquiry">parts@hillsideequipment.com</a>
              </p>
              <form>
                <div class="row">
                  <div class="col-md">
                    
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by part #, brand, description">
                  </div>                 
                </div>
              </form>
            </div>
          </div> <!-- Parts & Form Row-->
          <div class="row">
            @if(Auth::user())
              <h3 class='text-center lead h3 pt-3'>Welcome back, {{ Auth::user()->name }}</h3>
              <p class="lead text-center pb-3">From here you can find a quick edit button for your parts</p>
              @if ($parts->isEmpty())
              <p class="lead text-center">Looks like you have no parts .... <a href='{{ route('parts.create') }}' class='btn btn-info'>Add Some?</a></p>
              @endif
            @endif
          </div>
          <!-- Parts Item(s) -->
          <div id="parts">
            @if (!$parts->isEmpty())
            @foreach ($parts as $part)
            <x-part :part="$part"/>
            @endforeach
            @else
            <div class="row mx-auto">
              <div class="col-md">
                <h3 class="spaced text-center">No current inventory</h3>
                <hr style="width: 80%; background-color: rgb(22, 230, 22); height: 3px; margin: 0 auto;" class="mb-3">
              </div>
            </div>
            @endif
          </div>
        </div>
        <!-- End Part(s) -->
      </div>
    </div>
  </section>
</main>
@endsection

</x-layouts.blank-body>
<x-layouts.footer>
@section('scripts')
<script type="text/javascript">
  $('#search').on('keyup',function(){
    $value = $(this).val();
    
    $.ajax({
      type : 'get',
      url : '{{URL::to('search')}}',
      data:{'search':$value},
        success:function(data){
          $('#parts').html(data);
          // console.log(data);
        }
      });
  })

  </script>
  <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>
@endsection
</x-layouts.footer>
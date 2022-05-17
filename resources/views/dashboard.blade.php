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
            <p class="lead">Change Password</p>
          </div>          
        </div>
        <div class="row px-2 py-3">
          {{-- First Card --}}
          <div class="col-md">
            <div class="card bg-secondary bg-gradient h-100">
              <div class="bg-dark bg-gradient p-2">
                <h3 class='h3 text-green fw-bold text-center'>Parts Inventory</h3>
              </div>
              <p class="lead p-2 text-white">Currently, there is # parts as inventory</p>
              <div class="p-2">
                <a href="#" class="btn btn-info d-block m-1 text-uppercase">Add New Item</a>
                <a href="#" class="btn btn-info d-block m-1 text-uppercase">View Inventory</a>
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
                <h3 class='h3 text-green fw-bold text-center'>Gallery</h3>
              </div>
              <p class="lead p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quos dignissimos tempore perferendis officiis quibusdam. Deleniti, odio. Ab laudantium sed dolores sint nobis sit. Suscipit, repellendus ex! Quas sequi in voluptas eaque, est ex quaerat debitis qui modi eum exercitationem consequatur officiis maxime minima soluta accusamus facere repellat harum nam.</p>
            </div>
          </div>
        </div>
      </div>
    </main>
  @endsection

</x-layouts.blank-body>
<x-layouts.footer>

</x-layouts.footer>
<x-layouts.header>
  @section('hero-style')
    style='max-height: 45vh;'
  @endsection
  @section('hero-content')
  <h1>
    <span class="heading__large h1">
      Contact Hillside
    </span>
    <span class="heading__small h4">
      Feel free to use the variety of services available to make contacting us easier!
    </span>
  </h1>
@endsection
</x-layouts.header>


<x-layouts.blank-body>
  @section('content')
  <main class='container card'>
    <div class="row px-2 py-5">
      {{-- Contact information  leftside --}}
      <div class="col-md-4">
        <div class="row">
          <div class="col-md">
            <h3 class="text-uppercase fw-bold">Contact Us</h3>
            <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 100px; background-color: rgb(22, 230, 22); height: 2px" />
            <p><i class="fas fa-home me-3"></i> 1805 8th St, Nisku, AB</p>
            <p><i class="fas fa-envelope me-3"></i> info[at]hillsideequipment.com</p>
            <p><i class="fas fa-phone me-3"></i> +1 780 916 3103</p>
            <p><i class="fas fa-clock me-3"></i>Mon-Fri: 8am - 5pm</p>
          </div>
        </div>
      </div>
      {{-- Contact form right side --}}
      <div class="col-md">
        <div class="row">
          <div class="col-md">
            {{-- If we have a session message, show that  --}}
            @if(Session::has('message'))
              <div class="alert alert-success">
                <h3>Thank you!</h3>
                <p class="lead">{{Session::get('message')}}</p>
              </div>

            @else
            {{-- Otherwise show our contact form --}}
              {!! Form::open(['route' => 'contact-submit', 'method' => 'post']) !!}
                <div class="mb-3">
                  <label for="fullName" class="form-label">Full Name: </label>
                  <input type="text" class="form-control" id="fullName" name="fullName" required
                    placeholder="John Smith">
                </div>
                <div class="mb-3">
                  <label for="emailAddress" class="form-label">Email address: </label>
                  <input type="email" class="form-control" id="emailAddress" name="email" required
                    placeholder="name@example.com">
                </div>
                <div class="mb-3">
                  <label for="emailAddress" class="form-label">Phone: </label>
                  <input type="phone" class="form-control" id="emailAddress" name="phone" maxlength="10" required
                    placeholder="(123) 456-7890">
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Message: </label>
                  <textarea class="form-control" id="message" name="message" rows="3" placeholder="I would love to get in touch about ...."></textarea>
                </div>
                <div class="mb-3">
                  <input type="text" name="url" id="url" class='d-none' placeholder="Enter your URL">
                </div>
                <div class="mb-3">
                  <input type="submit" value="Send Inquiry" name="submit" class="btn btn-blue">
                </div>
              {!! Form::close() !!}
              {{-- End if session --}}
            @endif

          </div>
        </div>
      </div>
    </div>
  </main>
  @endsection
</x-layouts.blank-body>

<x-layouts.footer>

</x-layouts.footer>
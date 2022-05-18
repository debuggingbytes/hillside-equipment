<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Heavy Duty Mechanic, Mobile field services, shop services. Proudly serving western Canada</title>
  <!-- Bootstrap Framework -->
  <!-- Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{asset('files/style.css')}}">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  @yield('head')

</head>

<body>
  <div class="loading-screen d-flex justify-content-center align-items-center" style="display: none;">
    <img src="{{ asset('images/animated-hillside-equipment-logo.gif') }}" id="loading-logo"
      alt="Hillside Equipment - 24 Hour field service, Heavy Duty mechanic">
  </div>
  <div id="website">
    <header>
      <nav class="navbar navbar-expand-lg bg-gray bg-gradient">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('homepage') }} "><img src="{{ asset('images/logo/hillside-full-transparent.png') }}" class="img-fluid"
              style="max-width: 180px;"></a>
          <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fas fa-bars fa-2x"></i>
          </button>
          <!-- Begin navigation -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="{{ route('homepage')}}" class="nav-link text-uppercase me-3">Home</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link text-uppercase me-3 dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown">
                  Services
                </a>
                <!-- Shop service drop down -->
                <ul class="dropdown-menu p-2">
                  <li class="fw-bold"><a href='/shop-and-field-services#inspections' class='text-dark'>Inspections</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services#10-year-boom">10 Year Boom Inspection</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services#5-year-block-and-ball">5 Year Block &amp; Ball Inspection</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services#lmi-inspection">LMI Calibration</a></li>
                  <li class="fw-bold"><a href='/shop-and-field-services#field-services' class='text-dark'>Field Services</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services#field-welding">Welding</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services#on-site-servicing">Onsite Service</a></li>
                  <li class='fw-bold'><a href='/shop-and-field-services#shop-services' class='text-dark'>Shop Services</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services#component-rebuilds">Component Rebuilds</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services#hydraulic-repair">Hydraulic Cylinders</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services">Final drives &amp; Axels</a></li>
                  <li><a class="dropdown-item" href="/shop-and-field-services">Unit Rebuilds</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="/parts-and-inventory" class="nav-link text-uppercase me-3">Parts</a>
              {{-- </li>
              <li class="nav-item">
                <a href="/heavy-duty-projects" class="nav-link text-uppercase me-3">Projects</a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="/gallery" class="nav-link text-uppercase me-3">Gallery</a>
              </li> --}}

              <li class="nav-item">
                <a href="/contact-us" class="nav-link text-uppercase me-3">Contact Us</a>
              </li>
            </ul>
          </div>
          <!-- End Navigation -->
        </div>
      </nav>
      <!-- Begin Emergency Service -->
      @if (!Auth::user())
      <div class="position-relative">
        <div class="emergency pt-2 p-1">
          <a href="tel:7809163103" class="text-decoration-none">
            <span class="p-2 pt-5 text-green"><i class="fas fa-phone"></i> &nbsp;780-916-3103</span><br>
            <div class="position-absolute  text-center pulse"
              style="right: 0.2%; bottom: 10%; width: 105%; background-color:rgb(29, 255, 67);">
              <span class="p-2 text-dark fw-bold">24 Hour</span><br>
              <span class="p-2 text-dark fw-bold">Field Service</span>
            </div>
          </a>
        </div>
      </div>
      @endif
      <!-- Begin Hero & Call to Action -->
      <div class="hero" @yield('hero-style')>
      @yield('hero-content')
      </div>
    </header>
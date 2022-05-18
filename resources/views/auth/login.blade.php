<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hillside Equipment Login</title>
  <!-- Bootstrap Framework -->
  <!-- Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{asset('files/style.css')}}">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<body class="bg-light">
  <main class="container vh-100 position-relative">
    {{-- Absolute center of page --}}
    <div class="abs-center">
      <div class="row d-block">
        <div class="col-md-10 mx-auto">
          <img src="{{ asset('images/logo/hillside-full-transparent.png') }}" class="img-fluid w-100 mb-5">
          <hr class="hr-line w-100">
        </div>
      </div>
      <div class="row d-block">
        <div class="col-md-10 mx-auto">
          {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" id="email" class="form-control" required autofocus>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password">
          </div>
          <div class="mb-3">
            <label for="remember" class="form-label me-2">Remember Me:</label>
            <input type="checkbox" name="remember" id="remember">
          </div>
          <div class="mb-3">
            <input type="submit" value="Submit" class='btn btn-info w-100'>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </main>

  
</body>
</html>
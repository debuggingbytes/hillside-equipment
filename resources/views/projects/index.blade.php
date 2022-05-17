<x-layouts.header>
  @section('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer">
  @endsection
</x-layouts.header>
<x-layouts.blank-body>

@section('content')
<div class="container">
  <div class="row px-2">
    <div class="col-md card vh-50">
      <h2 class="mt-4 pb-0 spaced">Recent Projects</h2>
      <hr style="width: 20%; height: 5px; background-color: rgb(22, 230, 22);">
      <p class="mt-2 p-2 h4">
      Over the years we've had the opportunity to work on many exciting projects. Here is some of our most recent work.
      </p>
      
      {{-- List all projects --}}
      @if ($projects->isEmpty())
        <h2 class="text-center">Sorry, no projects to display</h2>
      @else
        @foreach ($projects as $project)
        
        <div class="row my-2 mx-2 rounded rounded-3 p-2 shadow bg-gradient">
          <div class="col-md">
            <h3 class="text-center">{{$project->title}}</h3>
            <p class="content text-center">{{$project->body}}</p>
            {{-- {{$project->images}} --}}
            <div class="row p-2 my-3 mx-auto">
              @if ($project->images->isEmpty())
                <div class="text-center"><h3>No images for project.</h3></div>
              @else
                @foreach ($project->images as $image)
                <div class="col-md-3">
                  <a href="{{ asset($image->img_path) }}" data-lightbox="image-1">
                  <img src="{{ asset($image->img_path) }}" alt="" class="img-fluid img-thumbnail bg-secondary mb-4 p-1">
                  </a>
                </div>
                @endforeach
                
              @endif
            </div>
          </div>
        </div>


        @endforeach
      @endif

    </div>
  </div>
</div>
@endsection

</x-layouts.blank-body>
<x-layouts.footer>
  @section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script> 
  @endsection
</x-layouts.footer>
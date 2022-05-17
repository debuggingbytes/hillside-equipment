<x-layouts.header>

  @section('head')
  <meta property="">
  @endsection

  @section('hero-content')
  <h1>
    <span class="heading__large h1">
      Crane TECHNICIANS
    </span>
    <span class="heading__small h4">
      Servicing Alberta and Western Canada with 24 hour emergency field service.
    </span>
  </h1>
@endsection
</x-layouts.header>

<x-layouts.body>

</x-layouts.body>
<x-layouts.footer>
  @section('scripts')
    <script>
      const scroll = document.addEventListener("scroll", ()=> {
      // CHECK TO SEE IF WE ARE IN VIEWPORT -> FIRE THE COUNTER
        if(inViewPort()){
          showCounter = true;
          if(!hasRun){
            runCounter();
          }
        }
        // console.log(inViewPort())
      })


      // CODE FOR ELEMENT IN VIEWPORT OF SCREEN
      const totalBooms = document.getElementById('boom-teardowns')
      let showCounter, hasRun = false;
      
        function inViewPort(){
          const rect = totalBooms.getBoundingClientRect();
          
          // if the counter hasn't been set to true, return viewport values
          if(!showCounter){
            return (
              rect.top >= 0 &&
              rect.left >= 0 &&
              rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
              rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
          }else{
            return null;
          }

        }

        // RUN COUNTER FOR TEARDOWNS
        
        function runCounter(){
          const totalBoomsVal = 60;
          let i = 1

          const counter = setInterval(() => {
            if(i == totalBoomsVal){
              totalBooms.innerText = i + "+"
              clearInterval(counter)
            }else if (i == 30){
              totalBooms.className = 'fw-bold fs-2 mx-1'
              i++;
            }else{
              totalBooms.innerText = i
            i++
            }   
          }, 30);
          return hasRun = true;
        }

        
      

      
    </script>
  @endsection
</x-layouts.footer>
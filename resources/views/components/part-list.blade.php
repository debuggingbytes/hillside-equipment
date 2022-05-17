<div class="row p-1 mx-1">
  <div class="col-md-1">
    {{$item->id}}
  </div>
  <div class="col-md-2">
    {{$item->part_number}}
  </div>
  <div class="col-md-2">
    {{$item->manufacture}}
  </div>
  <div class="col-md">
   {{ $item->briefDescription}}...
  </div>
  <div class="col-md-2">
    <a href='' class="btn btn-danger mx-1">DELETE</a>
    <a href='' class="btn btn-warning mx-1">EDIT</a>
  </div>
</div>
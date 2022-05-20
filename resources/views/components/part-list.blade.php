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
    {!! Form::open(['route' => ['parts.destroy', 'part' => $item->id], 'class' => 'd-inline-block', 'method' => 'delete']) !!}
    <button class="btn btn-danger mx-1"><i class="fas fa-trash me-2"></i> DELETE</button>
    {!! Form::close() !!}
    <a href='{{ route('parts.edit', ['part' => $item->id]) }}' class="btn btn-warning mx-1">EDIT</a>
  </div>
</div>
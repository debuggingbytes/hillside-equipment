 <div class="col-md me-1 mb-3">
   <div class="card h-100 shadow-1 p-0">
     <div class="card-body">
       <p class="d-block p-0 m-0"><span style="display: inline-block; width: 30%;" class="me-2 fw-bold text-uppercase">Full Name:</span> {{$contact->fullName}}</p>
       <p class="d-block p-0 m-0"><span style="display: inline-block; width: 30%;" class="me-2 fw-bold text-uppercase">Phone:</span> {{$contact->phone}}</p>
       <p class="d-block p-0 m-0"><span style="display: inline-block; width: 30%;" class="me-2 fw-bold text-uppercase">Email:</span> {{$contact->email}}</p>
       <span class="d-block text-uppercase fw-bold mt-3">Message:</span>
       {{$contact->message}}
     </div>
     <div class="card-footer">
       {!! Form::open(['route' => ['contact.destroy', $contact->id], 'method' => 'delete']) !!}
       {!! Form::submit('DELETE', ['class' => 'btn btn-danger w-100']) !!}
       {!! Form::close() !!}
      </div>
   </div>
 </div>

            <div class="row p-3 mb-3 shadow mx-auto border-start border-secondary border-3 rounded rounded-3 part__card"
              style="max-width: 90%;">
              <div class="col-md-2">
                <img src="{{ asset($part->img_path)}}" class="img-fluid img-thumbnail bg-secondary part__thumbnail" alt="">
              </div>
              <div class="col-md  position-relative">
                @if(Auth::user())
                  <div class="part__edit">
                    <a href="{{ url("/dashboard/parts/$part->id/edit/#part") }}" class="btn btn-warning">EDIT</a>
                  </div>
                @endif
                <div class="position-absolute text-end" style="top:0; right: 0;">
                  <!-- <i class="fas fa-barcode fa-2x text-gray-300"></i> -->
                  <img src="images/logo/color1-white_textlogo_transparent_background.png" class="img-fluid w-25" alt="">
                </div>
                <div class="row mt-2 border-start border-3 border-secondary">
                  <div class="col-sm-3">
                    <span class="text-muted">Part Number</span>
                  </div>
                  <div class="col-sm">
                    {{$part->part_number}}
                  </div>
                </div>
                <div class="row mt-2 border-start border-3 border-secondary">
                  <div class="col-sm-3">
                    <span class="text-muted">Manufacture</span>
                  </div>
                  <div class="col-sm">
                    {{$part->manufacture}}
                  </div>
                </div>
                <div class="row mt-2 border-start border-3 border-secondary">
                  <div class="col-sm-3">
                    <span class="text-muted">Quantity</span>
                  </div>
                  <div class="col-sm">
                    {{$part->quantity}}
                  </div>
                </div>
                <div class="row mt-2 border-start border-3 border-secondary">
                  <div class="col-sm-3">
                    <span class="text-muted">Description</span>
                  </div>
                  <div class="col-sm">
                    {{$part->description}}
                  </div>
                </div>
              </div>
            </div>
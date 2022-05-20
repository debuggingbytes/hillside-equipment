<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InventoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    return redirect('/parts-and-inventory');
  }

  public function search(Request $request)
  {

    // $response = "";

    if ($request->ajax()) {


      $response = "";

      $parts = Inventory::where('part_number', 'LIKE', '%' . $request->search . '%')
        ->orWhere('manufacture', 'LIKE', '%' . $request->search . '%')
        ->orWhere('description', 'LIKE', '%' . $request->search . '%')
        ->get();

      // dd($parts);


      if (!$parts->isEmpty()) {
        foreach ($parts as $part) {
      
         $edit = Auth::user() ?
            "<div class=\"part__edit\">
              <a href=" . url("/dashboard/parts/$part->id/edit/#part") ." class=\"btn btn-warning\">EDIT</a>
            </div>" : "";
          
          // BIG PILE O SPAGHETTI
          $response .= "
            <div class='row p-3 mb-3 shadow mx-auto border-start border-secondary border-3 rounded rounded-3'
            style='max-width: 90%;'>
            <div class='col-md-2'>
              <img src='" . asset($part->img_path) . "' class='img-fluid img-thumbnail bg-secondary part__thumbnail' alt=''>
            </div>
            <div class='col-md position-relative'>
              $edit
              <div class='position-absolute text-end' style='top:0; right: 0;'>
                <img src='images/logo/color1-white_textlogo_transparent_background.png' class='img-fluid w-25' alt=''>
              </div>
              <div class='row mt-4 border-start border-3 border-secondary'>
                <div class='col-sm-3'>
                  <span class='text-muted'>Part Number</span>
                </div>
                <div class='col-sm'>
                  $part->part_number
                </div>
              </div>
              <div class='row mt-2 border-start border-3 border-secondary'>
                <div class='col-sm-3'>
                  <span class='text-muted'>Manufacture</span>
                </div>
                <div class='col-sm'>
                  $part->manufacture
                </div>
              </div>
              <div class='row mt-2 border-start border-3 border-secondary'>
                <div class='col-sm-3'>
                  <span class='text-muted'>Quantity</span>
                </div>
                <div class='col-sm'>
                  $part->quantity
                </div>
              </div>
              <div class='row mt-2 border-start border-3 border-secondary'>
                <div class='col-sm-3'>
                  <span class='text-muted'>Description</span>
                </div>
                <div class='col-sm'>
                  $part->description
                </div>
              </div>
            </div>
          </div>";
        }
      } else {
        $response .= "<div class='row mx-auto'>
        <div class='col-md'>
          <h3 class='spaced text-center'>Sorry, no results found for</h3>
          <hr style='width: 60%; background-color: rgb(22, 230, 22); height: 3px; margin: 0 auto;' class='mb-3'>
          <p class='text-center h4 fst-italic'>" . htmlspecialchars($request->search) . ".</p>
        </div>
      </div>";
      }

      return response($response);
    }
  }

  //Deletes only image from inventory listing
  public function deleteImg(Inventory $inventory, $id)
  {
    $data =  $inventory->findOrFail($id);
    $rm = unlink(public_path($data->img_path));
    if (!$rm) {
      return back()->withMessage('Failed to delete image');
    }
    $data->img_path = null;
    $data->save();
    return back()->withMessage("Successfully removed image from part $data->part_number");
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    return view('parts.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Validate information
    $request->validate([
      'part_number' => 'required',
      'manufacture' => 'required',
      'description' => 'required',
      'img' => 'required',
    ]);
    $img_name = $request->file('img')->hashName();
    $img_path = "/uploads/$img_name";


    $newPart = Inventory::create([
      'part_number' => $request->part_number,
      'manufacture' => $request->manufacture,
      'description' => $request->description,
      'quantity' => $request->quantity,
      'img_path' => $img_path,
    ]);

    //store image on server
    $request->file('img')->move(public_path('uploads'), $img_name);

    if ($newPart) {
      return redirect(route('parts.create'))->withMessage("Added new part to database");
    }
    dd($request->all());
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Inventory  $inventory
   * @return \Illuminate\Http\Response
   */
  public function show(Inventory $inventory)
  {
    //
    dd($inventory);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Inventory  $inventory
   * @return \Illuminate\Http\Response
   */
  public function edit(Inventory $inventory, $id)
  {
    //
    $data = $inventory->findOrFail($id);
    return view('parts.edit', compact('data'));
    // dd($data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Inventory  $inventory
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Inventory $inventory)
  {
    $inventory = $inventory->findOrFail($request->id);

    if ($request->hasFile('img')) {
      $img_name = $request->file('img')->hashName();
      $img_path = "/uploads/$img_name";
      $newImg = $request->file('img')->move(public_path('uploads'), $img_name);
      if ($newImg) {
        $img_path = "/uploads/$img_name";
        $inventory->img_path = $img_path;
      }
    }

    $inventory->update($request->all());
    if ($inventory) {
      return back()->withMessage("Successfully updated item $request->manufacture $request->part_number ");
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Inventory  $inventory
   * @return \Illuminate\Http\Response
   */
  public function destroy(Inventory $inventory, $id)
  {
    //
    $inventory->findOrFail($id)->delete();
    return redirect()->route('parts.list')->withMessage("Part was successfully removed from system.");
  }

  public function viewInventory(Inventory $inventory)
  {
    $inventory = $inventory->all();
    return view('parts.list', compact(['inventory']));
  }
}

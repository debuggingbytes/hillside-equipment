<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProjectController;
use App\Mail\ContactUs;
use App\Models\ContactForm;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home page
Route::get('/', function () {
  return view('home');
})->name('homepage');
// Contact Form Route

// Parts and Inventory
Route::get('/parts-and-inventory', function () {
  $parts = Inventory::all();
  return view('parts', ['parts' => $parts]);
})->name('inventory');

//Services Pages
Route::get('/shop-and-field-services', function () {
  return view('services');
})->name('services');



//Contact Us
Route::get('/contact-us', function () {
  return view('contact-us');
})->name('contact');

Route::post('/contact-us', [ContactFormController::class, 'store'])->name('contact-submit');


//projects
Route::get('/heavy-duty-projects', [ProjectController::class, 'index']);




// aJax search route
Route::get('/search', [InventoryController::class, 'search']);

// secure pages
Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function () {

  // Main dashboard page
  route::get('/', function () {

    $contact = ContactForm::all()->count();
    $parts = Inventory::all();

    return view('dashboard', ['contact' => $contact, 'parts' => $parts]);
  })->name('dashboard');
  
  // Change Password
  Route::get("/change-password", function(){
    return view("auth.confirm-password");
  })->name("change.password");

  Route::resource('/heavy-duty-projects', ProjectController::class)->except('index');

  // Parts resource
  Route::resource('/parts', InventoryController::class)->except('index');

  //Delete Image Route
  Route::get("/parts/{id}/img", [InventoryController::class, 'deleteImg'])->name("parts.imgdel");

  // Parts List route
  Route::get("/parts-list", [InventoryController::class, 'viewInventory'])->name('parts.list');

  // ContactForm List route
  Route::get('/contact-requests', [ContactFormController::class, 'index'])->name("contact.index");
  Route::delete('/contact-requests/delete/{id}', [ContactFormController::class, 'destroy'])->name('contact.destroy');
});

Route::get('/logout', function () {
  Auth::logout();
  return redirect()->route('homepage');
});



Route::get('/email', function(){
  return new ContactUs('Kris','123-456-7890', 'kris@debuggingbytes.com', 'kris');
});

// // incase no routes
// Route::fallback(function () {
//   return redirect()->route('homepage');
// });

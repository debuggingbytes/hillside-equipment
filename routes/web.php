<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProjectController;
use App\Mail\ContactUs;
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
    return view('dashboard');
  });

  Route::resource('/heavy-duty-projects', ProjectController::class)->except('index');

  // Parts resource
  Route::resource('/parts', InventoryController::class)->except('index');
  //Delete Image Route
  Route::get("/parts/{id}/img", [InventoryController::class, 'deleteImg'])->name("parts.imgdel");

  Route::get("/parts-list", [InventoryController::class, 'viewInventory']);
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

<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{

    public function index(){

      $contacts = ContactForm::all();

      return view('contact.index', ['contacts' => $contacts]);
    }

    public function store(Request $request)
    {
      // Validate contact form request, before submitting to database and sending mail.

      $check = $this->validate($request, 
      [
        'fullName' => 'required',
        'email' => 'required|email:rfc,dns',
        'phone' => 'required|max:10',
        'message' => 'required',
      ]);

      if(!$check){
        return back();
      }

      // Honeypot?
      if($request->url != ""){
        return back()->withMessage("Naughty bots");
      }
      //Validations are good, store in database
      $created = ContactForm::create(
        [
          'fullName' => $request->fullName,
          'phone' => $request->phone,
          'email' => $request->email,
          'message' => $request->message,
        ]
        );
      if($created){
        //Inserted into database successfully, move to sending mail
        Mail::to('doug@hillsideequipment.com')->send(new ContactUs($request->fullName, $request->phone, $request->email, $request->message));
      }

      return back()->withMessage('Your message has been successfully received!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactForm $contactForm, $id)
    {
        //
        $contactForm->findOrFail($id)->delete();
        return back()->withMessage("Successfully removed contact request");
    }
}

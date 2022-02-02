<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MarkdownContactFormEmail;
use App\Contact;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    //
      public function show_contact_page()
{

    return view('guest.contacts.form');

}

 public function store(Request $request)
{
    //ddd($request->all());
    $valData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);



    //ddd($valData);
    //return (new ContactFormMail($valData))->render();

    //return (new MarkdownContactFormEmail($valData))->render();

     $contact = Contact::create($valData);

    Mail::to('admin@example.com')->send(new MarkdownContactFormEmail($contact));

    return redirect()->back()->with('message', 'Message sent successfully 📧🧐');

}
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //
   public function sendForm()
{

    return view('guest.contacts.form');

}

 public function contactSend(Request $request)
{
    //ddd($request->all());
    $valData = $request->validate([
        'name' => 'required',
        'email' => 'required|email'
    ]);

    //ddd($valData);
    return (new ContactFormMail($valData))->render();
    //Mail::to('admin@example.com')->send(new ContactFormMail($valData));
    return redirect()->back()->with('message', 'Message sent successfully');

}

}

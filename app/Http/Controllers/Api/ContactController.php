<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

  public function store(Request $request) {
    $this->validate($request, [
      'email'   => "required|email",
      'name'    => "required",
      'message' => "required",
    ]);

    // Do nothing if bot ticked the checkbox.
    if ($request->term_of_service) {
      return;
    }

    $emails = explode(',', config('app.MAIL_TO'));
    if (!empty($emails)) {
      $contact = new Contact($request->all());

      foreach ($emails as $email) {
        Mail::to($email)->send(new ContactMail($contact));
      }
    }
  }

}
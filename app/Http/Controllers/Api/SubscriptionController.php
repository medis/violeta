<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Newsletter;

class SubscriptionController extends Controller
{

  public function store(Request $request) {
    $this->validate($request, [
        'email' => "required|email",
    ]);

    // Do nothing if bot ticked the checkbox.
    if ($request->term_of_service) {
      return;
    }

    Newsletter::subscribe($request->email);
  }

}
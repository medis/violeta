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

    Newsletter::subscribe($request->email);
  }

}
<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    function sendmail(Request $request)
    {
        $subject=$request->subject;
        $body=$request->body;
        $mail=$request->mail;
        $details = [
            'title' => $subject,
            'body' => $body
        ];

        \Mail::to($mail)->send(new \App\Mail\MyTestMail($details));
        echo("<h4>Email is Sent.</h4>");
    }
}

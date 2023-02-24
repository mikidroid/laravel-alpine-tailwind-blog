<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //
    public function __invoke(Newsletter $newsletter)
    {

            #get user email from request and validate
            request()->validate([
                'email'=>'required|email'
            ]);

            try {
                $newsletter->subscribe(request('email'));
                //or
                //(new Newsletter())->subscribe(request('email'));

            } catch (\Throwable $th) {
                //throw $th;
                //throw ValidationException::withMessages([]);   you can use this if you wish
                return back()->with('error','Unable to subscribe to newsletter, try again!');
            }

            return back()->with('message','Subcription success!');


    }
}

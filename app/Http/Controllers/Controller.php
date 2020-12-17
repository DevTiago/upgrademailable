<?php

namespace App\Http\Controllers;

use App\Models\Mails;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Mail;
use App\Mail\CEmail;
use Illuminate\Support\Arr;

class Controller extends BaseController
{

    public function index() {

        $all = Mail::all()->toArray();

        $emails = [];

        foreach ($all as $key => $em) {
            $emails = Arr::prepend($emails, $em['email']);
        }

        return view('welcome', compact('emails'));
        # return view('Email.mail', compact('emails'));

    }

    public static function sendEmail()
    {
        $count = 0;

        $all = Mail::all()->toArray();
        $emails = [];
        foreach ($all as $key => $em) {
            $emails = Arr::prepend($emails, $em['email']);
        }


        foreach ($emails as $email) {
            \Mail::to($email)->send(new CEmail());
            $count += 1;
        }

        return view('result', compact('count'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mails;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Mail\CEmail;
use Illuminate\Support\Facades\Mail;


class Controller extends BaseController
{

    public function index() {

        return view('index');
    }

    public function login(Request $request) {


            $username = $request->username;
            $password = $request->password;


                if ($username === env('USERNAME') && $password === env('PASSWORD')) {
                   return view('home');
                } else {
                  return redirect()->back()->with('msg', 'Utilizador inexistente!');
                }

    }

    public static function sendEmail(Request $request)
    {
       $emails = explode(";", $request->emails);
       $count = 0;

        foreach ($emails as $email) {
            Mail::to(trim($email))->send(new CEmail());
            $count += 1;
        }

        return view('home', compact('count'));
    }
}

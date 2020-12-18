<?php

namespace App\Http\Controllers;

use App\Models\Mails;
use App\Models\Users;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Mail;
use App\Mail\CEmail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;


class Controller extends BaseController
{

    public function index() {

        return view('index');
    }

    public function login(Request $request) {
            $users = Users::all();

            $username = $request->username;
            $password = $request->password;

            foreach ($users as $user) {
                if ($user->user === $username && $user->password === $password) {
                   return view('home');
                } else {
                  return redirect()->back()->with('msg', 'Utilizador inexistente!');
                }
            }
    }

    public static function sendEmail(Request $request)
    {
       $emails = explode(";", $request->emails);
       $count = 0;

        foreach ($emails as $email) {
            \Mail::to(trim($email))->send(new CEmail());
            $count += 1;
        }

        return view('home', compact('count'));
    }
}

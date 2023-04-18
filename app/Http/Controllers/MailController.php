<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\MyAppMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        try {
            $mailData = [
                'title' => 'Mail from StormauthApp',
                'body' => 'This is for testing email using smtp.'
            ];

            // Mail::to('fedjojonhson@gmail.com')->send(new MyAppMail($mailData));
            // Mail::to('algoprogrammable0123@gmail.com')->send(new MyAppMail($mailData));
            // Mail::to('stonewilliam063@gmail.com')->send(new MyAppMail($mailData));
            // Mail::to('lionelrichi6@gmail.com')->send(new MyAppMail($mailData));
            // Mail::to('tchudjotchuente@gmail.com')->send(new MyAppMail($mailData));
            Mail::to('stormeur123@gmail.com')->send(new MyAppMail($mailData));

            // return redirect()->back()->with('message', 'Email is sent successfully !');
            return redirect(route('admin.dashboard'))->with(
                'message',
                'Email is sent successfully !'
            );
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function displayEmailPage()
    {
        return view('emails.myappemail');
    }
}

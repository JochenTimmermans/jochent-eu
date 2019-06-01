<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|max:100',
            'user_email' => 'required|email|max:100',
            'subject' => 'required|max:100',
            'message' => 'required'
        ]);

//        $message = Message::create($validatedData);
        $message = new \App\Message;
        $message->user_name = $request->input('user_name');
        $message->user_email = $request->input('user_email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();

        // Send Email
        $data = array('newmsg' => $message);

        Mail::send('emails.notify', $data, function($email) {
            $email->to(env('ADMIN_EMAIL'), 'Jochen T.')
                    ->from('jochen@jochent.eu','MailerDaemon')
                    ->subject('JochenT.eu: New Message');
        });

        return view('success');
    }
}

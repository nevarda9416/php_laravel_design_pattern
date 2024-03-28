<?php

namespace App\Http\Controllers;

use App\Mail\SendSubcriber;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers' // |max:30
        ]);
        $token = hash('sha256', time());
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->token = $token;
        $subscriber->status = 'PENDING';
        $subscriber->save() ? 'You have successfully subscribed.' : 'Something went wrong, please try again.';
        // Send email
        $subject = 'Please confirm subscription';
        $verifyLink = url('subscriber/verify/' . $token . '/' . $request->email);
        $message = 'Please click on the following link in order to verify as subscriber:<br/><br/>';
        $message .= '<a href="' . $verifyLink . '">';
        $message .= $verifyLink;
        $message .= '</a><br/><br/>';
        $message .= 'If you received this email by mistake, simply delete it.
        You will not be subscribed if you do not  click the confirmation link above.';
        Mail::to($request->email)->send(new SendSubcriber($subject, $message));
        return redirect()->back()->with('success', 'Thanks, please check your inbox to confirm subscription');
    }

    /**
     * @param $token
     * @param $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify($token, $email)
    {
        $subscriber = Subscriber::where('token', $token)->where('email', $email)->first();
        if ($subscriber) {
            $subscriber->token = '';
            $subscriber->status = 'ACTIVE';
            $subscriber->update();
            return redirect()->back()->with('success', 'You are successfully verified as a subscribe to this system');
        } else {
            return redirect()->to('/');
        }
    }
}

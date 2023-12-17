<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//use Mail;

use App\Mail\NotifyMail;
use App\Mail\GuestMail;
use App\Mail\GuestReqMail;
use App\Models\Guest;
use App\Models\GuestReq;
use RealRashid\SweetAlert\Facades\Alert;


class SendEmailController extends Controller
{

  public function index()
  {

  }

  public function guestMail($id)
  {

    $guest = Guest::findOrFail($id);
    $data = [
      'name' => $guest->name,
      'title' => $guest->title,
      'email' => $guest->email
    ];
    $to = $data['email'];

    $body = [
      'name' => $data['name'],
      'title' => $data['title'],
      'url_a' => 'http://localhost:8000/welcomeguestreq/'.$id,
    ];

    /*Mail::to($to)->send(new GuestMail($body));
    if (Mail::failures()) {
      Alert::error('Error','Problem While Sending Email, Please Try Again');
      return redirect()->back();
    } else {
      Alert::success('Success','Email Sent Successfully');
      return redirect()->back();
    }*/
        

    return view('emails.guestMail', compact('data','body'));
  }

  public function guestReqMail($reqId)
  {
    $guestReq=GuestReq::findOrFail($reqId);
    $guestReq->status=1;
    $guestReq->save();
    $guest = Guest::findOrFail($guestReq->guest_id);
    $data = [
      'name' => $guest->name,
      'title' => $guest->title,
      'email' => $guest->email
    ];
    $to = $data['email'];

    $body = [
      'name' => $data['name'],
      'title' => $data['title'],
    ];

    Mail::to($to)->send(new GuestReqMail($body));
    if (Mail::failures()) {
      Alert::error('Error','Problem While Sending Email, Please Try Again');
      return redirect()->back();
    } else {
      Alert::success('Success','Request Confirmed && Email Sent Successfully');
      return redirect()->back();
    }

    //return view('emails.guestReqMail', compact('data','body'));
  }
}

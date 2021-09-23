<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;
use App\Models\NewsLetterModel;
use App\Models\NewsLetterSendMailModel;

class NewsLetterController extends Controller
{
    public function AddProcess(Request $request){
        $oldData = NewsLetterModel::where('email',$request->email)->first();
        if($oldData){
            return back()->with('danger',"You Have already subscribe our NewsLetter.");
        }else{
            $newData = new NewsLetterModel;
            $newData->email = $request->email;
            $data = Mail::to($newData->email)->send(new NewsletterMail($newData));
            $newData->save();
            $success = "Confirmation mail send again successfully.";
            $request->session()->put("success",$success);
        }
        return back()->with("success","You Successfully Subscribe our NewsLetter.");
    }

    // Admin Panel
    public function View(Request $request){
        $totalData = NewsLetterModel::all();
        return view('admin.newsletter.index',compact("totalData"));
    }
    public function SendMail(Request $request){
        $totalData = NewsLetterSendMailModel::all();
        return view('admin.newsletter.sendmail.index',compact("totalData"));
    }
    public function SendMailAdd(Request $request){
        return view('admin.newsletter.sendmail.add');
    }
    public function SendMailAddProcess(Request $request){
        $newsendMail = new NewsLetterSendMailModel;
        $newsendMail->fill($request->all());
        $newsendMail->save();
        $totalData = NewsLetterModel::all();
        foreach ($totalData as $data) {
            $dataa = env("MAIL_FROM_ADDRESS");
            Mail::send([],[], function($message) use($data,$request)
            {
                $message->to($data->email);
                $message->subject($request->subject);
                $message->setBody($request->message);
            });
        }
        return back()->with("success","Your Mail Save and Send successfully.");
    }
}

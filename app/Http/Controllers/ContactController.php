<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function adminContact(){
        $contacts=Contact::latest()->get();
        return view('admin.contact.index',compact('contacts'));
    }


    public function adminAddContact(){
        return view('admin.contact.addContact');
    }
    

    public function adminStoreContact(Request $request){
        Contact::insert([
            'adress'=>$request->adress,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('admin.contact');
    }


    public function HomeContact(){
        $contacts=DB::table('contacts')->first();
        return view('pages.contact',compact('contacts'));
    }


    public function ContactForm(Request $request){
        ContactForm::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('contact')->with('success','Your message sent successfully');
    }


    public function adminMessage(){
        $messages=ContactForm::all();
        return view('admin.contact.message',compact('messages'));
    }


    public function DeleteMessage($id){
        ContactForm::find($id)->delete();
        return Redirect()->back();
    }


}

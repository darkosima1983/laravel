<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel; 
class ContactController extends Controller
{
    public function index(){
        return view("contact");
    }

      public function getAllContacts(){
       
         $contacts = ContactModel::all(); 
        return view('admin.allContacts', compact('contacts'));
    }
     public function delete ($contact){
        $singleContact = ContactModel::where(['id'=>$contact])->first();
        
        if($singleContact== null){
            die("Dieses Kontakt existiert nicht.");
        }
        $singleContact->delete();
        return redirect()->back();
    }
    public function sendContact(Request $request){
        $request->validate([
            "email"=> "required|string", 
            "subject"=> "required|string",
            "message" => "required|string|min:5", 
         ]);
     

       
       ContactModel::create([
           "email"=> $request->get("email"),
           "subject"=> $request->get("subject"),
           "message" => $request->get("message"),

       ]);

       return redirect ()->route("AlleKontakte");
    }

    public function edit($contact)
    {
        $singleContact = ContactModel::find($contact);
        if (!$singleContact){
            abort(404, "Diese Kontakt existiert nicht.");

        }
        return view('admin.edit-contact', compact('singleContact'));
    }

    public function update(Request $request, $contact)
    {
        $singleContact = ContactModel::find($contact);
         if (!$singleContact){
            abort(404, "Diese Kontakt existiert nicht.");

        }
        
        $request->validate([
            "email"=> "required|string" ,
            "subject"=> "required|string",
            "message" => "required|string|min:5", 
         ]);
        

        $singleContact->update([
            "email"=> $request->get("email"),
           "subject"=> $request->get("subject"),
           "message" => $request->get("message"),
        ]);

        return redirect()->route('AlleKontakte');
    }

}

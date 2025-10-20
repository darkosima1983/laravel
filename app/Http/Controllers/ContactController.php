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
       
         $contacts = ContactModel::all(); // povlači sve zapise iz baze
        return view('admin.allContacts', compact('contacts'));
    }
    public function sendContact(Request $request){
        $request->validate([
            // "name"=> "pravila"
            "email"=> "required|string", // if (isset($_POST['email']) && is_string($_POST['email'])), proverava da li postoji
            "subject"=> "required|string",
            "description" => "required|string|min:5" //min:5 → mora imati najmanje 5 karaktera
         ]);
      // echo "Die E-Mail-Adresse ist ". $request->get("email"). " Der Betreff ist: ". $request->get("subject"). " Die Nachricht ist: ".$request->get("description");

       //$sql->query ("INSERT INTO (email, subject, message) VALUES ('$email', '$subject', '$description')")
       ContactModel::create([
           "email"=> $request->get("email"),
           "subject"=> $request->get("subject"),
           "message"=> $request->get("description")

       ]);

       return redirect ("/shop");
    }
}

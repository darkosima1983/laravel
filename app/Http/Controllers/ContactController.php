<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel; 
use App\Repositories\ContactRepository;
use App\Http\Requests\SaveContactRequest;
class ContactController extends Controller
{
    private $contactRepository;

    public function __construct()
    {
        $this->contactRepository = new ContactRepository();
    }

    public function index(){
        return view("contact");
    }

      public function getAllContacts(){
       
         $contacts = ContactModel::all(); 
        return view('admin.allContacts', compact('contacts'));
    }
     public function delete ($contact){
        $singleContact = $this->contactRepository->getContactById($contact);
        
        if($singleContact== null){
            die("Dieses Kontakt existiert nicht.");
        }
        $singleContact->delete();
        return redirect()->back();
    }
    public function sendContact(SaveContactRequest $request){
       
     
         $this->contactRepository->createNew($request);



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
        
        $this->contactRepository->updateContact($singleContact, $request);

        return redirect()->route('AlleKontakte');
    }

}

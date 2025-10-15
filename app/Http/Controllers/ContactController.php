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
}

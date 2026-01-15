<?php   
namespace App\Repositories;
use App\Models\ContactModel;
class ContactRepository 
{
    private $contactModel;
    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }
    public function createNew($request)
    {
        $this->contactModel::create([
            "email"=> $request->get("email"),
           "subject"=> $request->get("subject"),
           "message" => $request->get("message"),
        ]);
    }
    public function getContactById($id)
    {
        return $this->contactModel::where("id", $id)->first();
    }
    public function updateContact($contact, $request)
    {
        $contact->email = $request->get("email");
        $contact->subject = $request->get("subject");
        $contact->message = $request->get("message");
        $contact->save();
    }
}
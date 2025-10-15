<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = "contact"; // ContactModel -> "contact"

    protected $fillabile = [
        "email", "subject", "message" // Polja koja se mogu modifikovati  i koristiti
    ];
}

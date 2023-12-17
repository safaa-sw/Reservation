<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GuestReq;

class CompanionInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_req_id', 'firstname', 'lastname','birthdate', 'gender', 'birth_place',
        'residency_country', 'passport_no', 'issue_date','expiry_date', 'issue_place', 'arrival_date',
        'profession', 'organization', 'visa_duration','visa_status', 
    ];

    public function guestReq()
    {
        return $this->belongsTo(GuestReq::class);
    }
}

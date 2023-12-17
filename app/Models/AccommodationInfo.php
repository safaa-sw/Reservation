<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GuestReq;

class AccommodationInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_req_id', 'type', 'checkin', 'checkout', 'roomtype',
    ];

    public function guestReq()
    {
        return $this->belongsTo(GuestReq::class);
    }
}

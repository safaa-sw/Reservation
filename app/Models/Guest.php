<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GuestReq;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title', 'email',
    ];

    public function guestReq()
    {
        return $this->hasOne(GuestReq::class);
    }
}

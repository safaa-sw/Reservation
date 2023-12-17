<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GuestReq;

class FileInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_req_id', 'filetype', 'file',
    ];

    public function guestReq()
    {
        return $this->belongsTo(GuestReq::class);
    }
}

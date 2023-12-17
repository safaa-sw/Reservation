<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;
use App\Models\PassportInfo;
use App\Models\FileInfo;
use App\Models\AccommodationInfo;
use App\Models\CompanionInfo;

class GuestReq extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id', 'mobile',
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function passportInfo()
    {
        return $this->hasOne(PassportInfo::class);
    }

    public function fileInfo()
    {
        return $this->hasOne(FileInfo::class);
    }

    public function accommodationInfo()
    {
        return $this->hasOne(AccommodationInfo::class);
    }

    public function companionInfo()
    {
        return $this->hasOne(CompanionInfo::class);
    }
}

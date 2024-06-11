<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHigh extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function UserVerify()
    {
        return $this->hasOne(UserVerify::class
    );
    }
}


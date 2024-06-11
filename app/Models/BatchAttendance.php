<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchAttendance extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'student_id');
    }
    public function userEvents()
    {
        return $this->belongsTo(UserEvent::class,'user_id');
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}

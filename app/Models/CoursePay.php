<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePay extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dateFormat = 'Y-m-d H:i';

    public function user()
    {
        return $this->belongsTo(User::class,'student_id');
    }
    public function course()
    {
        return $this->belongsTo(Event::class,'course_id');
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id');
    }
}

<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "students";
    protected $primaryKey = "student_id";
    public $timestamps = true;

    protected $fillable = [
        "student_id", "student_name", "class", "admission_date", "yearly_fees", "class_teacher_id",
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'class_teacher_id', 'teacher_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "teachers";
    protected $primaryKey = "teacher_id";
    public $timestamps = true;

    protected $fillable = [
        "teacher_id", "name",
    ];
}

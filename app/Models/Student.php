<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'indexNumber',
        'name',
        'gender',
        'phone',
        'alternative_phone',
        'email',
        'alternative_email',
        'address',
        'post_code',
        'town',
        'program_code',
        'program',
        'secondary_school',
        'admission_status'
    ];
}

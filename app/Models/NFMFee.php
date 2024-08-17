<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NFMFee extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'band', 'household_contribution', 'semester_one', 'semester_two'];
}

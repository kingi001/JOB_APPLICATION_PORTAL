<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'full_name',
        'occupation',
        'postal_address',
        'postal_code',
        'city',
        'email',
        'phone_number',
        'years_known',
    ];
}

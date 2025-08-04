<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membership_body',
        'membership_type',
        'membership_no',
        'date_renewed',
        'expiry_date',
        'membership_document',
    ];

    protected $dates = [
        'date_renewed',
        'expiry_date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

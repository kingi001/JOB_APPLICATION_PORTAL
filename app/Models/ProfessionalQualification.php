<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalQualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'qualification_name',
        'certifying_body',
        'certificate_number',
        'award',
        'date_awarded',
        'valid_until',
        'qualification_document',
    ];

    protected $casts = [
        'date_awarded' => 'date',
        'valid_until' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

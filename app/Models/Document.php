<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'user_id',
        'application_letter',
        'national_id',
        'testimonials',
    ];
    /**
     * Relationship: A document belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

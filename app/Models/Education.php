<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id',
        'institution',
        'qualification',
        'course',
        'award',
        'academic_document',
        'start_date',
        'end_date'
    ];
     protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
     /**
     * Get the user that owns this education record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

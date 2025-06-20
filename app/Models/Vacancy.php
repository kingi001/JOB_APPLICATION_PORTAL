<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'ref_no',
        'position',
        'job_grade',
        'requirements',
        'duties',
        'application_deadline',
        'status',
        'terms_of_employment',
    ];
    protected $casts = [
        'application_deadline' => 'date',
        'requirements' => 'array',
        'duties' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

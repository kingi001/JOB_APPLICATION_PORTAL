<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    // Table name (optional if it matches Laravel convention)
    protected $table = 'personal_information';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'salutation',
        'surname',
        'other_names',
        'national_id',
        'date_of_birth',
        'gender',
        'county_id',
        'ethnicity_id',
        'phone_number',
        'postal_code',
        'alternative_email',
        'religion_id',
        'disability_status',
        'disability_description',
        'ncpwd_number',
        'internal_applicant',
        'department',
        'designation',
        'employment_terms',
        'job_grade',
        'date_of_appointment',
        'conviction_status',
        'conviction_details',
    ];

    // Attribute casting
    protected $casts = [
        'date_of_birth' => 'date',
        'date_of_appointment' => 'date',
    ];

    // Relationships

    // Belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Belongs to a County
    public function county()
    {
        return $this->belongsTo(County::class);
    }

    // Belongs to an Ethnicity
    public function ethnicity()
    {
        return $this->belongsTo(Ethnicity::class);
    }

    // Belongs to a Religion
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    // Accessors / Mutators (Optional)
    public function getFullNameAttribute()
    {
        return "{$this->salutation} {$this->surname} {$this->other_names}";
    }

    // Scope for internal applicants
    public function scopeInternal($query)
    {
        return $query->where('internal_applicant', 'Yes');
    }
}

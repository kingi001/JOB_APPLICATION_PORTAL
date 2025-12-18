<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'status',
    ];
    /**
     * Get the user that owns the application.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the vacancy that the application is for.
     */
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}

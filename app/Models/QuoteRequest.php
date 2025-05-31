<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{

    protected $table = 'quote_requests';

    // Mass assignable attributes
    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'company_size',
        'industry',
        'timeline',
        'services',
        'other_services',
        'message',
    ];


    protected $casts = [
        'services' => 'array',
    ];
}

<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Lead extends Model
{
    protected $collection = 'leads';

    protected $fillable = [
        'company_name',
        'website_url',
        'email',
        'marketing_budget',
        'status'
    ];
}

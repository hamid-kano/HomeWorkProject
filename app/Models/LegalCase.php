<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'case_type',
        'status',
        'client_name',
        'court',
        'case_number',
        'filing_date',
        'next_hearing'
    ];

    protected $casts = [
        'filing_date' => 'date',
        'next_hearing' => 'date'
    ];
}
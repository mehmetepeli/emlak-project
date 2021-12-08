<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinments extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'client_id',
        'name',
        'surname',
        'email',
        'phone',
        'from_postcode',
        'to_postcode',
        'distance',
        'meet_date',
        'meet_time',
        'exit_time',
        'return_time',
    ];
}

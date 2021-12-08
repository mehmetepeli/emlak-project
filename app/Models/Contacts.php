<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'address',
        'password',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity'
    ];
}

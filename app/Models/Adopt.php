<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopt extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'user_id',
        'first_name',
        'last_name',
        'address',
        'phone_number',
        'age',
        'email',
        'citizenship',
        'occupation',
        'radioQuestion',
        'is_accepted',
    ];
}

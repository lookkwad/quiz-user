<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'birthday',
        'email',
        'address',
        'phone_number',
    ];
}

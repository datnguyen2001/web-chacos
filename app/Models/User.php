<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'status'
    ];
}

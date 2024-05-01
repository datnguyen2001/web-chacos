<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSettings extends Model
{
    use HasFactory;
    protected $table = 'homepage_settings';
    protected $fillable = [
        'type',
        'value',
    ];
}

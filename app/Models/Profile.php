<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable; // تأكد من استخدام هذه السطر

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];

    //getRouteKeyName
    public function getImageAttribute($value)
    {
        return $value ?? '/profile/profileDefault.png';
    }
    public function publication()
    {
        return  $this->hasMany(Publication::class);
    }

}

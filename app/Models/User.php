<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ['name', 'email', 'password'];

  public function course()
{
    return $this->hasMany("App\Models\Course");
}

public function news()
{
    return $this->hasMany("App\Models\Neweducation");
    return $this->hasMany(Neweducation::class);

}

public function teacher()
{
    return $this->hasMany("App\Models\Teacher");
    return $this->hasMany(Teacher::class);

}
}

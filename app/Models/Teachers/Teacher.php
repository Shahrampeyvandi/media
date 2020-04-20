<?php

namespace App\Models\Teachers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Teacher extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $guarded = [];
}

<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Student extends Model  implements Authenticatable
{
    use AuthenticableTrait;
    protected $guarded = [];
    public function path()
    {
        return $this->student_username;
    }
}

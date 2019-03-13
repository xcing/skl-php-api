<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['instructor_user_id'];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    public function instructor()
    {
        return $this->hasOne('App\User', 'id', 'instructor_user_id');
    }
}

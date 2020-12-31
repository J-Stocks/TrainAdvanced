<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    public function getPathAttribute()
    {
        return $this->path();
    }

    public function path($append = "")
    {
        return "/trains/" . $this->id . "/" . $append;
    }
}

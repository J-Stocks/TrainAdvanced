<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Train extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'production_start',
        'production_end',
        'description',
        'editor_id',
        'image_url',
    ];

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function getPathAttribute()
    {
        return $this->path();
    }

    public function getMakeModelAttribute()
    {
        return $this->makeModel();
    }

    public function getPublicImageUrlAttribute()
    {
        return Storage::url($this->image_url);
    }

    public function makeModel()
    {
        return $this->make . ", " . $this->model;
    }

    public function path($append = "")
    {
        return "/trains/" . $this->id . "/" . $append;
    }
}

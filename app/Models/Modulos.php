<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'parent_id'];
    public $timestamps = false;
    public function childs()
    {
        return $this->hasMany('App\Models\Modulos', 'parent_id', 'id');
    }
}

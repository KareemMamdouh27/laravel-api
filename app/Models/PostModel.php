<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $fillable = ['name', 'title', 'text'];
    protected $hidden = ['updated_at', 'created_at'];
    public $timestamps = false;
    // protected $timestamps = false;
}

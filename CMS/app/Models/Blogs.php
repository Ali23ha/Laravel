<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blogs extends Model
{
    protected $fillable = ['name', 'content','publisher','image'];


}

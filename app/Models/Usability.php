<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usability extends Model
{
       protected $fillable = [
           'title',
           'description',
           'photo',
           'youtube',
           'link'
       ];
}

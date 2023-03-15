<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','slug'];

    public function getRoutekeyName()
    {
        return 'slug';
    }

    //relacion uno a muchos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }



}

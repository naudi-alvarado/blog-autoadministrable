<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
class Post extends Model
{
    use HasFactory;
    
    protected $guarded = ['id','create_at','updated_at'];
    CONST PUBLICADO = 2;
    CONST BORRADOR = 1;
    public function user()
    {   
        //relacion uno a muchos inversa
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
   
    public function tags()
    {
         //relacion muchos a muchos 
        return $this->belongsToMany(Tag::class);
    }

    public function image()
    {
        //relacion uno a uno polimorfica 
        return $this->morphOne(Image::class, 'imageable');
    }
    public function reviews(){
        return $this->morphMany(Review::class, "reviewable");
    }
   
 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Review extends Model
{
    use HasFactory;
   
    protected $fillable = ['rating', 'comment', 'user_id','reviewable_id', 'reviewable_type'];

    public function reviewable(){
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Reviews extends Component
{
    use WithPagination;
   
    public $comments=['score' => 1];
    public $post;
    public $comment_edit= false;
 
    public function score($new_score)
    {
      $this->comments['score']=$new_score;
    }
    public function delete(Review $review)
    {   
        $review->delete();
        session()->flash('message', 'comentario eliminado exitosamente.');
    }
    public function edit(Review $review)
    {
       $this->comment_edit = !$this->comment_edit;
        if($this->comment_edit){
            $this->comments=[
                'score' => $review->rating,
                'description' => $review->comment,
            ];
        }else{
            $this->comments=['score' => 1];
        }
    }
    public function update(Review $review)
    {
        $this->validate([
            'comments.description'          => 'required',
          ],[
            'comments.description.required' => 'Descripcion es obligatoria',
          ]);
        $review->rating = $this->comments['score'];
        $review->comment = $this->comments['description'];
        $review->save();
        $this->comments=['score' => 1];
        $this->comment_edit = !$this->comment_edit;
    }
    public function save()
    { 
        $this->validate([
            'comments.description'          => 'required',
          ],[
            'comments.description.required' => 'Descripcion es obligatoria',
          ]);
      
        Review::updateOrCreate([
            'rating' =>  $this->comments['score'],
            'comment' =>  $this->comments['description'],
            'user_id' => Auth::user()->id,
            'reviewable_id' => $this->post->id,
            'reviewable_type' => Post::class,
        ]);
        $this->comments=[
            'score' => 1,
        ];
       
        session()->flash('message', 'comentario agregado exitosamente.');
    }
    public function render()
    {
        $reviews = Review::where('reviewable_id', $this->post->id)
                          ->latest('id')
                          ->paginate(5);
                       
        $comment_total_post = Review::where('reviewable_id', $this->post->id)->count(); 
        $rating_average_post = round(Review::where('reviewable_id', $this->post->id)->avg('rating'),1);
 
        return view('livewire.reviews',compact('reviews','comment_total_post','rating_average_post'));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;

class Post extends Model
{
    use Sluggable;
    
    protected $fillable = ['title', 'post'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public static function add($fields)
    {
		  $post = new static;
		  $post->fill($fields);
   	  	  $post->user_id = Auth::user()->id;
   	  	  $post->save();
   	  	  return $post;
	}
	

	public function edit($fields)
	{
		$this->fill($fields);
   	  	$this->save();
   	  	return $this;
	}
	
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    //protected $timestamp = false;

    protected $fillable = ['book_name','book_desc','book_price','author_id','status','created_at','updated_at'];

    /**
     * Get the post that owns the comment.
     */
    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }
}

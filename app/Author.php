<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $table = 'authors';

	//protected $timestamp = false;

	protected $fillable = ['author_name','description','status','email'];

	public static function getAuthorsArray($authors)
	{
		for ($i = 0; $i < count($authors); $i++)
		{
			$authorsArray[$authors[$i]['id']] = $authors[$i]['author_name'];
		}

		return $authorsArray;
	}

	/**
     * Get the comments for the blog post.
     */
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}

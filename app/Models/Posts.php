<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
	
    protected $table = 'posts';
	
    public $timestamps = false;
	
	protected $fillable = ['post_title', 'post_image', 'post_content', 'post_tags', 'post_status', 'post_created_at', 'post_updated_at', 'post_category', 'post_author'];

}

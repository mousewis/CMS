<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model {
	
    protected $table = 'categories';
	
    public $timestamps = false;
	protected $primaryKey='cate_id';
	protected $fillable = ['cate_name'];

}

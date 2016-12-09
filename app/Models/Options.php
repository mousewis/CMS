<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Options extends Model {
	
    protected $table = 'options';
	
    public $timestamps = false;
	
	protected $fillable = ['opt_name', 'opt_detail', 'opt_updated_at'];
    public static function setup()
    {

    }

}

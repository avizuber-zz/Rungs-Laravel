<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $guarded = [];

	public function project() {
		
		return $this->belongsTo('App\Project');
		
	}

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Project extends Model {

	protected $guarded = [];

	public function getDates() {
		
		return ['endDay'];
	}

	public function scopeOwned ($query) {

		$query->where('user_id', '=', \Auth::user()->id);

	}

	public function tasks() {
		
		return $this->hasMany('App\Task');
		
	}

	public function articles() {
		
		return $this->hasMany('App\Article');
		
	}

	public function user() {

		return $this->belongsTo('App\User');
	}

	protected function getHumanTimestampAttribute($column) {
		
		if ($this->attributes[$column])
		
		{
		
		return Carbon::parse($this->attributes[$column])->diffForHumans();
	}
 
		return null;
	}

	public function getHumanCreatedAtAttribute() {
	
		return $this->getHumanTimestampAttribute("created_at");
	
	}

	public function getHumanUpdatedAtAttribute() {
	
		return $this->getHumanTimestampAttribute("updated_at");
	}


}

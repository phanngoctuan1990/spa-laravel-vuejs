<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $appends = ['numberOfTopics'];
	protected $visible = ['id', 'name', 'description', 'numberOfTopics'];

    public function topics()
    {
    	return $this->hasMany(Topic::class);
    }

    public function getNumberOfTopicsAttribute()
    {
    	return $this->topics->count();
    }
}

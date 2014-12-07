<?php

class Addexistingtracker extends Eloquent {

protected $guarded = array('id', 'created_at', 'updated_at');


	public function user() {

        return $this->belongsTo('User');

    }

}


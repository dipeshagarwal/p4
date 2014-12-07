<?php

class AddexistingtrackerController extends \BaseController {

	public function __construct() {
		
		parent::__construct();
		$this->beforeFilter('auth', array('except' => 'getIndex'));
	}

	/**
	* Show "All Trackers"
	* @return View
	*/
	public function getIndex() {
		
    	$query  = Input::get('query');
		$id  = Input::get('id');
    	$trackers = Tracker::all();
		return View::make('tracker_index')
				->with('trackers', $trackers)
				->with('id',$id);
	}

	/**
	* Show the "Add existing tracker to "my tracker" form", this will add already existed tracker of other user to my tracker list
	* @return View
	*/
	public function getAdd($id) {

   		try {
		    $tracker    = Tracker::findOrFail($id);
		}
		catch(exception $e) {
		    return Redirect::to('/tracker')->with('flash_message', 'Tracker not found');
		}

    	return View::make('addexistingtracker_add')
    		->with('tracker', $tracker);
	}

	/**
	* Process the "Add existing tracker to "My trackers" form"
	* @return Redirect
	*/
	public function postAdd() {

		$addexistingtracker = new Addexistingtracker();
		$addexistingtracker->user_id = Auth::user()->id;
		$addexistingtracker->fill(Input::all());		
		$addexistingtracker->save();
		$id = $addexistingtracker->id;
        return Redirect::action('TrackerController@getIndex')->with('id',$id)
															 ->with('flash_message','Your tracker has been added.');
	}


	/**
	* Show the "Edit tracker in "My Trackers" form"
	* @return View
	*/
	public function getEdit($id) {

   		try {
		    $addexistingtracker    = Addexistingtracker::findOrFail($id);
		}
		catch(exception $e) {
		    return Redirect::to('/tracker/mytracker')->with('flash_message', 'Tracker not found');
		}

    	return View::make('addexistingtracker_edit')
    		->with('addexistingtracker', $addexistingtracker);
	}


	/**
	* Process the "Edit tracker in "My Trackers" form"
	* @return Redirect
	*/
	public function postEdit() {

		try {
	        $addexistingtracker = Addexistingtracker::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/tracker/mytracker')->with('flash_message', 'Tracker not found');
	    }
		
	    $addexistingtracker->fill(Input::all());
	    $addexistingtracker->save();
	   	return Redirect::action('TrackerController@getIndex')->with('flash_message','Your changes have been saved.');

	}


	/**
	* Process tracker deletion from my tracker list
	*
	* @return Redirect
	*/
	public function postDelete() {

		try {
	        $addexistingtracker = Addexistingtracker::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/tracker/mytracker')->with('flash_message', 'Could not delete tracker - not found.');
	    }

	    Addexistingtracker::destroy(Input::get('id'));

	    return Redirect::to('/tracker/mytracker')->with('flash_message', 'Tracker deleted.');
	}

}
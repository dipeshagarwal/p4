<?php

class TrackerController extends \BaseController {


	public function __construct() {

		parent::__construct();

		$this->beforeFilter('auth', array('except' => 'getIndex'));

	}


	/**
	* Display My trackers
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
	* Display My trackers List
	* @return View
	*/
	public function getMytracker() {

		$idtest = Auth::user()->id;  
		$trackers = Tracker::where('user_id', '=', $idtest)->get();
		$addexistingtrackers = Addexistingtracker::where('user_id', '=', $idtest)->get();
		
    	return View::make('tracker_mytracker')
    		->with('trackers', $trackers)
			->with('addexistingtrackers', $addexistingtrackers);
	}

	/**
	* Show the "Add a tracker form"
	* @return View
	*/
	public function getCreate() {

    	return View::make('tracker_add');
	}


	/**
	* Process the "Add a tracker form"
	* @return Redirect
	*/
	public function postCreate() {

		# Step 1) Define the rules
		$rules = array(
			'title' => 'required',
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('tracker/create')
				->with('flash_message', 'Tracker addition failed; Can not add blank Tracker.')
				->withInput()
				->withErrors($validator);
		}
		
		$tracker = new Tracker();
		$tracker->user_id = Auth::user()->id;
		$tracker->fill(Input::all());
		
		try {
			$tracker->save();
		}
		catch (Exception $e) {
			return Redirect::to('tracker/create')
				->with('flash_message', 'Tracker addition failed; please try again.')
				->withInput();
		}
		
		$id = $tracker->id;

        return Redirect::action('TrackerController@getIndex')->with('id',$id)
															 ->with('flash_message','Your tracker has been added.');
	}


	/**
	* Show the "Edit a tracker form"
	* @return View
	*/
	public function getEdit($id) {

   		try {
		    $tracker    = Tracker::findOrFail($id);
		}
		catch(exception $e) {
		    return Redirect::to('/tracker')->with('flash_message', 'Tracker not found');
		}
		
    	return View::make('tracker_edit')
    		->with('tracker', $tracker);
	}


	/**
	* Process the "Edit a tracker form"
	* @return Redirect
	*/
	public function postEdit() {

		try {
	        $tracker = Tracker::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/tracker')->with('flash_message', 'Tracker not found');
	    }

	    $tracker->fill(Input::all());
	    $tracker->save();
	   	return Redirect::action('TrackerController@getIndex')->with('flash_message','Your changes have been saved.');
	}


	/**
	* Process tracker deletion
	* @return Redirect
	*/
	public function postDelete() {

		try {
	        $tracker = Tracker::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/tracker/')->with('flash_message', 'Could not delete tracker - not found.');
	    }
	    Tracker::destroy(Input::get('id'));
	    return Redirect::to('/tracker/')->with('flash_message', 'Tracker deleted.');
	}

}
<?php

class AccountController extends \BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('auth', array('except' => 'getIndex'));
	}


	public function getAccount() {
		$idtest = Auth::user()->id;  
		$accounts = Account::where('user_id', '=', $idtest)->get();
    	return View::make('account')
    		->with('accounts', $accounts);
	}

	/**
	* Show the "Add a Account form"
	* @return View
	*/
	public function getCreate() {
    	return View::make('account_add');
	}


	/**
	* Process the "Add a Account form"
	* @return Redirect
	*/
	public function postCreate() {
		
		# Step 1) Define the rules
		$rules = array(
			'purchasedate' => 'required',
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('account/create')
				->with('flash_message', 'Account addition failed; Can not add blank Account.')
				->withInput()
				->withErrors($validator);
		}
		
		$account = new Account();
		$account->user_id = Auth::user()->id;
		$account->fill(Input::all());
				
		try {
			$account->save();
		}
		catch (Exception $e) {
			return Redirect::to('tracker/create')
				->with('flash_message', 'Account addition failed; please try again.')
				->withInput();
		}

		$id = $account->id;
        return Redirect::action('AccountController@getAccount')->with('id',$id)
															 ->with('flash_message','Your account has been added.');
	}


	/**
	* Show the "Edit a Account form"
	* @return View
	*/
	public function getEdit($id) {
		
   		try {
		    $account    = Account::findOrFail($id);
		}
		catch(exception $e) {
		    return Redirect::to('/account')->with('flash_message', 'Account not found');
		}
    	return View::make('account_edit')
    		->with('account', $account);
	}


	/**
	* Process the "Edit a Account form"
	* @return Redirect
	*/
	public function postEdit() {
		
		try {
	        $account = Account::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/account')->with('flash_message', 'Account not found');
	    }
	    $account->fill(Input::all());
	    $account->save();
	   	return Redirect::action('AccountController@getAccount')->with('flash_message','Your changes have been saved.');
	}


	/**
	* Process Account deletion
	*
	* @return Redirect
	*/
	public function postDelete() {

		try {
	        $account = Account::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/account')->with('flash_message', 'Could not delete account - not found.');
	    }

	    Account::destroy(Input::get('id'));

	    return Redirect::to('/account')->with('flash_message', 'Account deleted.');

	}




}
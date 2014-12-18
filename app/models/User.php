<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';


	protected $hidden = array('password', 'remember_token');
	protected $guarded = array('id', 'created_at', 'updated_at');

		public function tracker() {
        return $this->hasMany('Tracker');
    }


		public function account() {
        return $this->hasMany('Account');
    }
	
	
		public function Addexistingtracker() {
        return $this->hasMany('Addexistingtracker');
    }
	
		/**
	* http://laravel.com/docs/4.2/mail
	*/
	public function sendWelcomeEmail() {

		# Create an array of data, which will be passed/available in the view
		$data = array('user' => Auth::user());

		Mail::send('emails.welcome', $data, function($message) {

			$recipient_email = $this->email;
			$recipient_name  = $this->name;
			$subject  = 'Welcome '.$this->name.'!';

    		$message->to($recipient_email, $recipient_name)->subject($subject);

		});

	}

}

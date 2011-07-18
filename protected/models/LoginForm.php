<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	
	public function primaryKey()
	{
	    return 'username';
	    // For composite primary key, return an array like the following
	    // return array('pk1', 'pk2');
	}

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('username, password', 'required')
		);
	}
}
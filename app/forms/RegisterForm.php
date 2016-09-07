<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Check;

use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Identical;

class RegisterForm extends Form
{

	public function initialize($entity = null, $options = null)
	{
		// Name
		$name = new Text('name');

		$name->setLabel('Your Full Name');

		$name->setFilters(array('striptags', 'string'));

		$name->addValidators(array(
			new PresenceOf(array(
				'message' => 'Name is required'
			))
		));

		$this->add($name);

		// Username
		$name = new Text('username');

		$name->setLabel('Username');

		$name->addValidators(array(
			new PresenceOf(array(
				'message' => 'Please enter your desired username'
			))
		));
		$this->add($name);

		// Email
		$email = new Text('email');
		
		$email->setLabel('E-mail');
		
		$email->setFilters('email');
		
		$email->addValidators(array(
			new PresenceOf(array(
				'message' => 'E-mail is required'
			)),
			new Email(array(
				'message' => 'E-mail is not valid'
			))
		));
		$this->add($email);

		// Password
		$password = new Password('password');

		$password->setLabel('Password');

		$password->addValidators(array(
			new PresenceOf(array(
				'message' => 'Password is required'
			)),
			new Confirmation(array(
				'message' => 'Password doesn\'t match confirmation',
				'with' => 'repeatPassword'
			)),
			// new StringLength(array(
			// 	'min' => 6,
			// 	'messageMinimum' => 'Password is too short. Minimum 6 characters'
			// ))
		));
		$this->add($password);

		// Confirm password
		$repeatPassword = new Password('repeatPassword');

		$repeatPassword->setLabel('Repeat Password');

		$repeatPassword->addValidators(array(
			new PresenceOf(array(
				'message' => 'Confirmation password is required'
			))
		));

		$this->add($repeatPassword);

		// Terms
		$terms = new Check('terms', [
			'value' => 'yes'
		]);

		$terms->setLabel('Acept terms and conditions');

		$terms->addValidator(new Identical([
			'value' => 'yes',
			'message' => 'Terms and conditions mush be accepted'
		]));

		$this->add($terms);

		// CSRF
		$csrf = new Hidden('csrf');

		$csrf->addValidator(new Identical([
		    'value' => $this->security->getSessionToken(),
		    'message' => 'CSRF validation failed'
		]));

		$csrf->clear();

		$this->add($csrf);

	}

	public function messages($name)
	{
		if ($this->hasMessagesFor($name)) {
			foreach ($this->getMessagesFor($name) as $message) {
				$this->flash->error($message);
			}
		}
	}

}
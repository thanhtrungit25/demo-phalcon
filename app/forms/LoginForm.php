<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\StringLength;

class LoginForm extends Form
{

  public function initialize($entity = null, $options = null)
  {
    // email
    $email = new Text('email');
    $email->setLabel('Email/Username');
    $email->setFilters(array('email'));
    $email->addValidators(array(
      new PresenceOf(array(
        'message' => 'E-mail is required'
      )),
      new Email(array(
        'message' => 'E-mail is not valid'
      ))
    ));
    $this->add($email);

    // password
    $password = new Password('password');
    $password->setLabel('Password');
    $password->addValidators(array(
      new PresenceOf(array(
        'message' => 'The password is required'
      ))
    ));
    $this->add($password);


  }

  // Prints messages for a specific element
  public function messages($name)
    {
      if ($this->hasMessagesFor($name)) {
        foreach ($this->getMessagesFor($name) as $message) {
          $this->flash->error($message);
        }
      }
    }



}
<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Submit;

use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Identical;

class ScheduleForm extends Form
{

  public function initialize($entity = null, $options = null)
  {
    // Address start
    $address_start = new Text('address_start');

    $address_start->setLabel('Add your address start');

    $address_start->setFilters(array('striptags', 'string'));

    $address_start->addValidators(array(
      new PresenceOf(array(
        'message' => 'Address start is required'
      ))
    ));

    $this->add($address_start);

    // Address end
    $address_end = new Text('address_end');

    $address_end->setLabel('Add your address end');

    $address_end->setFilters(array('striptags', 'string'));

    $address_end->addValidators(array(
      new PresenceOf(array(
        'message' => 'Address end is required'
      ))
    ));

    $this->add($address_end);

    // Radius
    $radius = new Select(
      "radius",
      Radius::find(),
      array(
        'using' => array(
          'id',
          'name'
        )
      )
    );
    $radius->setLabel('Add radius');
    $this->add($radius);

    // Submit
    $this->add(new Submit('Add Schedule', [
      'class' => 'btn btn-success'
    ]));


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
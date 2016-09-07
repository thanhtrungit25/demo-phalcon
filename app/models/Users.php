<?php

use Phalcon\Mvc\Model;
use Phalcon\validation;
use Phalcon\validation\Validator\Uniqueness;

class Users extends Model
{
    public $id;

    public $username;

    public $password;

    public $name;

    public $email;

    public $created_at;

    public $active;

    public function validation()
    {
        $validator = new validation();

        $validator->add('username', new Uniqueness([
            "message" => "The username is already registered"
        ]));

        $validator->add('email', new Uniqueness([
            "message" => "The email is already registered"
        ]));

        return $this->validate($validator);

    }

    function initialize()
    {
        $this->hasMany('id', 'Schedule', 'user_id');
        $this->hasOne('id', 'UserProfile', 'user_id');
    }

}
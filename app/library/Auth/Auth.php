<?php
// namespace Demo\Auth;

use Phalcon\Mvc\User\Component;

class Auth extends Component
{

  public function check($credentials)
  {

    // Check if the user exist
    $user = Users::findFirstByEmail($credentials['email']);

    if ($user) {

      if (!$this->security->checkHash($credentials['password'], $user->password)) {
        throw new Exception('Wrong email/password combination');
      }

      // Create session key
      $this->session->set('auth', [
        'id' => $user->id,
        'name' => $user->name
      ]);

    }

  } // end check


}
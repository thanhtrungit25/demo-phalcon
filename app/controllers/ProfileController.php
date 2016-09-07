<?php

class ProfileController extends ControllerBase
{

  public function indexAction()
  {
    // Get session info
    $auth = $this->session->get('auth');

    // Query the active user
    $user = Users::findFirst($auth['id']);

    if ($user == false) {
      return $this->forward('index/index');
    }

    if (!$this->request->isPost()) {

      $this->tag->setDefault('name', $user->name);
      $this->tag->setDefault('email', $user->email);

    } else {
      $name = $this->request->getPost('name', array('string', 'striptags'));
      $email = $this->request->getPost('email', array('email'));

      $user->name = $name;
      $user->email = $email;
      if ($user->save() == false) {
        foreach ($user->getMessages() as $message) {
          $this->flash->error($message);
        }
      } else {
        $this->flash->success('Your profile information was updated successfully');
      }
    }
  }


}
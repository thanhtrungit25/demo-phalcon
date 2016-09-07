<?php

class SessionController extends ControllerBase
{

    /**
     * Default action. Set the public layout (layouts/public.volt)
     */
  public function initialize()
  {
    // $this->view->setTemplateBefore('public');
  }

  public function indexAction()
  {
    if (!$this->request->isPost()) {
        return $this->forward('session/login');
    }

  }

  public function signupAction()
  {
    $form = new RegisterForm;

    if ($this->request->isPost()) {
// echo '<pre>';print_r($this->request->getPost());die;
        if ($form->isValid($this->request->getPost()) != false) {

            $name = $this->request->getPost('name', array('string', 'striptags'));
            $username = $this->request->getPost('username', 'alphanum');
            $email = $this->request->getPost('email', 'email');
            $password = $this->request->getPost('password');
            $repeatPassword = $this->request->getPost('repeatPassword');

            $user = new Users();
            $user->username = $username;
            $user->password = $this->security->hash($password);
            $user->name = $name;
            $user->email = $email;
            $user->create_at = new Phalcon\Db\RawValue('now()');
            $user->active = 'Y';

            if ($user->save()) {
                return $this->forward('index');
            }

            $this->flash->error($user->getMessages());
        }

    }

    $this->view->form = $form;
  }

  private function _registerSession(Users $user) {
    $this->session->set('auth', array(
        'id' => $user->id,
        'name' => $user->name,
    ));
  }

  public function loginAction()
  {

    $form = new LoginForm;

    try {
        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false)
            {

                $this->auth->check([
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password')
                ]);

                // response to index controller
                return $this->response->redirect('profile');
            }
        }
    } catch (Exception $e) {
        $this->flash->error($e->getMessage());
    }

    $this->view->form = $form;
  }
  /**
   * Finish the active session redirecting to the index
   */

  public function endAction()
  {
    $this->session->remove('auth');
    $this->flash->success('Goodbye!');

    return $this->forward('index/index');
  }



}
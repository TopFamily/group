<?php
use Phalcon\Db\RawValue;

class SessionController extends ControllerBase {
    public function initialize() {
        $this->tag->setTitle('Log In');
        parent::initialize();
    }

    public function indexAction() {
    }

    private function _registerSession(User $user) {
        $this->session->set('auth', array(
            'uid' => $user->uid,
            'username' => $user->username,
            'email' => $user->email,
            'groupid' => $user->groupid,
            'avatar' => $user->avatar
        ));
        $user->userprofile->lastactive = new RawValue('now()');
        $user->save();
    }

    public function startAction() {
        if ($this->request->isPost()) {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = User::findUserByName($email);
            
            if ($user) {
                if ($this->security->checkHash($password, $user->password)) {
                    $this->_registerSession($user);
                    $this->flash->success('Log in successfully! Welcome, ' . $user->username);
                    return $this->forward('index/index');
                }
            }
            $this->flash->error('Wrong email/password');
        }
        return $this->forward('session/index');
    }

    public function endAction() {
        $this->session->remove('auth');
        $this->flash->success('Log out successfully! Goodbye.');
        return $this->forward('index/index');
    }
}

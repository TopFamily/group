<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Db\RawValue;
use Phalcon\Mvc\Model\Query;

class ProfileController extends ControllerBase {
    public function initialize() {
        $this->tag->setTitle('Profile');
        parent::initialize();
    }
    public function indexAction() {
        return $this->forward('profile/view/' . $this->getAuth()["uid"]);
    }
    public function viewAction($uid) {
        $user = User::findUserByID($uid);
        if(!$user) {
            return $this->forward('errors/show404');
        }
        $this->view->user = $user;
    }
    public function editAction($uid) {
        $user = User::findUserByID($uid);
        if(!$user) {
            return $this->forward('errors/show404');
        }
        if($user->uid != $this->getAuth()["uid"]) {
            if(!Group::Permission_CanEditAll($this->getAuth()["groupid"])) {
                return $this->forward('errors/show401');
            }
        }

        $form = new ProfileForm($user->usercard);

        if($this->request->isPost()) {
            $data = $this->request->getPost();

            if (!$form->isValid($data, $user->usercard)) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {
                if ($user->save() == false) {
                    foreach ($user->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $form->clear();
                    $this->flash->success("Profile was updated successfully");
                    return $this->forward("profile/view/{$uid}");
                }
            }
        }
        $this->view->form = $form;
        $this->view->user = $user;
    }
}

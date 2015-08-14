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
        $this->view->user = $user;
    }
}

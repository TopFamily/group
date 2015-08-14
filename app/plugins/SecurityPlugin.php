<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

class SecurityPlugin extends Plugin
{
    public function getAcl() {
        if (!isset($this->persistent->acl)) {

            $acl = new AclList();

            $acl->setDefaultAction(Acl::DENY);

            $roles = array(
                'admin'  => new Role("Admin"),
                'users'  => new Role("User"),
                'guests' => new Role("Guest")
            );
            foreach ($roles as $role) {
                $acl->addRole($role);
            }

            $aclResources = array(
                'admin' => array(
                ),
                'user' => array(
                    'profile'       => array("index", "edit")
                ),
                'public' => array(
                    'index'      => array('index'),
                    'about'      => array('index'),
                    'register'   => array('index'),
                    'errors'     => array('show401', 'show404', 'show500'),
                    'session'    => array('index', 'start', 'end')
                )
            );

            foreach ($aclResources as $type => $resource) {
                foreach($resource as $res => $actions) {
                    $acl->addResource(new Resource($res), $actions);
                }
            }

            foreach ($aclResources["public"] as $resource => $actions) {
                foreach ($actions as $action){
                    $acl->allow("Guest", $resource, $action);
                    $acl->allow("User", $resource, $action);
                    $acl->allow("Admin", $resource, $action);
                }
            }

            foreach ($aclResources["user"] as $resource => $actions) {
                foreach ($actions as $action){
                    $acl->allow("User", $resource, $action);
                    $acl->allow("Admin", $resource, $action);
                }
            }

            foreach ($aclResources["admin"] as $resource => $actions) {
                foreach ($actions as $action){
                    $acl->allow("Admin", $resource, $action);
                }
            }

            $this->persistent->acl = $acl;
        }

        return $this->persistent->acl;
    }

    public function beforeDispatch(Event $event, Dispatcher $dispatcher) {

        $auth = $this->session->get('auth');
        if (!$auth){
            $role = "Guest";
        } else {
            if(Group::isAdmin($auth["groupid"])) {
                $role = "Admin";
            } elseif (Group::isUser($auth["groupid"])) {
                $role = "User";
            }
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();
        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {
            $dispatcher->forward(array(
                'controller' => 'errors',
                'action'     => 'show401'
            ));
            return false;
        }
    }
}

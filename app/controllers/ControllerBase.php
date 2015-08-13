<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ControllerBase extends Controller {
    protected function getAuth() {
        return $this->session->get('auth');
    }

    protected function initialize() {
        $this->tag->prependTitle('TopFamily::');
        $this->view->setTemplateAfter('main');

        if($this->request->isAjax()) {
            $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        } else {
            $this->view->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
        }
    }

    protected function forward($uri) {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
        return $this->dispatcher->forward(
            array(
                'controller' => $uriParts[0],
                'action' => $uriParts[1],
                'params' => $params
            )
        );
    }
}

<?php

class ErrorsController extends ControllerBase
{
    public function initialize() {
        $this->tag->setTitle('Oops!');
        parent::initialize();
    }

    public function show404Action() {
        $this->response->setStatusCode(404, "Not Found");
    }

    public function show401Action() {
        $this->response->setStatusCode(401, "Not Authorized");
    }

    public function show500Action() {
        $this->response->setStatusCode(500, "Internal Server Error");
    }
}

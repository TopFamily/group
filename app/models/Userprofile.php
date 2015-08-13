<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Db\RawValue;

class Userprofile extends Model {
    public $uid;
    public $registertime;
    public $lastactive;

    public function initialize() {
        $this->belongsTo("uid", "User", "uid", array(
            'reusable' => true
        ));
    }

    public function beforeValidationOnCreate() {
        $this->registertime = new RawValue('now()');
        $this->lastactive = new RawValue('now()');
    }
}

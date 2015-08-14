<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Db\RawValue;

class Usercard extends Model {
    public $uid;
    public $name;
    public $description;
    
    public function initialize() {
        $this->belongsTo("uid", "User", "uid", array(
            'reusable' => true
        ));
    }
}

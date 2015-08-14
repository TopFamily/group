<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Db\RawValue;

class Group extends Model {
    public $gid;
    public function initialize() {
    }

    public static function Permission_CanEditAll($gid) {
        if($gid == 1) {
            return true;
        }
        return false;
    }

    public static function isAdmin($gid) {
        if($gid == 1) return true;
        else return false;
    }

    public static function isUser($gid) {
        if($gid != 0) return true;
        else return false;
    }
}

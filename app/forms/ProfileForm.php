<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\StringLength;

class ProfileForm extends Form {
    public function initialize($entity = null, $options = array()) {
        $name = new Text('name', array(
            'placeholder' => 'Name'
        ));
        $name->setLabel('Name');
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Please enter your name'
            )),
            new StringLength(array(
                'max' => 50,
                'min' => 2,
                'messageMaximum' => 'Name must have at most 50 characters',
                'messageMinimum' => 'Name must have at least 2 characters'
            ))
        ));
        $this->add($name);

        $description = new TextArea('description', array(
            'placeholder' => 'Description'
        ));
        $description->setLabel('Description');
        $description->addValidators(array(
            new PresenceOf(array(
                'message' => 'Please enter your description'
            )),
            new StringLength(array(
                'max' => 300,
                'min' => 5,
                'messageMaximum' => 'Description must have at most 300 characters',
                'messageMinimum' => 'Name must have at least 5 characters'
            ))
        ));
        $this->add($description);
    }
}

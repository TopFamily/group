<?php

use Phalcon\Mvc\User\Component;

class Elements extends Component{
    protected $auth;
    private $navbar_right_guest = array(
        'session' => array(
            'caption' => '<span class="glyphicon glyphicon-log-in"></span> Log In',
            'action' => 'index'
        ),
        'register' => array(
            'caption' => '<span class="glyphicon glyphicon-new-window"></span> Sign Up',
            'action' => 'index'
        )
    );
    private $navbar_right_user = array(
        '.0' => array(
            'caption' => '<img src="%s" class="img-rounded" width="22px" style="margin-top: -4px;"></img>%s',
            'class'   => "dropdown",
            "list"    => array(
                'session' => array(
                    'caption' => '<span class="glyphicon glyphicon-log-out"></span> Log Out',
                    'action' => 'end'
                )
            )
        )
    );
    private $navbar_elements = array(
        'navbar-left' => array(
            'index' => array(
                'caption' => '<span class="glyphicon glyphicon-home"></span> Home',
                'action' => 'index'
            )
        ),
        'navbar-right' => null
    );
    public function getDropdown($elementArr) {
        echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">',
            sprintf($elementArr["caption"], $this->auth["avatar"], $this->auth["username"]),
            ' <span class="caret"></span></a>';
        echo '<ul class="dropdown-menu">';
        foreach ($elementArr["list"] as $controller => $option) {
            if($controller[0] == '.')
                echo '<li class="', $option["class"], '"><a href = "#">',
                    $option['caption'], '</a></li>';
            else {
                echo '<li>',
                    $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']),
                    '</li>';
            }
        }
        echo '</ul>';
    }

    public function getElement($elementArr) {
        echo '<li class="', $elementArr["class"], '">';
        if($elementArr["class"] == "dropdown") $this->getDropdown($elementArr);
        echo '</li>';
    }

    public function getList($menuArr) {
        $currentController = $this->view->getControllerName();
        foreach ($menuArr as $controller => $option) {
            if($controller[0] == '.') {
                $this->getElement($option);
            } else {
                if ($currentController == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
        }
    }

    public function getMenu() {
        $this->auth = $this->session->get('auth');
        if ($this->auth) {
            $this->navbar_elements['navbar-right'] = $this->navbar_right_user;
        } else {
            $this->navbar_elements['navbar-right'] = $this->navbar_right_guest;
        }
        foreach ($this->navbar_elements as $position => $menu) {
            echo '<ul class="nav navbar-nav ', $position, '">';
            $this->getList($menu);
            echo '</ul>';
        }

    }
}

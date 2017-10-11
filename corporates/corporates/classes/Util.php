<?php

final class Util {

    private function __construct() {

    }

	public static function getControllerAction($default) {
        $action = (isset($_GET['action']) && strlen($_GET['action']) > 0) ? $_GET['action'] : '';
        if ($action == '') {
            $action = (isset($_POST['action']) && strlen($_POST['action']) > 0) ? $_POST['action'] : $default;
        }
        return strtolower($action);
    }
}
?>
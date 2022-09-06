<?php

/**
 * Home controller
 * -------------------------------------------------------
 * @package    ampt-ci.service.app
 * @subpackage Controllers
 * @author     Waan <admin@waan.email>
 * @copyright  Copyright (c) 2022, www.waan.io
 * @license    MIT License
 * @link       https://www.waan.io
 * @version    Version 1.0.0
 * @source     Home.php
 * -------------------------------------------------------
 */

namespace App\Controllers;

use App\Core\MyController;

class Home extends MyController {

    public function index() {

        $content = array(
            "page_title" => "Welcome to AMPT-CI",
            "data" => "Welcome to AMPT-CI."
        );

        $smarty = MyController::instance();
        $smarty->assign("c", $content);
        $smarty->display("home.tpl");
    }
}
/* End of the file Home.php */
/* Location: ./app/Controllers/Home.php */

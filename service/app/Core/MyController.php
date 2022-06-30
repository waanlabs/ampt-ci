<?php
/**
 *  MyController
 *  -------------------------------------------------------
 * @package    ampt-ci.service.app
 * @subpackage Core
 * @author     Waan <admin@waan.email>
 * @copyright  Copyright (c) 2021, www.waan.io
 * @license    www.waan.io (Waan LLC)
 * @link       https://www.waan.io
 * @version    Version 1.0.0
 * @source     MyController.php
 *  -------------------------------------------------------
 */

namespace App\Core;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Smarty;

class MyController extends BaseController
{
    /**
     * @var $instance
     */
    private static $instance;

    public static function instance(): Smarty
    {
        if (!isset(self::$instance)) {
            $smarty = new Smarty;

            $smarty->setTemplateDir(APPPATH . 'Views/');
            $smarty->setCompileDir(WRITEPATH . 'smarty/template_c/');
            $smarty->setConfigDir(WRITEPATH . 'smarty/configs/');
            $smarty->setCacheDir(WRITEPATH . 'smarty/cache/');

            $smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
            $smarty->cache_lifetime = 60 * 60 * 24;
            /* ---------------------------------------------------
             * $smarty->setCompileCheck(true);
             * Check for file changes and recompile cache.
             * Set false for production to reduce overhead.
             * --------------------------------------------------- */
            $smarty->setCompileCheck(false);
            $smarty->setDebugging(false);

            self::$instance = $smarty;
        }
        return self::$instance;
    }

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
}
/*  End of the file MyController.php  */
/*  Location: ./app/Core/MyController.php  */

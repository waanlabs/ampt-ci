<?php
/**
 * MyController
 * -------------------------------------------------------
 * @package    ampt-ci.service.app
 * @subpackage Core
 * @author     Waan <admin@waan.email>
 * @copyright  Copyright (c) 2021, www.waan.io
 * @license    www.waan.io (Waan LLC)
 * @link       https://www.waan.io
 * @version    Version 1.0.0
 * @source     MyController.php
 * -------------------------------------------------------
 */

/**
 * Namespace (Package) Definition
 * ----------------------------------------------------------------
 */

namespace App\Core;

/**
 * Use (Import) Statement(s) Definition
 * ----------------------------------------------------------------
 */

use App\Controllers\BaseController as BaseController;
use CodeIgniter\HTTP\RequestInterface as RequestInterface;
use CodeIgniter\HTTP\ResponseInterface as ResponseInterface;
use Psr\Log\LoggerInterface as LoggerInterface;
use Smarty as Smarty;

class MyController extends BaseController implements MyInterface
{
    private static $smartyInstance = null;
    private static $myControllerInstance = null;

    /**
     * Constructor
     * -------------------------------------------------------
     * Constructor for MyController; __get() and __set()
     * methods  for the read-only properties are automatically
     * defined at the runtime.
     *
     * @param string $smartyTemplateDir
     * @param string $smartyCompileDir
     * @param string $smartyConfigDir
     * @param string $smartyCacheDir
     * @param object $smartySetCache
     * @param int $smartyCacheLifetime
     * @param bool $smartyCompileCheck
     * @param bool $smartyDebugging
     */
    public function __construct(

        private readonly string $smartyTemplateDir = APPPATH . 'Views',
        private readonly string $smartyCompileDir = WRITEPATH . 'smarty/template_c/',
        private readonly string $smartyConfigDir = WRITEPATH . 'smarty/config',
        private readonly string $smartyCacheDir = WRITEPATH . 'Smarty/Cache',
        private readonly object $smartySetCache = Smarty::CACHING_LIFETIME_CURRENT,
        private readonly int $smartyCacheLifetime = 60 * 60 * 24,
        /* ---------------------------------------------------
         * $smarty->setCompileCheck(true);
         * Check for file changes and recompile cache.
         * Set false for production to reduce overhead.
         * --------------------------------------------------- */
        private readonly bool $smartyCompileCheck = false,
        private readonly bool $smartyDebugging = false,
    ) {}

    /**
     * SmartyInstance
     * -------------------------------------------------------
     * SmartyInstance is a static class to implement Smarty
     * templat engine via MyInterface.
     *
     * @return mixed SmartyInstance
     */
    public static function SmartyInstance(): SmartyInstance
    {
        //Check if the instance is already created.
        if (is_null(self::$smartyInstance)) {
            //Create a new Smarty instance if is_null is true.
            self::$smartyInstance = new Smarty();
            //Create a new instance of MyController and assign it to $myControllerInstance.
            self::$myControllerInstance = new MyController();

            //Set Smarty configuration using initialized read-only properties from the constructor.
            self::$smartyInstance->setTemplateDir(self::$myControllerInstance->smartyTemplateDir);
            self::$smartyInstance->setCompileDir(self::$myControllerInstance->smartyCompileDir);
            self::$smartyInstance->setConfigDir(self::$myControllerInstance->smartyConfigDir);
            self::$smartyInstance->setCacheDir(self::$myControllerInstance->smartyCacheDir);
            self::$smartyInstance->setCaching(self::$myControllerInstance->smartySetCache);
            self::$smartyInstance->setCacheLifetime(self::$myControllerInstance->smartyCacheLifetime);
            self::$smartyInstance->setCompileCheck(self::$myControllerInstance->smartyCompileCheck);
            self::$smartyInstance->setDebugging(self::$myControllerInstance->smartyDebugging);
        }

        //Return the instance.
        return self::$smartyInstance;
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

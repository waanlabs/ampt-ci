<?php
/**
 * MyController
 * ------------------------------------------------------------
 * @package    ampt-ci.service.app
 * @subpackage Core
 * @author     Waan <admin@waan.email>
 * @copyright  Copyright (c) 2021, www.waan.io
 * @license    www.waan.io (Waan LLC)
 * @link       https://www.waan.io
 * @version    Version 1.0.0
 * @source     MyController.php
 * ------------------------------------------------------------
 */

/**
 * Namespace (Package) Definition
 * ------------------------------------------------------------
 */

namespace App\Core;

/**
 * Use (Import) Statement(s) Definition
 * ------------------------------------------------------------
 */

use App\Controllers\BaseController as BaseController;
use CodeIgniter\HTTP\RequestInterface as RequestInterface;
use CodeIgniter\HTTP\ResponseInterface as ResponseInterface;
use Psr\Log\LoggerInterface as LoggerInterface;
use Smarty as Smarty;

class MyController extends BaseController implements MyInterface
{
    private static Smarty|null $smartyInstance = null;

    /**
     * Constructor
     * ------------------------------------------------------------
     * Constructor for MyController; __get() and __set() methods
     * are defined at runtime using read-only properties.
     *
     * @param string $smartyTemplateDir
     * @param string $smartyCompileDir
     * @param string $smartyConfigDir
     * @param string $smartyCacheDir
     * @param int $smartySetCache
     * @param int $smartyCacheLifetime
     * @param bool $smartyCompileCheck
     * @param bool $smartyDebugging
     */
    public function __construct(

        public readonly string $smartyTemplateDir = APPPATH . 'Views',
        public readonly string $smartyCompileDir = WRITEPATH . 'smarty/template_c/',
        public readonly string $smartyConfigDir = WRITEPATH . 'smarty/config',
        public readonly string $smartyCacheDir = WRITEPATH . 'Smarty/Cache',
        public readonly int $smartySetCache = Smarty::CACHING_LIFETIME_CURRENT,
        public readonly int $smartyCacheLifetime = 60 * 60 * 24,
        /* ------------------------------------------------------------
         * $smarty->setCompileCheck(true);
         * Check for file changes and recompile cache.
         * Set false for production to reduce overhead.
         * ------------------------------------------------------------ */
        public readonly bool $smartyCompileCheck = false,
        public readonly bool $smartyDebugging = false,
    ) {}

    /**
     * SmartyInstance function
     * ------------------------------------------------------------
     * SmartyInstance is a class to implement Smarty
     * template engine via MyInterface.
     *
     * @return Smarty Smarty
     */
    public function SmartyInstance(): Smarty
    {
        //Check if the instance is already created.
        if (self::$smartyInstance === null) {
            //Create a new Smarty instance.
            self::$smartyInstance = new Smarty();

            //Set Smarty configuration using properties from the constructor.
            self::$smartyInstance->setTemplateDir($this->smartyTemplateDir);
            self::$smartyInstance->setCompileDir($this->smartyCompileDir);
            self::$smartyInstance->setConfigDir($this->smartyConfigDir);
            self::$smartyInstance->setCacheDir($this->smartyCacheDir);
            self::$smartyInstance->setCaching($this->smartySetCache);
            self::$smartyInstance->setCacheLifetime($this->smartyCacheLifetime);
            self::$smartyInstance->setCompileCheck($this->smartyCompileCheck);
            self::$smartyInstance->setDebugging($this->smartyDebugging);
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

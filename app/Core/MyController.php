<?php

/**
 * MyController
 * ----------------------------------------------------------------------------
 * @package    \App\Core\MyController
 * @author     Waan <admin@waan.email>
 * @copyright  Copyright (c) 2022, www.waan.io
 * @license    MIT License (http://www.opensource.org/licenses/mit)
 * @link       https://www.waan.io
 * @version    Version 1.0.0
 * @source     MyController.php
 */

/**
 * Namespace (Package) Definition
 * ----------------------------------------------------------------------------
 */

namespace App\Core;

/**
 * Use (Import) Statement(s) Definition
 * ----------------------------------------------------------------------------
 */

use App\Controllers\BaseController as BaseController;
use CodeIgniter\HTTP\RequestInterface as RequestInterface;
use CodeIgniter\HTTP\ResponseInterface as ResponseInterface;
use Psr\Log\LoggerInterface as LoggerInterface;
use Smarty as Smarty;

/**
 * MyController
 * ----------------------------------------------------------------------------
 * MyController is a user defined base controller which provides a set of
 * custom functions.
 *
 * Ex - template engine, session, database, etc.
 *
 * *Important:
 * *Make sure to extend MyController instead of BaseController and add any
 * *custom function required.
 *
 * ?Note:
 * ?The idea of the MyInterface is to specify the behavior of a class by
 * ?providing an abstract type. This is a best practice to approach for coding.
 * ?user can disregard this interface if not required.
 */
class MyController extends BaseController implements MyInterface
{
    /**
     * SmartyInstance
     * ------------------------------------------------------------------------
     * SmartyInstance to hold instance of a Smarty object.
     * !Critical:
     * !Type Smarty is not defined since the Smarty class is added through
     * !composer at the build.
     *
     * @access private
     * @access static
     * @var null|Smarty $smartyInstance
     */
    private static ?Smarty $smartyInstance = null;

    /**
     * Constructor
     * ------------------------------------------------------------------------
     * Constructor for MyController;__set() methods are defined at runtime
     * using read-only properties.
     *
     * *Important:
     * *Declaration below is similar to at runtime.
     * *class Sample {
     *
     * *    public readonly string $sample;
     *
     * *    public function __construct(string $sample) {
     *
     * *        $this->sample = $sample;
     * *    }
     * *}
     *
     * ?Note: Constructor.
     * @access public
     *
     * ?Note: Variables
     * @access public
     * @access readonly
     * @param string $smartyTemplateDir
     * @param string $smartyCompileDir
     * @param string $smartyConfigDir
     * @param string $smartyCacheDir
     * @param int $smartySetCache
     * @param int $smartyCacheLifetime
     * @param bool $smartyCompileCheck
     * @param bool $smartyDebugging
     * @return void
     */
    public function __construct(
        public readonly string $smartyTemplateDir = APPPATH . 'Views',
        public readonly string $smartyCompileDir = WRITEPATH . 'smarty/template_c/',
        public readonly string $smartyConfigDir = WRITEPATH . 'smarty/config',
        public readonly string $smartyCacheDir = WRITEPATH . 'Smarty/Cache',
        public readonly int $smartySetCache = Smarty::CACHING_LIFETIME_CURRENT,
        public readonly int $smartyCacheLifetime = 60 * 60 * 24,
        /* --------------------------------------------------------------------
           $smarty->setCompileCheck(true);
           Check for file changes and recompile cache.
           Set false for production to reduce overhead.
           -------------------------------------------------------------------- */
        public readonly bool $smartyCompileCheck = false,
        public readonly bool $smartyDebugging = false,
    ) {}

    /**
     * SmartyInstance function
     * ------------------------------------------------------------------------
     * SmartyInstance initialize Smarty template engine via MyInterface.
     *
     * @access public
     * @param void absent
     * @return Smarty Smarty
     * @see /APP/Controller/MyInterface.php for more information.
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

    /**
     * initController function
     * ------------------------------------------------------------------------
     * Calls parent constructor (initController) in baseController.
     *
     * ?Note:
     * ?BaseController::initController() or parent::__construct().
     *
     * @access public
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param LoggerInterface $logger
     * @return void
     */
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ): void {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
}
/*  End of the file MyController.php  */
/*  Location: ./app/Core/MyController.php  */

<?php
/**
 * MyInterface
 * ----------------------------------------------------------------
 * @package    ampt-ci.app.core
 * @subpackage interface
 * @author     Waan <admin@waan.email>
 * @copyright  Copyright (c) 2022, www.waan.io
 * @license    MIT
 * @link       https://www.waan.io
 * @version    Version 1.0.0
 * @source     MyInterface.php
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
//Use/import statements are not required for an interface.

/**
 * MyInterface
 * ----------------------------------------------------------------
 * MyInterface provides a Home controller is the initialization
 * point of the application providing a loader for index page.
 *
 */
interface MyInterface
{
    /**
     * SmartyInstance
     * ----------------------------------------------------------------
     * SmartyInstance provides an interface to implement Smarty
     * templat engine.
     *
     * @return SmartyInstance SmartyInstance
     */
    public static function SmartyInstance(): SmartyInstance;
}

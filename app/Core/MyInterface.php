<?php

/**
 * MyInterface
 * ----------------------------------------------------------------------------
 * @package    \App\Core\MyInterface
 * @author     Waan <admin@waan.email>
 * @copyright  Copyright (c) 2022, www.waan.io
 * @license    MIT License (http://www.opensource.org/licenses/mit)
 * @link       https://www.waan.io
 * @version    Version 1.0.0
 * @source     MyInterface.php
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

use Smarty as Smarty;

/**
 * MyInterface
 * ----------------------------------------------------------------------------
 * MyInterface provides a set of functions for user to implement.
 *
 * Ex - template engine, database, etc.
 *
 * *Important:
 * *view /APP/Controller/MyController.php for custom Smarty implementation.
 */
interface MyInterface
{
    /**
     * SmartyInstance
     * ------------------------------------------------------------------------
     * SmartyInstance provides an interface to implement Smarty template engine.
     *
     * @access public
     * @param void absent
     * @return Smarty Smarty
     * @see /APP/Controller/MyController.php for implementation
     */
    public function SmartyInstance(): Smarty;
}

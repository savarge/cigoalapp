<?php
/*
 * @copyright Copyright (c) 2013 SAVAGEBYTES
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        
    }

}
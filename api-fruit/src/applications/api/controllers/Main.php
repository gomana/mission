<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;
define('JWT_SECRET', 'xcdexc');


class Main extends REST_Controller
{
    
    function __construct()
    {
        parent::__construct();        
    }

    public function index()
    {   
        echo "api test";
    }
   
}


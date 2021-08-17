<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Router class */
require SHAREDPATH."third_party/MX/Config.php";

class CS_Config extends MX_Config {
public $_config_paths =	array(APPPATH,SHAREDPATH);
}
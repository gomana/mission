<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require SHAREDPATH."third_party/MX/Loader.php";

class CS_Loader extends MX_Loader {
    protected $_ci_view_paths =	array(VIEWPATH	=> TRUE, SHAREDPATH.'views/'=>TRUE);
    protected $_ci_library_paths =	array(APPPATH, SHAREDPATH, BASEPATH);
    protected $_ci_model_paths =	array(APPPATH, SHAREDPATH);
    protected $_ci_helper_paths =	array(APPPATH,SHAREDPATH, BASEPATH);
    
}
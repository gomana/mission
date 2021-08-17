<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

/* load the MX_Router class */
 require SHAREDPATH."third_party/MX/Controller.php";
// echo SHAREDPATH;
class CS_Controller extends MX_Controller
{
    public $layout=null;
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
        $this->load->helper('url');
        $this->load->helper('basic_helper');
        $this->load->helper('valid_helper');
        $this->load->helper('event_helper');
        $this->load->helper('device_helper');
    }
    //상속받는 컨트롤에서 재설정
    protected function _layout($layoutPath = null){
        // if(is_null($this->layout)){
        $this->layout = $layoutPath;
        //  }
    }
    


}


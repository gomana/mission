<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Authority extends  REST_Controller{
    
    protected $ci = null;
    
    
    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
    }
    /**
     * This function used to block the every request except allowed ip address
     */
    function checkAccessToken(){

        $seg = $this->uri->segment(1);

        if($seg !== "token"){
            //Authorization 체크
            $Authorization = $this->ci->input->get_request_header('Authorization');
            
            //
            $response = array(
               "Authorization" =>$Authorization
            );
    
            log_message("error", "** Authorization ** ".$Authorization);
            log_message("error", "** JWT_SECRET ** ".JWT_SECRET);
    
            $flag = false; //유효성 체크
            if(!empty($Authorization)){
                try {
                    $decoded = JWT::decode($Authorization, JWT_SECRET, array('HS256'));
                    $decoded_array = (array)$decoded;
                    /**
                     array(2) {
                        ["iat"]=>
                        int(1629211074)
                        ["exp"]=>
                        int(1629211674)
                        }
                     */
                    $flag = true;
 
                } catch (Exception $e) {
                    //JWT 만료
                    log_message("error", $e->getMessage());
                }

            }
    
            //log_message("error", "** Authorization flag ** ".$flag);
    
            if( !$flag){
                $this->response(  $response , REST_Controller::HTTP_BAD_REQUEST );
                exit;
            }
        }
    }
}
?>
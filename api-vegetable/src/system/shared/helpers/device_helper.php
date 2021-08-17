<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * device helper
 *
 */

/**
 * 장치별로 뷰 경로
 */

    function getDeviceViewPath()
    {
        $path = "/";
        if(checkMobile()){
            $path = "/";
        }else{
            $path = "/web/";
        }
           
        return $path;
    }
    

    
    function getDeviceType()
    {
        $ci =& get_instance();
        
        //$ci->load->helper('url');
        $ci->load->library('user_agent');
        
        //1차
        $device = ($ci->agent->is_mobile()) ? "M" : "P";
        
        //2차
//         $url_parts = parse_url(current_url());
//         $url_parts['host'];
//         $device = getDeviceByDomain($url_parts['host']);
        
//         //log_message("debug", " ********************************* device ===> ".$device);

        return $device;

    }
    
    function checkMobile() {
        return getDeviceType() == "M" ? true : false;
    }
    



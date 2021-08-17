<?php

/**
 *  작성자 : 김도영
 *  작성일 : 2019-02-12
 *  설   명  : 주문
 *  수정일 :
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Event_config_model extends CI_Model {
    
    /**
     *
     * @var ci
     */
    protected  $ci = null;
    
    function __construct()
    {
        parent::__construct();
        
        $this->ci =& get_instance();
        
        $this->ci->load->helper('event_helper');
    }


    
    function get_all_config() {
        $sql = "
           select *
           from TB_EVENT_CONFIG
            WHERE  USE_YN='Y'
        ORDER BY CODE_GROUP, DISPLAY_SORT
            
        ";
        
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    
    function get_goods() {
        $sql = "
           select *
           from TB_GOODS_CODE
        ORDER BY GOODS_CODE
            
        ";
        
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
 
}
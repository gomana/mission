<?php

class Product_model extends CS_Model {

    function __construct()
    {    	
        parent::__construct();
    }

    //목록조회
    function getList() {
        $sql = "
            select P_NAME
            from TB_PRODUCT where C_CODE='fruit'
        ";
        
        $arr = array();
        $query = $this->db->query($sql);  
        foreach ($query->result_array() as $row)
        {
            $arr[] =  $row['P_NAME'];
        }

        return $arr;
    }

    //가격조회
    function getPrice($param) {
        $sql = "
            select *    
            from TB_PRODUCT where C_CODE='fruit' and P_NAME='$param'
            limit 1
        ";
        
        $query = $this->db->query($sql);
        
        $row = $query->row_array();
        
        return $row['P_PRICE'];
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CS_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        //$this->load->model("entry_model");
        //$this->load->model("coupon_model");
        
        $this->data['layout_info'] = array(
            "css_wrap"=>"main",
            "css_contents"=>"",
            "sub_title"=>"메인 임시",
        );
        
        //레이아웃 설정
        $this->_layout('layouts/layout_main');
        
    }
    
    public function index()
    {   
        //view 지정
        $this->data['contentView'] =  'main';        

        return $this->load->view($this->layout, $this->data);
    }

    public function test(){
        $response =array("one"=> 1);
        echo json_encode($response);
    }
   
}


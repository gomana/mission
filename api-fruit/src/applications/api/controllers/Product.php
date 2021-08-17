<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Product extends REST_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->model("product_model");
    }

    public function index()
    {
        $response = array(
        );

        $http_status = REST_Controller::HTTP_OK;

        if( $this->input->method() == "get" ){
            $p_name = $this->input->get('name');
            log_message("debug", "p_name: ".$p_name);
            if( !empty($p_name) ){ //가격조회

                $p_price = $this->product_model->getPrice($p_name);
                
                log_message("debug", "p_price: ".$p_price);

                if(empty($p_price)){
                    $p_price = 0 ;
                    $http_status = REST_Controller::HTTP_BAD_REQUEST;
                }
                
                $response["name"] = $p_name;
                $response["price"] = $p_price;

            }else{ //목록 조회
                $response = $this->product_model->getList();
            }
            
        }else{
           $http_status = REST_Controller::HTTP_BAD_REQUEST;
       }

        $this->response(  $response , $http_status);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


abstract class REST_Controller extends CS_Controller {


    const HTTP_OK = 200;

    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;

    protected $response = NULL;

    public function __construct()
    {  
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Authorization, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        
        //preflight 처리
        if( $method == 'OPTIONS') {
            die();
        }

        parent::__construct();
    }

    public function response($data = NULL, $http_code = NULL)
    {
		ob_start();

        if (!empty($http_code)){
            $http_code = (int) $http_code;
        }

        if (empty($data) && empty($http_code)){
            $http_code = self::HTTP_NOT_FOUND;
        }

        //출력 정보
        $output = json_encode($data);

        $this->output->set_content_type('application/json');
        $this->output->set_status_header($http_code);
        $this->output->set_output($output);

        ob_end_flush();
    }


}

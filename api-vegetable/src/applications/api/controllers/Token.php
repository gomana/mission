<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Token extends REST_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {   
        //리턴
        $result = array(
        );
     
        $issuedAt = time(); //생성일
        $expirationTime = $issuedAt + 6000;  // 생성후 100분뒤 만료
        $payload = array(
            'iat' => $issuedAt, //생성일
            'exp' => $expirationTime //만료일
        );

        $alg = 'HS256'; //대칭키 알고리즘
        $jwt = JWT::encode($payload, JWT_SECRET, $alg);
        //$result['accessToken'] = $jwt; 
        
        //응답헤더 쿠기로 저장
        $this->output->set_header('Set-Cookie: '.$jwt.'; Path=/'); 
        //$this->response(  $result , REST_Controller::HTTP_OK);
    }
   
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');



function vaildPhoneNumberHypen($param){
    $rgx = "/^\d{3}-\d{3,4}-\d{4}$/";
    return preg_match($rgx, $param);
}

function vaildPhoneNumber($param){
    $rgx = "/^\d{3}\d{3,4}\d{4}$/";
    return preg_match($rgx, $param);
}

//연락처
function vaildContactNumber($param){
    $rgx = "/^\d{2,3}\d{3,4}\d{4}$/";
    return preg_match($rgx, $param);
}

function vaildEmail($param){
    $rgx = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
    return preg_match($rgx, $param);
}

function validSOEID($param){
    $rgx = "/^[A-Za-z]{2}\d{5}$/";
    return preg_match($rgx, $param);
}

function validHangle($param){
    $rgx = "/^[\xa1-\xfe0]+$/";
    return preg_match($rgx, $param);
}

function validBirthday($param) {
    $rgx = "/^(19[0-9][0-9]|20\d{2})(0[0-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])$/";
    return preg_match($rgx, $param);
}

function validCustNum($param) {
    $rgx = "/^\d{10}$/";
    return preg_match($rgx, $param);
}

function validCouponNo($param) {
    $rgx = "/^[C|M|V|B|R|U|P|T|J|X]{1}\d{16}$/";
    return preg_match($rgx, $param);
}

function validYmdHypen($param) {
    $rgx = "/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
    return preg_match($rgx, $param);
}



function validDigital($param) {
    $rgx = "/^\d{1,11}$/";
    return preg_match($rgx, $param);
}


function birthdayWithHyphen($param){
    
    //preg_match('/(\d{3})(\d{4})(\d{4})/', $param, $matches);
    //return implode('-', $matches);
    
    if(!empty($param)){
        return preg_replace("/^(\d{4})(\d{2})(\d{2})$/", "$1-$2-$3", $param);
    }
}

function contactWithHyphen($param){
    
    //preg_match('/(\d{3})(\d{4})(\d{4})/', $param, $matches);
    //return implode('-', $matches);
    
    if(!empty($param)){
        return preg_replace("/^(\d{2,3})(\d{3,4})(\d{4})$/", "$1-$2-$3", $param);
    }
}
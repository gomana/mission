<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function getDateDays($startDate, $endDate){
//     echo $startDate;
//     echo $endDate;
    $dStart = new DateTime( $startDate );
    $dEnd  = new DateTime( $endDate );
    $dDiff = $dStart->diff($dEnd);
    
    $days = $dDiff->days;
    
    
    $date_days = array();
    while($days >= 0){
        $date_day = date("Ymd", strtotime('-'.$days.' days', strtotime($endDate)));
        
        //echo $date_day;
        $date_days[]  = $date_day;
        
        $days = $days - 1;
    }
    
    return $date_days;
    
}

function getAllConfig(){
    $ci =& get_instance();
    $ci->load->config("event");
    $config = $ci->config->item("all_config");
    
    return  $config;
}

function getDomainOnDB(){
    $configs =  getAllConfig();
    
    $result = null;
    foreach($configs as $row){
        if($row['CODE_GROUP'] == 'DOMAIN'){
            $result =$row;
        }
    }
    
    return $result;
}

function getEventStartDate(){
    
    $configs =  getAllConfig();
    
    $result = "";
    foreach($configs as $row){
        if($row['CODE'] == 'EVENT_START_DATE'){
            $result = $row['CODE_VALUE'];
            break;
        }
    }
    
    return $result;
}

function getEventEndDate(){
    
    $configs =  getAllConfig();
    
    $result = "";
    foreach($configs as $row){
        if($row['CODE'] == 'EVENT_END_DATE'){
            $result = $row['CODE_VALUE'];
                break;
        }
    }
    
    return $result;
}


function getEventEndTime(){
    
    $configs =  getAllConfig();
    
    $result = "";
    foreach($configs as $row){
        if($row['CODE'] == 'EVENT_END_TIME'){
            $result = $row['CODE_VALUE'];
            break;
        }
    }
    
    return $result;
}



function getEventStartDate2(){
    
    $configs =  getAllConfig();
    
    $result = "";
    foreach($configs as $row){
        if($row['CODE'] == 'EVENT_START_DATE2'){
            $result = $row['CODE_VALUE'];
            break;
        }
    }
    
    return $result;
}

function getEventEndDate2(){
    
    $configs =  getAllConfig();
    
    $result = "";
    foreach($configs as $row){
        if($row['CODE'] == 'EVENT_END_DATE2'){
            $result = $row['CODE_VALUE'];
            break;
        }
    }
    
    return $result;
}


function getEventEndTime2(){
    
    $configs =  getAllConfig();
    
    $result = "";
    foreach($configs as $row){
        if($row['CODE'] == 'EVENT_END_TIME2'){
            $result = $row['CODE_VALUE'];
            break;
        }
    }
    
    return $result;
}

function getMediaCateList() {
    $configs =  getAllConfig();
    
    $result = array();
    foreach($configs as $row){
        if($row['CODE_GROUP'] == 'MEDIA_CATE'){
            $result[] =$row;
        }
    }
    
    return $result;
}


function getMediaCateName($code) {
    $codeName = "";
    foreach(getMediaCateList() as $row){
        if($row['CODE'] == $code){
            $codeName =$row['CODE_NAME'];
            break;
        }
    }
    
    return $codeName;
}



function getUserTypeList() {
    $configs =  getAllConfig();
    
    $result = array();
    foreach($configs as $row){
        if($row['CODE_GROUP'] == 'USER_TYPE'){
            $result[] =$row;
        }
    }
    
    return $result;
}

function getUserTypeName($code) {
    $codeName = "";
    foreach(getUserTypeList() as $row){
        if($row['CODE'] == $code){
            $codeName =$row['CODE_NAME'];
            break;
        }
    }
    
    return $codeName;
}

function getUploadList() {
    $configs =  getAllConfig();
    
    $result = array();
    foreach($configs as $row){
        if($row['CODE_GROUP'] == 'UPLOAD'){
            $result[] =$row;
        }
    }
    
    return $result;
}

function getUploadPath() {
    $codeName = "";
    foreach(getUploadList() as $row){
        if($row['CODE'] == "upload_path"){
            $codeName =$row['CODE_VALUE'];
            break;
        }
    }
    
    return $codeName;
}

function getUploadUrl() {
    $codeName = "";
    foreach(getUploadList() as $row){
        if($row['CODE'] == "upload_url"){
            $codeName =$row['CODE_VALUE'];
            break;
        }
    }
    
    return $codeName;
}


function getYoutubeIdFromUrl($url) {
    $match = array();
    $youtube_id = null;
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    if(count($match) > 0){
        $youtube_id = $match[1];
    }
    
    return $youtube_id;
}

function getYoutubeThumbnail($video_id, $type = "0") {
    $url = "";
    if($type == "0"){
        $url = "https://img.youtube.com/vi/$video_id/0.jpg";
    }
    return $url;
}


function getGoodsList() {
    $ci =& get_instance();
    $ci->load->config("event");
    $goods = $ci->config->item("goods");
    
    return $goods;
}


function getLosingTicket() {
    
    $qang = null;
    foreach (getGoodsList() as $goods){
        if($goods['LOSING_TICKET'] == "Y" ){
            $qang = $goods;
            break;
        }
    }
    
    return $qang;
}



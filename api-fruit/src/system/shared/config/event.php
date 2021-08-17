<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$ci =& get_instance();
$ci->load->model('event_config_model');


$config['all_config'] = $ci->event_config_model->get_all_config();

$config['goods'] = $ci->event_config_model->get_goods();

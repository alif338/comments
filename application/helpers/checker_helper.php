<?php 
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

if (!function_exists('check_login')) {
  function AuthUser($listLevel = array())
  {
    // $CI = &get_instance();
    // $username = $CI->session->userdata('username');
    // $level = $CI->session->userdata('level');

    // if(!in_array($level, $listLevel)){
    //   return false;
    // }
    // if($username == null || $level == null){
    //   return false;
    // }

    // return true;
  }
}

if(!function_exists("activeMenu")){
  function activeMenu(string $menu, string $value){
    return $menu == $value ? "active" : "";
  }
}

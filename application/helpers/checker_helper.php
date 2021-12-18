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

if(!function_exists("tanggalIndo")){
  function tanggalIndo($date)
  {
      $result = "";
      if($date != "" && $date != null){
          $date = date("Y-m-d", strtotime($date));
          $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

          $pecah = explode("-", $date);

          $result =  $pecah[2] . " " . $bulan[(int)$pecah[1] - 1] . " " . $pecah[0];
      }
      return $result;
  }
}

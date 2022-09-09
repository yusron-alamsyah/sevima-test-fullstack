<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('format_number')) {
    /**
     * Method to formating number
     *
     * @param string $number
     * @return void
     */
	function format_number($number = ""){
		return number_format($number, 0, ',',',');
	}
}

if (!function_exists('post')){
    /**
     * Method to get parameter post
     *
     * @param [type] $input
     * @param boolean $check
     * @return string
     */
	function post($input,$check=true){
		$CI = &get_instance();
        if($check){
		  return $CI->input->post($input);
        }else{
            return $CI->input->post($input);
        }
	}
}

if (!function_exists('get')){
    /**
     * Method to get parameter
     *
     * @param [type] $input
     * @return string
     */
	function get($input){
		$CI = &get_instance();
		return $CI->input->get($input);
	}
}

if (!function_exists('successResponse')){
    /**
     * Method to return success respon
     *
     * @param [type] $message
     * @param [type] $redirect
     * @return void
     */
    function successResponse($message,$redirect = null){
        header('Content-Type: application/json; charset=utf-8');
        $json_data =  array(
            "result" => TRUE ,
            "message" => array('head'=> 'Success', 'body'=> $message),
            "form_error" => "",
            "redirect" => $redirect
        );

        echo json_encode($json_data);
        return;
    }
}

if (!function_exists('unprocessResponse')){
    /**
     * Method to return error respon
     *
     * @param [type] $message
     * @param [type] $form_error
     * @param [type] $redirect
     * @return void
     */
    function unprocessResponse($message,$form_error = null,$redirect= null){
        header('Content-Type: application/json; charset=utf-8');
        $json_data =  array(
            "result" => FALSE ,
            "message" => array('head'=> 'Failed', 'body'=> $message),
            "form_error" => $form_error,
            "redirect" => $redirect
        );

        echo json_encode($json_data);
        return;
    }
}

if (!function_exists('cekLogin')){
    /**
     * Method to check auth login
     *
     * @return void
     */
    function cekLogin(){
    if(empty($_SESSION['log_session'])){
        redirect("login/");	
    }else{
        // redirect("login/home");	
    }

  }
}

if (!function_exists('displayError')){
    /**
     * Method to display error
     *
     * @param [type] $list_error
     * @return void
     */
    function displayError($list_error){
        $return  = "";
        foreach ($list_error as $key => $value) {
            $return .= "- ".$value.'<br>';
        }

        return $return;


  }
}
if (!function_exists('generateTransactionCode')){
    /**
     * Method to generete code trans
     *
     * @param [type] $input
     * @param string $prefix
     * @return void
     */
    function generateTransactionCode($input, $prefix = 'MG') {
        while (strlen($input) < 3) $input = '0'.$input;
        return $prefix.date("ym").$input;
    }
}
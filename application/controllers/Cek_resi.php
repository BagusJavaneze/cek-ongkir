<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_resi extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index(){	
        if($this->input->is_ajax_request()):
            $nomor_resi = $this->input->post('nomor_resi');
            $cek_resi = $this->_cek_resi_pos($nomor_resi);
            
            if(!empty($cek_resi)){
                echo '<pre>';
                print_r($cek_resi);
                echo '</pre>';
            }
            else{
                print $cek_resi;
            }
        else:
            exit('Access Forbidden!');
        endif;
	}

    private function _cek_resi_pos($nomor_resi){
        $parameter = array(
            CURLOPT_RETURNTRANSFER=>TRUE,
            CURLOPT_SSL_VERIFYPEER=>FALSE,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "aftership-api-key: 0326e513-1fda-41aa-922d-c79aef8c0ca9"
            )
        );

        $this->curl->create('https://api.aftership.com/v4/trackings/pos-indonesia/'.$nomor_resi);
        $this->curl->options($parameter);
        $response = $this->curl->execute();
        return json_decode($response, true);
    }

    private function _get_all_couriers(){
        $parameter = array(
            CURLOPT_RETURNTRANSFER=>TRUE,
            CURLOPT_SSL_VERIFYPEER=>FALSE,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "aftership-api-key: 0326e513-1fda-41aa-922d-c79aef8c0ca9"
            )
        );

        $this->curl->create('https://api.aftership.com/v4/couriers');
        $this->curl->options($parameter);
        $response = $this->curl->execute();
        return json_decode($response, true);
    }

}

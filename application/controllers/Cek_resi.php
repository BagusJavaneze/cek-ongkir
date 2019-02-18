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
                $data = ['html_data' => $cek_resi];
                $view = $this->load->view('hasil_resi', $data, TRUE);
                print $view;
            }
            else{
                print $cek_resi;
            }
        else:
            exit('Access Forbidden!');
        endif;
	}

    private function _cek_resi_pos($nomor_resi){
        /*$parameter = array(
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
        return json_decode($response, true);*/

        $base = "https://track.aftership.com/pos-indonesia/$nomor_resi?";
        $parameter = array(
            CURLOPT_SSL_VERIFYPEER=>FALSE,
            CURLOPT_HEADER=>FALSE,
            CURLOPT_FOLLOWLOCATION=>TRUE,
            CURLOPT_RETURNTRANSFER=>TRUE,
            
        );
        $this->curl->create($base);
        $this->curl->options($parameter);
        $response = $this->curl->execute();

        // remove unneeded string
        $final_response = $this->_process_html($response);

        return $final_response;
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

    private function _process_html($html){
        $start = "<div class=\"checkpoints\">";
        $end   = "Date & time are usually";
        $startPosisition = strpos($html, $start);
        $endPosisition   = strpos($html, $end); 
        
        $longText = $endPosisition - $startPosisition;
        $result = substr($html, $startPosisition, $longText);
        
        $str = trim($result);
        $search = array ("'Indonesia'");
        $replace = array ("");
    
        $string = preg_replace($search, $replace, $str);
        $final_string = preg_replace("/\r|\n/", "", $string);

        if ( !write_file('./assets/hasil_resi.html', $final_string) ){
             return 'Unable to write the file';
        }
        
        return $final_string;
    }

}

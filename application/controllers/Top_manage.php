<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Top_manage extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Top_model');
        $this->load->model('Gacha_model');
        // $this->load->library('encrypt');
    }

    public function index() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $data['list'] = $this->Top_model->get_top_image();
        $data['gachalist'] = $this->Gacha_model->get_all_gacha();
        $data['latest'] = $this->Gacha_model->get_latest_gacha();
        $this->load->view('manage/header.php');
        $this->load->view('manage/top.php',$data);
        $this->load->view('manage/footer.php');
    }
    public function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function upload_image() {  
          
        if(isset($_FILES["upload_image"]))  
        {  
            $path = "upload/topimage";
            $maxsize = "2097152";
            $fileinfo = @getimagesize($_FILES["upload_image"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            if(($_FILES['upload_image']['size'] >= $maxsize) || ($_FILES['upload_image']['size'] == 0) || $width != "1920" || $height != "1080" ) {
                $new_name = 'file_error';
            } else {
                $extension = explode(".", $_FILES["upload_image"]["name"]);
                $new_name = $this->generateRandomString().'.'.$extension[1];  
                $destination = $path.'/'. $new_name;  
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                move_uploaded_file($_FILES['upload_image']['tmp_name'], $destination);
            }  
            return $new_name;  
        }  
    } 
    public function upload_image_square() {  
        if(isset($_FILES["upload_image"]))  
        {  
            $path = "upload/topimage";
            $maxsize = "2097152";
            $fileinfo = @getimagesize($_FILES["upload_image"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            if(($_FILES['upload_image']['size'] >= $maxsize) || ($_FILES['upload_image']['size'] == 0) || $width != $height) {
                $new_name = 'file_error';
            } else {
                $extension = explode(".", $_FILES["upload_image"]["name"]);
                $new_name = $this->generateRandomString().'.'.$extension[1];  
                $destination = $path.'/'. $new_name;  
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                move_uploaded_file($_FILES['upload_image']['tmp_name'], $destination);
            }  
            return $new_name;  
        }  
    }
    public function slide_image_setting_pc() {
        $image_id = $this->input->post('id');
        $topimage = $this->upload_image();
        if($topimage != "file_error" && $topimage != "" ) {
            $this->Top_model->update_top_image_pc($image_id, $topimage);
            $data['state'] = "success";
        } else {
            $data['state'] = "error";
        }
        echo json_encode($data);
    }
    public function slide_image_setting_sp() {
        $image_id = $this->input->post('id');
        $topimage = $this->upload_image_square();
        if($topimage != "file_error" && $topimage != "" ) {
            $this->Top_model->update_top_image_sp($image_id, $topimage);
            $data['state'] = "success";
        } else {
            $data['state'] = "error";
        }
        echo json_encode($data);
    }
}
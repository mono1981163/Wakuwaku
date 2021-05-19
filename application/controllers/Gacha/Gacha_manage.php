<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gacha_manage extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Gacha_model');
        $this->load->model('Prize_model');
        $this->load->helper('url');
    }

    public function index() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $this->load->view('manage/header.php');
        $this->load->view('manage/gacha.php');
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
    public function get_gacha()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $sql = "SELECT * FROM gachas ORDER BY gacha_id DESC";
        $query = $this->db->query($sql);
        $data = [];
        foreach($query->result() as $r) {
            $remarks = ($r->open_state) ? "公開" : "臨時";
            $data[] = array(
                 $r->gacha_id,
                 '<img src="'.base_url()."/upload/gacha/".$r->image.'">',
                 $r->name,
                 $r->price,
                 $r->start_date, 
                 $r->end_date,
                 $r->shipping_fee,
                 $r->estimated_delivery_time,
                 $remarks,
            );
        }
 
        $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $data
             );
       echo json_encode($result);
       exit();
    }

    public function upload_image($path)  
    {  
         if(isset($_FILES["upload_image"]))  
         {  
            $maxsize = "2097152";
            $fileinfo = @getimagesize($_FILES["upload_image"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            // if(($_FILES['upload_image']['size'] >= $maxsize) || ($_FILES['upload_image']['size'] == 0) || $width != "1920" || $height != "1080" ) {
            //     $new_name = 'file_error';
            // } else {
                $extension = (explode(".", $_FILES["upload_image"]["name"]));
                $new_name = $this->generateRandomString() . '.' . $extension[1];  
                $destination = $path.'/'. $new_name;  
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                move_uploaded_file($_FILES['upload_image']['tmp_name'], $destination);  
            // }
            return $new_name;  
         }  
    } 
    public function upload_image_sp($path)  
    {  
         if(isset($_FILES["upload_image_sp"]))  
         {  
            $maxsize = "2097152";
            $fileinfo = @getimagesize($_FILES["upload_image_sp"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            // if(($_FILES['upload_image_sp']['size'] >= $maxsize) || ($_FILES['upload_image_sp']['size'] == 0) || $width != $height) {
            //     $new_name = 'file_error';
            // } else {
                $extension = (explode(".", $_FILES["upload_image_sp"]["name"]));
                $new_name = $this->generateRandomString() . '.' . $extension[1];  
                $destination = $path.'/'. $new_name;  
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                move_uploaded_file($_FILES['upload_image_sp']['tmp_name'], $destination);  
            // }
            return $new_name;  
         }  
    } 

    public function insert_single_gacha() {
        $update_data = array();
        $gacha_image = '';  
        $gacha_image_sp = '';
        $path = "upload/gacha";
        $gacha_image = $this->upload_image($path);
        $gacha_image_sp = $this->upload_image_sp($path);
        if(($gacha_image != "file_error" && $gacha_image != "") || ($gacha_image_sp != "file_error" && $gacha_image_sp != "" )) {
            $insert_data = array(
                'name'=>$this->input->post('name'),
                'price'=>$this->input->post('price'),
                'start_date'=>$this->input->post('start_date'),
                'end_date'=>$this->input->post('end_date'),
                'shipping_fee'=>$this->input->post('fee'),
                'estimated_delivery_time'=>$this->input->post('delivery_time'),
                'remarks'=>$this->input->post('remarks'),
                'image'=>$gacha_image,
                'image_sp'=>$gacha_image_sp,
            );
            $data['result'] = $this->Gacha_model->insert_single_gacha($insert_data);
            $insert_data = array(
                'name'=>$this->input->post('name_cn'),
                'price'=>$this->input->post('price_cn'),
                'start_date'=>$this->input->post('start_date_cn'),
                'end_date'=>$this->input->post('end_date_cn'),
                'shipping_fee'=>$this->input->post('fee_cn'),
                'estimated_delivery_time'=>$this->input->post('delivery_time_cn'),
                'remarks'=>$this->input->post('remarks_cn'),
                'image'=>$gacha_image,
                'image_sp'=>$gacha_image_sp,
            );
            $data['result'] = $this->Gacha_model->insert_single_gacha_cn($insert_data);
            $data['state'] = "success";
        } else {
            $data['state'] = "error";
        }  
        echo json_encode($data);
    }
    public function update_single_gacha() {
        $update_data = array();
        $gacha_id = $this->input->post('gacha_id');
        $gacha_image= $this->input->post('image');
        $gacha_image_sp= $this->input->post('image_sp');
        if(isset($_FILES['upload_image'])&& $_FILES['upload_image']['name'] != "") {
            $path = "upload/gacha";
            $gacha_image = $this->upload_image($path); 
        } 
        if(isset($_FILES['upload_image_sp'])&& $_FILES['upload_image_sp']['name'] != "") {
            $path = "upload/gacha";
            $gacha_image_sp = $this->upload_image_sp($path); 
        } 
        if(($gacha_image != "file_error" && $gacha_image != "") || ($gacha_image_sp != "file_error" && $gacha_image_sp != "") ) { 
            $update_data = array(
                'name'=>$this->input->post('name'),
                'price'=>$this->input->post('price'),
                'start_date'=>$this->input->post('start_date'),
                'end_date'=>$this->input->post('end_date'),
                'shipping_fee'=>$this->input->post('fee'),
                'estimated_delivery_time'=>$this->input->post('delivery_time'),
                'remarks'=>$this->input->post('remarks'),
                'image'=>$gacha_image,
                'image_sp'=>$gacha_image_sp,
            );
            $this->Gacha_model->update_single_gacha($gacha_id, $update_data);
            $update_data_cn = array(
                'name'=>$this->input->post('name_cn'),
                'price'=>$this->input->post('price_cn'),
                'start_date'=>$this->input->post('start_date_cn'),
                'end_date'=>$this->input->post('end_date_cn'),
                'shipping_fee'=>$this->input->post('fee_cn'),
                'estimated_delivery_time'=>$this->input->post('delivery_time_cn'),
                'remarks'=>$this->input->post('remarks_cn'),
                'image'=>$gacha_image,
                'image_sp'=>$gacha_image_sp,
            );
            $this->Gacha_model->update_single_gacha_cn($gacha_id, $update_data_cn);
            echo "success";
        } else {
            echo "error";
        }
    }

    public function delete_single_gacha() {
        $filename = $this->Gacha_model->delete_single_gacha($_POST["gacha_id"]);
        if (file_exists("upload/gacha/".$filename)) {
            unlink("upload/gacha/".$filename);
        }
        echo 'Data Deleted';  
    }

    public function new_gacha() { 
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $this->load->view('manage/header.php');
        $this->load->view('manage/newGacha.php');
        $this->load->view('manage/footer.php');
    }

    public function edit_gacha($gacha_id) { 
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $single_gacha = $this->Gacha_model->get_single_gacha($gacha_id);
        $single_gacha[0]['start_date'] = substr_replace($single_gacha[0]['start_date'],"T",10,1);
        $single_gacha[0]['end_date'] = substr_replace($single_gacha[0]['end_date'],"T",10,1);
        $data['gacha_ja'] = $single_gacha[0];
        // $data['prize_ja'] = $this->Prize_model->get_prizes_of_gacha($gacha_id);
        $single_gacha = $this->Gacha_model->get_single_gacha_cn($gacha_id);
        $single_gacha[0]['start_date'] = substr_replace($single_gacha[0]['start_date'],"T",10,1);
        $single_gacha[0]['end_date'] = substr_replace($single_gacha[0]['end_date'],"T",10,1);
        $data['gacha_cn'] = $single_gacha[0];
        // $data['prize_cn'] = $this->Prize_model->get_prizes_of_gacha_cn($gacha_id);

        // $data = $this->Gacha_model->get_single_gacha($gacha_id);
        $data['prize'] = $this->Prize_model->get_prizes_of_gacha($gacha_id);

        $this->load->view('manage/header.php');
        $this->load->view('manage/editGacha.php', $data);
        $this->load->view('manage/footer.php');
    }
    public function change_vogue_gacha() {
        $gacha_id = $this->input->post('id');
        $change_image = $this->input->post('image');
        if($change_image) {
            $result = $this->Gacha_model->change_vogue_gacha($gacha_id, $change_image);
        }
    }
    public function allowGacha() {
        $gacha_id = $this->input->post('gacha_id');
        $this->Gacha_model->allowGacha($gacha_id);
    }
}
d<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prize extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Gacha_model');
        $this->load->model('Prize_model');
    }

    public function edit($prize_id) {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $data = $this->Prize_model->get_single_prize($prize_id);
        $data['item_list'] = explode(")(", $data['item_list']);
        $data['item_list_cn'] = explode(")(", $data['item_list_cn']);
        $this->load->view('manage/header.php');
        $this->load->view('manage/prizeEdit.php', $data);
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
    public function get_all_items() {
        $prize_id = $this->input->post('prize_id');
        $data = $this->Prize_model->get_single_prize($prize_id);
        $data['item_list'] = explode(")(", $data['item_list']);
        if ($data['item_list'] != "") {
            echo json_encode($data['item_list']);
        } else {
            echo "error";
        }
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
                // $extension = end((explode(".", $_FILES["upload_image"]["name"])));
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
    public function insert_single_prize() {
        $prize_image = '';  
        $path = "upload/prize";
        $prize_image = $this->upload_image($path);  
        $gacha_id = $this->input->post('gacha_id');
        if($prize_image != "file_error" && $prize_image != "" ) {
            $prize_data= array(
                'prize_name'=>$this->input->post('prize_name'),
                'gacha_id'=>$this->input->post('gacha_id'),
                'goods'=>$this->input->post('goods'),
                'prize_img'=>$prize_image,
            );
            $this->Prize_model->insert_single_prize($prize_data);
            $prize_data_cn= array(
                'prize_name'=>$this->input->post('prize_name_cn'),
                'gacha_id'=>$this->input->post('gacha_id'),
                'goods'=>$this->input->post('goods_cn'),
                'prize_img'=>$prize_image,
            );
            $this->Prize_model->insert_single_prize_cn($prize_data_cn);
            echo "success";
        } else {
            echo "error";
        }
    }
    public function update_single_prize() {
        $update_data = array();
        $prize_id = $this->input->post('prize_id');
        $prize_img= $this->input->post('image');
        if(isset($_FILES['upload_image'])&& $_FILES['upload_image']['name'] != "") {
            $path = "upload/prize";
            $prize_img = $this->upload_image($path); 
        }

        if($prize_img != "file_error" && $prize_img != "" ) {
            $update_data = array(
                'prize_name'=>$this->input->post('prize_name'),
                'goods'=>$this->input->post('goods'),
                'prize_img'=>$prize_img,
            );
            $this->Prize_model->update_single_prize($prize_id, $update_data);
            $update_data_cn = array(
                'prize_name'=>$this->input->post('prize_name_cn'),
                'goods'=>$this->input->post('goods_cn'),
                'prize_img'=>$prize_img,
            );
            $this->Prize_model->update_single_prize_cn($prize_id, $update_data_cn);
            echo 'success';
        } else {
            echo 'erroasdfsafasdfr';
        }
    }
    public function insert_single_item() {
        $item_image = '';  
        $path = "upload/item";
        $item_image = $this->upload_image($path);  
        $prize_id = $this->input->post('prize_id');
        if($item_image != "file_error" && $item_image != "" ) {
            $item_data_arr = array(
                'prize_name'=>$this->input->post('prize_name'),
                'prize_name_cn'=>$this->input->post('prize_name_cn'),
                'item_name'=>$this->input->post('item_name'),
                'item_name_cn'=>$this->input->post('item_name_cn'),
                // 'stock'=>$this->input->post('stock'),
                'item_image'=>$item_image,
            );
            $item_data_str = "(".implode(",",$item_data_arr).")";
            $this->Prize_model->insert_single_item($prize_id, $item_data_str);
            echo "success";
        } else {
            echo "error";
        }
    }
    public function get_single_item() {
        $item_index = $_POST['index'];
        $prize_id = $_POST['prize_id'];
        $occur = 0;
        $existed_items = $this->Prize_model->get_all_item($prize_id);
        for ($i = 0; $i < strlen($existed_items); $i++) { 
            if ($existed_items[$i] == "(") { 
                $occur += 1; 
            } 
            if ($occur == $item_index) {
                $start = $i;
                break;
            };
        } 
        $occur = 0;
        for ($i = 0; $i < strlen($existed_items); $i++) { 
            if ($existed_items[$i] == ")") { 
                $occur += 1; 
            } 
            if ($occur == $item_index) {
                $end = $i;
                break;
            };
        }
        $single_item = substr($existed_items,$start+1, $end-$start-1);
        $single_item_arr = explode(",", $single_item);
        echo json_encode($single_item_arr);
    } 
    public function delete_single_prize() {
        $prize_id = $_POST['prize_id'];
        $filename = "upload/prize/".$_POST['photo'];
        $result = $this->Prize_model->delete_single_prize($prize_id);
        if($result) {
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
        echo "success";
    }
    public function update_single_item() {
        $prize_id = $this->input->post('prize_id');
        $item_index = $this->input->post('item_index');
        $item_image = $this->input->post('image');
        if(isset($_FILES['upload_image']) && $_FILES['upload_image']['name'] != "") {
            $path = "upload/item";
            $item_image = $this->upload_image($path); 
            $item_data_arr['item_image'] = $item_image;
        }
        if($item_image != "file_error" && $item_image != "" ) {
            $item_data_arr = array(
                'prize_name'=>$this->input->post('prize_name'),
                'prize_name_cn'=>$this->input->post('prize_name_cn'),
                'item_name'=>$this->input->post('item_name'),
                'item_name_cn'=>$this->input->post('item_name_cn'),
                // 'stock'=>$this->input->post('stock'),
                'item_image'=>$item_image,
            );
            $item_data_str = "(".implode(",",$item_data_arr).")";
            $existed_items = $this->Prize_model->get_all_item($prize_id);
            $occur = 0;
            for ($i = 0; $i < strlen($existed_items); $i++) { 
                if ($existed_items[$i] == "(") { 
                    $occur += 1; 
                } 
                if ($occur == $item_index) {
                    $start = $i;
                    break;
                };
            } 
            $occur = 0;
            for ($i = 0; $i < strlen($existed_items); $i++) { 
                if ($existed_items[$i] == ")") { 
                    $occur += 1; 
                } 
                if ($occur == $item_index) {
                    $end = $i;
                    break;
                };
            }
            $old_items = substr($existed_items,$start,$end-$start+1);
            $edited_items = str_replace($old_items, $item_data_str, $existed_items);
            $this->Prize_model->update_single_item($prize_id, $edited_items);
            echo "success";
        } else {
            echo "error";
        }
    }
    public function delete_single_item() {
        $item_index = $_POST['index'];
        $prize_id = $_POST['prize_id'];
        $filename = "upload/item/".$_POST['photo'];
        $occur = 0;
        $existed_item = $this->Prize_model->get_all_item($prize_id);
        for ($i = 0; $i < strlen($existed_item); $i++) { 
            if ($existed_item[$i] == "(") { 
                $occur += 1; 
            } 
            if ($occur == $item_index) {
                $start = $i;
                break;
            };
        } 
        $occur = 0;
        for ($i = 0; $i < strlen($existed_item); $i++) { 
            if ($existed_item[$i] == ")") { 
                $occur += 1; 
            } 
            if ($occur == $item_index) {
                $end = $i;
                break;
            };
        }
        $old_items = substr($existed_item,$start,$end-$start+1);
        $edited_items = str_replace($old_items, "", $existed_item);
        $result = $this->Prize_model->update_single_item($prize_id, $edited_items);

        $existed_item_cn = $this->Prize_model->get_all_item_cn($prize_id);
        for ($i = 0; $i < strlen($existed_item_cn); $i++) { 
            if ($existed_item_cn[$i] == "(") { 
                $occur += 1; 
            } 
            if ($occur == $item_index) {
                $start = $i;
                break;
            };
        } 
        $occur = 0;
        for ($i = 0; $i < strlen($existed_item_cn); $i++) { 
            if ($existed_item_cn[$i] == ")") { 
                $occur += 1; 
            } 
            if ($occur == $item_index) {
                $end = $i;
                break;
            };
        }
        $old_items_cn = substr($existed_item_cn,$start,$end-$start+1);
        $edited_items_cn = str_replace($old_items_cn, "", $existed_item_cn);
        $result = $this->Prize_model->update_single_item_cn($prize_id, $edited_items_cn);

        if($result) {
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
    }
}
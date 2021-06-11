<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gachaplay extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("Gacha_model");
        $this->load->model("Delivery_model");
        $this->load->model("Purchase_model");
        $this->load->model("Item_model");
        $this->load->model("User_model");
    }
    public function gacha_conduct() {
        if (!$this->session->has_userdata('email')) {
            $this->session->set_userdata('pre_url',current_url());
            redirect("User/Login");
        } 
        // if (!$this->session->has_userdata('purchase_id')) {
        //     redirect("Gacha/Gachalist");
        // }
        // $purchase_id = $this->session->userdata('purchase_id');
        // $gacha_id = $this->Purchase_model->get_gacha_id($purchase_id);
        if(!isset($_POST['play'])) {
            redirect("Gacha/Gachalist");
        } else {
            $gacha_id = $_POST['play'];
            $user_id = $this->User_model->get_user_id_from_email($this->session->userdata('email'));
            $gacha_detail = $this->Gacha_model->get_single_gacha($gacha_id);
            $data['gacha_id'] = $gacha_detail[0]['gacha_id'];
            $data['gacha_name'] = $gacha_detail[0]['name'];
            $data['latest'] = $this->Gacha_model->get_latest_gacha();
            $currentURL = current_url();
            $this->session->set_userdata('cur_url',  $currentURL);
            $this->load->view("template/header.php");
            $this->load->view("gacha/conduct.php", $data);
            $this->load->view("template/footer.php", $data);
        }
    }

    function getRandomWeightedElement(array $weightedValues) {
        $rand = mt_rand(1, (int) array_sum($weightedValues));
    
        foreach ($weightedValues as $key => $value) {
          $rand -= $value;
          if ($rand <= 0) {
            return $key;
          }
        }
    }

    public function play() {
        if (!$this->session->has_userdata('email')) {
            $this->session->set_userdata('pre_url',current_url());
            redirect("User/Login");
        } 
        // if (!$this->session->has_userdata('purchase_id')) {
        //     redirect("Gacha/Gachalist");
        // }
        if(!isset($_POST['play'])) {
            redirect("Gacha/Gachalist");
        } else {
            $gacha_id = $_GET['play'];
            $user_id = $this->User_model->get_user_id_from_email($this->session->userdata('email'));
            $gacha_detail = $this->Gacha_model->get_single_gacha($gacha_id);
            $data['gacha_id'] = $gacha_detail[0]['gacha_id'];
            $data['price'] = $gacha_detail[0]['price'];
            $data['gacha_name'] = $gacha_detail[0]['name'];
            if($_GET['is_play'] == "ok") {
                $purchase_id =$this->Purchase_model->get_old_purchase_id($user_id, $gacha_id); 
                if($purchase_id == null) {
                    redirect("Gacha/Gachalist");
                }
                $pdata = $this->Gacha_model->get_gacha_of_purchase($purchase_id);
                $item_list_str = $pdata[0]['item_list'];
                $item_list_arr = explode(")(", $item_list_str);
                $item_count = count($item_list_arr);

                $percent = array();
                for($i = 0; $i < $item_count; $i++) {
                    $item_list_arr[$i] =trim(trim($item_list_arr[$i],"()"),")(");
                    $item_per_array = explode(",", $item_list_arr[$i]);
                    array_push($percent, $item_per_array[5]);
                }
                
                $result = $this->getRandomWeightedElement($percent);
                $item_info_arr = explode(",", $item_list_arr[$result]);
                // $result = rand(0,$item_count-1);
                // $item_info_arr = explode(",", $item_list_arr[$result]);
                // if($this->session->has_userdata('item_list_str'.$gacha_id)) {
                //     $item_list_str = $this->session->userdata('item_list_str'.$gacha_id);
                // } else {
                //     $item_list_str = $pdata[0]['item_list'];
                // }
                // $item_list_arr = explode(")(", $item_list_str);
                // $item_count = count($item_list_arr);
                // $result = rand(0,$item_count-1);
                // $item_info_arr = explode(",", $item_list_arr[$result]);
                // $item_info_arr[5] = $item_info_arr[5]-1;
                // if(($item_info_arr[5]) == "0") {
                //     array_splice($item_list_arr, $result, 1);
                // } else {
                //     $item_list_arr[$result] = implode(",", $item_info_arr);
                // }


                $data['prize_name'] =trim($item_info_arr[0],"()");
                $data['prize_name_cn'] =trim($item_info_arr[1],"()");
                $data['item_name'] =$item_info_arr[2];
                $data['item_name_cn'] =$item_info_arr[3];
                $data['item_image'] =trim($item_info_arr[4],"()");
                $data['item_image'] =trim($item_info_arr[4],")(");

                $item_list_str = implode(")(", $item_list_arr);
                // $this->session->set_userdata('item_list_str'.$gacha_id, $item_list_str);
                $this->Purchase_model->decrease_remainder($purchase_id);
                $gained_data = array(
                    'user_id' => $user_id,
                    'gacha_id' => $gacha_id,
                    'prize_name' => $data['prize_name'],
                    'prize_name_cn' => $data['prize_name_cn'],
                    'item_name' => $data['item_name'],
                    'item_name_cn' => $data['item_name_cn'],
                    'item_img' => $data['item_image'],
                    'play_date' => date("Y-m-d")
                );
                $item_count = $this->Item_model->item_exist($user_id, $gacha_id, $data['item_image']);
                if($item_count[0]['item_num'] == 0) {
                    $gained_data['gained_count'] = 1;
                    $this->Item_model->insert_gained_item($gained_data);
                } else {
                    $this->Item_model->update_gained_count($item_count[0]['id']);
                }
            } 
            // $purchase_id = $this->session->userdata('purchase_id');
            // $gacha_id = $this->Purchase_model->get_gacha_id($purchase_id);
            // $user_id = $this->Purchase_model->get_user_id_from_purchase($purchase_id);
            // $pdata = $this->Gacha_model->get_gacha_of_purchase($purchase_id);
            // if($this->session->has_userdata('item_list_str'.$gacha_id)) {
            //     $item_list_str = $this->session->userdata('item_list_str'.$gacha_id);
            // } else {
            //     $item_list_str = $pdata[0]['item_list'];
            // }
            // $item_list_arr = explode(")(", $item_list_str);
            // $item_count = count($item_list_arr);
            // $result = rand(0,$item_count-1);
            // $item_info_arr = explode(",", $item_list_arr[$result]);
            // $item_info_arr[5] = $item_info_arr[5]-1;
            // if(($item_info_arr[5]) == "0") {
            //     unset($item_list_arr[$result]);
            // } else {
            //     $item_list_arr[$result] = implode(",", $item_info_arr);
            // }
            // $item_list_str = implode(")(", $item_list_arr);
            // $this->session->set_userdata('item_list_str'.$gacha_id, $item_list_str);
            // $gacha_detail = $this->Gacha_model->get_single_gacha($gacha_id);
            // $data['gacha_id'] = $gacha_detail[0]['gacha_id'];
            // $data['price'] = $gacha_detail[0]['price'];
            // $data['gacha_name'] = $gacha_detail[0]['name'];
            // $data['prize_name'] =$item_info_arr[0];
            // $data['item_name'] =$item_info_arr[1];
            // $data['item_image'] =trim($item_info_arr[3],"()");
            // $data['item_image'] =trim($item_info_arr[3],")(");
            // $this->Purchase_model->decrease_remainder($purchase_id);
            $data['remainder_ticket'] = $this->Purchase_model->get_remainder_ticket_sum($user_id, $gacha_id);
            // $gained_data = array(
            //     'user_id' => $user_id,
            //     'gacha_id' => $gacha_id,
            //     'prize_name' => $data['prize_name'],
            //     'item_name' => $data['item_name'],
            //     'item_img' => $data['item_image'],
            //     'play_date' => date("Y-m-d")
            // );
            // $item_count = $this->Item_model->item_exist($user_id, $gacha_id, $data['item_image']);
            // if($item_count[0]['item_num'] == 0) {
            //     $this->Item_model->insert_gained_item($gained_data);
            // } else {
            //     $this->Item_model->update_gained_count($item_count[0]['id']);
            // }
            $data['latest'] = $this->Gacha_model->get_latest_gacha();
            $currentURL = current_url();
            $this->session->set_userdata('cur_url',  $currentURL);
            $this->load->view("template/header.php");
            $this->load->view("gacha/winning_prize.php", $data);
            $this->load->view("template/footer.php", $data);
        }
    }
}
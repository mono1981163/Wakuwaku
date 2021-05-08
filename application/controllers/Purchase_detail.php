<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_detail extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("Delivery_model");
        $this->load->library("pagination"); 
        $this->load->library('encryption');
    }
    public function detailView($purchase_id) {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }

        $info = $this->Delivery_model->detail_view($purchase_id);
        $data['items'] = $info;
        $data["name"] = $info[0]["name"];
        $data["delivery_state"] = $info[0]["delivery_state"];
        $data["purchase_id"] = $info[0]["purchase_id"];
        $data["end_date"] = $info[0]["end_date"];
        $data["shipment_date"] = $info[0]["shipment_date"];
        $data["customer_id"] = $info[0]["customer_id"];
        $data["track_number"] = $info[0]["track_number"];
        $data["manage_memo"] = $info[0]["manage_memo"];

        $data['country'] = $this->encryption->decrypt($info[0]['country']);
        $data['zip_code'] = $this->encryption->decrypt($info[0]['zip_code']);
        $data['prefecture'] = $this->encryption->decrypt($info[0]['prefecture']);
        $data['city'] = $this->encryption->decrypt($info[0]['city']);
        $data['roomno'] = $this->encryption->decrypt($info[0]['roomno']);
        $data['phone'] = $this->encryption->decrypt($info[0]['phone']);
        $data['email'] = $info[0]['email'];

        $this->load->view('manage/header.php');
        $this->load->view('manage/purchaseDetail', $data);
        $this->load->view('manage/footer.php');
    }
    public function track_number() {
        $track = $this->input->post('track_number');
        $purchase_id = $this->input->post('purchase_id');
        $this->Delivery_model->save_track_number($purchase_id ,$track);
    }
    public function manage_memo() {
        $memo = $this->input->post('manage_memo');
        $purchase_id = $this->input->post('purchase_id');
        $this->Delivery_model->save_manage_memo($purchase_id, $memo);
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MailSetting extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Mail_model');
    }

    public function index() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }

        $data = $this->Mail_model->get_message();
        
        $this->load->view('manage/header.php');
        $this->load->view('manage/mailSetting.php', $data);
        $this->load->view('manage/footer.php');
    }
    public function mailcheck() {
        $data['send_ja'] = $this->input->post('send_ja');
        $data['send_cn'] = $this->input->post('send_cn');
        $data['cancel_ja'] = $this->input->post('cancel_ja');
        $data['cancel_cn'] = $this->input->post('cancel_cn');
        $data['send_ja_tail'] = "\n **ガチャで当選された商品の発送を行いました。2ヶ月後にも商品が届かない場合はお問い合わせください。";
        $data['send_cn_tail'] = "\n **我们已经出货了赢得转蛋奖的产品。 如果两个月后仍未收到该物品，请与我们联系。";
        $data['cancel_ja_tail'] = "\n **ガチャで当選された商品の発送をキャンセルしました。";
        $data['cancel_cn_tail'] = "\n ****取消了由转蛋赢得的产品的运输。";
        $this->load->view('manage/header.php');
        $this->load->view('manage/mailcheck.php', $data);
        $this->load->view('manage/footer.php');
    }
    public function doSetting() {
        $send_ja = $this->input->post('send_ja');
        $send_cn = $this->input->post('send_cn');
        $cancel_ja = $this->input->post('cancel_ja');
        $cancel_cn = $this->input->post('cancel_cn');
        $updateData=array(
            'send_email_ja'=>$send_ja,
            'send_email_cn'=>$send_cn,
            'cancel_email_ja'=>$cancel_ja,
            'cancel_email_cn'=>$cancel_cn
        );
        $result = $this->Mail_model->update_message($updateData);
        if($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
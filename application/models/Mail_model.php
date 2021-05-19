<?php 

class Mail_model extends CI_Model {

    public function get_sendmessage_japan() {
        $sql = "SELECT send_email_ja FROM mails";
        $query = $this->db->query($sql);
        return $query->row()->send_email_ja;
    }
    public function get_sendmessage_china() {
        $sql = "SELECT send_email_cn FROM mails";
        $query = $this->db->query($sql);
        return $query->row()->send_email_cn;
    }
    public function get_cancelmessage_japan() {
        $sql = "SELECT cancel_email_ja FROM mails";
        $query = $this->db->query($sql);
        return $query->row()->send_email_cn;
    }
    public function get_cancelmessage_china() {
        $sql = "SELECT cancel_email_cn FROM mails";
        $query = $this->db->query($sql);
        return $query->row()->send_email_cn;
    }
    public function get_message() {
        $sql = "SELECT * FROM mails";
        $query = $this->db->query($sql);
        return $query->result_array()[0];
    }
    public function update_message($data) {

        $sql = "SELECT exists(select 1 from mails) AS Output;";
        $query = $this->db->query($sql);
        if ($query->row()->Output > 0) {
            return $this->db->update("mails", $data);
        } else {
            return $this->db->insert("mails", $data);
        }
    }
}
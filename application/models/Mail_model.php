<?php 

class Mail_model extends CI_Model {

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
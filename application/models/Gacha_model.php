<?php 

class Gacha_model extends CI_Model {

    public function insert_single_gacha($gachaData) {
        $this->db->insert("gachas", $gachaData);
        $id = $this->db->insert_id();
        return $id;
    }
    public function insert_single_gacha_cn($gachaData) {
        $this->db->insert("gachas_cn", $gachaData);
        $id = $this->db->insert_id();
        return $id;
    }
    public function get_single_gacha($gacha_id) {
        $sql = "SELECT * FROM gachas WHERE gacha_id=".$gacha_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_single_gacha_cn($gacha_id) {
        $sql = "SELECT * FROM gachas_cn WHERE gacha_id=".$gacha_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_single_gacha_with_prizes ($gacha_id) {
        $gacha_table = "gachas";
        $prize_table = "prize";
        if($this->session->userdata('site_lang')=='chinese') {
            $gacha_table = "gachas_cn";
            $prize_table = "prize_cn";
        }
        $sql = "SELECT * FROM ".$gacha_table." g LEFT JOIN ".$prize_table." p ON p.gacha_id=g.gacha_id WHERE g.gacha_id=".$gacha_id." ORDER BY p.sort_level"; 
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function delete_single_gacha($gacha_id)  
    {  
        $this->db->where("gacha_id", $gacha_id);
        $sql = "SELECT * FROM gachas WHERE gacha_id=".$gacha_id;
        $query = $this->db->query($sql);
        $this->db->delete("gachas");  
        return $query->row()->image;
    } 

    public function update_single_gacha($gacha_id, $gachaData) {
        $this->db->where("gacha_id", $gacha_id);  
        return $this->db->update("gachas", $gachaData);
    }
    public function update_single_gacha_cn($gacha_id, $gachaData_cn) {
        $this->db->where("gacha_id", $gacha_id);  
        return $this->db->update("gachas_cn", $gachaData_cn);
    }

    // View Gacha Model
    public function get_all_gacha() {
        $gacha_table = "gachas";
        if($this->session->userdata('site_lang')=='chinese') {
            $gacha_table = "gachas_cn";
        }
        $sql = "SELECT * FROM ".$gacha_table." WHERE open_state = 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_latest_gacha() {
        $gacha_table = "gachas";
        if($this->session->userdata('site_lang')=='chinese') {
            $gacha_table = "gachas_cn";
        }
        $sql = "SELECT * FROM ".$gacha_table." where vogue_status=1 ORDER BY gacha_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_gacha_of_purchase($purchase_id) {
        $sql = "SELECT * FROM gachas g LEFT JOIN purchase p ON p.gacha_id=g.gacha_id LEFT JOIN prize pr ON pr.gacha_id=g.gacha_id WHERE p.purchase_id=".$purchase_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function change_vogue_gacha($gacha_id, $change_image) {
        $sql = "UPDATE gachas SET vogue_status = 1 WHERE image = '".$change_image."'";
        $this->db->query($sql); 
        $sql = "UPDATE gachas SET vogue_status = 0 WHERE gacha_id='".$gacha_id."'";
        $this->db->query($sql);
        $sql = "UPDATE gachas_cn SET vogue_status = 1 WHERE image = '".$change_image."'";
        $this->db->query($sql); 
        $sql = "UPDATE gachas_cn SET vogue_status = 0 WHERE gacha_id='".$gacha_id."'";
        $this->db->query($sql);
    }
    public function allowGacha($gacha_id) {
        $sql = "UPDATE gachas SET open_state = 1 WHERE gacha_id='".$gacha_id."'";
        $this->db->query($sql);
        $sql = "UPDATE gachas_cn SET open_state = 1 WHERE gacha_id='".$gacha_id."'";
        $this->db->query($sql);
    }
}
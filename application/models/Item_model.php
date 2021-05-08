<?php 

class Item_model extends CI_Model {

    public function get_gained_item($user_id, $gacha_id) {
        $sql = "SELECT * FROM gained_item WHERE user_id='".$user_id."' AND gacha_id='".$gacha_id."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function item_exist($user_id, $gacha_id, $item_img) {
        $sql = "SELECT COUNT('item_img') AS item_num, id FROM gained_item WHERE item_img='".$item_img."' AND user_id='".$user_id."' AND gacha_id='".$gacha_id."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function insert_gained_item($insert_data) {
        $this->db->insert('gained_item', $insert_data);
        $id = $this->db->insert_id();
        return $id;
    }
    public function update_gained_count($id) {
        $sql = "UPDATE gained_item SET gained_count=gained_count+1 WHERE id='".$id."'";
        $query = $this->db->query($sql);
    }
}
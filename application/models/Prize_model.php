<?php 

class Prize_model extends CI_Model {


    public function insert_single_prize($prizeData) {        
        $sql="SELECT COUNT(id) AS insert_index FROM prize WHERE gacha_id=" . $prizeData['gacha_id'];
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $prizeData['sort_level'] = $result[0]['insert_index'];
        $this->db->insert('prize', $prizeData);
        $id = $this->db->insert_id();
        return $id;
    }
    public function insert_single_prize_cn($prizeData_cn) {
        $sql="SELECT COUNT(id) AS insert_index FROM prize_cn WHERE gacha_id=" . $prizeData_cn['gacha_id'];
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $prizeData_cn['sort_level'] = $result[0]['insert_index'];
        $this->db->insert('prize_cn', $prizeData_cn);
        $id = $this->db->insert_id();
        return $id;
    }
    public function update_single_prize($prize_id, $prizeData) {
        $this->db->where("id", $prize_id);  
        return $this->db->update('prize', $prizeData);
    }
    public function update_single_prize_cn($prize_id, $prizeData_cn) {
        $this->db->where("id", $prize_id);  
        return $this->db->update('prize_cn', $prizeData_cn);
    }
    public function get_single_prize($prize_id) {
        $sql = "SELECT ja.*, cn.prize_name AS prize_name_cn, cn.item_list AS item_list_cn, cn.goods AS goods_cn FROM prize AS ja LEFT JOIN prize_cn AS cn ON ja.id = cn.id WHERE ja.id=".$prize_id." ORDER BY ja.sort_level";
        $query = $this->db->query($sql);
        return $query->result_array()[0];
    }
    public function get_prizes_of_gacha($gacha_id) {
        $sql = "SELECT ja.*, cn.prize_name AS prize_name_cn, cn.item_list AS item_list_cn, cn.goods AS goods_cn FROM prize AS ja LEFT JOIN prize_cn AS cn ON ja.id = cn.id WHERE ja.gacha_id=".$gacha_id." ORDER BY ja.sort_level";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function delete_single_prize($prize_id) {
        $sql = "DELETE from prize where id='".$prize_id."'";
        $query = $this->db->query($sql);
        $sql = "DELETE from prize_cn where id='".$prize_id."'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function change_order_prize($gacha_id=0, $befor=0, $after=0)
    {
        if($befor<$after)
        {
            $sql="SELECT id FROM prize WHERE gacha_id=".$gacha_id." AND sort_level=".$befor;
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $beforeindex = $result[0]['id'];
            $sql = "UPDATE prize SET sort_level = sort_level - 1 WHERE gacha_id=".$gacha_id." AND sort_level>".$befor." AND sort_level<=".$after;
            $query = $this->db->query($sql);
            $sql = "UPDATE prize SET sort_level = ".$after." WHERE gacha_id=".$gacha_id." AND id=".$beforeindex;
            $query = $this->db->query($sql);
            
            $sql="SELECT id FROM prize_cn WHERE gacha_id=".$gacha_id." AND sort_level=".$befor;
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $beforeindex = $result[0]['id'];
            $sql = "UPDATE prize_cn SET sort_level = sort_level - 1 WHERE gacha_id=".$gacha_id." AND sort_level>".$befor." AND sort_level<=".$after;
            $query = $this->db->query($sql);
            $sql = "UPDATE prize_cn SET sort_level = ".$after." WHERE gacha_id=".$gacha_id." AND id=".$beforeindex;
            $query = $this->db->query($sql);
            return true;
        }
        else{
            $sql="SELECT id FROM prize WHERE gacha_id=".$gacha_id." AND sort_level=".$befor;
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $beforeindex = $result[0]['id'];
            $sql = "UPDATE prize SET sort_level = sort_level + 1 WHERE gacha_id=".$gacha_id." AND sort_level>=".$after." AND sort_level<".$befor ;
            $query = $this->db->query($sql);
            $sql = "UPDATE prize SET sort_level = ".$after." WHERE gacha_id=".$gacha_id." AND id=".$beforeindex;
            $query = $this->db->query($sql);

            $sql="SELECT id FROM prize_cn WHERE gacha_id=".$gacha_id." AND sort_level=".$befor;
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $beforeindex1 = $result[0]['id'];
            $sql = "UPDATE prize_cn SET sort_level = sort_level + 1 WHERE gacha_id=".$gacha_id." AND sort_level>=".$after." AND sort_level<".$befor ;
            $query = $this->db->query($sql);
            $sql = "UPDATE prize_cn SET sort_level = ".$after." WHERE gacha_id=".$gacha_id." AND id=".$beforeindex;
            $query = $this->db->query($sql);
            return true;
        }
        
    }

    public function get_all_item($prize_id) {
        $sql = "SELECT * FROM prize WHERE id='".$prize_id."'";
        $query = $this->db->query($sql);
        return $query->row()->item_list;
    }
    public function get_all_item_cn($prize_id) {
        $sql = "SELECT * FROM prize_cn WHERE id='".$prize_id."'";
        $query = $this->db->query($sql);
        return $query->row()->item_list;
    }
    public function insert_single_item($prize_id, $itemData) {
        $sql = "UPDATE prize SET item_list = CONCAT(IFNULL(item_list,''), '".$itemData."') WHERE id = '".$prize_id."'";
        $this->db->query($sql);
        $sql = "UPDATE prize_cn SET item_list = CONCAT(IFNULL(item_list,''), '".$itemData."') WHERE id = '".$prize_id."'";
        $this->db->query($sql);
    }
    public function update_single_item($prize_id, $edited_items) {
        $sql = "UPDATE prize SET item_list = '".$edited_items."' WHERE id = '".$prize_id."'";
        return $this->db->query($sql);
    }
    public function update_single_item_cn($prize_id, $edited_items_cn) {
        $sql = "UPDATE prize_cn SET item_list = '".$edited_items_cn."' WHERE id = '".$prize_id."'";
        return $this->db->query($sql);
    }
}
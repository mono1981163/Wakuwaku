<?php 

class Delivery_model extends CI_Model {
    public function getAllPurchase($limit, $start) {
        $this->db->select('p.gacha_id, p.purchase_id, p.customer_id, p.purchase_date, p.delivery_state, g.name, g.price, p.method, g.end_date, p.shipment_date');
		$this->db->from('purchase p'); 
        $this->db->join('gachas g', 'p.gacha_id=g.gacha_id', 'left');
		$this->db->limit($limit, $start);
		$this->db->order_by('purchase_id','asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function getNotSendPurchase($limit, $start) {
        $this->db->select('p.gacha_id, p.purchase_id, p.customer_id, p.purchase_date, p.delivery_state, g.name, g.price, p.method, g.end_date, p.shipment_date');
		$this->db->from('purchase p'); 
        $this->db->join('gachas g', 'p.gacha_id=g.gacha_id', 'left');
        $this->db->where("delivery_state='未発送'");
		$this->db->limit($limit, $start);
		$this->db->order_by('purchase_id','asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function getCompletePurchase($limit, $start) {
        $this->db->select('p.gacha_id, p.purchase_id, p.customer_id, p.purchase_date, p.delivery_state, g.name, g.price, p.method, g.end_date, p.shipment_date');
		$this->db->from('purchase p'); 
        $this->db->join('gachas g', 'p.gacha_id=g.gacha_id', 'left');
        $this->db->where("delivery_state='発送完了'");
		$this->db->limit($limit, $start);
		$this->db->order_by('purchase_id','asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_count() {
        $query = $this->db->query('SELECT * FROM purchase');
        return $query->num_rows();
    }
    public function get_not_sent_count() {
        $query = $this->db->query("SELECT * FROM purchase WHERE delivery_state='未発送'");
        return $query->num_rows();
    }
    public function get_complete_count() {
        $query = $this->db->query("SELECT * FROM purchase WHERE delivery_state='発送完了'");
        return $query->num_rows();
    }
    public function detail_view($purchase_id) {
        $sql= "SELECT * FROM purchase p LEFT JOIN gachas g ON p.gacha_id = g.gacha_id LEFT JOIN users u ON p.customer_id = u.user_id LEFT JOIN gained_item item ON (item.user_id=p.customer_id AND item.gacha_id=p.gacha_id) WHERE p.purchase_id = ".$purchase_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function gained_item_view($purchase_id) {
        $this->db->select('*');
        $this->db->from('gained_item');
        $this->db->where('purchase_id='.$purchase_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function save_track_number($purchase_id, $track) {
        $sql= "UPDATE purchase SET track_number = '".$track."' WHERE purchase_id = ".$purchase_id;
        $this->db->query($sql);
    }
    public function save_manage_memo($purchase_id, $memo) {
        $sql= "UPDATE purchase SET manage_memo = '".$memo."' WHERE purchase_id = ".$purchase_id;
        $this->db->query($sql);
    }
}
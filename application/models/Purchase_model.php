<?php 

class Purchase_model extends CI_Model {

    protected $gained_item_table_name = "gained_item";
    protected $Purchase_table_name = "purchase";
    public function insert_single_purchase($data) {
        return true;
    }
    public function get_purchase_of_gacha() {
        $sql = "SELECT g.*, p.purchase_times, COUNT(DISTINCT p.customer_id) AS users, SUM(amount) AS all_amount FROM gachas g LEFT JOIN purchase p ON p.gacha_id = g.gacha_id GROUP BY g.gacha_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_purchase_of_user($user_id) {
        $sql = "SELECT p.*, g.gacha_id, g.name, g.estimated_delivery_time, g.image, g.image_sp, g.price*p.purchase_times as buy_amount FROM purchase as p, gachas as g where g.gacha_id = p.gacha_id and customer_id = ".$user_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_purchase_data_from_gachaID_userID($user_id, $gacha_id) {
        $sql = "SELECT * FROM purchase WHERE customer_id ='".$user_id."' AND gacha_id ='".$gacha_id."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_all_purchase_year() {
        $sql = "SELECT COUNT(DISTINCT customer_id) AS users, SUM(amount) AS all_amount, SUM(purchase_times) AS purchase_times FROM purchase WHERE YEAR(purchase_date) >=".date('Y');
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_all_purchase_month() {
        $sql = "SELECT COUNT(distinct customer_id) AS users, SUM(amount) as all_amount, sum(purchase_times) as purchase_times from purchase where MONTH(purchase_date) >=".date('m');
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_all_purchase_week() {
        $sql = "SELECT COUNT(distinct customer_id) AS users, SUM(amount) as all_amount, sum(purchase_times) as purchase_times from purchase where year(purchase_date) = year(CURDATE()) and WEEK(purchase_date) = WEEK(CURDATE())";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function insert_purchase($data) {
        $this->db->insert($this->Purchase_table_name, $data);
        $id = $this->db->insert_id();
        return $id;
    }
    public function get_gacha_id($purchase_id) {
        $sql = "SELECT gacha_id FROM purchase WHERE purchase_id = '".$purchase_id."'";
        $query = $this->db->query($sql);
        return $query->row()->gacha_id;
    }
    public function get_user_id_from_purchase($purchase_id) {
        $sql = "SELECT customer_id FROM purchase WHERE purchase_id = '".$purchase_id."'";
        $query = $this->db->query($sql);
        return $query->row()->customer_id;
    }
    public function decrease_remainder($purchase_id) {
        $sql = "UPDATE purchase SET remainder=remainder-1 WHERE purchase_id='".$purchase_id."'";
        $query = $this->db->query($sql);
        $sql ="SELECT remainder FROM purchase WHERE purchase_id='".$purchase_id."'";
        $query = $this->db->query($sql);
        return $query->row()->remainder;
    }
    public function get_remainder_ticket_sum($user_id, $gacha_id) {
        $sql = "SELECT SUM(remainder) as remainder_ticket FROM purchase WHERE customer_id = '".$user_id."' AND gacha_id='".$gacha_id."'";
        $query = $this->db->query($sql);
        return $query->row()->remainder_ticket;
    }
    public function get_old_purchase_id($user_id, $gacha_id) {
        $sql = "SELECT purchase_id, purchase_times FROM purchase WHERE customer_id='".$user_id."' AND gacha_id='".$gacha_id."' AND remainder > 0 LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows()<1) {
            return null;
        };
        return $query->row()->purchase_id;
    }
    public function get_purchase_deliver_info($purchase_id) {
        $sql = "SELECT p.purchase_times, p.order_number, p.amount, p.purchase_date, ja.name AS ja_name, ja.price AS ja_price, ja.shipping_fee AS ja_fee, cn.shipping_fee AS cn_fee,  cn.name AS cn_name, cn.price AS cn_price FROM purchase AS p, gachas AS ja, gachas_cn AS cn WHERE p.gacha_id=ja.gacha_id AND p.gacha_id=cn.gacha_id AND p.purchase_id = '".$purchase_id."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
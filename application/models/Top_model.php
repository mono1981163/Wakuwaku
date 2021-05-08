<?php 

class Top_model extends CI_Model {

    protected $table_name = "topimages";

    public function get_image($id) {

    } 
    public function get_top_image() {
        $sql = "SELECT * FROM topimages";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function update_top_image_pc($id, $image) {
        $sql = "UPDATE topimages SET image='".$image."' WHERE image_id=".$id;
        return $this->db->query($sql);
    }
    public function update_top_image_sp($id, $image) {
        $sql = "UPDATE topimages SET image_sp='".$image."' WHERE image_id=".$id;
        return $this->db->query($sql);
    }
}

<?php 

class Admin_model extends CI_Model {

    protected $User_table_name = "admins";

    public function get_admin($id) {

    } 
    public function check_login($adminData) {

        $query = $this->db->get_where($this->User_table_name, array('admin_id' => $adminData['id']));
        if ($this->db->affected_rows() > 0) {

            $password = $query->row('password');

            if ($adminData['password'] == $password) {

                return 2;

            } else {
                return 1;
            }

        } else {
            return 0;
        }
    }
}

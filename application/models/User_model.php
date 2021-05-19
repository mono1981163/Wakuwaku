<?php 

class User_model extends CI_Model {

    protected $User_table_name = "users";

    public function insert_user($userData) {
        return $this->db->insert($this->User_table_name, $userData);
    }
    public function update_user($userData) {
        $email = $this->session->userdata('email');
        $this->db->where("email", $email);
        return $this->db->update($this->User_table_name, $userData);
    }
    public function update_password($email, $password) {
        $sql="UPDATE users SET password ='".$password."' WHERE email='".$email."'";
        $this->db->query($sql);
    }
    public function check_email_exist($email) {
        $query = $this->db->get_where($this->User_table_name, array('email'=>$email));
        return $query->num_rows();
    }
    public function user_delete($email) {
        $sql="DELETE FROM users WHERE email='".$email."'";
        $this->db->query($sql);
    }
    public function get_user($email) {
        $sql = "SELECT * FROM users WHERE email='".$email."'";
        $query = $this->db->query($sql);
        return $query->result_array()[0];
    }
    public function get_user_id_from_email($email) {
        $sql = "SELECT * FROM users WHERE email='".$email."'";
        $query = $this->db->query($sql);
        return $query->row()->user_id;
    }
    public function get_country_of_user($user_id) {
        $sql = "SELECT * FROM users WHERE user_id='".$user_id."'";
        $query = $this->db->query($sql);
        return $query->row()->country;
    }
    public function check_login($userData) {

        $query = $this->db->get_where($this->User_table_name, array('email' => $userData['email']));
        if ($this->db->affected_rows() > 0) {
            foreach ($query->result() as $row) {
                if ($row->is_email_verified == 'yes') {
                    $password = $query->row('password');
                    if ($userData['password'] == $password) {
                        return "success";
        
                    } else {
                        return "password_error";
                    } 
                } else {
                    return 'email_verify';
                }
            }
        } else {
            return "no_exist";
        }
    }
    function verify_email($key)
    {
        $this->db->where('verification_key', $key);
        $this->db->where('is_email_verified', 'no');
        $query = $this->db->get('users');
        if($query->num_rows() > 0) {
            $data = array(
                'is_email_verified'  => 'yes'
            );
            $this->db->where('verification_key', $key);
            $this->db->update('users', $data);
            return true;
        } else {
            return false;
        }
    }

}

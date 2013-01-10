<?php
/*
 * @copyright Copyright (c) 2013 SAVAGEBYTES
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class MUser extends CI_Model {

    function login($username, $password) {
        $this->db->select('id, username, password');
        $this->db->from('users');
        $this->db->where('username = ' . "'" . $username . "'");
        $this->db->where('password = ' . "'" . MD5($password) . "'");
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $newdata = array(
                'username' => 'johndoe',
                'email' => 'johndoe@some-site.com',
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            return $query->result();
        } else {
            return false;
        }
    }
    
    function add($username, $password) {
    $data = array('username' => $username,
                    'password' => md5($password)
                    );
	
	  $this->db->insert('users',$data);
    }
}
?>


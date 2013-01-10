<?php
/*
 * @copyright Copyright (c) 2013 SAVAGEBYTES
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Provides basic CRUD functions for users goals
 */
class MGoal extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Returns all goals for the logged in user
     * 
     * @return Array of goals
     */
    public function get_goals() {
        $userid = $this->session->userdata['logged_in']['id'];
        $query = $this->db->get_where('goals', array('user_id' => $userid));
        return $query->result_array();
    }

    public function get_goal($id) {
        $query = $this->db->get_where('goals', array('id' => $id));
        return $query->row();
    }

    public function set_goals() {
        $data = array(
            'goal' => $this->input->post('goal'),
            'description' => $this->input->post('description'),
            'user_id' => $this->session->userdata['logged_in']['id'],
            'created' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('goals', $data);
    }

    public function delete_goal($id = FALSE) {
        return $this->db->delete('goals', array('id' => $id));
    }

    public function update_goal($id = FALSE) {
        $data = array(
            'goal' => $this->input->post('goal'),
            'description' => $this->input->post('description'),
            'user_id' => $this->session->userdata['logged_in']['id']
        );
        $this->db->where('id', $id);
        return $this->db->update('goals', $data); 
    }

}
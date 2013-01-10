<?php
/*
 * @copyright Copyright (c) 2013 SAVAGEBYTES
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        session_start();

        if (!$this->session->userdata('logged_in')) {
            $allowed = array('login', 'check_database', 'register');
            if (!in_array($this->router->method, $allowed)) {
                redirect('users/login');
            }
        }
    }

    /*
     * Logs a user in.
     * 
     * Use the form validation library and the check_database function to
     * check the credentials are correct and establish the session. 
     */
    function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Goal Setter Login';
            $data['main'] = 'login';
            $this->load->vars($data);
            $this->load->view('template');
        } else {
            //Go to private area
            redirect('goals', 'refresh');
        }
    }

    function check_database($password) {
        $username = $this->input->post('username');
        $result = $this->muser->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('goals', 'refresh');
    }
    
    function register() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_add_user');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Goal Setter Registration';
            $data['main'] = 'register';
            $this->load->vars($data);
            $this->load->view('template');
        } else {
            //Go to private area
            redirect('users/login', 'refresh');
        }
    }
    function add_user($password) {
        $username = $this->input->post('username');
        $result = $this->muser->add($username, $password);
        
    }

}
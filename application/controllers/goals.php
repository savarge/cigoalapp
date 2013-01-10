<?php
/*
 * @copyright Copyright (c) 2013 SAVAGEBYTES
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Manages goal setting functionality and views
 */
class Goals extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        
        if (!$this->session->userdata('logged_in'))
        {
            $allowed = array('login');
            if ( ! in_array($this->router->method, $allowed))    
            {
        redirect('users/login');
        }
        }
    }
    /**
     * Displays a list of logged in users goals.
     */
    public function index() {
        
        //Retrieve all users goals
        $data['goals'] = $this->mgoal->get_goals();        
        
        //Display goals home page
        $data['title'] = 'Goal Setter Home';
        $data['main'] = 'index';
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function view($id) {
        $data['goals_item'] = $this->db->escape($this->goals_model->get_goals($id));
        if (empty($data['goal_item'])) {
            show_404();
        }
        $data['goal'] = $data['goals_item']['title'];
        $data['main'] = 'view';
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function create() {
        
        //Load the form library and set validation rules
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('goal', 'Goal', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        
        //If the form has not been submitted, load
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Goal Setter - Add a goal';
            $data['main'] = 'create';
            $this->load->vars($data);
            $this->load->view('template');
        } else {
            $this->mgoal->set_goals();
            $this->session->set_flashdata('item', 'Goal successfully added');
            redirect('goals');
        }
    }

    public function delete($id) {
        $this->mgoal->delete_goal($id);
        $this->session->set_flashdata('item', 'Goal successfully deleted');
        redirect(goals/index);
    }
    
    public function edit($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['goal'] = 'Edit Goal';
        $this->form_validation->set_rules('goal', 'Goal', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['goal'] = $this->mgoal->get_goal($id);
            $data['title'] = 'Goal Setter - Edit a goal';
            $data['main'] = 'edit';
            $this->load->vars($data);
            $this->load->view('template');
        } else {
            $this->mgoal->update_goal($id);
            $this->session->set_flashdata('item', 'Goal successfully edited');
            redirect('goals/index');
        }
    }

    public function about() {
        $data['title'] = 'About Goal Setter';
        $this->load->view('templates/header', $data);
        $this->load->view('goals/about');
        $this->load->view('templates/footer');
    }

    public function settings() {
        $data['title'] = 'Settings';
        $this->load->view('templates/header', $data);
        $this->load->view('settings/settings_view');
        $this->load->view('templates/footer');
    }

}
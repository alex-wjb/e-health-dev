<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Signup extends CI_Controller
{
    public function __construct()
    {
        //override parent function
        parent::__construct();
        //load models
        $this->load->model('Users');
    }

    public function index()
    {
        $this->load->view('signup');
    }

    public function createAccount()
    {

          //VALIDATION

          $this->form_validation->set_rules("username","Username","required|min_length[3]|max_length[20]|alpha_dash|is_unique[users.username]");
          $this->form_validation->set_rules("password","Password","required|min_length[3]|max_length[20]|alpha_dash");
  
          if($this->form_validation->run() == false)
          {
              
              $this->load->view('signup');
          }
          else//validation true
          {
            $username = $this->input->post('username',TRUE);
            $password = $this->input->post('password',TRUE);

            //save error messages in session variables
            if(($this->Users->createUser($username, $password)) == true)//success
            {
                $this->session->set_flashdata('accountCreated', "Account creation successful - please sign in");
                redirect(base_url('index.php/login'));
            }
            else //failure
            {
                $this->session->set_flashdata('signupError', "Account creation failed - please try again");
                redirect(base_url('index.php/signup'));
            }
       }   }
}
?>
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller
{
    public function __construct()
    {
        //override parent function
        parent::__construct();
        //load in models
        $this->load->model('Users');
    }

    public function index()
    {
        $this->load->view('login');
    }

    //checks database for a user
    //retrieves a row of user data from the database if user exists
    public function getUserData()
    {
        //retrieve and sanitize input data from login form
        $username = $this->input->post('username',TRUE);
        $password = $this->input->post('password',TRUE);

        //call a function from the Users model to check the login
        //data with users database
        $result= $this->Users->getUser($username, $password);
        return $result;
    }

    public function checkLogin()
    {
        //VALIDATION
        $this->form_validation->set_rules("username","Username","required|min_length[3]|max_length[20]|alpha_dash");
        $this->form_validation->set_rules("password","Password","required|min_length[3]|max_length[20]|alpha_dash");

        if($this->form_validation->run() == false)//validation error
        {
            $this->load->view('login');
        }
        else//validation true
        {
            //attemps to get user data and checks if there is a result
            if($this->getUserData() != null)
            {
                //set session data
                foreach($this->getUserData()->result() as $row)
                {
                    $_SESSION['userID'] = $row->GUID;
                    $_SESSION['firstname'] = $row->firstname;
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $row->username;
                
                    //check if user is an admin
                    if($row->username == 'adminJSMP' && $row->password == 'apple20')
                    {
                        $_SESSION['admin'] = true;
                    }
                }
                //redirect to dashboard on successful login
                redirect(base_url('index.php/dashboard'));
            }
            else
            {
                //sets an error message as stored in a session variable that only exists for the next http request.
                $this->session->set_flashdata('loginError', "Login failed - please try again or sign up.");
                redirect(base_url('index.php/login'));
            }
        }
    }
}
?>
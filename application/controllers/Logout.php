<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller
{
    public function __construct()
    {
        //override parent function
        parent::__construct();
    }

    public function index()
    {
        if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true))
        {
            $this->session->sess_destroy();
        }
        
        redirect(base_url('index.php/login'));
    }
}
?>
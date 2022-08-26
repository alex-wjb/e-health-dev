<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        //override parent function
        parent::__construct();
        $this->load->model('Questions');
    }

    public function index()
    {
        if(isset($_SESSION['logged_in']))
        {
            //if no first name in db then passes username to dashboard view
            $data['name'] = $_SESSION['firstname'];
            if($data['name'] == "")
            {
                $data['name'] = $_SESSION['username'];
            }
            
            if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) //admin
            {

                if($this->Questions->getApplicationList()!= null)
                {
                    $data['applicationsList']  = $this->Questions->getApplicationList();
                   
                }


                $this->load->view('admin-dashboard', $data);
            }
            else //regular user
            {
               
                $userid = $_SESSION['userID'];
                //check if a questionnaire has already been complted


                if($this->Questions->checkForExisting($userid)!= null)
                {
                    $query = $this->Questions->checkForExisting($userid);

                    foreach($query->result() as $row)
                    {
                        $status = $row->status;
                    }
                    if($status != "")
                    {
                        $data['status'] = $status;
                    }
                }


                $this->load->view('user-dashboard', $data);
            }
        }
        else //logged out
        {
            redirect(base_url('index.php/login'));
        }
    }
}
?>
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Questionnaire extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Questions');
	}
	public function index()
	{
        $query = $this->Questions->getAlcoholQuestions();
        //contains data to dynamically populate alcohol responses section
        $data['query'] = $query;
        $this->load->view('questionnaire', $data);
	}

    //CUSTOM DATE VALIDATION
    public function validateDate($date)
    {
        //checks the format of the date
        if(DateTime::createFromFormat('Y-m-d', $date) == false)
        {
            $this->form_validation->set_message("validateDate","Not a valid date of birth - must be in format yyyy-mm-dd");
            return  false;
        }
        else
        {
            //checks the date is a valid date
            //createFromFormat will still return a valid date even if an invalid calendar date is given
            //this checks the date created is still the same as the date that was inputed.
            $thisDate = DateTime::createFromFormat('Y-m-d', $date);

            if($thisDate->format('Y-m-d') !== $date)
            {
                $this->form_validation->set_message("validateDate", "Date of birth must be valid date");
        
                return false;
            }
            //check if date of birth is in the future(invalid)
            $currentDate = new DateTime();
            if($thisDate > $currentDate) 
            {
                $this->form_validation->set_message("validateDate","Your date of birth is invalid - - must be in the past.");
                return  false;
            }
        }
    return TRUE;
    } 

    public function viewQuestionnaire($n)
    {
        $data['userid'] = $n;
        $data['audit'] = $this->Questions->getAudit($n);
        $data['patientInfo'] = $this->Questions->getPatientInfo($n);
        $data['smoking'] = $this->Questions->getSmoking($n);
        $data['medHistory'] = $this->Questions->getMedHistory($n);
        $data['allergies'] = $this->Questions->getAllergies($n);
        $data['medication'] = $this->Questions->getMedication($n);
        $data['lifestyle'] = $this->Questions->getLifestyle($n);
        //pass queries to retrieve all questionnaire data into this view
        $this->load->view('questionnaireTables', $data);
    }

    public function accept($n)
    {
        $this->Questions->updateStatus($status['status']="Accepted",$n);
        redirect(base_url("index.php/dashboard"));
    }
    public function reject($n)
    {
        $this->Questions->updateStatus($status['status']="Rejected",$n);
        redirect(base_url("index.php/dashboard"));
    }

   


    public function submitQuestionnaire()
    {
        //checks if user is still signed in
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($_SESSION['userID']))
        {
            //VALIDATION
            $this->form_validation->set_rules("email","Email","min_length[3]|max_length[50]|valid_email");
            $this->form_validation->set_rules("firstname","First Name","required|min_length[1]|max_length[30]|alpha_numeric_spaces");
            $this->form_validation->set_rules("surname","Surname","required|min_length[1]|max_length[30]|alpha_numeric_spaces");
            $this->form_validation->set_rules("dob","Date of Birth","required|min_length[3]|max_length[20]|alpha_dash|callback_validateDate");
            $this->form_validation->set_rules("title","Title","required|min_length[1]|max_length[20]|alpha_dash");
            $this->form_validation->set_rules("marital_status","Marital Status","required");
            $this->form_validation->set_rules("SMS_YN","SMS_YN","required");
            $this->form_validation->set_rules("address","Address","required|min_length[5]|max_length[100]|alpha_numeric_spaces");
            $this->form_validation->set_rules("postcode","Postcode","required|min_length[5]|max_length[20]|alpha_numeric_spaces");
            $this->form_validation->set_rules("mobile","Mobile","required|min_length[10]|max_length[11]|numeric");
            $this->form_validation->set_rules("home_telephone","Home Telephone","required|min_length[10]|max_length[11]|numeric");
            $this->form_validation->set_rules("occupation","Occupation","required|min_length[2]|max_length[100]|alpha_numeric_spaces");
            $this->form_validation->set_rules("email_yn","email_yn","required");
            $this->form_validation->set_rules("gender","Gender","required");
            $this->form_validation->set_rules("height","Height","required|min_length[1]|max_length[5]|numeric");
            $this->form_validation->set_rules("weight","Weight","required|min_length[1]|max_length[5]|numeric");
            $this->form_validation->set_rules("kin_name","Next of Kin Name","required|min_length[1]|max_length[30]|alpha_numeric_spaces");
            $this->form_validation->set_rules("kin_relationship","Kin Relationship","required|min_length[1]|max_length[30]|alpha_numeric_spaces");
            $this->form_validation->set_rules("kin_telephone","Kin Telephone","required|min_length[10]|max_length[11]|numeric");
            $this->form_validation->set_rules("allergy","Allergy Selection","required");
            $this->form_validation->set_rules("exercise_minutes","Minutes of exercise per session","min_length[1]|max_length[10]|numeric");
            $this->form_validation->set_rules("exercise_days","Days of exercise per week","min_length[1]|max_length[1]|numeric");

            if($this->form_validation->run() == false) //validation error
            {
                $this->index();//load questionnaire view
            }
            else//validation true (begin processing input data)
            {
                //PATIENT PERSONAL INFO
                //get data to insert into users table
                $patientInfo = array();

                //adds post data into array and sanitises it.
                $patientInfo = $this->input->post(array(
                'email',
                'firstname',
                'surname',
                'dob',
                'title',
                'marital_status',
                'address',
                'postcode',
                'mobile',
                'home_telephone',
                'SMS_YN',
                'occupation',
                'email_yn',
                'gender',
                'height',
                'weight',
                'kin_name',
                'kin_relationship',
                'kin_telephone'
                ),TRUE);
            
                $patientInfo['GUID'] = $_SESSION['userID'];
                $this->Questions->insertPatientInfo($patientInfo);
        
                //MEDICATION
                $medicationInfo = array();
                $medicationInfo = $this->input->post(array('Medication_YN'),TRUE);
                $medicationInfo['userid'] = $_SESSION['userID'];
                $this->Questions->insertMedicationInfo($medicationInfo);
       
                //SMOKING
                $smokingInfo = array();
                $smokingInfo = $this->input->post(array('smoke_status'),TRUE);
                $smokingInfo['userid'] = $_SESSION['userID'];
                $this->Questions->insertSmokingInfo($smokingInfo);
      
                //ALCOHOL RESPONSES
                $questionInfo = array();
                $questionInfo = $this->input->post(array('1','2','3','4','5','6','7','8','9','10'),TRUE);

                //creates an array for each question row 1-10
                //question 1 = $question[1];
                $n=1;
                for($i=0; $i<10; $i=$i+1)
                {
                    $q=array();
                    $q['questionid'] = $n;
                    $q['response'] = $questionInfo[$n];
                    $q['response_score'] = substr("$questionInfo[$n]", -1);
                    $q['userid'] = $_SESSION['userID'];

                    $question[$n] = $q;
                    $n=$n+1;
                }

                $question['userid'] = $_SESSION['userID'];
                $this->Questions->insertAlcoholInfo($question);
              
                //MEDICAL HISTORY
                $medHistInfo = array();
                $medHistInfo = $this->input->post(array(
                'has_heart_disease',
                'has_cancer',
                'has_stroke',
                'has_other',
                ),TRUE);
                $medHistInfo['userid'] = $_SESSION['userID'];
                $this->Questions->insertMedHistInfo($medHistInfo);
      
                //ALERGIES
                $allergyInfo = array();
                $allergyInfo = $this->input->post(array('allergy_details'),TRUE);
                $allergyInfo['userid'] = $_SESSION['userID'];
                $this->Questions->insertAllergyInfo($allergyInfo);
      
                //LifestyleInfo
                $lifestyleInfo = array();
                $lifestyleInfo = $this->input->post(array(
                'exercise',
                'exercise_minutes',
                'exercise_days',
                'diet'
                ),TRUE);
                
                $lifestyleInfo['userid'] = $_SESSION['userID'];
                $this->Questions->insertLifestyleInfo($lifestyleInfo);
        
                //UPDATE STATUS
                $this->Questions->updateStatus($status['status']="Pending",0);

                //load submission confirmation
                $this->load->view('submitted');

            }
        }
    }   
}
?>
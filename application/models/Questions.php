<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Questions extends CI_Model
{
    //joins the alcohol options and questions tables to match 
    //each question with the appropriate response.
    public function getAlcoholQuestions()
    {
        $this->db->select("a.GUID as 'QuestionID',Question,response0,response1,response2,response3,response4");
        $this->db->from("alcohol_questions AS a");
        $this->db->join('alcohol_options', 'a.optionsid = alcohol_options.GUID');
        $query = $this->db->get();
        return $query;
    }

    public function checkForExisting($userid)
    {
        $this->db->select('status');
        $this->db->from('users');
        $this->db->where('GUID', $userid);
       
            
        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            
            return $query;
        }
        else
        {
            return null;
        }
    }

    public function getApplicationList()
    {
        $this->db->select('GUID, firstname, surname, status');
        $this->db->from('users');
        $this->db->where('status !=', "");
       
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            
            return $query;
        }
        else
        {
            return null;
        }
    }



    public function insertPatientInfo($patientInfo)
    {
        $data = array();
        $data['users'] = $patientInfo;
        $this->db->update_batch('users', $data,'GUID');
        
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

   public function insertMedicationInfo($medicationInfo)
   {
        $data = array();
        $data['medication'] = $medicationInfo;

        //check if user already has a record
        $this->db->select('*');
        $this->db->from('medication');

        $this->db->where('userid',$data['medication']['userid']);
        $query = $this->db->get();
        if($query->num_rows() == 1) //entry exists - update record
        {
            $this->db->update_batch('medication', $data,'userid');
        }
        else //insert new record
        {
            $this->db->insert_batch('medication', $data);
        }
    }

    public function insertSmokingInfo($smokingInfo)
    {
         $data = array();
         $data['smoking'] = $smokingInfo;
 
         //check if user already has a record
         $this->db->select('*');
         $this->db->from('smoking');
 
         $this->db->where('userid',$data['smoking']['userid']);
         $query = $this->db->get();
         if($query->num_rows() == 1) //entry exists - update record
         {
             $this->db->update_batch('smoking', $data,'userid');
         }
         else //insert new record
         {
             $this->db->insert_batch('smoking', $data);
         }
     }

    public function insertAlcoholInfo($questions)
    {
        //question number 
        $n=1;
        for($i=0; $i<10; $i=$i+1)
        {
            $data = array();
            $data['questions'] = $questions;
            //check if user already has a record
            $this->db->select('*');
            $this->db->from('alcohol_responses');
            $this->db->where('userid',$data['questions'][$n]['userid']);
            $this->db->where('questionid',$data['questions'][$n]['questionid']);
            $query = $this->db->get();
            if($query->num_rows() == 1) //entry exists - update record
            {
                $this->db->where('userid',$data['questions'][$n]['userid']);
                $this->db->where('questionid',$data['questions'][$n]['questionid']);
                $this->db->update('alcohol_responses', $data['questions'][$n]);
            }
            else //insert new record
            {
                $this->db->insert('alcohol_responses', $data['questions'][$n]);
            }

            $n=$n+1;
        }
    }

    public function insertMedHistInfo($medHistInfo)
    {
        $data = array();
        $data['medical_history'] = $medHistInfo;

        //check if user already has a record
        $this->db->select('*');
        $this->db->from('medical_history');

        $this->db->where('userid',$data['medical_history']['userid']);
        $query = $this->db->get();
        if($query->num_rows() == 1) //entry exists - update record
        {
            $this->db->update_batch('medical_history', $data,'userid');
        }
        else //insert new record
        {
            $this->db->insert_batch('medical_history', $data);
        }
    }

    public function insertAllergyInfo($allergyInfo)
    {
        $data = array();
        $data['allergies'] = $allergyInfo;

        //check if user already has a record
        $this->db->select('*');
        $this->db->from('allergies');

        $this->db->where('userid',$data['allergies']['userid']);
        $query = $this->db->get();
        if($query->num_rows() == 1) //entry exists - update record
        {
            $this->db->update_batch('allergies', $data,'userid');
        }
        else //insert new record
        {
            $this->db->insert_batch('allergies', $data);
        }
    }

    public function insertLifestyleInfo($lifestyleInfo)
    {
        $data = array();
        $data['lifestyle'] = $lifestyleInfo;

        //check if user already has a record
        $this->db->select('*');
        $this->db->from('lifestyle');

        $this->db->where('userid',$data['lifestyle']['userid']);
        $query = $this->db->get();
        if($query->num_rows() == 1) //entry exists - update record
        {
            $this->db->update_batch('lifestyle', $data,'userid');
        }
        else //insert new record
        {
            $this->db->insert_batch('lifestyle', $data);
        }
    }

    public function updateStatus($status,$userid)
    {
        $data = array();
        $data['status'] = $status;

        if(isset($_SESSION['userID'])&& !isset($_SESSION['admin']))
        {
            $data['GUID'] = $_SESSION['userID'];
        }
        if(isset($_SESSION['admin'])&& ($_SESSION['admin']==true))
        {
            $data['GUID'] = $userid;
        }
        

        //check if user already has a record
        $this->db->select('*');
        $this->db->from('users');

        $this->db->where('GUID',$data['GUID']);
        $query = $this->db->get();
        if($query->num_rows() == 1) //entry exists - update record
        {
            $this->db->where('GUID',$data['GUID']);
            $this->db->update('users', $data);
        }
        else //insert new record
        {
            $this->db->insert_batch('users', $data);
        }
    }

    public function getAUDIT($userid)
    {
      $this->db->select('questionid, response, response_score');
      $this->db->from('alcohol_responses');
      $this->db->where('userid',$userid);
      $query = $this->db->get();
      return $query;
    }

    public function getPatientInfo($userid)
    {
      $this->db->select('email, firstname, surname, dob, title, marital_status, address, postcode, mobile, home_telephone, SMS_YN, occupation, email_YN, gender, height, weight, kin_name, kin_relationship, kin_telephone');
      $this->db->from('users');
      $this->db->where('GUID',$userid);
      $query = $this->db->get();
      return $query;
    }

    public function getMedication($userid)
    {
      $this->db->select('Medication_YN');
      $this->db->from('medication');
      $this->db->where('userid',$userid);
      $query = $this->db->get();
      return $query;
    }

    public function getSmoking($userid)
    {
      $this->db->select('smoke_status');
      $this->db->from('smoking');
      $this->db->where('userid',$userid);
      $query = $this->db->get();
      return $query;
    }

    public function getAllergies($userid)
    {
      $this->db->select('allergy_details');
      $this->db->from('allergies');
      $this->db->where('userid',$userid);
      $query = $this->db->get();
      return $query;
    }

    public function getLifestyle($userid)
    { 
      $this->db->select('exercise, exercise_minutes, exercise_days, diet');
      $this->db->from('lifestyle');
      $this->db->where('userid',$userid);
      $query = $this->db->get();
      return $query;
    }

    public function getMedHistory($userid)
    {
      $this->db->select('has_cancer, has_heart_disease, has_stroke, has_other');
      $this->db->from('medical_history');
      $this->db->where('userid',$userid);
      $query = $this->db->get();
      return $query;
    }
}
?>
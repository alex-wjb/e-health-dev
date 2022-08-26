<?php
class Users extends CI_Model
{
    public function getUser($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
            
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
    public function createUser($username, $password)
    {
        $data = array();
        $data['username'] = $username;
        $data['password'] = $password;
        
        //username must have a value
        if($data['username']!=null && $data['password']!=null)
        {
            $this->db->insert('users', $data);
            if ($this->db->affected_rows() > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
?>
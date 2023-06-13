<?php

    class LoginModel extends CI_Model{
        public function CheckLogin($email, $password)
        {
            $query = $this->db->where('email', $email)->where('password', $password)->get('users');
            return $query->result();
        }
    
        public function CheckLoginCustomer($email, $password)
        {
            $query = $this->db->where('email', $email)->where('password', $password)->get('customers');
            return $query->result();
        }
        public function NewCustomer($data)
        {
            return $this->db->insert('customers', $data);
        }
    }
?>
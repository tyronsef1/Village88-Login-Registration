<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {
   function get_student_by_email($email)
   { 
       $query = "SELECT * FROM users WHERE email = ?";
       $values = array($email);
       return $this->db->query($query, $values)->row_array();
   }
   function register_student($student_info)
   {
       $query = "INSERT INTO users (first_name, last_name, email, password, created_at) VALUES (?,?,?,?,?)";
       $values = array($student_info['first_name'], $student_info['last_name'], $student_info['email'], $student_info['password'], date("Y-m-d, H:i:s"));
       return $this->db->query($query, $values);
   }
}

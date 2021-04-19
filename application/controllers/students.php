<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
	public function index()
	{
        $this->load->view('students/student_login_page.php');
	}
    public function login()
    {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "required|valid_email");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		if($this->form_validation->run() === FALSE)
		{
            $this->session->set_flashdata("login_error", validation_errors());
            redirect("students");
		}
		else
		{
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $this->load->model('Student_model');
            $student = $this->Student_model->get_student_by_email($email);

            if($student['email'] == $email && $student['password'] == $password)
            {
                $user = array(
                   'student_id' => $student['id'],
                   'student_email' => $student['email'],
                   'student_first_name' => $student['first_name'],
                   'student_last_name' => $student['last_name'],
                   'is_logged_in' => true
                );
                $this->session->set_userdata($user);
                redirect("/students/profile");
            }
            else
            {
                $this->session->set_flashdata("login_error", "Invalid email or password!");
                redirect("students");
            }
		}
    }
    public function register()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("first_name", "First Name", "required");
        $this->form_validation->set_rules("last_name", "Last Name", "required");
        $this->form_validation->set_rules("email", "Email Address", "required|valid_email");
        $this->form_validation->set_rules("password", "Password", "required|min_length[8]");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[password]");
        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata("register_error", validation_errors());
            redirect("students");
        }
        else
        {
            $this->load->model('Student_model');
            $password = md5($this->input->post('password'));
            $user = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $password
            );
            $register_student = $this->Student_model->register_student($user);

			if($register_student === TRUE) {
                $this->session->set_flashdata("register_success", "Successfully registered!");
				redirect('students');
			}
        }
    }
    public function profile()
    {
        if($this->session->userdata('is_logged_in') === TRUE)
        {
            $this->load->view('students/profile');
        }
        else
        {
            redirect("students/login");
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("students");   
    }
}

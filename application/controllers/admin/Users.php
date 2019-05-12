<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller  {
 
     public function __construct()
    {
    	parent::__construct();

    	//check login
    	
    	}	
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
		$data['users'] = $this->User_model->get_list();
		$this->template->load('admin','default','users/index',$data);
		//$this->load->view('welcome_message');
	}

	public function add()
	{
		if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
		$this->form_validation->set_rules('first_name','First Name','trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[2]');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
		$this->form_validation->set_rules('email','Email','trim|required|min_length[7]|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2','Confirm Password','trim|required|min_length[6]|matches[password2]');

		if($this->form_validation->run()==FALSE)
		{
          //load view into tamplate
			$this->template->load('admin','default','users/add');
		}
		else
		{
         //create user data array
			$data=array(
                  'first_name'=>$this->input->post('first_name'),
                  'last_name'=>$this->input->post('last_name'),
                  'email'=>$this->input->post('email'),
                  'username'=>$this->input->post('username'),
                  'passowrd'=>md5($this->input->post('password'))
                  


			        );

			//add user
			$this->User_model->add($data);

			//Activity array
        	$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'user',
                 'action'    =>'added',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A new user was added('.$data["username"].')'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','user has been added');

        	//redirect
        	redirect('admin/users');
		}
	}

	public function edit($id)
	{
		if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}

		$this->form_validation->set_rules('first_name','First Name','trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[2]');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
		$this->form_validation->set_rules('email','Email','trim|required|min_length[7]|valid_email');
		if($this->form_validation->run()==FALSE)
		{
			$data['item']=$this->User_model->get($id);

	 
          //load view into tamplate
			$this->template->load('admin','default','users/edit',$data);
		}
		else
		{
			//create user data array
			$data=array(
                  'first_name'=>$this->input->post('first_name'),
                  'last_name'=>$this->input->post('last_name'),
                  'email'=>$this->input->post('email'),
                  'username'=>$this->input->post('username')
                  
                  


			        );

			//update user
			$this->User_model->update($id,$data);


			//Activity array
        	$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'user',
                 'action'    =>'updated',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A user was updated('.$data["username"].')'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','user has been update');

        	//redirect
        	redirect('admin/users');

		}

		
	}

	public function delete($id)
	{
		if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
		//get username
		$username=$this->User_model->get($id)->username;

		//Delete user
		$this->User_model->delete($id);

			//Activity array
        	$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'user',
                 'action'    =>'deleted',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A user was deleted('.$data["username"].')'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','user has been deleted');

        	//redirect
        	redirect('admin/users');

		
		//$this->load->view('welcome_message');
	}

	public function login()
	{

		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
		
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
		

		if($this->form_validation->run()==FALSE)
		{
          //load view into tamplate
			$this->template->load('admin','login','users/login');
		}
		else
		{
         //create user data array
			$data=array(
                  
                  'username'=>$this->input->post('username'),
                  'passowrd'=>md5($this->input->post('password'))
                  


			        );

		//Get post data
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$enc_password = md5($password);

			$user_id = $this->User_model->login($username,$enc_password);

			if($user_id)
			{
               $user_data = array(
                      'user_id'=>$user_id,
                      'username'=>$username,
                      'logged_in'=>true
   
               );

               //Set session data
               $this->session->set_userdata($user_data);

               //set message
        	$this->session->set_flashdata('success','you are logged in');

        	//redirect
        	redirect('admin');
			}
			else
			{
                 //set erro
        	$this->session->set_flashdata('error','Invalid login');

        	//redirect
        	redirect('admin/users/login');
			}

        	
		}
		
		
	
	}

	public function logout()
	{
		
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();

		//message
		$this->session->set_flashdata('success','you are logged out');
		redirect('admin/users/login');
	}
}

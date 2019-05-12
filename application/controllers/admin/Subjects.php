<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends Admin_Controller  {

	 public function __construct()
    {
        parent::__construct();

        //check login
        if(!$this->session->userdata('logged_in')){
                redirect('admin/login');
        }
}
	public function index()
	{

		$data['subjects']=$this->Subject_model->get_list();
		$this->template->load('admin','default','subjects/index',$data);
		//$this->load->view('welcome_message');
	}

	public function add()
	{

        $this->form_validation->set_rules('name','Name','trim|required|min_length[3]');

        if($this->form_validation->run()==FALSE)
        {
        	//Load template
        	$this->template->load('admin','default','subjects/add');

        }
        else
        {

        	//create post array
        	$data=array(
                 'name'=>$this->input->post('name')
        	);
        	//Insert subject
        
            
        	$this->Subject_model->add($data);
        	

        	//Activity array
        	$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'subject',
                 'action'    =>'added',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A new subject was added('.$data["name"].')'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','Subject has been added');

        	//redirect
        	redirect('admin/subjects');
        }
       

		
		//$this->load->view('welcome_message');
	}

	public function edit($id)
	{
		
        $this->form_validation->set_rules('name','Name','trim|required|min_length[3]');

        if($this->form_validation->run()==FALSE)
        {
        	//get current subject
        	$data['item']=$this->Subject_model->get($id);
        	//Load template
        	$this->template->load('admin','default','subjects/edit',$data);

        }
        else
        {
        	$old_subject=$this->Subject_model->get($id)->name;
        	$new_subject=$this->input->post('name');

        	//create post array
        	$data=array(
                 'name'=>$this->input->post('name')
        	);
        	//Insert subject
        
            
        	$this->Subject_model->update($id,$data);
        	

        	//Activity array
        	$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'subject',
                 'action'    =>'update',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A  subject ('.$old_subject.') was rename('.$new_subject.')'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','Subject has been updated');

        	//redirect
        	redirect('admin/subjects');
        }
       

		
		//$this->load->view('welcome_message');
	}

	
    
	public function delete($id)
	{
		
		$name=$this->Subject_model->get($id)->name;

		//delete subject
		$this->Subject_model->delete($id);

		$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'subject',
                 'action'    =>'deleted',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A  subject  was  deleted'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','Subject has been deleted');

        	//redirect
        	redirect('admin/subjects');
	}
}

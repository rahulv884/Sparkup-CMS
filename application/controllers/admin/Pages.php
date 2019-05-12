<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller  {
 
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
		$data['pages']=$this->Page_model->get_list();
		$this->template->load('admin','default','pages/index',$data);
		//$this->load->view('welcome_message');
	}

	public function add()
	{
		//Field Rule
		$this->form_validation->set_rules('title','Title','trim|required|min_length[3]');
		$this->form_validation->set_rules('subject_id','Subject','trim|required');
		$this->form_validation->set_rules('body','Body','trim|required');
		$this->form_validation->set_rules('is_published','Publish','required');
		$this->form_validation->set_rules('is_featured','Feature','required');
		$this->form_validation->set_rules('order','Oreder','integer');

		if($this->form_validation->run()== FALSE)
		{ 
				$subject_options=array();
		$subject_options[0]='Select Subjects';
		$subject_list=$this->Subject_model->get_list();

		foreach($subject_list as $subject)
		{
			$subject_options[$subject->id]=$subject->name;
			
	    }
				
		  $data['subject_options'] = $subject_options;

		$this->template->load('admin','default','pages/add',$data);
		//$this->load->view('welcome_message');

		}
		else
		{
			$slug=str_replace(' ', '-', $this->input->post('title'));
			$slug=strtolower($slug);
            
			$data = array(
                         
                      'title'          =>  $this->input->post('title'),
                      'slug'           =>  $slug,
                      'subject_id'     =>  $this->input->post('subject_id'),
                      'body'           =>  $this->input->post('body'),
                      'is_published'   =>  $this->input->post('is_published'),
                      'is_featured'    =>  $this->input->post('is_featured'),
                      'in_menu'        =>  $this->input->post('in_menu'),
                      'user_id'        =>  $this->session->userdata('user_id'),
                      'pg_order'          =>  $this->input->post('order')

                     
			             );

			
			//Insert Page
			$this->Page_model->add($data);

			//Activity array
        	$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'page',
                 'action'    =>'added',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A new page was added('.$data["title"].')'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','Page has been added');

        	//redirect
        	redirect('admin/Pages');
		}
		
	
	}

	public function edit($id)
	{
		//Field Rule
		$this->form_validation->set_rules('title','Title','trim|required|min_length[3]');
		$this->form_validation->set_rules('subject_id','Subject','trim|required');
		$this->form_validation->set_rules('body','Body','trim|required');
		$this->form_validation->set_rules('is_published','Publish','required');
		$this->form_validation->set_rules('is_featured','Feature','required');
		$this->form_validation->set_rules('order','Oreder','integer');

		if($this->form_validation->run()== FALSE)
		{ 
			$data['item'] = $this->Page_model->get($id);

			$subject_options=array();
		$subject_options[0]='Select Subjects';
		$subject_list=$this->Subject_model->get_list();

		foreach($subject_list as $subject)
		{
			$subject_options[$subject->id]=$subject->name;
			
	    }
				
		  $data['subject_options'] = $subject_options;

				
           $this->template->load('admin','default','pages/edit',$data);
		//$this->load->view('welcome_message');
		}
		else
		{
			$slug=str_replace(' ', '-', $this->input->post('title'));
			$slug=strtolower($slug);
            
			$data = array(
                         
                      'title'          =>  $this->input->post('title'),
                      'slug'           =>  $slug,
                      'subject_id'     =>  $this->input->post('subject_id'),
                      'body'           =>  $this->input->post('body'),
                      'is_published'   =>  $this->input->post('is_published'),
                      'is_featured'    =>  $this->input->post('is_featured'),
                      'in_menu'        =>  $this->input->post('in_menu'),
                      'user_id'        =>  $this->session->userdata('user_id'),
                      'pg_order'          =>  $this->input->post('order')

                     
			             );

			
			//update Page
			$this->Page_model->update($id,$data);

			//Activity array
        	$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'page',
                 'action'    =>'updated',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A  page was updated('.$data["title"].')'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','Page has been updated');

        	//redirect
        	redirect('admin/Pages');
		}
		
	}

	public function delete($id)
	{
		
		$title=$this->Page_model->get($id)->title;

		//delete page
		$this->Page_model->delete($id);

		$data = array(
                 'resource_id'=>$this->db->insert_id(),
                 'type'      =>'page',
                 'action'    =>'deleted',
                 'user_id'   =>$this->session->userdata('user_id'),
                 'message'   =>'A  page  was  deleted'


        	);

        		//Insert Activity
        	
             
        	$this->Activity_model->add($data);

        	//set message
        	$this->session->set_flashdata('success','Page has been deleted');

        	//redirect
        	redirect('admin/pages');
	}
}

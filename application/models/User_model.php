<?php



class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table ='users';
	}

	public function get_list()
	{
		$query=$this->db->get($this->table);
		return $query->result();
	}
	public function get($id)
	{
		echo $id;
		$query=$this->db->where('id',$id)
		                 ->get($this->table);
		                
		       
		return $query->row();
	}

	public function add($data)
	{
	
		$this->db->insert($this->table,$data);
	}

	public function update($id,$data)
	{
		      
		       $this->db->where('id',$id);
		       $this->db->update($this->table,$data);
	}

	public function delete($id)
	{
		      
		       $this->db->where('id',$id);
		       $this->db->delete($this->table);
	}
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username',$username);
		$this->db->where('passowrd',$password);
		$this->db->limit(1);

		$query=$this->db->get();

		if($query->num_rows()==1)
		{
			return $query->row()->id;
		}
		else
		{
			return false;
		}


	}

}
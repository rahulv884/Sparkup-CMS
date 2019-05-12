<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
	var $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}
   /*
    * @name:                      load
    * @desc:                      load the template and views specified
    * @param:loc:                  Location (admin/public)
    * @param:tpl_name              name of the template
    * @param:view:                 name of the view to load
    * @param:data:                 optional data array

*/

	function load($loc,$tpl_name,$view,$data=null)
	{
		if($loc == 'admin' && $tpl_name == 'default'){
			$tpl_name = 'admin';
		}

		if($loc == 'public' && $tpl_name == 'default'){
			$tpl_name = 'public';
		}

		$data['main']= $loc.'/'.$view;
		$this->ci->load->view('/Templates/'.$tpl_name,$data);

	}
}
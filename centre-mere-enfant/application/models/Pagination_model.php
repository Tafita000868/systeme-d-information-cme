<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	/**
	 * 
	 */
	class Pagination_model extends CI_Model{

		public function __construct() {
	        $this->load->library('pagination');
	    }

        public function initialise($base_url, $total_rows, $per_page) {
            $config=array(
                'base_url' => $base_url,
                'total_rows' => $total_rows,
                'per_page' => $per_page,
                'uri_segment' => 3,
                'use_page_numbers' => TRUE,
                'full_tag_open'=> '<ul class="pagination">',
                'full_tag_close'=> '</ul>',
                'num_tag_open'=> '<li class="page-item">',
                'num_tag_close' => '</li>',
                'cur_tag_open'=> '<li class="page-item active"><a class="page-link">',
                'cur_tag_close'=> '</a></li>',
                'next_tag_open' => '<li class="page-item">',
                'next_tagl_close' => '</a></li>',
                'prev_tag_open' => '<li class="page-item">',
                'prev_tagl_close' => '</li>',
                'first_tag_open' => '<li class="page-item ">',
                'first_tagl_close' => '</li>',
                'last_tag_open' => '<li class="page-item">',
                'last_tagl_close' => '</a></li>',
                'attributes' => array('class' => 'page-link')
            );
            $this->pagination->initialize($config);
        }

	    public function get_links() {
	    	return $this->pagination->create_links();
	    }


	}
?>
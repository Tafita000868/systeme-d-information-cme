<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */

	class Base_model extends CI_Model {
		
		function __construct() {
	        parent::__construct();
	        date_default_timezone_set('Indian/Antananarivo');
	    }

	    public function check_db_errors($db_errors) {
	    	if ($db_errors['message'] != '' || $db_errors['message'] != NULL) {
	    		return false;
	    	} else {
	    		return true;
	    	}
	    }

		public function list($tableName) {
			$results = $this->db->get($tableName)->result_array();
			return $results;
		}

		public function find_column($tableName, $col_key, $col_value) {
			$row = $this->db->get_where($tableName, [$col_key => $col_value])->row_array();
			return $row;
		}

		public function find_multi_column_return_row($tableName, $data_filter) {
			$results = $this->db->get_where($tableName, $data_filter)->row_array();
			return $results;
		}

		public function find_multi_column($tableName, $data_filter) {
			$results = $this->db->get_where($tableName, $data_filter)->result_array();
			return $results;
		}

		public function existe_unique_index($table_name, $column, $value, $id_key=null, $id_value='') {
			// $result = $this->find_column($table_name, $column , $value);
			$sql = "SELECT * FROM ".$table_name." WHERE ".$column."=%s ";    /* ".$column."!=null AND  */
			$sql  = sprintf($sql, 
				// $this->db->escape($value),
				$this->db->escape($value)
	        );
			if ($id_key != null && $id_value != '') {
				$sql .=" AND ".$id_key."!=%s ";
				$sql  = sprintf($sql, 
					$this->db->escape($id_value)
		        );
			}
			// echo $sql;
	        $query = $this->db->query($sql);
        	$result = $query->row_array();
        	if ($result != null) {
				return true;
			} else {
				return false;
			}
		}

		public function insert($tableName, $data) {
			$insert = $this->db->insert($tableName, $data);
			if ($this->check_db_errors($this->db->error())) {
				if($insert) {
					$insert_id =  array('status' => 200, 'insert_id' => $this->db->insert_id());
		    		return $insert_id;
		    	}
			} else {
	    		return array('status' => 402, 'action' => $this->db->error()['message']);
	    	}
		}
		
		public function update($tableName, $data, $id_key, $id_value) {
			$this->db->update( $tableName,$data, array( $id_key => $id_value) );
			if ($this->check_db_errors($this->db->error())) {
	    		return array('status' => 200);
			} else {
	    		return array('status' => 402, 'action' => $this->db->error()['message'] );
	    	}
		}

		public function delete($tableName, $id_key, $id_value) {
	    	$this->db->limit(1);
	    	$this->db->delete( $tableName, array($id_key => $id_value) );
	    	if ($this->check_db_errors($this->db->error())) {
	    		return array('status' => 200);
			} else {
	    		return array('status' => 402, 'action' => $this->db->error()['message'] );
	    	}
	    }

	}
?>

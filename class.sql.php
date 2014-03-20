<?php

  # Orhan BAHAR #
  # www.orhanbhr.com #
  # PHP MySQL Classes (INSERT, UPDATE, SELECT, QUERY, ROWS) #

	class SQL {
		
		var $arrayResult;
		
		# MySQL Query #
		private function Query($query){
			$this->arrayResult = array();
			$sql = mysql_query($query);
			while($r = mysql_fetch_assoc($sql)){
				$this->arrayResult[] = $r;
			}
			return $this->arrayResult;
		}
		
		# MySQL Rows #
		private function Rows($rows){
			return mysql_num_rows(mysql_query($rows));
		}
		
		# MySQL SELECT #
		public function Select($from, $kosul = '', $orderby = '', $limit = '', $like = false, $pr = 'AND', $select = '*'){			
			if(trim($from) == ''){
				return false;
			}
			
			$sql = "SELECT {$select} FROM `{$from}` WHERE ";
			
			if(is_array($kosul) && $kosul != ''){
				foreach($kosul as $key=>$value){
					if($like){
						$sql .= "`{$key}` LIKE '%{$value}%' {$pr} ";
					}else{
						$sql .= "`{$key}` = '{$value}' {$pr} ";
					}
				}
				
				$sql = substr($sql, 0, -(strlen($pr)+2));
			}else{	
				$sql = substr($sql, 0, -7);
			}

			if($orderby != ''){
				$sql .= ' ORDER BY ' . $orderby;
			}
	
			if($limit != ''){
				$sql .= ' LIMIT ' . $limit;
			}
	
			return $this->Query($sql);
		}
		
		# MySQL INSERT #
		public function Insert($varlik, $tablo, $exclude = NULL){
			if($exclude == NULL){
				$exclude = array();
			}
			
			array_push($exclude, 'MAX_FILE_SIZE');
			
			$sql = "INSERT INTO `{$tablo}` SET ";
			
			foreach($varlik as $key=>$value){
				if(in_array($key, $exclude)){
					continue;
				}
				$sql .= "`{$key}` = '{$value}', ";
			}
	
			$sql = substr($sql, 0, -2);
	
			return mysql_query($sql);
		}
		
		# MySQL DELETE #
		public function Delete($tablo, $where){
			$sql = "DELETE FROM `{$tablo}` WHERE ";
			
			if(is_array($where) && $where != ''){
		
				foreach($where as $key=>$value){
					$sql .= "`{$key}` = '{$value}' AND ";
				}
		
				$sql = substr($sql, 0, -5);
			}
			
			return mysql_query($sql);
		}
		
		# MySQL UPDATE #
		
	}
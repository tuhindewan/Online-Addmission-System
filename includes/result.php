<?php require_once(LIB_PATH.DS."database.php"); ?>
<?php 
	class result{
		protected static $tableName = "result";
		protected static $dbFields = array('id','rullnumber','passorfail','result','position','subject');
		public $id;
		public $rullnumber;
		public $passorfail;
		public $result;
		public $position;
		public $subject;
		public static function allotedSubject($position){
			if($position <= 5){
				$subject = "Business Administration";
			}elseif($position <= 10){
				$subject = "Computer Science And Telecommunication Engineering";
			}elseif($position <= 15){
				$subject = "Applied Chemistry And Chemical Engineering";
			}elseif($position <= 20){
				$subject = "Information And Telecommunication Engineering";
			}elseif($position <= 25){
				$subject = "Fisheries And Merine Science";
			}else{
				$subject="No Subject Available";
			}
			return $subject;
		}
		public static function resultinput($rullnumber="",$passorfail="",$resultt="",$position=""){
			$result = new result();
			$result->rullnumber = $rullnumber;
			$result->passorfail = $passorfail;
			$result->result = $resultt;
			$result->position = $position;			
			$result->subject = $result->allotedSubject($position);			
			return $result;
		}
		public static function isResultExist($userRoll=""){
			global $database;
			$userRoll = $database->escapeValue($userRoll);
			$sql = "SELECT * FROM result WHERE rullnumber='{$userRoll}' LIMIT 1";
			$resultArray = self::findBySql($sql);
			return ($database->affectedRows()==1) ? true :false;
		}
		public static function findByRegNum($rullnumber=0){
			//global $database;
			//$resultSet = $database->query("SELECT * FROM users WHERE id={$id} LIMIT 1");
			$resultArray = self::findBySql("SELECT * FROM ".self::$tableName." WHERE rullnumber={$rullnumber} LIMIT 1");
			return !empty($resultArray) ? array_shift($resultArray) : false;
		}




		// Common database methods
		public 	static function findAll(){
			return self::findBySql("SELECT * FROM ".self::$tableName);
		}
		public static function findById($id=0){
			//global $database;
			//$resultSet = $database->query("SELECT * FROM users WHERE id={$id} LIMIT 1");
			$resultArray = self::findBySql("SELECT * FROM ".self::$tableName." WHERE id={$id} LIMIT 1");
			return !empty($resultArray) ? array_shift($resultArray) : false;
		}
		public static function findBySql($sql=""){
			global $database;
			$resultSet = $database->query($sql);
			$objectArray = array();
			while($row = $database->fetchArray($resultSet)){
				$objectArray[] = self::instantiate($row);
			}
			return $objectArray;
		}
		// returns a symple number but findAll() returns massive data
		public static function countAll(){
			global $database;
			$sql = "SELECT COUNT(*) FROM".self::$tableName;
			$resultSet = $database->query($sql);
			$row = $database->fetchArray($resultSet);
			return array_shift($row);
		}
		private static function instantiate($record){// 2/2 06 07 chapter
			$object = new self(); 
			// $object->id         =$record['id'];
			// $object->username   =$record['username'];
			// $object->password   =$record['password'];
			// $object->firstName  =$record['first_name'];
			// $object->lastName   =$record['last_name'];
			
			foreach($record as $attribute => $value){
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}
			return $object;
		}
		private function has_attribute($attribute){
			//get_object_vars returns an associative array with all attributes
			$object_vars = $this->attributes();
			//we dont care about the values ,we just want to know is the key exists
			//Will return true or false
			return array_key_exists($attribute, $object_vars);
		}
		protected function attributes(){
			// return an array of attribute keyes and their values
			//return get_object_vars($this);
			$attributes = array();
			foreach(self::$dbFields as $field){
				if(property_exists($this, $field)){
					$attributes[$field] = $this->$field;
				}
			}
			return $attributes;
		}
		protected function sanatizedAttributes(){
			global $database;
			$cleanAttributes = array();
			foreach($this->attributes() as $key => $values){
				$cleanAttributes[$key] = $database->escapeValue($values);
			}
			return $cleanAttributes;
		}
		public function save(){
			// A new record won't have an id.
			return isset($this->id) ? $this->update() : $this->create();
			// create and  update protected
		}
		public function create(){
			global $database;
			$attributes = $this->sanatizedAttributes();
			$sql = "INSERT INTO ".self::$tableName." (";
			$sql .= join(", ", array_keys($attributes));
			$sql .= ") VALUES('";
			$sql .= join("', '", array_values($attributes));
			$sql .= "')";
			
			if($database->query($sql)){
				$this->id = $database->insertId();
				return true;
			}else{
				return true;
			}
		}
		public function update(){
			global $database;
			$attributes = $this->sanatizedAttributes();
			$attribute_pairs = array();
			foreach($attributes as $key => $value){
				$attribute_pairs[] = "{$key}='$value'";
			}
			$sql = "UPDATE ".self::$tableName." SET ";
			$sql .=join(", ", $attribute_pairs);
			$sql .=" WHERE id=".$database->escapeValue($this->id);
			$database->query($sql);
			return ($database->affectedRows()==1) ? true :false;
		}
		public function delet(){
			global $database;
			$sql = "DELETE FROM ".self::$tableName;
			$sql .= " WHERE id=".$database->escapeValue($this->id);
			$sql .= " LIMIT 1";
			$database->query($sql);
			return ($database->affectedRows()==1) ? true : false;
		}

	}
?>
<?php 
class database{
	public $host   = DB_HOST;
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;
	public $error;
	public $conn;

	public function __construct(){
		$this->connect();
	}

	private function connect(){
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->conn){
		$this->error = "connection failed".$this->conn->connect_error;
			return false;
		}
	}

	public function creat($creatquery){
		$result = $this->conn->query($creatquery) or die($this->conn->error.__LINE__);
		if($result){
			header('location: index.php?msg='.urldecode('data inserted successfully'));
		}else{
			die('error '.$this->conn->errno.$this->conn->error);
		}
	}

	public function read($readquery){
		$result = $this->conn->query($readquery) or die($this->conn->error.__LINE__);
		if($result->num_rows>0){
			return $result;
		}else{
			return false;
		}
	}

	public function getdata($getquery){
		$result = $this->conn->query($getquery) or die($this->conn->error.__LINE__);
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public function update($updatequery){
		$result = $this->conn->query($updatequery) or die($this->conn->error.__LINE__);
		if($result){
			header('location: index.php?msg='.urldecode('data updated successfully'));
		}else{
			return false;
		}
	}

	public function delete($deletequery){
		$result = $this->conn->query($deletequery) or die($this->conn->error.__LINE__);
		if($result){
			header('location: index.php?msg='.urldecode('data deleted successfully'));
		}else{
			return false;
		}
	}
}

?>
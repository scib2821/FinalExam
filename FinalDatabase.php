<?php
class DB{
	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "finaldbd";

	// Create connection
	protected $conn; 

	function __construct() {
        
	$this->conn = new mysqli($this->servername, $this->username, $this->password);
	// Check connection
	if ($this->conn->connect_error) {
  		die("Connection failed: " . $this->conn->connect_error) . "\n";
	}
	echo "Connected successfully\n";

	// Create database
	$sql = "CREATE DATABASE FinalDBD";
	if ($this->conn->query($sql) === TRUE) {
  	echo "Database created successfully\n";
	} else {
  		echo "Error creating database: " . $this->conn->error . "\n";
	}

	$this->conn->close();

	// Create connection
	$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
	// Check connection
	if ($this->conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error) . "\n";
	}


	// Create tables

	// Filling Table
	// Table filled with various pie fillings.
	$sql = "CREATE TABLE Fillings (
	FillingID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Filling_Name VARCHAR(30) NOT NULL,
	Filling_taste VARCHAR(30) NOT NULL)";

	if ($this->conn->query($sql) === TRUE) {
	  echo "Table Fillings created successfully\n";
	} else {
	  echo "Error creating table: " . $this->conn->error . "\n";
	}

	//Pie Table
	$sql = "CREATE TABLE Pies (
	PieID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	FillingID INT(6),
	Pie_Name VARCHAR(30) NOT NULL,
	Pie_Price INT(6) NOT NULL)";

	if ($this->conn->query($sql) === TRUE) {
	  echo "Table Pies created successfully\n";
	} else {
	  echo "Error creating table: " . $this->conn->error . "\n";
	}

	//Order Table
	$sql = "CREATE TABLE Orders (
	OrderID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	PieID int(6),
	Orderer_Name VARCHAR(30) NOT NULL,
	Baker_Name VARCHAR(30) NOT NULL,
	Order_Start DATE NOT NULL,
	Order_Pickup DATE NOT NULL)";

	if ($this->conn->query($sql) === TRUE) {
	  echo "Table Orders created successfully\n";
	} else {
 	 echo "Error creating table: " . $this->conn->error . "\n";
	}

	$sql = "INSERT INTO Orders (Orderer_Name, Baker_Name, Order_Start, Order_Pickup) VALUES ('Cathy Bates', 'John Smith', '2021-2-11', '2021-2-13')";
		echo $sql;
		if ($this->conn->query($sql) === TRUE) {
	  		echo "Added Order successfully\n";
		} else {
 	 		echo "Error creating Order\n: " . $this->conn->error . "\n";
		}
	
    	
	$sql = "INSERT INTO Orders (Orderer_Name, Baker_Name, Order_Start, Order_Pickup) VALUES ('Miles Zeek', 'Giles Main', '2021-2-12', '2021-2-14')";
		echo $sql;
		if ($this->conn->query($sql) === TRUE) {
	  		echo "Added Order successfully\n";
		} else {
 	 		echo "Error creating Order\n: " . $this->conn->error . "\n";
		}
	
    	
	$sql = "INSERT INTO Orders (Orderer_Name, Baker_Name, Order_Start, Order_Pickup) VALUES ('Mitch Grafton', 'Tessa Finch', '2021-2-14', '2021-2-17')";
		echo $sql;
		if ($this->conn->query($sql) === TRUE) {
	  		echo "Added Order successfully\n";
		} else {
 	 		echo "Error creating Order\n: " . $this->conn->error . "\n";
		}
	
    	}
	function addFilling($FillingName, $FillingTaste){
		$sql = "INSERT INTO Fillings (Filling_Name, Filling_taste) VALUES ('" . $FillingName . "', '" . $FillingTaste . "')";
		echo $sql;
		if ($this->conn->query($sql) === TRUE) {
	  		echo "Added Filling successfully\n";
		} else {
 	 		echo "Error creating Filling: " . $this->conn->error . "\n";
		}
	}
	function addPie($PieName, $PiePrice){
	$sql = "INSERT INTO Pies (Pie_Name, Pie_Price) VALUES ('" . $PieName . "', '" . $PiePrice . "')";
		echo $sql;
		if ($this->conn->query($sql) === TRUE) {
	  		echo "Added Pie successfully\n";
		} else {
 	 		echo "Error creating Pie\n: " . $this->conn->error . "\n";
		}
	}
	function getOrder(){
		$sql = "SELECT Orderer_Name, Baker_Name, Order_Start, Order_Pickup FROM Orders";
		echo $sql;
		return $this->conn->query($sql);
		echo "Return Orders successful\n";
		
	}

	
}
<?php

class city_to_database {
	
	private $hostname = null;
	private $database = null;
	private $username = null;
	private $password = null;
	
	public $name_city = null;
	public $latitude = null;
	public $longitude = null;
	
	public function __construct($name_city, $latitude, $longitude) {
	    
	    // раздел установки значений переменных:
		$this->hostname = 'localhost';
		$this->database = 'test_tgu';
		$this->username = 'Logan';
		$this->password = 'WoLvErInE';
		$this->name_city = $name_city;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		
		// раздел осуществления подключения:
		try {
		    $DBH = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
		    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $errors) {
			echo "Error connection: " . $errors->getMessage();
			file_put_contents('PDO_Errors.txt', $errors->getMessage(), FILE_APPEND);
		}
		
		// раздел формирования и выполнения запроса:
		$DATA = array('name_city' => $name_city,
		              'latitude' => $latitude,
		              'longitude' => $longitude);
		$STH = $DBH->prepare("INSERT INTO `cities`
                                (`name_city`,
                                `latitude_coordinate`,
                                `longitude_coordinate`,
                                `recording_time`,
                                `recording_date`)
                             VALUES
                                (:name_city,
                                :latitude,
                                :longitude,
                                CURRENT_TIME,
                                CURRENT_DATE)");
		$STH->execute($DATA);
		
		// раздел прерывания подключения:
		$DBH = null;
		
	}
}

?>
<?php
// модель
Class Model_Users{

	public function insertData($data, $days, $result, $time){
		$ip = $_SERVER['REMOTE_ADDR'];
		try {
			// Соединяемся с БД
			$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
//			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$values = array($ip, $data, $days, $result, (microtime(true) - $time));
			$stmt = $conn->prepare("INSERT INTO calcNewDate (ip, data, days, result, time) VALUES (?, ?, ?, STR_TO_DATE(?,'%d.%m.%Y'), ?)");
			$stmt->execute($values);
		}
		catch(PDOException $e)
		{
			return $e->getMessage();
		}

	}	
	
}
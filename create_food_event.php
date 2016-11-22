<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
//title
//start date
//end date
//start time
//end time
//food title
//food description 
//event description 
if (isset($_POST['Title']) && isset($_POST['StartDate']) && isset($_POST['EndDate']) && isset($_POST['StartTime']) && isset($_POST['EndTime']) 
    && isset($_POST['FoodTitle']) && isset($_POST['FoodDescription']) && isset($_POST['EventDescription']) ) {
 
    $title = $_POST['Title'];
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $startTime = $_POST['StartTime'];
    $endTime = $_POST['EndTime'];
    $foodTitle = $_POST['FoodTitle'];
    $foodDescription = $_POST['FoodDescription'];
    $eventDescription = $_POST['EventDescription'];

 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO foodevent(Title, StartDate, EndDate, StartTime, EndTime, FoodTitle, FoodDescription, EventDescription) VALUES('$title', '$startDate', '$endDate', '$startTime', '$endTime', '$foodTitle', '$foodDescription', 'eventDescription')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "FoodEvent successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>
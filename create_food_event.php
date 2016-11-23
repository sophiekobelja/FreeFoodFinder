<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
//title
//club name
//start date
//end date
//start time
//end time
//food title
//food description 
//event description 
if (isset($_POST['Title']) && isset($_POST['ClubName']) && isset($_POST['StartMonth']) && isset($_POST['StartDay']) && isset($_POST['StartYear'])  isset($_POST['EndMonth']) && isset($_POST['EndDay']) && isset($_POST['EndYear']) && isset($_POST['StartTimeHour']) && isset($_POST['StartTimeMinutes']) && isset($_POST['EndTimeHour']) 
    && isset($_POST['EndTimeMinutes']) && isset($_POST['FoodTitle']) && isset($_POST['FoodDescription']) && isset($_POST['EventDescription']) ) {
 
    $title = $_POST['Title'];
    $clubName = $_POST['ClubName'];
    $startDate = $_POST['StartYear'] . $_POST['StartMonth'] . $_POST['StartDay'];
    $endDate = $_POST['EndYear'] . $_POST['EndMonth'] . $_POST['EndDay'];
    $startTimeHour = $_POST['StartTimeHour'];
    $startTimeMinutes = $_POST['StartTimeMinutes'];
    $endTimeHour =  $_POST['EndTimeHour'];
    $endTimeMinutes = $_POST['EndTimeMinutes'];
    $foodTitle = $_POST['FoodTitle'];
    $foodDescription = $_POST['FoodDescription'];
    $eventDescription = $_POST['EventDescription'];

 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO foodevent(Title, ClubName, StartDate, EndDate, StartTimeHour, StartTimeMinutes, EndTimeHour, EndTimeMinutes, FoodTitle, FoodDescription, EventDescription) VALUES('$title', '$clubName' '$startDate', '$endDate', '$startTimeHour', '$startTimeMinutes', '$endTimeHour', '$endTimeMinutes', '$foodTitle', '$foodDescription', 'eventDescription')");
 
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
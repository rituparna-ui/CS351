<?php
/* Create users table */

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    user_type INT(2)
)";

$conn->query($sql);
// if($conn->query($sql) == TRUE){
//     echo "'users' table created successfully.";
// }else{
//     die("Error creating table: ".$conn->error);
// }

/* Create complaints table */

$sql = "CREATE TABLE IF NOT EXISTS complaints (
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(5) UNSIGNED,
    title VARCHAR(100),
    body VARCHAR(1000),
    FOREIGN KEY (userid) REFERENCES users(id)
)";

$conn->query($sql);
// if($conn->query($sql) == TRUE){
//     echo "'complaints' table created successfully.";
// }else{
//     die("Error creating table: ".$conn->error);
// }

function create_user(&$conn,$username, $password, $usertype=1){
    // user type {1: user, 2: admin}
    $sql = "INSERT INTO users (username, password, user_type) VALUES ('".$username."', '".$password."', '".$usertype."')";
    if($conn->query($sql) === TRUE){
        return TRUE;
    }else{
        die("Unable to create user: ".$conn->erorr);
    }
}

function valid_user(&$conn, $username, $password){
	$sql = "SELECT * FROM users WHERE username='".$username."' and password='".$password."'";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){
    	$row = $result->fetch_assoc();
    	return array(
            'user_type' => $row['user_type'], 
            'userid' => $row['id']
        );
    }else{
    	return FALSE;
    }
}

function fetch_complaint(&$conn, $userid=0){
    $sql="";
    if($userid == 0){
        $sql = "SELECT c.id, c.title, c.body, u.username FROM complaints as c, users as u WHERE c.userid=u.id";
    }else{
        $sql = "SELECT c.id, c.title, c.body, u.username FROM complaints as c, users as u WHERE c.userid=u.id and userid='".$userid."'";
    }
    $result = $conn->query($sql);
    $toReturn = array();
    while($row = $result->fetch_assoc()){
        $element = array(
            'id' => $row['id'],
            'title' => $row['title'], 
            'body' => $row['body'], 
            'username' => $row['username']
        );
        array_push($toReturn, json_encode($element));
    }

    return $toReturn;
}

function fetch_complaint_by_id(&$conn, $cid){
    $sql = "SELECT c.id, u.username, c.title, c.body FROM complaints as c, users as u WHERE c.userid=u.id and c.id='".$cid."'";
    $result = $conn->query($sql);
    $toReturn = array();
    while($row = $result->fetch_assoc()){
        $element = array(
            'id' => $row['id'],
            'title' => $row['title'], 
            'body' => $row['body'],
            'username' => $row['username']
        );
        array_push($toReturn, json_encode($element));
    }

    return $toReturn[0];
}

function register_complaint(&$conn, $userid, $title, $body){
    $sql = "INSERT INTO complaints (userid, title, body) VALUES ('".$userid."', '".$title."', '".$body."')";
    if($conn->query($sql) === TRUE){
        return TRUE;
    }else{
        die("Unable to register complaint: ".$conn->error);
    }
}

// echo register_complaint($conn, 12, "Title", "This is second test complaint");
// var_dump(fetch_complaint($conn, 12)[0]);

// $complaints = fetch_complaint($conn);
// foreach ($complaints as $complaint) {
//     $complaint = json_decode($complaint);
//     echo $complaint->username."<br>";
// }

// var_dump(valid_user($conn, "sameer", "sameer"));

// $conn->close();
?>
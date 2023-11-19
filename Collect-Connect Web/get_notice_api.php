<?php


require_once "rds_DB.php";

$getdata = "select * from notice order by id desc limit 0,1";

$result = mysqli_query($con,$getdata);

    if($result){
        $row = mysqli_fetch_assoc($result);

       $response['id'] = $row['id'];
       $response['topic'] = $row['topic'];
        $response['title'] = $row['title'];
         $response['body'] = $row['body'];
         $response['files'] = $row['files'];
         $response['timestamp'] = $row['timestamp'];
         
         $json = json_encode($response);
        
    }
       echo $json;
    return json;

?>
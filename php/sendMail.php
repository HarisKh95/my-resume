<?php
header('Content-type: application/json');
session_start();

try {
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    if(!$_POST["name"] || !$_POST["_replyto"] || !$_POST["message"])
    {
        $msg = "Their is an error, Please try later";
        // echo "<error>".$msg."</error>";

        throw new Exception($msg);
        // echo json_encode($msg);
    }
    
            $name=$_POST['name'];
            $email=$_POST['_replyto'];
            $message=$_POST['message'];
    
            $email_from="hkhurshid95@gmail.com";
            $email_subject="New Resume Contact";
            $email_body="User_name=$name.\n".
                        "User_email=$email.\n".
                        "User_message=$message.\n";
    
            $to="hkhurshid95@gmail.com";
            $headers="From:$email_from\r\n"."Reply-To=$email\r\n";
            // $send=mail($to,$email_subject,$email_body,$headers);
            $send=false;
            if($send==true)
            {
    
                echo json_encode("Message Sent");
            }
            else{
                $msg = "Their is an error, Please try later";
                // echo "<error>".$msg."</error>";
                // echo json_encode($msg);
                throw new Exception($msg);
    
            }
    
    }
} catch (Exception $e) {

    echo "<error>".$e->getMessage()."</error>";
}


?>
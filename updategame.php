<?php
include("adminsession.php");
include("conn.php");

$file_name = basename($_FILES["Game_Pic"]["name"]);
$result=mysqli_query($con,"SELECT Game_Pic FROM game");
    while($row=mysqli_fetch_array($result)){
        if ($row['Game_Pic']==$file_name){
            echo "<script>alert('There is an image with similar name found! Please change the name of file to be uploaded.'); window.location.href='viewp.php';</script>";

        }
        else{unlink("uploadg/" . $_POST['current_pic_name']);
            $target_dir = "uploadg/";
                $target_file = $target_dir . basename($_FILES["Game_Pic"]["name"]);
           
                if (move_uploaded_file($_FILES["Game_Pic"]["tmp_name"], $target_file)) 
           
                {
                    //To get file name
                    $file_name = basename($_FILES["Game_Pic"]["name"]);
           
            $sql = "UPDATE game SET
            Title='$_POST[Title]',
            Video_Game_Console='$_POST[Video_Game_Console]',
            Publisher_ID='$_POST[Publisher_ID]',
            Price='$_POST[Price]',
            Quantity='$_POST[Quantity]',
            Description='$_POST[Description]',
            Game_Pic='$file_name'
            WHERE Game_ID=$_POST[Game_ID];";
            echo $sql;
            if (mysqli_query($con, $sql)) {
                 mysqli_close($con);
                 echo "<script>alert('The game detail is updated'); window.location.href='viewgamee.php';</script>";
                }
           
            }
               
                if (move_uploaded_file($_FILES["Game_Pic"]["tmp_name"], $target_file)) 
           
                {
                    //To get file name
                    $file_name = basename($_FILES["Game_Pic"]["name"]);
                }
           
           
            }
        }

 

?>
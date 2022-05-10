<?php
$con = mysqli_connect("localhost","root","","gfg");

if(isset($_POST['update']))
{
    $id = $_POST['Publisher_ID'];

    $name = $_POST['Publisher_Name'];
    $address = $_POST['Publisher_Address'];
    $phone = $_POST['Publisher_Telephone'];
    $email = $_POST['Publisher_Email'];

    $sql = "UPDATE publisher SET 
    Publisher_Name='$_POST[Publisher_Name]', 
    Publisher_Address='$_POST[Publisher_Address]', 
    Publisher_Telephone='$_POST[Publisher_Telephone]', 
    Publisher_Email='$_POST[Publisher_Email]' 
    WHERE Publisher_ID='$_POST[Publisher_ID]' ";

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    echo "<script>alert('Publisher information is updated.'); window.location.href='viewsupplier.php';</script>";
    }

    
}

?>
<?php
  include("navbaradmin.php");
  

?>
<!DOCTYPE html>
<html lang="en">    
<style>
    .backButton {
    display: inline-block;
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    padding: 6px 12px;
    vertical-align: middle;

    }
    .backButton:hover {
    color: #fff;
    background-color: #0b5ed7;
    border-color: #0a58ca;
    }

</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Publisher Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Update Publisher Details</h4>
                    </div>
                    <div class="card-body">

                    <?php
        include("conn.php");
        $id = intval($_GET['id']);
        $result = mysqli_query($con,"SELECT * FROM publisher where Publisher_ID = $id");
        while($row = mysqli_fetch_array($result))
        {
    ?>

                        <form action="" method="POST">

                            <div class="form-group mb-3">
                                <label for="">Publisher ID</label>
                                <input type="text" name="Publisher_ID" value="<?php echo $row['Publisher_ID'] ?>" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Publisher Name</label>
                                <input type="text" name="Publisher_Name" value="<?php echo $row['Publisher_Name'] ?>" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Publisher Address</label>
                                <input type="text" name="Publisher_Address" value="<?php echo $row['Publisher_Address'] ?>" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Publisher Telephone</label>
                                <input type="text" name="Publisher_Telephone" value="<?php echo $row['Publisher_Telephone'] ?>" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Publisher Email</label>
                                <input type="text" name="Publisher_Email" value="<?php echo $row['Publisher_Email'] ?>" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                <a href="viewsupplier.php">
						            <input class="backButton"type="button" value="Back">
					            </a>
                            </div>

                        </form>

                        <?php
        }
        mysqli_close($con);
    ?> 

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
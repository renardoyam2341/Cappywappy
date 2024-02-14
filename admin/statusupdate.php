<?php include('conn.php'); ?>
<?php include 'includes/header.php'?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM appointments WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed!" . mysqli_error());
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    }
?>

<?php
    if(isset($_POST['updateStatus'])){
        $status = $_POST['appointmentStatus'];
        $roomName = $_POST['roomName'];
        $id = $_GET['id'];

        $query = "UPDATE appointments SET appointmentStatus = '$status', roomName = '$roomName' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed!" . mysqli_error());
        } else {
            header('location:index.php?update_msg=Data updated successfully!');
        }
    }
?>


<form action="statusupdate.php?id=<?php echo $id?>" method="post"> 

    <div class="form-group">
        <label for="appointmentStatus">Status</label>
        <input type="text" name="appointmentStatus" class="form-control" value="<?php echo $row['appointmentStatus']?>">
    </div>

    <div class="form-group">
        <label for="roomName">Room Name</label>
        <input type="text" name="roomName" class="form-control" value="<?php echo $row['roomName']?>">
    </div>


    <input type="submit" name="updateStatus" value="Update Apppointment Status"  class="btn btn-dark">

</form>


<?php include 'includes/footer.php'?>
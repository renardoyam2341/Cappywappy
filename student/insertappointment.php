<?php
    include 'conn.php';
    if(isset($_POST['addAppointment'])){

        $name = $_POST['studentName'];
        $course = $_POST['courseName'];
        $mode = $_POST['counselMode'];
        $gender = $_POST['counselGender'];
        $date = $_POST['appointmentDate'];
        $time = $_POST['appointmentTime'];
        $status = 'DEFAULT';
        

        $query = "INSERT INTO appointments (studentName,courseName,	counselMode,counselGender,appointmentDate,appointmentTime, appointmentStatus) 
        VALUES ('$name', '$course', '$mode', '$gender', '$date', '$time', $status)";

        $result = mysqli_query($conn, $query);

        if (!$result){
            die("Query Failed! Try again.".mysqli_error());
        }else{
            header('location:new-appointment.php?appointment_msg=Appointment Made!');
        }

    }

?>
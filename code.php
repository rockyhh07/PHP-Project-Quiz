<?php

require 'dbcon.php';

if(isset($_POST['save_employee']))
{
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $bday = mysqli_real_escape_string($con, $_POST['bday']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $dept = mysqli_real_escape_string($con, $_POST['dept']);
    $post = mysqli_real_escape_string($con, $_POST['post']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    if($fname == NULL || $lname == NULL || $bday == NULL || $gender == NULL || $dept == NULL || $post == NULL || $email == NULL || $phone == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO employees (fname,lname,bday,gender,dept,post,email,phone) VALUES ('$fname','$lname','$bday','$gender','$dept','$post','$email','$phone')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Employee created successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Employee not created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $bday = mysqli_real_escape_string($con, $_POST['bday']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $dept = mysqli_real_escape_string($con, $_POST['dept']);
    $post = mysqli_real_escape_string($con, $_POST['post']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    if($fname == NULL || $lname == NULL || $bday == NULL || $gender == NULL || $dept == NULL || $post == NULL || $email == NULL || $phone == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE employees SET fname='$fname', lname='$lname', bday='$bday', gender='$gender', dept='$dept', post='$post', email='$email', phone='$phone'
                WHERE id='$employee_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Employee updated successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Employee not updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['employee_id']))
{
    $employee_id = mysqli_real_escape_string($con, $_GET['employee_id']);

    $query = "SELECT * FROM employees WHERE id='$employee_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $employee = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Employee fetch successfully by ID',
            'data' => $employee
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Employee ID not found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $query = "DELETE FROM employees WHERE id='$employee_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Employee deleted successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Employee not deleted'
        ];
        echo json_encode($res);
        return;
    }
}
?>

<?php
session_start();
$con = mysqli_connect("localhost","admin","admin123","employees");

if(isset($_POST['save_date']))
{
    $name = $_POST['name'];
    $dob = date('Y-m-d', strtotime($_POST['dateofbirth']));

    $query = "INSERT INTO demo (name,dob) VALUES ('$name','$dob')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Date values Inserted";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Date values Inserting Failed";
        header("Location: index.php");
    }
}
?>
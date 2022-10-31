<!doctype html>
<html lang="en">
    <head>
        <title>ManilaFesto Payroll System</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
            <script>
                $(document).ready(function(){
                    $("#search").on("keyup",function(){
                        var value =$(this).val().toLowerCase();
                        $("#myTable tr").filter(function(){
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
        

    </head>
    <body>
        <?php include 'topbar.php' ?>

        <!-- Add employee -->
        <div class="modal fade" id="employeeAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveEmployee">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Birthdate</label>
                            <input type="date" name="bday" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Sex</label><br>
                            <input type="radio" name="gender" value="FEMALE" /> Female&emsp;
                            <input type="radio" name="gender" value="MALE" /> Male&emsp;
                            <input type="radio" name="gender" value="OTHER" /> Others&emsp;
                            <input type="radio" name="gender" value="Prefer not to say" /> Prefer not to say
                        </div>
                        <div class="mb-3">
                            <label for="">Department</label>
                            <input type="text" name="dept" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Position</label>
                            <input type="text" name="post" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Email Address</label>
                            <input type="text" name="email" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Contact No.</label>
                            <input type="text" name="phone" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <!-- Edit Employee Modal -->
        <div class="modal fade" id="employeeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateEmployee">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="employee_id" id="employee_id" >

                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Birthdate</label>
                            <input type="date" name="bday" id="bday" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Sex</label><br>
                            <input type="radio" name="gender" value="FEMALE" /> Female
                            <input type="radio" name="gender" value="MALE" /> Male
                            <input type="radio" name="gender" value="OTHERS" /> Others
                            <input type="radio" name="gender" value="Prefer not to say" /> Prefer not to say
                        </div>
                        <div class="mb-3">
                            <label for="">Department</label>
                            <input type="text" name="dept" id="dept" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Position</label>
                            <input type="text" name="post" id="post" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <!-- View employee Modal -->
        <div class="modal fade" id="employeeViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="">First Name</label>
                            <p id="view_fname" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Last Name</label>
                            <p id="view_lname" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Birthdate</label>
                            <p id="view_bday" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Sex</label>
                            <p id="view_gender" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Department</label>
                            <p id="view_dept" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Position</label>
                            <p id="view_post" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Email Address</label>
                            <p id="view_email" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Contact No.</label>
                            <p id="view_phone" class="form-control"></p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5 mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Employees
                                
                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#employeeAddModal">
                                    Add employee
                                </button><br><br>
                            </h4>
                            <div class="form-group">
                                <input type="text" id="search" placeholder="Search..." class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Email Address</th>
                                        <th>Contact No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                    <?php
                                    require 'dbcon.php';

                                    $query = "SELECT * FROM employees";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $employee)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $employee['id'] ?></td>
                                                <td><?= $employee['fname'] ?></td>
                                                <td><?= $employee['lname'] ?></td>
                                                <td><?= $employee['dept'] ?></td>
                                                <td><?= $employee['post'] ?></td>
                                                <td><?= $employee['email'] ?></td>
                                                <td><?= $employee['phone'] ?></td>
                                                <td>
                                                    <button type="button" value="<?=$employee['id'];?>" class="viewEmployeeBtn btn btn-info btn-sm">View</button>
                                                    <button type="button" value="<?=$employee['id'];?>" class="editEmployeeBtn btn btn-success btn-sm">Edit</button>
                                                    <button type="button" value="<?=$employee['id'];?>" class="deleteEmployeeBtn btn btn-danger btn-sm">Delete</button>
                                                    <a href="payroll.php" class="btn btn-dark float-end">Payroll</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <script>
                                        $(document).ready(function () {
                                            $('#myTable').DataTable();
                                    });
                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <script>
            $(document).on('submit', '#saveEmployee', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("save_employee", true);

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        
                        var res = jQuery.parseJSON(response);
                        if(res.status == 422) {
                            $('#errorMessage').removeClass('d-none');
                            $('#errorMessage').text(res.message);

                        }else if(res.status == 200){

                            $('#errorMessage').addClass('d-none');
                            $('#employeeAddModal').modal('hide');
                            $('#saveEmployee')[0].reset();

                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");

                        }else if(res.status == 500) {
                            alert(res.message);
                        }
                    }
                });

            });

            $(document).on('click', '.editEmployeeBtn', function () {

                var employee_id = $(this).val();
                
                $.ajax({
                    type: "GET",
                    url: "code.php?employee_id=" + employee_id,
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 404) {

                            alert(res.message);
                        }else if(res.status == 200){

                            $('#employee_id').val(res.data.id);
                            $('#fname').val(res.data.fname);
                            $('#lname').val(res.data.lname);
                            $('#bday').val(res.data.bday);
                            $('#gender').val(res.data.gender);
                            $('#dept').val(res.data.dept);
                            $('#post').val(res.data.post);
                            $('#email').val(res.data.email);
                            $('#phone').val(res.data.phone);

                            $('#employeeEditModal').modal('show');
                        }

                    }
                });

            });

            $(document).on('submit', '#updateEmployee', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("update_employee", true);

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        
                        var res = jQuery.parseJSON(response);
                        if(res.status == 422) {
                            $('#errorMessageUpdate').removeClass('d-none');
                            $('#errorMessageUpdate').text(res.message);

                        }else if(res.status == 200){

                            $('#errorMessageUpdate').addClass('d-none');

                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);
                            
                            $('#employeeEditModal').modal('hide');
                            $('#updateEmployee')[0].reset();

                            $('#myTable').load(location.href + " #myTable");

                        }else if(res.status == 500) {
                            alert(res.message);
                        }
                    }
                });

            });

            $(document).on('click', '.viewEmployeeBtn', function () {

                var employee_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "code.php?employee_id=" + employee_id,
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 404) {

                            alert(res.message);
                        }else if(res.status == 200){

                            $('#view_fname').text(res.data.fname);
                            $('#view_lname').text(res.data.lname);
                            $('#view_bday').text(res.data.bday);
                            $('#view_gender').text(res.data.gender);
                            $('#view_dept').text(res.data.dept);
                            $('#view_post').text(res.data.post);
                            $('#view_email').text(res.data.email);
                            $('#view_phone').text(res.data.phone);

                            $('#employeeViewModal').modal('show');
                        }
                    }
                });
            });

            $(document).on('click', '.deleteEmployeeBtn', function (e) {
                e.preventDefault();

                if(confirm('Are you sure you want to delete this data?'))
                {
                    var employee_id = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: {
                            'delete_employee': true,
                            'employee_id': employee_id
                        },
                        success: function (response) {

                            var res = jQuery.parseJSON(response);
                            if(res.status == 500) {

                                alert(res.message);
                            }else{
                                alertify.set('notifier','position','top-right');
                                alertify.success(res.message);

                                $('#myTable').load(location.href + " #myTable");
                            }
                        }
                    });
                }
            });
        </script>
    </body>
</html>
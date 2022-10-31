<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>ManilaFesto Payroll System</title>
</head>
<body>
    <?php include 'topbar.php' ?>
    <form method="POST" action="">
        <?php
        $days_work=$hrs_work=$rate=$g_sal=$deduct=$n_sal=0;
        if(isset($_POST['compute'])){
            $days_work=$_POST['days_work'];
            $hrs_work=$_POST['hrs_work'];
            $rate=$_POST['interest_rate'];
            $g_sal=$days_work*$hrs_work*$rate;
            $deduct=$g_sal*.1;
            $n_sal=$g_sal-$deduct;
        }
        ?>
    
        <div class="container p-5 mt-5">

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Print Payroll
                                <a href="employees.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST">

                                <div class="mb-3">
                                    <label>Number of Days Work</label>
                                    <input type="text" name="days_work" class="form-control" value="<?=$days_work;?>"/>
                                </div>
                                <div class="mb-3">
                                    <label>Number of Hours Work</label>
                                    <input type="text" name="hrs_work" class="form-control" value="<?=$hrs_work;?>"/>
                                </div>
                                <div class="mb-3">
                                    <label>Rate per Day</label>
                                    <input type="text" name="interest_rate" class="form-control" value="<?=$rate;?>"/>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="compute" class="btn btn-primary">Calculate</button>
                                </div>
                                <p>
                                    Gross Salary: <?=number_format($g_sal, 2);?><br/>
                                    Deduction: <?=number_format($deduct, 2);?><br/>
                                    Net Salary: <?=number_format($n_sal, 2);?>
                                </p>
                                <div class="text-center">
                                    <button onclick="window.print()" class="btn btn-primary">Print Payroll</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     </form>
</body>
</html>
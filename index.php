<!DOCTYPE html>
<html>
<head>
	<title>Payroll System | LOGIN</title>
</head>

<body>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
		body {
			background: #292b2c;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 90vh;
			flex-direction: column;
		}

		*{
			font-family: 'Poppins',sans-serif;
			box-sizing: border-box;
		}

		form {
			width: 500px;
			padding: 30px;
			background: #fff;
			border-radius: 5px;
		}

		h2 {
			text-align: center;
			margin-bottom: 40px;
		}

		input {
			display: block;
			border: 2px solid #ccc;
			width: 95%;
			padding: 10px;
			margin: 10px auto;
			border-radius: 5px;
		}

		label {
			color: #3a5e5b;
			font-size: 18px;
			font-weight: bold;
			padding: 10px;
		}

		button {
			float: right;
			background: #80b3af;
			padding: 15px 20px;
			color: #fff;
			border-radius: 5px;
			margin-right: 10px;
			border: none;
		}

		button:hover{
			opacity: .7;
		}

		.error {
		background: #F2DEDE;
		color: #A94442;
		padding: 10px;
		width: 95%;
		border-radius: 5px;
		margin: 20px auto;
		}

		h1 {
			text-align: center;
			color: #fff;
		}

		a {
			float: right;
			background: #555;
			padding: 10px 15px;
			color: #fff;
			border-radius: 5px;
			margin-right: 10px;
			border: none;
			text-decoration: none;
		}

		a:hover{
			opacity: .7;
		}
	</style>

     <form action="login.php" method="post">
     	<h2>ManilaFesto Payroll System</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>
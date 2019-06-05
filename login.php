<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sisselogimine</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.btn-primary:hover{
		background-color:#A52239;
	}
	.login-form {
		width: 340px;
    	margin: 60px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background-color: ;
		background-repeat: no-repeat;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
		background-color: #A52239;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="admin_index.php" method="post">
	<img SRC="thk.jpg" alt="thk logo" width=128px height=128px style="margin-left: 55px">
        <h2 class="text-center"><b>Logi sisse</b></h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nimisõna" name="Administraator" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Salasõna" name="admin" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Logi sisse</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Mäleta mind</label>
        </div>
    </form>
</div>
</body>
</html> 
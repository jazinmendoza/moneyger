<html>
<head>
    <title>Moneyger | Login</title>
    <link rel="stylesheet" href="css/LoginView.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img src="resources/LoginLogo.png" class="img">
            </div>
        </div>
        <?php
            // This is a error message if the given data(s) is/are wrong...
            if(!$error) {
                echo '<div class="col-12">
                            <span class="error">Wrong email or password</span>
                      </div>';
            }
        ?>
        <form method="POST" action="" autocomplete="off">
            <div class="col-12">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
            </div>
            <div class="col-12">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
            </div>
            <div class="clickable col-12">
                <button type="submit" class="btn btn-success form-control">Submit</button>
            </div>
            <div class="col-12">
                <a href="controllers/RegistrationController.php"><span class="span">Have no account?</span></a>
            </div>
         </form>
    </div>
</body>
    
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $(".button").onclick(function(){
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
           $.ajax({
               type:'POST',
               data:{email:email, password:password},
               dataType:'json',
               url:'index.php/LoginController/index'
           });
        });
    });
</script>
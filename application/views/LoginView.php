<html>
<head>
    <title>Moneyger | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        #email, #password{
            border: none;
            border-bottom: 2px solid;
            border-color: #48c972;
            outline: none;
            width: 80%;
            margin: auto;
        }
        .btn{
            background-color: #48c972;
        }
        .image{
            margin-top: 32%;
        }
        .form-div{
            margin: auto;
        }
    </style>
</head>
    
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 image">
                <img src="view/res/LoginLogo.png" style="width:105%;">
            </div>
        </div>
        <div class="row form-div">
                <div class="col-12">
                    <form method="POST" action="" autocomplete="off">
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</body>
    
</html>
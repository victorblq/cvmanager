<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Signin</title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url('assets/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
        <!-- Custom fonts for this template -->
        <link href="<?= base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="<?= base_url('assets/css/signin.css')?>" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin">
            <i class="fas fa-cogs fa-7x"></i>
            <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>

            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" class="form-control" placeholder="Username" required autofocus>
            
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Password" required>
            
            <button class="btn btn-lg btn-primary btn-block" type="button" onClick="doLogin()">Sign in</button>
            <p class="mt-5 mb-3 text-muted">Victor Carvalho - <?= date('Y')?> </p>
        </form>

        <script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
        
        <script>
            $(document).keypress(function(e) {
                if(e.which == 13) {
                    doLogin();
                }
            });

            function doLogin(){
                var data = {
                    username: $("#username").val(),
                    password: $("#password").val()
                };

                $.ajax({
                    url: "<?php echo base_url("login")?>",
                    method: "POST",
                    data: data,
                    success: function(result){
                        location.href="admin";
                    },
                    error: function(result){
                        $("#error").html(result.responseText);

                        $("#error").css("display", "block");

                        setTimeout(function(){
                            $("#error").css("display", "none");
                        }, 5000);
                    }
                });
            }
        </script>
    </body>
</html>
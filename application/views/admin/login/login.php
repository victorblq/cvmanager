<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Administração</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">

        <style>
        .wrapper {    
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .form-signin {
        max-width: 420px;
        padding: 30px 38px 66px;
        margin: 0 auto;
        background-color: #eee;
        border: 3px dotted rgba(0,0,0,0.1);  
        }

        .form-signin-heading {
        text-align:center;
        margin-bottom: 30px;
        }

        .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        }

        input[type="text"] {
        margin-bottom: 0px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        }

        input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

        .colorgraph {
        height: 7px;
        border-top: 0;
        background: #c4e17f;
        border-radius: 5px;
        background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        }
    </style>
    </head>

    <body>
        <div class = "container">
            <div class="wrapper">
                <form class="form-signin">       
                    <h3 class="form-signin-heading">Login Alffainox</h3>
                    <hr class="colorgraph"><br>
                    
                    <input type="text" class="form-control" name="login" id="login" placeholder="Login" autofocus />
                    <input type="password" class="form-control" name="password" id="password" placeholder="Senha" />     		  
                    
                    <button type="button" class="btn btn-lg btn-primary btn-block" onclick="doLogin()">Login</button>	
                </form>			
            </div>

            <div class="alert alert-danger" id="error" style="display: none" role="alert"></div>
        </div>

        <!-- jQuery 3 -->
        <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

        <script>
            $(document).keypress(function(e) {
                if(e.which == 13) {
                    doLogin();
                }
            });

            function doLogin(){
                var data = {
                    login: $("#login").val(),
                    senha: $("#password").val()
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
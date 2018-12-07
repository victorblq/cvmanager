<div class="box box-primary with-border">
    <form role="form" id="formUsuario" name="fprmUsuario">
        <input type="hidden" id="idUsuario" 
            <?= isset($usuario->id) ? "value='$usuario->id'" : '';?> name="id"/>
        <div class="box-body">
            <h4>Dados do usuário</h4>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" 
                        <?= isset($usuario->nome) ? "value='$usuario->nome'" : '';?> id="nome" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" name="login"
                        <?= isset($usuario->login) ? "value='$usuario->login'" : '';?> id="login" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha"
                        <?= isset($usuario->login) ? "value='$usuario->login'" : '';?> id="senha" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="confirmacao-senha">Confirme a senha</label>
                    <input type="password" class="form-control" name="confirmacaoSenha"
                        <?= isset($usuario->login) ? "value='$usuario->login'" : '';?> id="confirmacao-senha" required>
                </div>
            </div>
        </div>
    </form>
    <div class="alert alert-danger" id="error" style="display: none; padding: 10px;"></div>

    <div class="box-footer">
        <div class="pull-right">
            <button type="button" class="btn btn-default" onClick="location.href = '<?= base_url('admin/usuarios/cadastrar') ?>'">Limpar</button>
            <button type="button" class="btn btn-success" onclick="salvarUsuario()" stlye="margin-left: 5px;">Salvar</button>
        </div>
    </div>
</div>

<script>
    function salvarUsuario()
    {
        if($("#idUsuario").val() != null && $("#idUsuario").val() != '')
        {
            updateUsuario();
        }
        else
        {
            insertUsuario();
        }
    }   

    function insertUsuario()
    {
        var formData = new FormData($("form")[0]);

        formData.delete("id");

        if(validateForm())
        {
            if(validateSenha())
            {
                $.ajax({
                    url: "<?php echo base_url();?>admin/usuarios/insert",
                    method: "POST",
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(result)
                    {
                        location.href = 'listar';
                    },
                    error: function(result)
                    {
                        displayError(result.responseText, 3000);
                    }
                });
            }
        }
        else
        {
            displayError('Verifique os campos obrigatórios', 3000);
        }
    }

    function displayError(text, timeout)
    {
        $("#error").html(text);
        $("#error").css("display", "block");

        setTimeout(function(){
            $("#error").css("display", "none");
        }, timeout);
    }

    function validateForm()
    {
        var valid = true;

        for(var i = 0; i < $("input").length; i++)
        { 
            if($($("input")[i]).prop("required"))
            {
                if($($("input")[i]).parent().hasClass("has-error"))
                {
                    $($("input")[i]).parent().removeClass("has-error");
                }

                if($($("input")[i]).val() == null || $($("input")[i]).val() == '')
                {
                    $($("input")[i]).parent().addClass("has-error");
                    valid = false;
                }
            }
        }
        
        return valid;
    }

    function validateSenha()
    {
        $("#senha").parent().removeClass("has-error")
        $("#confirmacao-senha").parent().removeClass("has-error")

        var senha = $("#senha").val();
        var confirmacaoSenha = $("#confirmacao-senha").val();

        if( senha === confirmacaoSenha && senha.length >= 6 )
        {
            return true;
        }
        else
        {
            displayError("As senhas devem ser iguais e conter 6 ou mais caracteres", 3000);
            $("#senha").parent().addClass("has-error")
            $("#confirmacao-senha").parent().addClass("has-error")
        }
    }
</script>
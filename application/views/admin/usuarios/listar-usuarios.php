<div class="box box-primary">
    <div class="box-header with-border">
        <a href="<?= base_url('admin/usuarios/cadastrar') ?>" class="pull-right">
            <button class="btn btn-primary">Cadastrar</button>
        </a>
    </div>
    
    <table class="table table-hover table-striped table-bordered table-responsive" role="grid">
        <thead>
            <tr role="row">
                <th>Id</th>
                <th class="hidden-sm hidden-xs">Nome</th>
                <th>Login</th>
                <th style="text-align: center">Ações</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario){?>
            <tr>
                <td><?= $usuario->id ?></td>
                <td><?= $usuario->nome ?></td>
                <td><?= $usuario->login ?></td>
                <td><?= $usuario->ativo == 1 ? "Ativo" : "Desativado"?></td>
                <td style="text-align: center;">
                    <?php if($usuario->ativo == 1){?>
                        <button type="button" class="btn btn-danger" onClick="desativarUsuario(<?=$usuario->id?>)"><i class="fa fa-close"></i></button>
                    <?php }else{?>
                        <button type="button" class="btn btn-success" onClick="ativarUsuario(<?=$usuario->id?>)"><i class="fa fa-check"></i></button>
                    <?php }?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<script>
    function desativarUsuario(idUsuario)
    {
        $.ajax({
            url: "<?php echo base_url();?>admin/usuarios/desativar/"+idUsuario,
            type: "POST",
            success: function(result)
            {
                location.href = "listar";
            }
        })
    }

    function ativarUsuario(idUsuario)
    {
        $.ajax({
            url: "<?php echo base_url();?>admin/usuarios/ativar/"+idUsuario,
            type: "POST",
            success: function(result)
            {
                location.href = "listar";
            }
        })
    }
</script>
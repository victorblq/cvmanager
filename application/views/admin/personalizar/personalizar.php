<div class="box box-primary with-border">
    <form role="form" id="formPersonalizar" name="formPersonalizar">
        PERSONALIZAR CAMPOS
    </form>

    <div class="box-footer">
        <div class="pull-right">
            <button type="button" class="btn btn-success" onclick="salvar()" stlye="margin-left: 5px;">Salvar</button>
        </div>
    </div>
</div>

<script>
    function salvar()
    {
        var formData = new FormData($("form")[0]);

        $.ajax({
            url: "<?php echo base_url();?>admin/personalizar/update",
            method: "POST",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(result)
            {
                location.href = '<?= base_url('admin/personalizar')?>';
            },
            error: function(result)
            {
                displayError(result.responseText, 3000);
            }
        });
    }
</script>
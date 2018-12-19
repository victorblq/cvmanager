<div class="box box-primary with-border">
    <form role="form" id="form_personal_info" name="form_personal_info">
        <div class="box-body">

            <h4><?= $this->lang->line('basic_info'); ?></h4>

            <div class="row">
                <div class="form-group col-md-12">
                    <label><?= $this->lang->line('image'); ?></label>
                    <input type="file" id="profile_image" name="profile_image" accept=".jpg,.png,.jpeg" multiple>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2" id="profile_image">
                    <div style="height: 250px;">
                        <img src="<?= base_url("uploads/img/".$personal_info->image)?>" style="width: 256px;height: 256px;border-radius: 50%;"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title"><?= $this->lang->line('title'); ?>*</label>
                    <input type="text" class="form-control" name="title" id="title" 
                        value="<?= isset($personal_info->title) ? $personal_info->title : '' ?>" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="subtitle"><?= $this->lang->line('subtitle'); ?></label>
                    <input type="text" class="form-control" name="subtitle" id="subtitle"
                    value="<?= isset($personal_info->subtitle) ? $personal_info->subtitle : '' ?>" >
                </div>
            </div>

            <hr>

            <h4><?= $this->lang->line('about'); ?></h4>
            <input type="checkbox" name="show_about_section" id="show_about_section"
                <?= isset($personal_info->show_about_section) && $personal_info->show_about_section == '1' ? "checked" : '';?>> 
                <?= $this->lang->line('show_this_section'); ?>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="about1"><?= $this->lang->line('about'); ?> #1</label>
                    <input type="text" class="form-control" name="about1" id="about1"
                        value="<?= isset($personal_info->about1) ? $personal_info->about1 : '' ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="about2"><?= $this->lang->line('about'); ?> #2</label>
                    <input type="text" class="form-control" name="about2" id="about2"
                        value="<?= isset($personal_info->about2) ? $personal_info->about2 : '' ?>">
                </div>

                <div class="form-group col-md-12">
                    <label for="about3"><?= $this->lang->line('about'); ?> #3</label>
                    <input type="text" class="form-control" name="about3" id="about3"
                        value="<?= isset($personal_info->about3) ? $personal_info->about3 : '' ?>">
                </div>
            </div>

            <hr>

            <h4><?= $this->lang->line('contact'); ?></h4>
            <input type="checkbox" name="show_contact_section" id="show_contact_section"
                <?= isset($personal_info->show_contact_section) && $personal_info->show_contact_section == '1' ? "checked" : '';?>> 
                <?= $this->lang->line('show_this_section'); ?>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="phone1"><?= $this->lang->line('phone'); ?> #1</label>
                    <input type="text" class="form-control" name="phone1" id="phone1"
                        value="<?= isset($personal_info->phone1) ? $personal_info->phone1 : '' ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="phone2"><?= $this->lang->line('phone'); ?> #2</label>
                    <input type="text" class="form-control" name="phone2" id="phone2"
                        value="<?= isset($personal_info->phone2) ? $personal_info->phone2 : '' ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="phone3"><?= $this->lang->line('phone'); ?> #3</label>
                    <input type="text" class="form-control" name="phone3" id="phone3"
                        value="<?= isset($personal_info->phone3) ? $personal_info->phone3 : '' ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="phone4"><?= $this->lang->line('phone'); ?> #4</label>
                    <input type="text" class="form-control" name="phone4" id="phone4"
                        value="<?= isset($personal_info->phone4) ? $personal_info->phone4 : '' ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email1"><?= $this->lang->line('email'); ?> #1</label>
                    <input type="text" class="form-control" name="email1" id="email1"
                        value="<?= isset($personal_info->email1) ? $personal_info->email1 : '' ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="email2"><?= $this->lang->line('email'); ?> #2</label>
                    <input type="text" class="form-control" name="email2" id="email2"
                        value="<?= isset($personal_info->email2) ? $personal_info->email2 : '' ?>">
                </div>
            </div>

            <hr>

            <h4><?= $this->lang->line('references'); ?></h4>
            <input type="checkbox" name="show_references_section" id="show_references_section"
                <?= isset($personal_info->show_references_section) && $personal_info->show_references_section == '1' ? "checked" : '';?>> 
            <?= $this->lang->line('show_this_section'); ?>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="references1"><?= $this->lang->line('references'); ?> #1</label>
                    <input type="text" class="form-control" name="references1" id="references1"
                        value="<?= isset($personal_info->references1) ? $personal_info->references1 : '' ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="references2"><?= $this->lang->line('references'); ?> #2</label>
                    <input type="text" class="form-control" name="references2" id="references2"
                        value="<?= isset($personal_info->references2) ? $personal_info->references2 : '' ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="references3"><?= $this->lang->line('references'); ?> #3</label>
                    <input type="text" class="form-control" name="references3" id="references3"
                        value="<?= isset($personal_info->references3) ? $personal_info->references3 : '' ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="references4"><?= $this->lang->line('references'); ?> #4</label>
                    <input type="text" class="form-control" name="references4" id="references4"
                        value="<?= isset($personal_info->references4) ? $personal_info->references4 : '' ?>">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default" onClick="location.href = '<?= base_url('admin/personalinfo') ?>'"><?= $this->lang->line('restore'); ?></button>
                <button type="button" class="btn btn-success" onclick="update_personal_info()" stlye="margin-left: 5px;"><?= $this->lang->line('save'); ?></button>
            </div>
        </div>
    </form>
</div>

<script>
    function update_personal_info(){
        let form_data = new FormData($("form")[0]);

        if(validate_form()){
            $.ajax({
                'url': '<?= base_url('admin/update_personalinfo')?>',
                method: "POST",
                data:form_data,
                cache:false,
                contentType: false,
                processData: false,
                success: function(result) {
                    // location.href = '<?= base_url('admin/personalinfo')?>';
                },
                error: function(result) {
                    show_toast('<?= $this->lang->line("error") ?>', result.responseText, 'danger');
                }
            });
        } else {
            show_toast('<?= $this->lang->line("error") ?>', '<?= $this->lang->line('fill_all_required_fields') ?>', 'danger');
        }
    }
</script>
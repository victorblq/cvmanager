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
                        <img src="<?= base_url("uploads/img/profile.jpg")?>" style="width: 256px;height: 256px;border-radius: 50%;"/>
                    </div>

                    <button type="button" class="btn btn-danger" style="width: 100%">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title"><?= $this->lang->line('title'); ?></label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="sub_title"><?= $this->lang->line('sub_title'); ?></label>
                    <input type="text" class="form-control" name="sub_title" id="sub_title">
                </div>
            </div>

            <hr>

            <h4><?= $this->lang->line('about'); ?></h4>
            <input type="checkbox" name="show_about_section" id="show_about_section"> <?= $this->lang->line('show_this_section'); ?>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="about1"><?= $this->lang->line('about'); ?> #1</label>
                    <input type="text" class="form-control" name="about1" id="about1">
                </div>

                <div class="form-group col-md-6">
                    <label for="about2"><?= $this->lang->line('about'); ?> #2</label>
                    <input type="text" class="form-control" name="about2" id="about2">
                </div>

                <div class="form-group col-md-12">
                    <label for="about3"><?= $this->lang->line('about'); ?> #3</label>
                    <input type="text" class="form-control" name="about3" id="about3">
                </div>
            </div>

            <hr>

            <h4><?= $this->lang->line('contact'); ?></h4>
            <input type="checkbox" name="show_contact_section" id="show_contact_section"> <?= $this->lang->line('show_this_section'); ?>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="phone1"><?= $this->lang->line('phone'); ?> #1</label>
                    <input type="text" class="form-control" name="phone1" id="phone1">
                </div>
                <div class="form-group col-md-3">
                    <label for="phone2"><?= $this->lang->line('phone'); ?> #2</label>
                    <input type="text" class="form-control" name="phone2" id="phone2">
                </div>
                <div class="form-group col-md-3">
                    <label for="phone3"><?= $this->lang->line('phone'); ?> #3</label>
                    <input type="text" class="form-control" name="phone3" id="phone3">
                </div>
                <div class="form-group col-md-3">
                    <label for="phone4"><?= $this->lang->line('phone'); ?> #4</label>
                    <input type="text" class="form-control" name="phone4" id="phone4">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email1"><?= $this->lang->line('email'); ?> #1</label>
                    <input type="text" class="form-control" name="email1" id="email1">
                </div>
                <div class="form-group col-md-6">
                    <label for="email2"><?= $this->lang->line('email'); ?> #2</label>
                    <input type="text" class="form-control" name="email2" id="email2">
                </div>
            </div>

            <hr>

            <h4><?= $this->lang->line('references'); ?></h4>
            <input type="checkbox" name="show_references_section" id="show_references_section"> <?= $this->lang->line('show_this_section'); ?>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="references1"><?= $this->lang->line('references'); ?> #1</label>
                    <input type="text" class="form-control" name="references1" id="references1">
                </div>

                <div class="form-group col-md-3">
                    <label for="references2"><?= $this->lang->line('references'); ?> #2</label>
                    <input type="text" class="form-control" name="references2" id="references2">
                </div>

                <div class="form-group col-md-3">
                    <label for="references3"><?= $this->lang->line('references'); ?> #3</label>
                    <input type="text" class="form-control" name="references3" id="references3">
                </div>

                <div class="form-group col-md-3">
                    <label for="references4"><?= $this->lang->line('references'); ?> #4</label>
                    <input type="text" class="form-control" name="references4" id="references4">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default" onClick="location.href = '<?= base_url('admin/personalinfo') ?>'"><?= $this->lang->line('restore'); ?></button>
                <button type="button" class="btn btn-success" onclick="salvarEvento()" stlye="margin-left: 5px;"><?= $this->lang->line('save'); ?></button>
            </div>
        </div>
    </form>
</div>
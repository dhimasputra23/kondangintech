<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Email Configuration')); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Email Configuration')); ?></li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><?php echo e(__('Email Configuration')); ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.mail.config.update')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <label for="is_smtp" class="col-sm-2 control-label"><?php echo e(__('SMTP')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <select name="is_smtp" class="form-control">
                                                <option value="1" <?php echo e($emailsetting->is_smtp == 1 ? 'selected' : ''); ?>><?php echo e(__('Activated')); ?></option>
                                                <option value="0" <?php echo e($emailsetting->is_smtp == 0 ? 'selected' : ''); ?>><?php echo e(__('Deactivated')); ?></option>
                                            </select>
                                            <?php if($errors->has('is_smtp')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('is_smtp')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="header_email" class="col-sm-2 control-label"><?php echo e(__('Mail Engine')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <select name="header_email" class="form-control">
                                                <option value="smtp" <?php echo e($emailsetting->header_email == 'smtp' ? 'selected' : ''); ?>><?php echo e(__('SMTP')); ?></option>
                                            </select>
                                            <?php if($errors->has('header_email')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('header_email')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="smtp_host" class="col-sm-2 control-label"><?php echo e(__('SMTP HOST')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="smtp_host" placeholder="<?php echo e(__('SMTP HOST')); ?>" value="<?php echo e($emailsetting->smtp_host); ?>">
                                            <?php if($errors->has('smtp_host')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('smtp_host')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="smtp_port" class="col-sm-2 control-label"><?php echo e(__('SMTP PORT')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="smtp_port" placeholder="<?php echo e(__('SMTP PORT')); ?>" value="<?php echo e($emailsetting->smtp_port); ?>">
                                            <?php if($errors->has('smtp_port')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('smtp_port')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email_encryption" class="col-sm-2 control-label"><?php echo e(__('Encryption')); ?></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email_encryption" placeholder="<?php echo e(__('Encryption')); ?>" value="<?php echo e($emailsetting->email_encryption); ?>">
                                            <?php if($errors->has('email_encryption')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('email_encryption')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="smtp_user" class="col-sm-2 control-label"><?php echo e(__('SMTP Username')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="smtp_user" placeholder="<?php echo e(__('SMTP Username')); ?>" value="<?php echo e($emailsetting->smtp_user); ?>">
                                            <?php if($errors->has('smtp_user')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('smtp_user')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="smtp_pass" class="col-sm-2 control-label"><?php echo e(__('SMTP Password')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="smtp_pass" placeholder="<?php echo e(__('SMTP Password')); ?>" value="<?php echo e($emailsetting->smtp_pass); ?>">
                                            <?php if($errors->has('smtp_pass')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('smtp_pass')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="from_email" class="col-sm-2 control-label"><?php echo e(__('From Email')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="from_email" placeholder="<?php echo e(__('From Email')); ?>" value="<?php echo e($emailsetting->from_email); ?>">
                                            <?php if($errors->has('from_email')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('from_email')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="from_name" class="col-sm-2 control-label"><?php echo e(__('From Name')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="from_name" placeholder="<?php echo e(__('From Name')); ?>" value="<?php echo e($emailsetting->from_name); ?>">
                                            <?php if($errors->has('from_name')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('from_name')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/email/config.blade.php ENDPATH**/ ?>
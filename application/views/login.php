<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <?php include 'includes.php'; ?>
    <title><?php echo ('Login'); ?> | <?php echo $system_title; ?></title>
</head>

<body>
    <?php if ($this->session->flashdata('flash_message') != "") : ?>
        <script>
            $(document).ready(function() {
                Growl.info({
                    title: "<?php echo $this->session->flashdata('flash_message'); ?>",
                    text: " "
                })
            });
        </script>
    <?php endif; ?>
    <div class="navbar navbar-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?php echo base_url(); ?>"><?php echo $system_name; ?></a>

                <ul class="nav pull-right">
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select Language <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            $fields = $this->db->list_fields('language');
                            foreach ($fields as $field) {
                                if ($field == 'phrase_id' || $field == 'phrase') continue;
                            ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php?multilanguage/select_language/<?php echo $field; ?>">
                                        <?php echo $field; ?>
                                        <?php
                                        if ($this->session->userdata('current_language') == $field) : ?>
                                            <i class="icon-ok"></i>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li> -->
                </ul>

            </div>
        </div>
    </div>
    <style>
        body {
            background-image: url('https://c8.alamy.com/zooms/9/220b6841ccad4fffaee06d69c47b4d18/rx133f.jpg');
            background-size: cover;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            max-width: 700px;
            width: 500px !important;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgb(192 203 255);
        }


        .login-form h4 {
            text-align: center;
        }

        .login-form .form-group {
            margin-bottom: 20px;
        }

        .login-form .form-group select {
            width: 100%;
            padding: 10px;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-form .form-group input {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #FFB84C !important;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .login-form a {
            text-decoration: none;
            color: #337ab7;
        }

        hr {
            margin: 10px 0;
            border: 0;
            border-top: 2px solid #0068cc;
            border-bottom: 1px solid #0068cc;
        }
    </style>

    <div class="container">
        <div class="login-form">
            <h4>Hospital Management System</h4>
            <div class="box-header">
                <span class="title"><?php echo ('Login Panel'); ?></span>
            </div>
            <div class="box-content padded">
                <i class="m-icon-swapright m-icon-white"></i>
                <?php echo form_open('login', array('class' => 'separate-sections')); ?>
                <div class="form-group">
                    <select class="validate[required]" name="login_type">
                        <option value=""><?php echo ('--- Select Account Type ---'); ?></option>
                        <option value="admin"><?php echo ('Admin'); ?></option>
                        <option value="doctor"><?php echo ('Doctor'); ?></option>
                        <option value="patient"><?php echo ('Patient'); ?></option>
                        <option value="laboratorist"><?php echo ('Laboratorist'); ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <input name="email" type="text" placeholder="<?php echo ('Email'); ?>">
                </div>
                <div class="form-group">
                    <input name="password" type="password" placeholder="<?php echo ('Password'); ?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <?php echo ('Login'); ?>
                    </button>
                </div>
                <?php echo form_close(); ?>
                <div>
                    <a data-toggle="modal" href="#modal-simple">
                        <?php echo ('Forgot Password?'); ?>
                    </a>
                </div>
            </div>
            <?php include 'application/views/footer.php'; ?>
        </div>
    </div>



    <!-----------password reset form ------>
    <div id="modal-simple" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6 id="modal-tablesLabel"><?php echo ('Reset Password'); ?></h6>
        </div>
        <div class="modal-body">
            <?php echo form_open('login/reset_password'); ?>
            <select class="validate[required]" name="account_type" style="margin-bottom: 0px !important;">
                <option value=""><?php echo ('Account Type'); ?></option>
                <option value="admin"><?php echo ('Admin'); ?></option>
                <option value="doctor"><?php echo ('Doctor'); ?></option>
                <option value="patient"><?php echo ('Patient'); ?></option>
                <option value="nurse"><?php echo ('Nurse'); ?></option>
                <option value="pharmacist"><?php echo ('Pharmacist'); ?></option>
                <option value="laboratorist"><?php echo ('Laboratorist'); ?></option>
                <option value="accountant"><?php echo ('Accountant'); ?></option>
            </select>
            <input type="email" name="email" placeholder="<?php echo ('Email'); ?>" style="margin-bottom: 0px !important;" />
            <input type="submit" value="<?php echo ('Reset'); ?>" class="btn btn-blue btn-medium" />
            <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    <!-----------password reset form ------>


</body>

</html>
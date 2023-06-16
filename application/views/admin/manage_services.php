<style>
    table.dataTable thead tr th {
        background-color: #C6E0F3;
        color: #000000;
        font-weight: 600;
    }

    .control-group {
        display: flex;
        justify-content: center;
    }

    .control-label {
        font-weight: 500;
        padding: 5px;
        font-size: 13px;
    }

    input {
        padding: 3px !important;
    }

    .selector {
        width: 210px !important;
    }

    .uploader {
        width: 53% !important;
        margin: 5px;
    }
</style>

<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">
            <?php if (isset($edit_profile)) : ?>
                <li class="active">
                    <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i>
                        <?php echo ('Edit Service'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo ('Services List'); ?>
                </a>
            </li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo ('Add Service'); ?>
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!----EDITING FORM STARTS---->
            <?php if (isset($edit_profile)) : ?>
                <div class="tab-pane box active" id="edit" style="padding: 5px">
                    <div class="box-content">
                        <?php foreach ($edit_profile as $row) : ?>
                            <?php echo form_open('admin/manage_services/edit/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'enctype' => 'multipart/form-data')); ?>
                            <div class="padded">
                                <div class="control-group">
                                    <label class="control-label"><?php echo ('Service Name'); ?></label>
                                    <div class="controls">
                                        <input type="text" class="validate[required]" name="service_name" value="<?php echo $row['service_name']; ?>" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo ('Service Description'); ?></label>
                                    <div class="controls">
                                        <textarea class="form-control" name="service_des" id="" rows="3"><?php echo $row['service_des']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions" style="text-align: center;">
                                <button type="submit" class="btn btn-primary"><?php echo ('Edit Services'); ?></button>
                            </div>
                            <?php echo form_close(); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!----EDITING FORM ENDS--->



            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                    <thead>
                        <tr>
                            <th style="padding: 5px;">
                                <div>#</div>
                            </th>
                            <th style="padding: 5px;">
                                <div><?php echo ('Service Name'); ?></div>
                            </th>
                            <th style="padding: 5px;">
                                <div><?php echo ('Service Description'); ?></div>
                            </th>
                            <th style="padding: 5px;">
                                <div><?php echo ('Options'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($services as $row) : ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['service_name']; ?></td>
                                <td><?php echo $row['service_des'] ?></td>
                                <td align="center">
                                    <a href="<?php echo base_url(); ?>index.php?admin/manage_services/edit/<?php echo $row['id']; ?>" rel="tooltip" data-placement="top" data-original-title="<?php echo ('Edit'); ?>" class="btn btn-success">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url(); ?>index.php?admin/manage_services/delete/<?php echo $row['id']; ?>" onclick="return confirm('delete?')" rel="tooltip" data-placement="top" data-original-title="<?php echo ('Delete'); ?>" class="btn btn-danger">
                                        <i class="icon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->

            <!----CREATION FORM STARTS---->

            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/manage_services/create/', array('class' => 'form-horizontal validatable', 'enctype' => 'multipart/form-data')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo ('Service Name'); ?></label>
                            <div class="controls">
                                <input type="text" class="validate[required]" name="service_name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo ('Service Description'); ?></label>
                            <div class="controls">
                              <textarea class="form-control" name="service_des" id="" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions" style="text-align: center;">
                        <button type="submit" class="btn btn-primary"><?php echo ('Add Service'); ?></button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <!----CREATION FORM ENDS--->



        </div>

    </div>

</div>

</div>
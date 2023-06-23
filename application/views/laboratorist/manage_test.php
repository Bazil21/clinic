<style>
    table.dataTable thead tr th {
        background-color: #C6E0F3;
        color: #000000;
        font-weight: 600;
    }
    .control-label{
        font-weight: 500;
        padding: 2px;
    }
</style>


<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">
            <?php if (isset($edit_profile)) : ?>
                <li class="active">
                    <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i>
                        <?php echo ('Edit Department'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo ('Manage Test List'); ?>
                </a>
            </li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo ('Add Test'); ?>
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
                            <?php echo form_open('laboratorist/manage_test/edit/do_update/' . $row['id'], array('class' => 'form-horizontal validatable')); ?>
                            <div class="centered-container">
                                <div class="padded">
                                    <div class="control-group" style="display: flex;justify-content:center;">
                                        <label class="control-label"><?php echo ('Test Name'); ?></label>
                                        <div class="controls">
                                            <input type="text" class="validate[required]" name="name" value="<?php echo $row['name']; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group" style="display: flex;justify-content:center;">
                                        <label class="control-label"><?php echo ('Test Description'); ?></label>
                                        <div class="controls">
                                            <input type="text" class="" name="description" value="<?php echo $row['description']; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions" style="text-align: center;">
                                <button type="submit" class="btn btn-primary"><?php echo ('Edit Department'); ?></button>
                            </div>
                            <?php echo form_close(); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <!----EDITING FORM ENDS--->
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">
                <table border="0" class="dTable responsive table-hover">
                    <thead>
                        <tr>
                            <th style="padding: 5px;">
                                <div>#</div>
                            </th>
                            <th style="padding: 5px;">
                                <div><?php echo ('Test Name'); ?></div>
                            </th>
                            <th style="padding: 5px;">
                                <div><?php echo ('Description'); ?></div>
                            </th>
                            <th style="padding: 5px;">
                                <div><?php echo ('Action'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($departments as $row) : ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td align="center" style="display:flex;">
                                    <a href="<?php echo base_url(); ?>index.php?laboratorist/manage_test/edit/<?php echo $row['id']; ?>" rel="tooltip" data-placement="top" data-original-title="<?php echo ('Edit'); ?>" class="btn btn-success">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url(); ?>index.php?laboratorist/manage_test/delete/<?php echo $row['id']; ?>" onclick="return confirm('delete?')" rel="tooltip" data-placement="top" data-original-title="<?php echo ('Delete'); ?>" class="btn btn-danger">
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
                    <?php echo form_open('laboratorist/manage_test/create', array('class' => 'form-horizontal validatable')); ?>
                    <div class="padded" style="text-align: center;">
                        <div class="control-group">

                            <div class="controls">
                                &nbsp;&nbsp; <?php echo ('<b>Test Name </b>'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" class="validate[required] center-input" name="name" />
                            </div>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <?php echo ('<b>Test Description  </b>'); ?> &nbsp;
                                <input type="text" class="center-input" name="description" />
                            </div>
                        </div>
                    </div>
                    <div class="form-actions" style="text-align: center;">
                        <button type="submit" class="btn btn-info"><?php echo ('Add Test'); ?></button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


            <!----CREATION FORM ENDS--->

        </div>
    </div>
</div>
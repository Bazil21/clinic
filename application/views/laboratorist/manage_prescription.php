<style>
    table.dataTable thead tr th {
        background-color: #0081C9;
        color: #ffff;
        font-weight: 400;
        font-size: 14px;
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
</style>
<style>
    .padded {
        padding: 10px;
    }

    .control-group {
        margin-bottom: 15px;
    }

    .control-label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .controls {
        padding: 5px;
        border: 1px solid #ccc;
        background-color: #f7f7f7;
    }
</style>

<div class="box">

    <div class="box-header">



        <!------CONTROL TABS START------->

        <ul class="nav nav-tabs nav-tabs-left">

            <?php if (isset($edit_profile)) : ?>

                <li class="active">

                    <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i>

                        <?php echo ('Edit Prescription'); ?>

                    </a></li>

            <?php endif; ?>

            <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">

                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>

                    <?php echo ('Prescription List'); ?>

                </a></li>

        </ul>

        <!------CONTROL TABS END------->



    </div>

    <div class="box-content padded">

        <div class="tab-content">

            <!----EDITING FORM STARTS---->

            <?php if (isset($edit_profile)) : ?>

                <div class="tab-pane box active" id="edit" style="padding: 5px">

                    <div class="box-content">

                        <?php

                        foreach ($edit_profile as $row) :

                            $prescription_id    =    $row['prescription_id'];

                            ?>

                            <?php echo form_open('laboratorist/manage_prescription/edit/do_update/' . $row['prescription_id'], array('class' => 'form-horizontal validatable')); ?>

                            <div class="padded">

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Doctor'); ?></label>

                                    <div class="controls">

                                        <?php echo $this->crud_model->get_type_name_by_id('doctor', $row['doctor_id'], 'name'); ?>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Patient'); ?></label>

                                    <div class="controls">

                                        <?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name'); ?>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Case History'); ?></label>

                                    <div class="controls">

                                        <?php echo $row['case_history']; ?>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Medication'); ?></label>

                                    <div class="controls">

                                        <?php echo $row['medication']; ?>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Medication from Pharmacist'); ?></label>

                                    <div class="controls">

                                        <?php echo $row['medication_from_pharmacist']; ?>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Description'); ?></label>

                                    <div class="controls">

                                        <?php echo $row['description']; ?>

                                    </div>

                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo ('Lab Test'); ?></label>
                                    <div class="controls">
                                        <?php
                                        $testIds = explode(',', $row['test_ids']);
                                        $testNames = array();
                                        foreach ($testIds as $testId) {
                                            $test = $this->db->get_where('test_coding', array('id' => $testId))->row();
                                            if ($test) {
                                                $testNames[] = $test->name;
                                            }
                                        }
                                        echo implode(', ', $testNames);
                                        ?>
                                    </div>
                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Date'); ?></label>

                                    <div class="controls">

                                        <?php echo date('m/d/Y', $row['creation_timestamp']); ?>

                                    </div>

                                </div>

                            </div>

                            </form>



                            <!------DIAGNOSTIC REPORT FOR THIS PRESCRIPTION---->

                            <div class="box">

                                <div class="box-header"><span class="title"><?php echo ('Diagnosis Report'); ?></span></div>

                                <div class="box-content">

                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-normal ">

                                        <thead>

                                            <tr>

                                                <td>
                                                    <div>#</div>
                                                    </th>


                                                <td>
                                                    <div><?php echo ('Document Type'); ?></div>
                                                </td>

                                                <td>
                                                    <div><?php echo ('Download'); ?></div>
                                                </td>

                                                <td>
                                                    <div><?php echo ('Description'); ?></div>
                                                </td>

                                                <td>
                                                    <div><?php echo ('Date'); ?></div>
                                                </td>

                                                <td>
                                                    <div><?php echo ('Laboratorist'); ?></div>
                                                </td>

                                                <td>
                                                    <div><?php echo ('Option'); ?></div>
                                                </td>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php

                                            $count = 1;

                                            $diagnostic_reports    =    $this->db->get_where('diagnosis_report', array('prescription_id' => $prescription_id))->result_array();

                                            foreach ($diagnostic_reports as $row2) : ?>

                                                <tr>

                                                    <td><?php echo $count++; ?></td>


                                                    <td><?php echo $row2['document_type']; ?></td>

                                                    <td style="text-align:center;">

                                                        <?php if ($row2['document_type'] == 'image') : ?>

                                                            <div id="thumbs">

                                                                <a href="<?php echo base_url(); ?>uploads/diagnosis_report/<?php echo $row2['file_name']; ?>" style="background-image:url(<?php echo base_url(); ?>uploads/diagnosis_report/<?php echo $row2['file_name']; ?>)" title="<?php echo $row2['file_name']; ?>">

                                                                </a></div>

                                                        <?php endif; ?>



                                                        <a href="<?php echo base_url(); ?>uploads/diagnosis_report/<?php echo $row2['file_name']; ?>" target="_blank" class="btn btn-primary"> <i class="icon-download-alt"></i> <?php echo ('Download'); ?></a>

                                                    </td>

                                                    <td><?php echo $row2['description']; ?></td>

                                                    <td><?php echo date('d M,Y', $row2['timestamp']); ?></td>

                                                    <td><?php echo $this->crud_model->get_type_name_by_id('laboratorist', $row2['laboratorist_id'], 'name'); ?></td>

                                                    <td align="center">

                                                        <a href="<?php echo base_url(); ?>index.php?laboratorist/manage_prescription/delete_diagnosis_report/<?php echo $row2['diagnosis_report_id']; ?>/<?php echo $prescription_id; ?>" onclick="return confirm('delete?')" rel="tooltip" data-placement="top" data-original-title="<?php echo ('Delete'); ?>" class="btn btn-red">

                                                            <i class="icon-trash"></i>

                                                        </a>

                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>



                            <!------DIAGNOSTIC REPORT FOR THIS PRESCRIPTION---->





                            <!------ADD A DIAGNOSTIC REPORT TO THIS PRESCRIPTION-->

                            <div class="box">

                                <div class="box-header"><span class="title"><?php echo ('Add Diagnosis Report'); ?></span></div>

                                <div class="box-content">

                                    <?php echo form_open_multipart('laboratorist/manage_prescription/create_diagnosis_report', array('class' => 'form-horizontal validatable')); ?>

                                    <div class="padded">

                                        <div class="control-group">
                                            <label class="control-label"><?php echo ('Lab Test'); ?></label>
                                            <div class="controls">
                                                <?php
                                                $testIds = explode(',', $row['test_ids']);
                                                $testNames = array();
                                                foreach ($testIds as $testId) {
                                                    $test = $this->db->get_where('test_coding', array('id' => $testId))->row();
                                                    if ($test) {
                                                        $testNames[] = $test->name;
                                                    }
                                                }
                                                echo implode(', ', $testNames);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="control-group">

                                            <label class="control-label"><?php echo ('Document Type'); ?></label>

                                            <div class="controls">

                                                <select name="document_type">

                                                    <option value="image"><?php echo ('Image'); ?></option>

                                                    <option value="doc"><?php echo ('DOC'); ?></option>

                                                    <option value="pdf"><?php echo ('PDF'); ?></option>

                                                    <option value="excel"><?php echo ('Excel'); ?></option>

                                                    <option value="other"><?php echo ('Other'); ?></option>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label"><?php echo ('Upload Document'); ?></label>

                                            <div class="controls">

                                                <input type="file" name="userfile" />


                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label"><?php echo ('Description'); ?></label>

                                            <div class="controls">

                                                <textarea name="description"></textarea>

                                            </div>

                                        </div>

                                        <div class="control-group">



                                            <div class="controls">

                                                <input type="hidden" name="prescription_id" value="<?php echo $prescription_id; ?>" />

                                                <button type="submit" class="btn btn-success"><?php echo ('Add Diagnosis Report'); ?></button>

                                            </div>

                                        </div>



                                    </div>

                                    </form>

                                </div>

                            </div>

                            <!------ADD A DIAGNOSTIC REPORT TO THIS PRESCRIPTION-->





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

                            <th>
                                <div>#</div>
                            </th>

                            <th>
                                <div><?php echo ('Date'); ?></div>
                            </th>

                            <th>
                                <div><?php echo ('Patient'); ?></div>
                            </th>

                            <th>
                                <div><?php echo ('Doctor'); ?></div>
                            </th>

                            <!-- <th><div><?php echo ('Report Status'); ?></div></th> -->

                            <th>
                                <div><?php echo ('Options'); ?></div>
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $count = 1;
                        foreach ($prescriptions as $row) : ?>

                            <tr>

                                <td><?php echo $count++; ?></td>

                                <td><?php echo date('d M,Y', $row['creation_timestamp']); ?></td>

                                <td><?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name'); ?></td>

                                <td><?php echo $this->crud_model->get_type_name_by_id('doctor', $row['doctor_id'], 'name'); ?></td>

                                <!-- <td><span class="label label-blue">0 report</span></td> -->

                                <td align="center">



                                    <a href="<?php echo base_url(); ?>index.php?laboratorist/manage_prescription/edit/<?php echo $row['prescription_id']; ?>" rel="tooltip" data-placement="top" data-original-title="<?php echo ('Edit'); ?>" class="btn btn-primary">

                                        <i class="icon-wrench"></i> <?php echo ('Add Diagnostic Report'); ?>

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <!----TABLE LISTING ENDS--->



        </div>

    </div>

</div>>>
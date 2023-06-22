<style>
    .action-nav-button {
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        border-radius: 4px;
        cursor: pointer;

        color: #fff;
        /* Set text color */
    }

    .action-nav-button:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .action-nav-button a {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s ease;
    }

    .action-nav-button:hover a {
        color: #f2f2f2;
    }

    .action-nav-button i {
        font-size: 24px;
        margin-bottom: 10px;
        transition: transform 0.3s ease;
    }

    .action-nav-button:hover i {
        transform: scale(1.2);
    }

    .action-nav-button span {
        display: block;
        font-size: 14px;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .action-nav-button:hover span {
        color: #f2f2f2;
    }

    .action-nav-normal .action-nav-button a {
        background: none !important;
        border: none !important;
        color: white !important;
    }

    .action-nav-normal .action-nav-button a>i {
        color: #fff !important;
    }

    .badge {
        background-color: #E21818;
        color: #fff;
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 10px;
        margin-left: 5px;
        /* Adjust the margin as needed */
    }
</style>

<div class="container-fluid padded">

    <div class="row-fluid">

        <div class="span30">

            <!-- find me in partials/action_nav_normal -->

            <!--big normal buttons-->

            <div class="action-nav-normal">

                <div class="row-fluid">
                    <div class="span3 action-nav-button" style="background-color: #0A6EBD;">

                        <a href="<?php echo base_url(); ?>index.php?patient/view_doctor">

                            <i class=" icon-user-md"></i>

                            <span><?php echo ('Total Doctor'); ?></span>
                            <span class="badge"><?php echo $this->db->count_all_results('doctor'); ?></span> <!-- Add the badge number here -->
                        </a>

                    </div>


                    <div class="span3 action-nav-button" style="background-color: #FFA41B;">

                        <a href="<?php echo base_url(); ?>index.php?patient/view_appointment">

                            <i class="icon-calendar"></i>

                            <span><?php echo ('View  Appointment'); ?></span>
                            <span class="badge"><?php
                                                $patient_id = $this->session->userdata('patient_id');
                                                $total_App = $this->db->query("Select count(*) as total_App from Appointment where patient_id='$patient_id'")->row_array()['total_App'];
                                                echo $total_App;

                                                ?>

                            </span> <!-- Add the badge number here -->
                        </a>

                    </div>
                    <div class="span3 action-nav-button" style="background-color: #17594A;">
                        <a href="<?php echo base_url(); ?>index.php?patient/view_prescription">
                            <i class="icon-file"></i>
                            <span><?php echo ('View Prescription'); ?></span>
                        </a>
                    </div>
                    <div class="span3 action-nav-button" style="background-color: #7E1717;">
                        <a href="<?php echo base_url(); ?>index.php?patient/view_prescription">
                            <i class=" icon-medkit"></i>
                            <span><?php echo ('View Lab Reports'); ?></span>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <!---DASHBOARD MENU BAR ENDS HERE-->

    </div>

    <hr />

    <div class="row-fluid">



        <!-----CALENDAR SCHEDULE STARTS-->



        <!-----CALENDAR SCHEDULE ENDS-->



        <!-----NOTICEBOARD LIST STARTS-->

        <div>

            <div class="box">

                <div class="box-header">

                    <span class="title">

                        <i class="icon-reorder"></i> <?php echo ('Noticeboard'); ?>

                    </span>

                </div>

                <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">



                    <?php

                    $notices    =    $this->db->get('noticeboard')->result_array();

                    foreach ($notices as $row) :

                        ?>

                        <div class="box-section news with-icons">

                            <div class="avatar blue">

                                <i class="icon-tag icon-2x"></i>

                            </div>

                            <div class="news-time">

                                <span><?php echo date('d', $row['create_timestamp']); ?></span> <?php echo date('M', $row['create_timestamp']); ?>

                            </div>

                            <div class="news-content">

                                <div class="news-title">

                                    <?php echo $row['notice_title']; ?>

                                </div>

                                <div class="news-text">

                                    <?php echo $row['notice']; ?>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

        <!-----NOTICEBOARD LIST ENDS-->

    </div>

</div>
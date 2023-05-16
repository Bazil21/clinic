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



                    <div class="span2 action-nav-button" style="background-color: #1B9C85;">

                        <a href="<?php echo base_url(); ?>index.php?admin/manage_patient">

                            <i class="icon-user"></i>

                            <span><?php echo ('Total Patient'); ?></span>
                            <span class="badge"><?php echo $this->db->count_all_results('patient'); ?></span> <!-- Add the badge number here -->
                        </a>

                    </div>
                    <div class="span2 action-nav-button" style="background-color: #643A6B;">

                        <a href="<?php echo base_url(); ?>index.php?admin/manage_doctor">

                            <i class="icon-credit-card"></i>

                            <span><?php echo ('Total Doctor'); ?></span>
                            <span class="badge"><?php echo $this->db->count_all_results('doctor'); ?></span> <!-- Add the badge number here -->
                        </a>

                    </div>
                    <div class="span2 action-nav-button" style="background-color: #4C4C6D;">

                        <a href="<?php echo base_url(); ?>index.php?admin/manage_laboratorist">

                            <i class="icon-beaker"></i>

                            <span><?php echo ('Total Laboratorist'); ?></span>
                            <span class="badge"><?php echo $this->db->count_all_results('laboratorist'); ?></span> <!-- Add the badge number here -->
                        </a>

                    </div>
                    <div class="span2 action-nav-button" style="background-color: #FC4F00;">

                        <a href="<?php echo base_url(); ?>index.php?admin/view_appointment">

                            <i class="icon-exchange"></i>

                            <span><?php echo ('Appointment'); ?></span>

                        </a>

                    </div>




                    <div class="span2 action-nav-button" style="background-color: #FF6969;">

                        <a href="<?php echo base_url(); ?>index.php?admin/view_medicine">

                            <i class="icon-medkit"></i>

                            <span><?php echo ('Medicine'); ?></span>

                        </a>

                    </div>
                    <div class="span2 action-nav-button" style="background-color: #41644A;">

                        <a href="<?php echo base_url(); ?>index.php?admin/manage_noticeboard">

                            <i class="icon-columns"></i>

                            <span><?php echo ('Noticeboard'); ?></span>

                        </a>

                    </div>
                </div>




            </div>

        </div>

        <!---DASHBOARD MENU BAR ENDS HERE-->

    </div>

    <hr />
    <style>
        .box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .box-header {
            background-color: #eee;

            border-bottom: 1px solid #ddd;
            border-radius: 4px 4px 0 0;
        }

        .box-header .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 0;
        }


        .fc-widget-header {
            background-color: #eee;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-radius: 4px 4px 0 0;
        }

        .fc-widget-header .fc-widget-header-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 0;
        }

        .fc-widget-content {
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="row-fluid">



        <!-----CALENDAR SCHEDULE STARTS-->

        <div class="span6">
            <div class="box">
                <div class="box-header" style="background: gold !important;">
                    <div class="title">
                        <i class="icon-calendar"></i> <b><?php echo ('Calendar Schedule'); ?></b>
                    </div>
                </div>
                <div class="box-content">
                    <div id="schedule_calendar">
                        <!-- Calendar content goes here -->
                    </div>
                </div>
            </div>
        </div>

        <!-----CALENDAR SCHEDULE ENDS-->



        <!-----NOTICEBOARD LIST STARTS-->

        <div class="span6">

            <div class="box">

                <div class="box-header" style="background:#0000ffbf;color:#fff;">

                    <span class="title">

                        <i class="icon-reorder"></i> <?php echo ('Noticeboard'); ?>

                    </span>

                </div>

                <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">



                    <?php

                    $this->db->order_by('create_timestamp', 'desc');

                    $notices    =    $this->db->get('noticeboard')->result_array();

                    foreach ($notices as $row) :

                    ?>

                        <div class="box-section news with-icons" style="min-height: auto;background:#ffd70070;">
                            <div class="avatar blue" style="background:#857fdb !important;">
                                <i class="fa-solid fa-bell" style="color: #e6e7eb;"></i>
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







<script>
    $(document).ready(function() {



        // page is now ready, initialize the calendar...



        $("#schedule_calendar").fullCalendar({

            header: {

                left: "prev,next",

                center: "title",

                right: "month,agendaWeek,agendaDay"

            },

            editable: 0,

            droppable: 0,

            events: [

                <?php



                $notices    =    $this->db->get('noticeboard')->result_array();

                foreach ($notices as $row) :

                ?>

                    {

                        title: "<?php echo $row['notice_title']; ?>",

                        start: new Date(<?php echo date('Y', $row['create_timestamp']); ?>, <?php echo date('m', $row['create_timestamp']) - 1; ?>, <?php echo date('d', $row['create_timestamp']); ?>),

                        end: new Date(<?php echo date('Y', $row['create_timestamp']); ?>, <?php echo date('m', $row['create_timestamp']) - 1; ?>, <?php echo date('d', $row['create_timestamp']); ?>)

                    },

                <?php

                endforeach;

                ?>

            ]

        })



    });
</script>
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
    .fc-event-skin {
    background-color: #9f4dc9;
    }

</style>

<div class="container-fluid padded">

    <div class="row-fluid">

        <div class="span30">

            <!-- find me in partials/action_nav_normal -->

            <!--big normal buttons-->

            <div class="action-nav-normal">

                <div class="row-fluid">
                    <div class="span3 action-nav-button" style="background-color: #B04759;">
                        <a href="<?php echo base_url(); ?>index.php?doctor/manage_patient">

                            <i class=" icon-user"></i>

                            <span><?php echo ('Total Patients'); ?></span>
                            <span class="badge"><?php
                                                $doctor_id = $this->session->userdata('doctor_id');
                                                $total_App = $this->db->query("Select count(*) as total_App from Appointment where doctor_id='$doctor_id'")->row_array()['total_App'];
                                                echo $total_App;
                                                ?></span> <!-- Add the badge number here -->
                        </a>

                    </div>
                    <div class="span3 action-nav-button" style="background-color: #2E4F4F;">
                        <a href="<?php echo base_url(); ?>index.php?doctor/manage_appointment">

                            <i class="icon-stethoscope"></i>

                            <span><?php echo ('View Appointments'); ?></span>
                            <span class="badge"><?php
                                                $doctor_id = $this->session->userdata('doctor_id');
                                                $total_App = $this->db->query("Select count(*) as total_App from appointment where doctor_id='$doctor_id' and app_status is  null")->row_array()['total_App'];
                                                echo $total_App;
                                                ?></span> <!-- Add the badge number here -->
                        </a>

                    </div>
                    <div class="span3 action-nav-button" style="background-color: #19A7CE;">
                        <a href="<?php echo base_url(); ?>index.php?doctor/manage_prescription">
                            <i class="icon-file"></i>
                            <span><?php echo ('Manage Prescription'); ?></span>
                        </a>
                    </div>
                    <div class="span3 action-nav-button" style="background-color: #658864;">
                        <a href="<?php echo base_url(); ?>index.php?doctor/manage_report">
                            <i class=" icon-medkit"></i>
                            <span><?php echo ('Manage Lab Reports'); ?></span>
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

        <div class="span6">

            <div class="box">

                <div class="box-header">

                    <div class="title">

                        <i class="icon-calendar"></i> <?php echo ('Calendar Schedule'); ?>

                    </div>

                </div>

                <div class="box-content">

                    <div id="schedule_calendar">

                    </div>

                </div>

            </div>

        </div>

        <!-----CALENDAR SCHEDULE ENDS-->



        <!-----NOTICEBOARD LIST STARTS-->

        <div class="span6">

            <div class="box">

                <div class="box-header">

                    <span class="title">

                        <i class="icon-reorder"></i> <?php echo ('Noticeboard'); ?>

                    </span>

                </div>

                <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">



                    <?php

$notices = $this->db->order_by('notice_id', 'desc')->get('noticeboard')->result_array();


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

<script>

$(document).ready(function() {



  // page is now ready, initialize the calendar...



  $("#schedule_calendar").fullCalendar({

          header: {

              left: 	"prev,next",

              center: "title",

              right: 	"month,agendaWeek,agendaDay"

          },

          editable: 0,

          droppable: 0,

          events: [

                  <?php 

                  $appointments	=	$this->db->get_where('appointment' , array('doctor_id' => $this->session->userdata('doctor_id')))->result_array();

                  foreach($appointments as $row):

                  ?>

                  {

                      title: "<?php echo ('Appointment').' : '.$this->crud_model->get_type_name_by_id('patient' ,$row['patient_id'], 'name' );?>",

                      start: new Date(<?php echo date('Y',$row['appointment_timestamp']);?>, <?php echo date('m',$row['appointment_timestamp'])-1;?>, <?php echo date('d',$row['appointment_timestamp']);?>),

                      end:	new Date(<?php echo date('Y',$row['appointment_timestamp']);?>, <?php echo date('m',$row['appointment_timestamp'])-1;?>, <?php echo date('d',$row['appointment_timestamp']);?>)  

                  },

                  <?php

                  endforeach;

                  ?>

                  ]

      })



});

</script>
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

                <div class="span4 action-nav-button" style="background-color: #025464;">

                        <a href="<?php echo base_url();?>index.php?laboratorist/manage_test">

                        <i class="icon-tint"></i>

                        <span><?php echo ('Add Test');?></span>

                        </a>

                    </div>
                    <div class="span4 action-nav-button" style="background-color: #001C30;">

                        <a href="<?php echo base_url();?>index.php?laboratorist/manage_prescription">

                        <i class="icon-stethoscope"></i>

                        <span><?php echo ('Add Diagnosis Report');?></span>

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

                        <i class="icon-calendar"></i> <?php echo ('Calendar Schedule');?>

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

                        <i class="icon-reorder"></i> <?php echo ('Noticeboard');?>

                    </span>

                </div>

                <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">

                

                    <?php 

                    $notices	=	$this->db->get('noticeboard')->result_array();

                    foreach($notices as $row):

                    ?>

                    <div class="box-section news with-icons">

                        <div class="avatar blue">

                            <i class="icon-tag icon-2x"></i>

                        </div>

                        <div class="news-time">

                            <span><?php echo date('d',$row['create_timestamp']);?></span> <?php echo date('M',$row['create_timestamp']);?>

                        </div>

                        <div class="news-content">

                            <div class="news-title">

                                <?php echo $row['notice_title'];?>

                            </div>

                            <div class="news-text">

                                 <?php echo $row['notice'];?>

                            </div>

                        </div>

                    </div>

                    <?php endforeach;?>

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

                    $notices	=	$this->db->get('noticeboard')->result_array();

                    foreach($notices as $row):

                    ?>

					{

						title: "<?php echo $row['notice_title'];?>",

						start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),

						end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>)  

            		},

					<?php

					endforeach;

					?>

					]

        })



});

  </script>
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

</style>

<div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo ('View Appointment');?>

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">            

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box active" id="list">

				

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo ('Time');?></div></th>

                    		<th><div><?php echo ('Doctor');?></div></th>

                    		<th><div><?php echo ('Patient');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php 

						$count = 1;

						foreach($appointments as $row):

							?>

							<tr>

								<td><?php echo $count++;?></td>

								<td><?php echo date('d M,Y',$row['appointment_timestamp']);?></td>

                                <td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?></td>

                                <td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?></td>

							</tr>

							<?php 

						endforeach;

						?>

                    </tbody>

                </table>

			</div>

            <!----TABLE LISTING ENDS--->

		</div>

	</div>

</div>
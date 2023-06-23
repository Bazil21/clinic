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
			<?php if (isset($edit_profile)) : ?>

				<li class="active">

					<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i>

						<?php echo ('Edit Appointment'); ?>

					</a></li>

			<?php endif; ?>
			<li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">

				<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>

					<?php echo ('View Appointment'); ?>

				</a>
			</li>
			<li>

				<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					<?php echo ('Add Appointment'); ?>

				</a></li>

		</ul>

		<!------CONTROL TABS END------->



	</div>

	<div class="box-content padded">

		<div class="tab-content">

			<!----TABLE LISTING STARTS--->

			<?php if (isset($edit_profile)) : ?>

				<div class="tab-pane box active" id="edit" style="padding: 5px">

					<div class="box-content">

						<?php foreach ($edit_profile as $row) : ?>

							<?php echo form_open('admin/view_appointment/edit/do_update/' . $row['appointment_id'], array('class' => 'form-horizontal validatable')); ?>

							<div class="padded">

								<div class="control-group">

									<label class="control-label"><?php echo ('Doctor'); ?></label>

									<div class="controls" style="padding-top:6px;">

										<select class="chzn-select" name="doctor_id" id="">
											<?php $doctors = $this->db->query("Select * from doctor")->result_array();
											foreach ($doctors as $key => $value) {
												$selected = ($value['doctor_id'] == $row['doctor_id']) ? "selected" : "";

												?>
												<option value="<?php echo $value['doctor_id'] ?>" <?php echo  $selected; ?>><?php echo $value['name'] ?></option>
											<?php }
											?>

										</select>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label"><?php echo ('Patient'); ?></label>

									<div class="controls">

										<select class="chzn-select" name="patient_id">

											<?php

											$this->db->order_by('account_opening_timestamp', 'asc');

											$patients	=	$this->db->get('patient')->result_array();

											foreach ($patients as $row2) :

												?>

												<option value="<?php echo $row2['patient_id']; ?>" <?php if ($row2['patient_id'] == $row['patient_id']) echo 'selected'; ?>>

													<?php echo $row2['name']; ?></option>

											<?php

											endforeach;

											?>

										</select>

									</div>

								</div>

								<div class="control-group">
									<label class="control-label"><?php echo ('Date'); ?></label>
									<div class="controls">
										<input type="text" class="datepicker fill-up" name="appointment_timestamp" value="<?php echo date('m/d/Y', $row['appointment_timestamp']); ?>" />

									</div>

								</div>

							</div>

							<div class="form-actions" style="text-align: center;">
								<button type="submit" class="btn btn-primary"><?php echo ('Edit Appointment'); ?></button>
							</div>

							<?php echo form_close(); ?>

						<?php endforeach; ?>

					</div>

				</div>

			<?php endif; ?>

			<div class="tab-pane box <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">



				<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">

					<thead>

						<tr>

							<th>
								<div>#</div>
							</th>

							<th>
								<div><?php echo ('Time'); ?></div>
							</th>

							<th>
								<div><?php echo ('Doctor'); ?></div>
							</th>

							<th>
								<div><?php echo ('Patient'); ?></div>
							</th>
							<th>
								<div><?php echo ('Action'); ?></div>
							</th>
						</tr>

					</thead>

					<tbody>

						<?php

						$count = 1;

						foreach ($appointment as $row) :

							?>

							<tr>

								<td><?php echo $count++; ?></td>

								<td><?php echo date('d M,Y', $row['appointment_timestamp']); ?></td>

								<td><?php echo $this->crud_model->get_type_name_by_id('doctor', $row['doctor_id'], 'name'); ?></td>

								<td><?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name'); ?></td>

								<td align="center">

									<a href="<?php echo base_url(); ?>index.php?admin/view_appointment/edit/<?php echo $row['appointment_id']; ?>" rel="tooltip" data-placement="top" data-original-title="<?php echo ('Edit'); ?>" class="btn btn-primary">

										<i class="icon-wrench"></i>

									</a>

									<a href="<?php echo base_url(); ?>index.php?admin/view_appointment/delete/<?php echo $row['appointment_id']; ?>" onclick="return confirm('delete?')" rel="tooltip" data-placement="top" data-original-title="<?php echo ('Delete'); ?>" class="btn btn-danger">

										<i class="icon-trash"></i>

									</a>

								</td>
							</tr>

						<?php

						endforeach;

						?>

					</tbody>

				</table>

			</div>

			<!----TABLE LISTING ENDS--->
			<div class="tab-pane box" id="add" style="padding: 5px">

				<div class="box-content">

					<?php echo form_open('admin/view_appointment/create/', array('class' => 'form-horizontal validatable')); ?>

					<div class="padded">

						<div class="control-group">

							<label class="control-label"><?php echo ('Doctor'); ?></label>

							<div class="controls" style="padding-top:6px;">

								<select class="chzn-select" name="doctor_id" id="">
									<?php $doctors = $this->db->query("Select * from doctor")->result_array();
									foreach ($doctors as $key => $value) {

										?>
										<option value="<?php echo $value['doctor_id'] ?>"><?php echo $value['name'] ?></option>
									<?php }
									?>

								</select>

							</div>

						</div>


						<div class="control-group">

							<label class="control-label"><?php echo ('Patient'); ?></label>

							<div class="controls">

								<select class="chzn-select" name="patient_id">

									<?php

									$this->db->order_by('account_opening_timestamp', 'asc');

									$patients	=	$this->db->get('patient')->result_array();

									foreach ($patients as $row) :

										?>

										<option value="<?php echo $row['patient_id']; ?>"><?php echo $row['name']; ?></option>

									<?php

									endforeach;

									?>

								</select>

							</div>

						</div>

						<div class="control-group">

							<label class="control-label"><?php echo ('Date'); ?></label>

							<div class="controls">

								<input type="text" class="datepicker fill-up" name="appointment_timestamp" />

							</div>

						</div>

					</div>

					<div class="form-actions" style="text-align: center;">

						<button type="submit" class="btn btn-success"><?php echo ('Add Appointment'); ?></button>

					</div>

					<?php echo form_close(); ?>

				</div>

			</div>
		</div>

	</div>

</div>
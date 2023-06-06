<div class="box">

	<div class="box-header">



		<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

				<a href="#backup" data-toggle="tab"><i class="icon-align-justify"></i>

					<?php echo ('Backup'); ?>

				</a>
			</li>

			<li class="">

				<a href="#restore" data-toggle="tab"><i class="icon-align-justify"></i>

					<?php echo ('Restore'); ?>

				</a>
			</li>

		</ul>

		<!------CONTROL TABS END------->



	</div>

	<div class="box-content padded">

		<div class="tab-content">

			<!----TABLE LISTING STARTS--->

			<div class="tab-pane box active span7" style="border: 0px; text-align:center;" id="backup">

					<a name="" id="" class="btn btn-primary" data-original-title="download backup" href="<?php echo base_url(); ?>index.php?admin/backup_restore/create/<?php echo $type; ?>" role="button">Take Backup of Your Database</a>

			</div>

			<!----TABLE LISTING ENDS--->




			<div class="tab-pane box  span6" id="restore">



				<?php echo form_open('admin/backup_restore/restore', array('enctype' => 'multipart/form-data')); ?>
				<input name="backup_file" type="file" />
				<br /><br />
				<center><input type="submit" class="btn btn-blue" value="<?php echo 'Upload & Restore from Backup'; ?>" /></center>
				<br />
				<?php echo form_close(); ?>


			</div>

			<!----RESTORE ENDS--->

		</div>

	</div>

</div>
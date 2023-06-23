<style>
	.primary-sidebar .nav>li {
		background-color: #306681 !important;
	}

	.primary-sidebar .nav>li a:before {
		background-color: #fff !important;
	}

	.primary-sidebar .nav>li .glow {
		background: #95898B !important;
	}

	.sidebar-background .primary-sidebar-background {
		background-color: #306681 !important;
	}
</style>

<div class="sidebar-background">

	<div class="primary-sidebar-background">

	</div>

</div>

<div class="primary-sidebar" style="background-color: #306681 !important;">

	<!-- Main nav -->

	<br />

	<div style="text-align:center;">

		<a href="<?php echo base_url(); ?>">

			<img src="<?php echo base_url(); ?>uploads/hmslg.png" style="max-height:100px; max-width:100px;" />

		</a>

	</div>

	<br />

	<ul class="nav nav-collapse collapse nav-collapse-primary">





		<!------dashboard----->

		<li class="<?php if ($page_name == 'dashboard') echo 'dark-nav active'; ?>">

			<span class="glow"></span>

			<a href="<?php echo base_url(); ?>index.php?laboratorist/dashboard">

				<i class="icon-desktop icon-2x"></i>

				<span><?php echo ('Dashboard'); ?></span>

			</a>

		</li>

		<li class="<?php if ($page_name == 'manage_test') echo 'dark-nav active'; ?>">

			<span class="glow"></span>

			<a href="<?php echo base_url(); ?>index.php?laboratorist/manage_test">

				<i class="icon-stethoscope icon-2x"></i>

				<span><?php echo ('Add Test'); ?></span>

			</a>

		</li>

		<!------add diagnosis report to prescription----->

		<li class="<?php if ($page_name == 'manage_prescription') echo 'dark-nav active'; ?>">

			<span class="glow"></span>

			<a href="<?php echo base_url(); ?>index.php?laboratorist/manage_prescription">

				<i class="icon-stethoscope icon-2x"></i>

				<span><?php echo ('Add Diagnosis Report'); ?></span>

			</a>

		</li>








		<!------manage own profile--->

		<li class="<?php if ($page_name == 'manage_profile') echo 'dark-nav active'; ?>">

			<span class="glow"></span>

			<a href="<?php echo base_url(); ?>index.php?laboratorist/manage_profile">

				<i class="icon-lock icon-2x"></i>

				<span><?php echo ('Profile'); ?></span>

			</a>

		</li>



	</ul>



</div>
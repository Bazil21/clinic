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

    .uploader {
        width: 53% !important;
        margin: 5px;
    }
    .form-actions{
        text-align: center;
    }
</style>

<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo ('Edit Pharmacist');?>
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo ('Pharmacist List');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo ('Add Pharmacist');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
        	<?php if(isset($edit_profile)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_profile as $row):?>
                    <?php echo form_open('admin/manage_pharmacist/edit/do_update/'.$row['pharmacist_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Email');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Password');?></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password" value="<?php echo $row['password'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" >
                            <button type="submit" class="btn btn-primary"><?php echo ('Edit Pharmacist');?></button>
                        </div>
                    <?php echo form_close();?>
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----EDITING FORM ENDS--->
            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                	<thead>
                		<tr>
                    		<th style="padding: 5px;"><div>#</div></th>
                    		<th style="padding: 5px;"><div><?php echo ('Pharmacist Name');?></div></th>
                    		<th style="padding: 5px;"><div><?php echo ('Email');?></div></th>
                    		<th style="padding: 5px;"><div><?php echo ('Address');?></div></th>
                    		<th style="padding: 5px;"><div><?php echo ('Phone');?></div></th>
                    		<th style="padding: 5px;"><div><?php echo ('Options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($pharmacists as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['address'];?></td>
							<td><?php echo $row['phone'];?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?admin/manage_pharmacist/edit/<?php echo $row['pharmacist_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo ('Edit');?>" class="btn btn-primary">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?admin/manage_pharmacist/delete/<?php echo $row['pharmacist_id'];?>" onclick="return confirm('delete?')"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo ('Delete');?>" class="btn btn-danger">
                                		<i class="icon-trash"></i>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/manage_pharmacist/create/' , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Email');?></label>
                                <div class="controls">
                                    <input type="email"  autocomplete="false"  class="validate[required]" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Password');?></label>
                                <div class="controls">
                                    <input type="password" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" class="validate[required]" name="password"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="address"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="phone"/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo ('Add Pharmacist');?></button>
                        </div>
                    <?php echo form_close();?>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>
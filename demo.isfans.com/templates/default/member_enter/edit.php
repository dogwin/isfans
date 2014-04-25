<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<?php
	$title = isset($examine)?'审核企业会员':'修改企业会员';
	$data_top = array();
	$data_top['title'] = $title;
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '企业会员管理', 'url' => 'member_enter/view');
	$data_top['nav'][] = array('title' => $title);
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i><?= $title?>
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
					<?php
					$formurl = 'member_enter/edit/'.$userEnterID;
					if(isset($examine)) $formurl = 'member_enter/examine/'.$userEnterID;
					?>
					<?php echo form_open($formurl, array('class' => 'form-horizontal', 'name' => 'basic_validate','enctype'=>"multipart/form-data", 'id' => 'basic_validate')); ?>
					<div class="control-group">
						<label class="control-label">用户名</label>
						<div class="controls">
							<input class="normal" type="text" value='<?php echo $userInfo->account;?>' disabled/>
							<label></label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">企业名称</label>
						<div class="controls">
							<?php $this -> form -> show('enterprisename', 'input','', $enterprisename); ?>
							<label>*企业名称.</label><?php echo form_error('enterprisename'); ?>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">企业类别</label>
						<div class="controls">
							<?php $this -> form -> show('user_type', 'select',array('2'=>'企业发布','3'=>'合作企业','4'=>'推荐企业'),$user_type); ?>
							<label>*企业类别.</label><?php echo form_error('user_type'); ?>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">注册地址</label>
						<div class="controls">
							<?php $this -> form -> show('reg_address', 'input','',$reg_address); ?>
							<label>*注册地址</label><?php echo form_error('reg_address'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">通讯地址</label>
						<div class="controls">
							<?php $this -> form -> show('address', 'input','',$address); ?>
							<label>*通讯地址</label><?php echo form_error('address'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">主要负责人</label>
						<div class="controls">
							<?php $this -> form -> show('main_people', 'input','',$main_people); ?>
							<label>*主要负责人.</label><?php echo form_error('main_people'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">联系人电话</label>
						<div class="controls">
							<?php $this -> form -> show('tel', 'input','',$tel); ?>
							<label>*联系人电话.</label><?php echo form_error('tel'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">备用联系人</label>
						<div class="controls">
							<?php $this -> form -> show('spare_people', 'input','',$spare_people); ?>
							<label>*备用联系人.</label><?php echo form_error('spare_people'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">备用联系人电话</label>
						<div class="controls">
							<?php $this -> form -> show('spare_tel', 'input','',$spare_tel); ?>
							<label>*备用联系人电话.</label><?php echo form_error('spare_tel'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<?php $this -> form -> show('email', 'input','',$email); ?>
							<label>*Email.</label><?php echo form_error('email'); ?>
						</div>
					</div>
					<div class="control-group">
						
						<label class="control-label">营业执照</label>
						<div class="controls">
							<?php 
								if($businesslicense){
							?>
							<img src='<?php echo 'http://'.$_SERVER['HTTP_HOST']."/".$businesslicense;?>' width='200'/>
							<?php
								}
							?>
							<input class="normal" type="file" name="businesslicense" />
							<label>*营业执照.</label><?php echo form_error('businesslicense'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">税务登记证</label>
						<div class="controls">
							<?php 
								if($certificate){
							?>
							<img src='<?php echo 'http://'.$_SERVER['HTTP_HOST']."/".$certificate;?>' width='200'/>
							<?php
								}
							?>
							<input class="normal" type="file" name="certificate" />
							<label>*税务登记证.</label><?php echo form_error('certificate'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">组织机构代码证</label>
						<div class="controls">
							<?php 
								if($codecertificate){
							?>
							<img src='<?php echo 'http://'.$_SERVER['HTTP_HOST']."/".$codecertificate;?>' width='200'/>
							<?php
								}
							?>
							<input class="normal" type="file" name="codecertificate" />
							<label></label><?php echo form_error('codecertificate'); ?>
						</div>
					</div>
					<div class="control-group">
		                <label class="control-label">是否显示</label>
		                <div class="controls">
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="is_show" style="opacity: 0;" value="1" <?php echo $is_show==1?'checked="checked"':'';?>>
								</span>
								</div>
								是
							</label>
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="is_show" style="opacity: 0;" value="0" <?php echo $is_show==0?'checked="checked"':'';?>>
								</span>
								</div>
								否
							</label>
		                </div>
	              	</div>
					<div class="control-group">
		                <label class="control-label">首页推荐</label>
		                <div class="controls">
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="index_show" style="opacity: 0;" value="1" <?php echo $index_show==1?'checked="checked"':'';?>>
								</span>
								</div>
								推荐
							</label>
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="index_show" style="opacity: 0;" value="0" <?php echo $index_show==0?'checked="checked"':'';?>>
								</span>
								</div>
								不推荐
							</label>
		                </div>
	              	</div>
					<?php if(isset($examine)){?>
					<div class="control-group">
		                <label class="control-label">审核</label>
		                <div class="controls">
		                	<?php
		                	$status = array(
										0	=>	'未审核',
										1	=>	'审核中',
										2	=>	'审核通过',
										3	=>	'审核未通过',
										4	=>	'退回重审',
							);
							foreach($status as $key=>$val){
		                	?>
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="is_open" style="opacity: 0;" value="<?= $key?>" <?php echo $is_open==$key?'checked="checked"':'';?>>
								</span>
								</div>
								<?= $val?>
							</label>
							<?php }?>
		                </div>
	              	</div>	
					<?php }?>
					<input type='hidden' name='user_id' value='<?php echo $user_id;?>'/>
					<div class="form-actions">
						<input type="submit" value="保存" class="btn blue">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
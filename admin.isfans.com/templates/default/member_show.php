<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '查看会员';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '会员管理', 'url' => 'member/view');
	$data_top['nav'][] = array('title' => '查看会员');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">

			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>查看会员
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
	            <?php echo form_open('member/show/'.$user->id,array('class'=>'form-horizontal','name'=>'basic_validate','id'=>'basic_validate')); ?>
	              <div class="control-group">
	                <label class="control-label">用户帐号</label>
	                <div class="controls">
	                  <input readonly="readonly" type="text" name="account" value="<?= $user->account?>" /><label></label><?php echo form_error('account'); ?>
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">用户名</label>
	                <div class="controls">
	                  <input readonly="readonly" class="normal" type="text" name="name" value="<?= $user->name?>" /><label></label><?php echo form_error('name'); ?>
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">用户类型</label>
	                <div class="controls">
	                  <?php foreach($user_type as $val){?>
	                  <label>
						<div class="radio">
						<span>
							<input disabled="disabled" <?php if($val->id==$user->user_type){?> checked="checked"<?php }?> type="radio" name="is_ViewMap" style="opacity: 0;" value="<?= $val->id?>">
						</span>
						</div>
						<?= $val->type_name?>
					  </label>
					  <?php }?>
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">注册时间</label>
	                <div class="controls">
	                  <input readonly="readonly" class="normal" type="text" name="inserttime" value="<?= date('Y年m月d日 H:i:s',$user->inserttime)?>" />
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">最后登录时间</label>
	                <div class="controls">
	                  <input readonly="readonly" class="normal" type="text" name="inserttime" value="<?= date('Y年m月d日 H:i:s',$user->lastdate)?>" />
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">用户头像</label>
	                <div class="controls">
	                  <img width="300" src="<?= $user->image?>" />
	                </div>
	              </div>
	              <?php
		          	$pg = intval($this->input->get('page'));
					$pu = $pg>1?'?page='.$pg:'';
		          ?>
	              <div class="form-actions">
	                <a class="btn btn-success" href="<?= base_url()?>member/view/<?= $pu?>">返回</a>
	              </div>
	            </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
</div>
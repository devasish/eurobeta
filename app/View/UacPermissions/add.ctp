<div class="uacPermissions form">
<?php echo $this->Form->create('UacPermission'); ?>
	<fieldset>
		<legend><?php echo __('Add Uac Permission'); ?></legend>
	<?php
		echo $this->Form->input('uac_module_id', array('empty' => true));
                echo $this->Form->input('uac_section_id');
		echo $this->Form->input('role', array('options' => Configure::read('ROLES')));
		echo $this->Form->input('permitted', array('type' => 'checkbox'));
		echo $this->Form->input('remarks');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uac Permissions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Sections'), array('controller' => 'uac_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Section'), array('controller' => 'uac_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script>
    $(document).ready(function() {
        $('#UacPermissionUacModuleId').on('change', function() {
            var v = $(this).val();
            $.ajax({
                url : SITE_URL + 'uac_sections/get_list/' + v,
                data: {module : v},
                success: function(r) {
                    var json = $.parseJSON(r);
                    var sections = '';
                    $.each(json, function(index, value){
                        sections += '<option value="'+index+'">'+value+'</option>';
                    });
                    console.log(sections);
                    $('#UacPermissionUacSectionId').html(sections);
                }
            });
        });
    });
</script>

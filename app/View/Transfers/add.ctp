<div class="transfers form">
<?php echo $this->Form->create('Transfer'); ?>
	<fieldset>
		<legend><?php echo __('Add Transfer'); ?></legend>
	<?php
		echo $this->Form->input('search_sap', array('label' => 'SAP Code'));
		echo $this->Form->input('sap_id', array('type' => 'hidden'));
		echo $this->Form->input('description', array('readonly' => true));
		echo $this->Form->input('ctn_per_pallet');
		echo $this->Form->input('net_wt');
		echo $this->Form->input('remarks');
		echo $this->Form->input('serial_no');
		echo $this->Form->input('status');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Transfers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Saps'), array('controller' => 'saps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sap'), array('controller' => 'saps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#TransferSearchSap').autocomplete({
            source : 'prediction',
            select : function (event, ui) {
                console.log(ui);
                $('#TransferDescription').val(ui.item.data.description);
                $('#TransferCtnPerPallet').val(ui.item.data.ctn_per_pallet);
                $('#TransferNetWt').val(ui.item.data.net_wt);
                $('#TransferRemarks').val(ui.item.data.remarks);
                $('#TransferSerialNo').val(ui.item.data.serial_no);
                $('#TransferStatus').val(ui.item.data.status);
            }
        });
    })
</script>
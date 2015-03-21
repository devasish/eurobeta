<div class="transfers form">
<?php echo $this->Form->create('Transfer'); ?>
	<fieldset>
		<legend><?php echo __('Add Transfer'); ?></legend>
	<?php
		echo $this->Form->input('sap_code', array('label' => 'SAP Code'));
		echo $this->Form->input('sap_id', array('type' => 'hidden'));
		echo $this->Form->input('description', array('readonly' => true));
		echo $this->Form->input('ctn_per_pallet');
		echo $this->Form->input('net_wt', array('readonly' => true));
		echo $this->Form->input('remarks', array('type' => 'textarea', 'escape' => true, 'rows' => 2));
                echo $this->Form->input('status', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Save')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('Transfers List'), array('action' => 'index'), array('escape' => FALSE)); ?></li>
	</ul>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#TransferSapCode').autocomplete({
            source : 'prediction',
            select : function (event, ui) {
                $('#TransferDescription').val(ui.item.data.description);
                $('#TransferSapId').val(ui.item.data.id);
                $('#TransferCtnPerPallet').val(ui.item.data.ctn_per_pallet);
                $('#TransferNetWt').val(ui.item.data.net_wt);
                $('#TransferRemarks').val(ui.item.data.remarks);
                $('#TransferSerialNo').val(ui.item.data.serial_no);
                $('#TransferStatus').val(ui.item.data.status);
            }
        });
    })
</script>
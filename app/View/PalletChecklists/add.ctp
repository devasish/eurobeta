<div class="palletChecklists form">
<?php echo $this->Form->create('PalletChecklist'); ?>
	<fieldset>
		<legend><?php echo __('Add Pallet Checklist to Container # ' . $container_no); ?></legend>
	<?php
		echo $this->Form->input('container_id', array('type' => 'text', 'value' => $container_id));
		echo $this->Form->input('sap_id', array('type' => 'hidden'));
		echo $this->Form->input('sap_code');
		echo $this->Form->input('sap_desc');
		echo $this->Form->input('product_cust_wt');
		echo $this->Form->input('no_of_pallet');
		echo $this->Form->input('empty_pallet_wt');
		echo $this->Form->input('empty_ctn_wt');
		echo $this->Form->input('cbm');
		echo $this->Form->input('net_product_wt');
		echo $this->Form->input('net_wt_per_ctn');
		echo $this->Form->input('gross_wt_per_ctn');
		echo $this->Form->input('diff');
		echo $this->Form->input('status');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
    
    <table>
        <tr>
            <th>Serial</th>
            <th>QTY CTN</th>
            <th>WEIGHT(KG) WITH PALLET</th>
            <th>WEIGHT/CTN</th>
            <th><?php echo $this->Html->link('Add New', array('controller' => 'pallet_loads', 'action' => 'add'))?></th>
        </tr>
        <?php $x = 1;?>
        <tr>
            <td><?php echo $x++; ?></td>
            <td><?php echo $this->Form->input('quantity', array('label' => FALSE));?></td>
            <td><?php echo $this->Form->input('wt_with_pallet', array('label' => FALSE));?></td>
            <td><?php echo $this->Form->input('wt_per_ctn', array('label' => FALSE));?></td>
            <td>
                <a href="javascript:void(0)">Edit</a>
            </td>
        </tr>
    </table>
<?php echo $this->Form->end(__('Submit')); ?>
    
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pallet Checklists'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Containers'), array('controller' => 'containers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Container'), array('controller' => 'containers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saps'), array('controller' => 'saps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sap'), array('controller' => 'saps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pallet Loads'), array('controller' => 'pallet_loads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Load'), array('controller' => 'pallet_loads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#PalletChecklistSapCode').autocomplete({
            source : SITE_URL + 'transfers/prediction',
            select : function (event, ui) {
                console.log(ui);
                $('#PalletChecklistSapDesc').val(ui.item.data.description);
                $('#PalletChecklistSapId').val(ui.item.data.id);
                $('#PalletChecklistProductCustWt').val(ui.item.data.net_wt);
                $('#PalletChecklistCbm').val(ui.item.data.cbm);
                $('#PalletChecklistEmptyCtnWt').val(ui.item.data.empty_ctn_wt);
            }
        });
    })
</script>
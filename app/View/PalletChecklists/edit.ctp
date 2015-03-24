<div class="palletChecklists form">
    <fieldset>
        <legend><?php echo __('Edit Pallet Checklist to Container # ' . $this->Form->value('Container.container_no')); ?></legend></fieldset>
    <?php echo $this->Form->create('PalletChecklist'); ?>

    <table width="100%">
        <tr>
            <td width="70%">
                <div class="left-panel">
                    <table id="loads-table">
                        <tr>
                            <th width="7%">Serial</th>
                            <th width="27%">QTY CTN</th>
                            <th width="27%">WEIGHT(KG) WITH PALLET</th>
                            <th width="27%">WEIGHT/CTN</th>
                            <th><a href="javascript:void(0)" id="add_new_load">Add New</a></th>
                        </tr>
                        <?php $x = 1; $row_index =0; ?>
                        
                        <?php foreach ($this->Form->value('PalletLoad') as $k => $palletLoad) :?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.quantity', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input', 'data-index' => '0')); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.wt_with_pallet', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input', 'data-index' => '0')); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.wt_per_ctn', array('label' => FALSE, 'div' => FALSE, 'readonly' => true , 'data-index' => '0', 'class' => 'loads_wt_per_ctn')); ?></td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <table>
                        <tr>
                            <td width="7%">&nbsp;</td>
                            <td width="27%"><?php echo $this->Form->input('total_quantity', array('label' => FALSE, 'div' => FALSE)); ?></td>
                            <td width="27%"><?php echo $this->Form->input('total_wt_with_pallet', array('label' => FALSE, 'div' => FALSE)); ?></td>
                            <td width="27%">&nbsp;</td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td>
                <div class="right-panel">
                        <?php
                        echo $this->Form->input('container_id', array('type' => 'hidden', 'value' => $this->Form->value('Container.id')));
                        echo $this->Form->input('sap_id', array('type' => 'hidden'));
                        echo $this->Form->input('sap_code');
                        echo $this->Form->input('sap_desc');
                        echo $this->Form->input('product_cust_wt');
                        echo $this->Form->input('no_of_pallet');
                        echo $this->Form->input('empty_pallet_wt');
                        echo $this->Form->input('single_empty_ctn_wt', array('type' => 'hidden'));
                        echo $this->Form->input('empty_ctn_wt');
                        echo $this->Form->input('cbm');
                        echo $this->Form->input('net_product_wt');
                        echo $this->Form->input('net_wt_per_ctn');
                        echo $this->Form->input('gross_wt_per_ctn');
                        echo $this->Form->input('diff');
                        ?>
                </div>
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

<?php echo $this->Html->script('View/PalletChecklists/add') ?>
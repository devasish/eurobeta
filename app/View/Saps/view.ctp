<div class="saps view">
<h2><?php echo __('Sap'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sapcode'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['sapcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Net Wt'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['net_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gross Wt'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['gross_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empty Ctn Wt'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['empty_ctn_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cbm'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['cbm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ctn Per Pallet'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['ctn_per_pallet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($sap['Sap']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>'.'&nbsp;&nbsp;'. __('Edit Sap'), array('action' => 'edit', $sap['Sap']['id']), array('escape'=>FALSE)); ?> </li>
		<li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>'.'&nbsp;&nbsp;'. __('Delete Sap'), array('action' => 'delete', $sap['Sap']['id']), array('escape'=>FALSE), __('Are you sure you want to delete # %s?', $sap['Sap']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('Saps List'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>
                <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Sap'), array('action' => 'add'), array('escape'=>FALSE)); ?></li>
	</ul>
</div>

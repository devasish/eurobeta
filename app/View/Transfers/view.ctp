<style>
   #print_div{
        background: #FFF    ;
        width: 300px; 
        height: 300px; 
      
    
    }
    #print_div table tr td{
        font-family: cursive; 
        background: #ffffff;
        color: #001;
        border: none;
        
    }
    #print_div table tr td span{
      
    }
    
</style>
<div class="transfers view">
<h2><?php echo __('Transfer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sap'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfer['Sap']['id'], array('controller' => 'saps', 'action' => 'view', $transfer['Sap']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sap Code'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['sap_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ctn Per Pallet'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['ctn_per_pallet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Net Wt'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['net_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['remarks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serial No'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['serial_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfer['User']['id'], array('controller' => 'users', 'action' => 'view', $transfer['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
<div id="print_div">
    <center>
        EURO SME SDN BHD</br>
        Finished Goods Slip</br>
        <div id="barcode-div"></div>
        <table>
            <tr>
                <td>SAP Code</td>
                <td>:</td>
                <td><?php echo h($transfer['Transfer']['sap_code']); ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td><?php echo h($transfer['Transfer']['description']);  ?></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>:</td>
                <td><?php echo h($transfer['Transfer']['net_wt']) ;?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td><?php echo date('d-m-y')  ;?></td>
            </tr>
        </table>
        <table>
            
        </table>
    </center>    
</div>
<button id="print_btn">Print</button>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link('<i class="fa fa-edit"></i>'.'&nbsp;&nbsp;'. __('Edit Transfer'), array('action' => 'edit', $transfer['Transfer']['id']), array('escape' => FALSE)); ?> </li>
		<li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>'.'&nbsp;&nbsp;'. __('Delete Transfer'), array('action' => 'delete', $transfer['Transfer']['id']), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $transfer['Transfer']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('List Transfers'), array('action' => 'index'), array('escape' => FALSE)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Transfer'), array('action' => 'add'), array('escape' => FALSE)); ?> </li>
	</ul>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#barcode-div').barcode('<?php echo h($transfer['Transfer']['serial_no']); ?>', 'code93', {barWidth:1, barHeight:30});
        
        
        $('#print_btn').on('click', function() {
           printData('print_div');
        });
    });
    
    
</script>

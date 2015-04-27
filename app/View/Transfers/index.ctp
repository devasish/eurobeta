<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Transfer'), array('action' => 'add'), array('escape'=> FALSE)); ?></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Transfers List</h3>
                  <div class="box-tools">
                      
                    <?php $url = array('controller' => 'Transfers', 'action' => 'index'); ?>
                    <?php echo $this->Form->create('Filter', array('url' => $url)); ?>  
                    <div class="input-group"> 
                        <ul class="filters">
                            <li><?php echo $this->Form->input('cal_from', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'From')); ?></li>
                            <li><?php echo $this->Form->input('cal_to', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'To')); ?></li>
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('id' => 'ID','sap_code' => 'Sapcode', 'description' => 'Description', 'sap_id' => 'Sap ID', 'serial_no' => 'Serial No', 'shift' => 'Shift'),  'label' => false, 'class' => 'form-control input-sm')); ?></li>
                        </ul>
                        <div class="input-group-btn srch-btn">
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('serial_no'); ?></th>
			<th><?php echo $this->Paginator->sort('sap_code'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('ctn_per_pallet'); ?></th>
			<th><?php echo $this->Paginator->sort('net_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('transfer_date'); ?></th>			
			<th><?php echo $this->Paginator->sort('shift'); ?></th>			
			<th><?php echo 'Created By'; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>

                    <?php foreach ($transfers as $transfer): ?>
                    <tr>
                        <td><?php echo h($transfer['Transfer']['id']); ?>&nbsp;</td>
                        <td><?php echo h($transfer['Transfer']['serial_no']); ?>&nbsp;</td>
                        <td><?php echo h($transfer['Transfer']['sap_code']); ?>&nbsp;</td>
                        <td><?php echo h($transfer['Transfer']['description']); ?>&nbsp;</td>
                        <td><?php echo h($transfer['Transfer']['ctn_per_pallet']); ?>&nbsp;</td>
                        <td><?php echo h($transfer['Transfer']['net_wt']); ?>&nbsp;</td>
                        <td><?php echo h($transfer['Transfer']['transfer_date']); ?>&nbsp;</td>                       
                        <td><?php echo h($transfer['Transfer']['shift'] == 0 ? 'Morning' : 'Night'); ?>&nbsp;</td>                        
                        <td>
                            <?php echo $this->Html->link($transfer['User']['username'], array('controller' => 'users', 'action' => 'view', $transfer['User']['id'])); ?>
                        </td>
                        <td>
                            <span class="label label-info"><?php echo $this->Html->link(__('View'), array('action' => 'view', $transfer['Transfer']['id'])); ?></span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                  </table>
                </div><!-- /.box-body -->         
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-left">
                    <li><?php echo $this->Paginator->prev('<i class="fa fa-angle-double-left"></i>'.'&nbsp;' . __('previous'), array('escape'=>FALSE), null, array('class' => 'prev disabled')); ?></li>
                    <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>                    
                    <li><?php echo $this->Paginator->next(__('next') .'&nbsp;'. ' <i class="fa fa-angle-double-right"></i>', array('escape'=>FALSE), null, array('class' => 'next disabled')); ?></li>
                    <li class="info">
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                        ));
                        ?></li>
                  </ul>                    
                </div>              
              </div><!-- /.box -->
            </div>
          </div>
<script>
    $(document).ready(function() {
        $('#FilterCalFrom').datepicker({format: 'dd-mm-yyyy'});
        $('#FilterCalTo').datepicker({format: 'dd-mm-yyyy'});
    });
</script>
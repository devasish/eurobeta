<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Loading</li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Loading Report</h3>
                  <div class="box-tools">
                      <?php $url = array('controller' => 'Reports', 'action' => 'loading'); ?>
                        <?php echo $this->Form->create('Filter', array('url' => $url)); ?>
                    <div class="input-group"> 
                        
                        <ul class="filters">  
                            <li><?php echo $this->Form->input('cal_from', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'From')); ?></li>
                            <li><?php echo $this->Form->input('cal_to', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'To')); ?></li>
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('sapcode' => 'SAP Code', 'description' => 'SAP Description'), 'label' => false, 'class' => 'form-control input-sm')); ?></li>
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
                        <th><?php echo $this->Paginator->sort('Sap.sapcode'); ?></th>
			<th><?php echo $this->Paginator->sort('Sap.description'); ?></th>
			<th>T. CTN</th>
                        <th>L. Weight</th>
			<th>N. Weight</th>
			<th>Diff. Kg.</th>
			<th>Diff. %</th>
			<th>AVG WT/CTN</th>
			<th>Loaded on</th>
                    </tr>
                   <?php foreach ($palletLoads as $palletLoad): ?>
                        <tr>
                            <td><?php echo h($palletLoad['Sap']['sapcode']); ?></td>
                            <td><?php echo h($palletLoad['Sap']['description']); ?></td>
                            <td><?php echo h($palletLoad[0]['total_no_of_ctn']); ?></td>
                            <td><?php echo h($palletLoad[0]['total_net_product_wt']); ?></td>
                            <td><?php echo h($palletLoad[0]['net_cust_product_wt']); ?></td>
                            <td><?php echo h($palletLoad[0]['total_diff']); ?></td>
                            <td><?php echo h(round($palletLoad[0]['total_diff'] / $palletLoad[0]['net_cust_product_wt'] * 100, 2)); ?></td>
                            <td><?php echo h(round($palletLoad[0]['total_net_product_wt'] / $palletLoad[0]['total_no_of_ctn'], 2)); ?></td>
                            <td><?php echo h($palletLoad['PalletChecklist']['created']); ?></td>
                        </tr>
                    <?php endforeach;  ?>
                  </table>
                </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#FilterCalFrom').datepicker({dateFormat: 'dd-mm-yyyy'});
        $('#FilterCalTo').datepicker({dateFormat: 'dd-mm-yyyy'});
    });
</script>
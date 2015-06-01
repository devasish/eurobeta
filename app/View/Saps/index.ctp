<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Sap'), array('action' => 'add'), array('escape' => FALSE)); ?></li>
        <li><a href="javascript:void(0)" onclick="printData('list-saps')" class="print" rel="list-saps"><i class="fa fa-print"></i>&nbsp;Print List</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box" id="list-saps">
            <div class="box-header">
                <h3 class="box-title">List Saps</h3>
                <div class="box-tools noprint">

                    <?php $url = array('controller' => 'Saps', 'action' => 'index'); ?>
                    <?php echo $this->Form->create('Filter', array('url' => $url)); ?>  
                    <div class="input-group"> 
                        <ul class="filters">
                            <li>
                                <?php
                                $options = array(10 => 10, 25 => 25, 50 => 50, 75 => 75, 100 => 100, 500 => 500, 1000 => 1000, 10000 => 10000);
                                echo $this->Form->input('limit', array('class' => 'form-control input-sm', 'label' => false, 'options' => $options));
                                ?>
                            </li>
                            <li><?php echo $this->Form->input('cal_from', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'From')); ?></li>
                            <li><?php echo $this->Form->input('cal_to', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'To')); ?></li>
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('sapcode' => 'Sapcode', 'description' => 'Description', 'id' => 'ID'), 'label' => false, 'class' => 'form-control input-sm')); ?></li>
                        </ul>
                        <div class="input-group-btn srch-btn">
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover list">
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('sapcode'); ?></th>
                        <th><?php echo $this->Paginator->sort('description'); ?></th>
                        <th><?php echo $this->Paginator->sort('net_wt'); ?></th>
                        <th><?php echo $this->Paginator->sort('cbm'); ?></th>                        
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th class="actions noprint"><?php echo __('Actions'); ?></th>
                    </tr>

                    <?php foreach ($saps as $sap): ?>
                        <tr>
                            <td><?php echo h($sap['Sap']['id']); ?>&nbsp;</td>
                            <td><?php echo h($sap['Sap']['sapcode']); ?>&nbsp;</td>
                            <td><?php echo h($sap['Sap']['description']); ?>&nbsp;</td>
                            <td><?php echo h($sap['Sap']['net_wt']); ?>&nbsp;</td>
                            <td><?php echo h($sap['Sap']['cbm']); ?>&nbsp;</td>
                            <td><?php echo h($sap['Sap']['created']); ?>&nbsp;</td>
                            <td>
                                <?php
                                foreach (Configure::read('STATUS') as $k => $v) {
                                    if ($k == $sap['Sap']['status']) {
                                        echo h($v);
                                    }
                                }
                                ?>
                            </td>
                            <td class="noprint">
                                <span class="label label-info"><?php echo $this->Html->link(__('View'), array('action' => 'view', $sap['Sap']['id'])); ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div><!-- /.box-body -->         
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-left noprint">
                    <li><?php echo $this->Paginator->prev('<i class="fa fa-angle-double-left"></i>' . '&nbsp;' . __('previous'), array('escape' => FALSE), null, array('class' => 'prev disabled')); ?></li>
                    <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>                    
                    <li><?php echo $this->Paginator->next(__('next') . '&nbsp;' . ' <i class="fa fa-angle-double-right"></i>', array('escape' => FALSE), null, array('class' => 'next disabled')); ?></li>
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
    $(document).ready(function () {
        $('#FilterCalFrom').datepicker({format: 'dd-mm-yyyy'});
        $('#FilterCalTo').datepicker({format: 'dd-mm-yyyy'});
    });
</script>
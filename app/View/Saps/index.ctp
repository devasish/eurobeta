<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Dashboard</li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Saps</h3>
                  <div class="box-tools">
                    <div class="input-group"> 
                        <ul class="filters">  
                            <li><?php $url = array('controller' => 'Saps', 'action' => 'index'); ?></li>
                            <li><?php echo $this->Form->create('Filter', array('url' => $url)); ?></li>  
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('sapcode' => 'Sapcode', 'description' => 'Description', 'id' => 'ID'),  'label' => false, 'class' => 'form-control input-sm')); ?></li>
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
                        <th><?php echo $this->Paginator->sort('sapcode'); ?></th>
                        <th><?php echo $this->Paginator->sort('description'); ?></th>
                        <th><?php echo $this->Paginator->sort('net_wt'); ?></th>
                        <th><?php echo $this->Paginator->sort('cbm'); ?></th>                        
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
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
                        <td>
                            <span class="label label-info"><?php echo $this->Html->link(__('View'), array('action' => 'view', $sap['Sap']['id'])); ?></span>

                            <span class="label label-warning"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sap['Sap']['id'])); ?></span>

                            <span class="label label-danger"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sap['Sap']['id']), array(), __('Are you sure you want to delete # %s?', $sap['Sap']['id'])); ?></span>
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
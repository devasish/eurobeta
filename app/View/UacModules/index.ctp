<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Uac Module'), array('action' => 'add'), array('escape' => FALSE)); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Uac Permissions'), array('controller' => 'uac_permissions', 'action' => 'index'), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Uac Permission'), array('controller' => 'uac_permissions', 'action' => 'add'), array('escape' => FALSE)); ?> </li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Uac Modules'); ?></h3>
                <div class="box-tools">

                    <?php $url = array('controller' => 'Saps', 'action' => 'index'); ?>
                    <?php echo $this->Form->create('Filter', array('url' => $url)); ?>  
                    <div class="input-group"> 
                        <ul class="filters">                            
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>                            
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
                        <th><?php echo $this->Paginator->sort('controller'); ?></th>
                        <th><?php echo $this->Paginator->sort('action'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($uacModules as $uacModule): ?>
                            <tr>
                                <td><?php echo h($uacModule['UacModule']['id']); ?>&nbsp;</td>
                                <td><?php echo h($uacModule['UacModule']['controller']); ?>&nbsp;</td>
                                <td><?php echo h($uacModule['UacModule']['action']); ?>&nbsp;</td>
                                <td class="actions">                                    
                                    <span class="label label-warning"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $uacModule['UacModule']['id'])); ?></span>
                                    <span class="label label-danger"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uacModule['UacModule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $uacModule['UacModule']['id']))); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </div><!-- /.box-body -->         
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-left">
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
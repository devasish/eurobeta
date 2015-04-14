<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Container'), array('action' => 'add'), array('escape'=>FALSE)); ?></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Containers List</h3>
                  <div class="box-tools">
                    <div class="input-group"> 
                        <ul class="filters">  
                            <li><?php $url = array('controller' => 'Containers', 'action' => 'index'); ?></li>
                            <li><?php echo $this->Form->create('Filter', array('url' => $url)); ?></li>  
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('id' => 'ID', 'container_no' => 'Container No', 'seal_no' => 'Seal No', 'type' => 'Type', 'status' => 'Status'),  'label' => false, 'class' => 'form-control input-sm')); ?></li>
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
			<th><?php echo $this->Paginator->sort('container_no'); ?></th>
			<th><?php echo $this->Paginator->sort('seal_no'); ?></th>
			<th><?php echo $this->Paginator->sort('empty_tare_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('Container_type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>			
			<th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>

                    <?php foreach ($containers as $container): ?>
                    <tr>
                            <td><?php echo h($container['Container']['id']); ?>&nbsp;</td>
                            <td><?php echo h($container['Container']['container_no']); ?>&nbsp;</td>
                            <td><?php echo h($container['Container']['seal_no']); ?>&nbsp;</td>
                            <td><?php echo h($container['Container']['empty_tare_wt']); ?>&nbsp;</td>
                            <td><?php
                                foreach (Configure::read('CONT_TYPES') as $k => $v) {
                                    if ($k == $container['Container']['type']) {
                                        echo h($v);
                                    }
                                }
                                ?>&nbsp;</td>
                            <td><?php
                                foreach (Configure::read('CONT_VP_CTN') as $k => $v) {
                                    if ($k == $container['Container']['vp_ctn']) {
                                        echo h($v);
                                    }
                                }
                                ?>&nbsp;</td>
                            <td><?php
                                foreach (Configure::read('CONT_STATUS') as $k => $v) {
                                    if ($k == $container['Container']['status']) {
                                        echo h($v);
                                    }
                                }
                                ?>&nbsp;</td>
                            <td><?php echo h($container['Container']['created']); ?>&nbsp;</td>

                            <td>
                                <span class="label label-info"><?php echo $this->Html->link(__('Load'), array('action' => 'view', $container['Container']['id'])); ?></span>
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
    $(function () {
        $('#hover, #striped, #condensed').click(function () {
            var classes = 'table';

            if ($('#hover').prop('checked')) {
                classes += ' table-hover';
            }
            if ($('#condensed').prop('checked')) {
                classes += ' table-condensed';
            }
            $('#table-style').bootstrapTable('destroy')
                .bootstrapTable({
                    classes: classes,
                    striped: $('#striped').prop('checked')
                });
        });
    });

    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }
        return {};
    }
</script>
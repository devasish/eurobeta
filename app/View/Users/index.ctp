<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New User'), array('action' => 'add'), array('escape'=>FALSE)); ?></li>
        <li><a href="javascript:void(0)" onclick="printData('users-list')" class="print" rel="list-saps"><i class="fa fa-print"></i>&nbsp;Print List</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
            <div class="col-xs-12">
                <div class="box" id="users-list">
                <div class="box-header">
                  <h3 class="box-title">List Users</h3>
                  <div class="box-tools noprint">
                    <div class="input-group"> 
                        <ul class="filters">  
                            <li><?php $url = array('controller' => 'Users', 'action' => 'index'); ?></li>
                            <li><?php echo $this->Form->create('Filter', array('url' => $url)); ?></li>  
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('id' => 'ID', 'username' => 'Username', 'role' => 'Role', 'status' => 'Status'), 'label' => false, 'class' => 'form-control input-sm')); ?></li>
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
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions noprint"><?php echo __('Actions'); ?></th>
                    </tr>
                   <?php foreach ($users as $user): ?>
                        <?php
                        if ($user['User']['role'] == 1) {
                            $role = 'Admininstrator';
                        } elseif ($user['User']['role'] == 2) {
                            $role = 'QA';
                        } else {
                            $role = 'Not Defined';
                        }
                        
                        $conf_roles = Configure::read('ROLES');
                        $role = $conf_roles[$user['User']['role']];

                        if ($user['User']['status'] == 1) {
                            $status = 'Active';
                        } elseif ($user['User']['status'] == 0) {
                            $status = 'Inactive';
                        } else {
                            $status = 'Not Defined';
                        }
                        ?>
                        <tr>
                            <td><?php echo h($user['User']['id']); ?></td>
                            <td>
                                <?php echo h($user['User']['username']); ?>
                            </td>
                            <td><?php echo $role; ?></td>
                            <td><?php echo h($user['User']['created']); ?></td>
                            <td><?php echo $status; ?></td>
                            <td class="noprint">
                                <span class="label label-info"><?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?></span>                                                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </table>
                </div><!-- /.box-body -->         
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-left noprint">
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

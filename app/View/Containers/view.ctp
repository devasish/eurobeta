<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>' . '&nbsp;&nbsp;' . __('Edit Container'), array('action' => 'edit', $container['Container']['id']), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Container'), array('action' => 'delete', $container['Container']['id']), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $container['Container']['id'])); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('Containers List'), array('action' => 'index'), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Container'), array('action' => 'add'), array('escape' => FALSE)); ?> </li>
    </ol>
</div><!--/.row-->
<br/><br/>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
               <?php echo __('Container'); ?>
            </div>
            <div class="panel-body">
                <dl>
                    <dt><?php echo __('Id'); ?></dt>
                    <dd>
                        <?php echo h($container['Container']['id']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Container No'); ?></dt>
                    <dd>
                        <?php echo h($container['Container']['container_no']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Seal No'); ?></dt>
                    <dd>
                        <?php echo h($container['Container']['seal_no']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Empty Tare WT'); ?></dt>
                    <dd>
                        <?php echo h($container['Container']['empty_tare_wt']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Type'); ?></dt>
                    <dd>
                        <?php
                        foreach (Configure::read('CONT_TYPES') as $k => $v) {
                            if ($k == $container['Container']['type']) {
                                echo h($v);
                            }
                        }
                        ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Container Type'); ?></dt>
                    <dd>
                        <?php
                        foreach (Configure::read('CONT_VP_CTN') as $k => $v) {
                            if ($k == $container['Container']['vp_ctn']) {
                                echo h($v);
                            }
                        }
                        ?>
                    </dd>
                    <dt><?php echo __('Status'); ?></dt>
                    <dd>
                        <?php
                        foreach (Configure::read('CONT_STATUS') as $k => $v) {
                            if ($k == $container['Container']['status']) {
                                echo h($v);
                            }
                        }
                        ?>
                    </dd>
                    <dt><?php echo __('Created'); ?></dt>
                    <dd>
                        <?php echo h($container['Container']['created']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Modified'); ?></dt>
                    <dd>
                        <?php echo h($container['Container']['modified']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('User'); ?></dt>
                    <dd>
                        <?php echo $this->Html->link($container['User']['username'], array('controller' => 'users', 'action' => 'view', $container['User']['id'])); ?>
                        &nbsp;
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Pallet Checklist'); ?></h3>
                <div class="box-tools">
                    <div class="input-group"> 
                        <span class="label label-success"><?php echo $this->Html->link('<i class="fa fa-cart-plus"></i>' . __('Add New'), array('controller' => 'pallet_checklists', 'action' => 'add', $container['Container']['id'], $container['Container']['container_no']), array('escape' => FALSE)) ?></span>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Serial</th>
                        <th>Product Desc</th>
                        <th>SAP Code</th>
                        <th>No of CTN</th>
                        <th>Remarks</th>
                        <th><?php echo __('Action'); ?></th>
                    </tr>

                    <?php $x = 1; ?>
                    <?php foreach ($container['PalletChecklist'] as $pallet) : ?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo h($pallet['sap_desc']) ?></td>
                            <td><?php echo h($pallet['sap_code']) ?></td>
                            <td>no of ctn</td>
                            <td>remarks</td>

                            <td>                                
                                <span class="label label-warning"><?php echo $this->Html->link(__('Edit'), array('controller' => 'pallet_checklists', 'action' => 'edit', $pallet['id'])) ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>                    
            </div><!-- /.box-body -->                                     
        </div><!-- /.box -->
        <br/><br/>
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
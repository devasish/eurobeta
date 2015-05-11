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
                <div class="pull-left col-md-6">
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
                        
                        <!--
                        <span>
                            <select id="status_select" data-contid="<?php echo $container['Container']['id'] ; ?>">
                                <?php foreach (Configure::read('CONT_STATUS') as $k => $v) : ?>
                                <?php $selected = ($k == $container['Container']['status']) ? 'selected' : '';  ?>
                                <option <?php echo $selected; ?> value="<?php echo $k ?>">
                                    <?php echo $v ?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </span>
                        <a href="javascript:void(0)" id="go_change_status">Save</a>
                        --->
                        
                    </dd>
                    <dt><?php echo __('Destination'); ?></dt>
                    <dd>
                        <?php
                        echo !empty(Configure::read('CONT_DESTINATION')[$container['Container']['destination']]) ? Configure::read('CONT_DESTINATION')[$container['Container']['destination']] : 'NOT SET';
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
                <div class="pull-right col-md-4">
                    <?php echo $this->Form->create('Container', array('url' => array('controller' => 'containers', 'action' => 'update_container'))); ?>
                    <?php echo $this->Form->input('id', array('value' => $container['Container']['id'])); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('loader_id', array('class'=>'form-control', 'empty' => true, 'selected' => $container['Container']['loader_id'], 'required' => true)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('checker_id', array('class'=>'form-control', 'empty' => true, 'selected' => $container['Container']['checker_id'], 'required' => true)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('status', array('options' => Configure::read('CONT_STATUS'), 'class'=>'form-control', 'selected' => $container['Container']['status'], 'required' => true)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('remarks', array('class'=>'form-control', 'selected' => $container['Container']['status'], 'type' => 'textarea', 'rows' => 1, 'value' => $container['Container']['remarks'])); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->end('Save'); ?>
                    </div>
                    
                </div>
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
                        <?php if ($container['Container']['status'] != 2): ?>
                        <span class="label label-success"><?php echo $this->Html->link('<i class="fa fa-cart-plus"></i>' . __('Add New'), array('controller' => 'pallet_checklists', 'action' => 'add', $container['Container']['id'], $container['Container']['container_no']), array('escape' => FALSE)) ?></span>
                        <?php endif;?>
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
                            <td><?php echo h($pallet['no_of_ctn']) ?></td>
                            <td>remarks</td>
                            
                            <td>
                                <?php if ($container['Container']['status'] != 2): ?>
                                <span class="label label-warning"><?php echo $this->Html->link(__('Edit'), array('controller' => 'pallet_checklists', 'action' => 'edit', $pallet['id'])) ?></span>
                                <?php endif;?>
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
        $('#go_change_status').click(function () {
            var st = $('#status_select').val();
            var id = $('#status_select').data('contid');
            var data = {status : st, id: id};
            $.ajax({
                url: SITE_URL + 'containers/change_status',
                data: data,
                success: function(r) {
                    var json = $.parseJSON(r);
                    if (json.success) {
                       alert('Status Changed Successfully');
                       window.location.reload();
                    } else {
                        alert('Error!! Status Not Changed');
                    }
                }
            })
        });
    });

</script>
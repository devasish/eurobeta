<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Container'), array('action' => 'add'), array('escape'=>FALSE)); ?></li>
        <li><a href="javascript:void(0)" onclick="printData('list-containers')" class="print" rel="list-saps"><i class="fa fa-print"></i>&nbsp;Print List</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
            <div class="col-xs-12">
              <div class="box" id="list-containers">
                <div class="box-header">
                  <h3 class="box-title">Containers</h3>
                  <div class="box-tools noprint">
                    
                    <?php $url = array('controller' => 'Containers', 'action' => 'index'); ?>  
                    <?php echo $this->Form->create('Filter', array('url' => $url)); ?>
                    <div class="input-group"> 
                        <ul class="filters">
                            <li><?php echo $this->Form->input('cal_from', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'From')); ?></li>
                            <li><?php echo $this->Form->input('cal_to', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'To')); ?></li>
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('id' => 'ID', 'container_no' => 'Container No', 'seal_no' => 'Seal No'),  'label' => false, 'class' => 'form-control input-sm')); ?></li>
                            <li><?php echo $this->Form->input('status', array('options' => Configure::read('CONT_STATUS'),  'label' => false, 'class' => 'form-control input-sm', 'empty' => 'Status')); ?></li>
                            <li><?php echo $this->Form->input('type', array('options' => Configure::read('CONT_TYPES'),  'label' => false, 'class' => 'form-control input-sm', 'empty' => 'Type')); ?></li>
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
			<th><?php echo $this->Paginator->sort('container_no'); ?></th>
			<th><?php echo $this->Paginator->sort('seal_no'); ?></th>
			<th><?php echo $this->Paginator->sort('destination'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('Container_type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('load_date'); ?></th>			
			<th><?php echo $this->Paginator->sort('Customer.name'); ?></th>			
			<th class="actions noprint"><?php echo __('Actions'); ?></th>
                    </tr>

                    <?php foreach ($containers as $container): ?>
                    <tr>
                            <td><?php echo h($container['Container']['id']); ?>&nbsp;</td>
                            <td><?php echo h($container['Container']['container_no']); ?>&nbsp;</td>
                            <td><?php echo h($container['Container']['seal_no']); ?>&nbsp;</td>
                            <td>
                                <?php 
                                $conf_desti = Configure::read('CONT_DESTINATION');
                                echo h(!empty($conf_desti[$container['Container']['destination']]) ? $conf_desti[$container['Container']['destination']] : '--'); 
                                ?>
                                &nbsp;
                            </td>
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
                                $cls = 'label-success';
                                $status = '';
                                foreach (Configure::read('CONT_STATUS') as $k => $v) {
                                    if ($k == $container['Container']['status']) {
                                        
                                        switch ($container['Container']['status']) {
                                            case 1:
                                                $cls = 'label-warning'; 
                                                break;
                                            case 2:
                                                $cls = 'label-danger'; 
                                                break;
                                            default:
                                                $cls = 'label-success';
                                                break;
                                        }
                                        $status = $v;
                                        
                                    }
                                }
                                ?>
                                <span class="label <?php echo $cls; ?>"><?php echo $status; ?></span>
                                &nbsp;
                            </td>
                            <td><?php echo h($container['Container']['load_date']); ?>&nbsp;</td>
                            <td><?php echo h($container['Customer']['name']); ?>&nbsp;</td>

                            <td class="noprint">
                                <span class="label label-info"><?php echo $this->Html->link(__(($container['Container']['status'] == 2 ? 'Update' : 'Load')), array('action' => 'view', $container['Container']['id'])); ?></span>
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
    $(document).ready(function() {
        $('#FilterCalFrom').datepicker({format: 'dd-mm-yyyy'});
        $('#FilterCalTo').datepicker({format: 'dd-mm-yyyy'});
    });
</script>
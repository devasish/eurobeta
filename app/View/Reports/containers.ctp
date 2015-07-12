<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li>
            <a id="export_to_csv" href="javascript:void(0)"><span class="glyphicon glyphicon-export"></span>Export</a>
        </li>
        <li><a href="javascript:void(0)" onclick="printData('containers-report')" class="print" rel="list-saps"><i class="fa fa-print"></i>&nbsp;Print List</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box" id="containers-report">
            <div class="box-header">
                <h3 class="box-title">Containers</h3>
                <div class="box-tools noprint">

                    <?php $url = array('controller' => 'reports', 'action' => 'containers'); ?>  
                    <?php echo $this->Form->create('Filter', array('url' => $url)); ?>
                    <div class="input-group"> 
                        <ul class="filters">
                            <li><?php echo $this->Form->input('cal_from', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'From')); ?></li>
                            <li><?php echo $this->Form->input('cal_to', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'To')); ?></li>
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('id' => 'ID', 'container_no' => 'Container No', 'seal_no' => 'Seal No'), 'label' => false, 'class' => 'form-control input-sm')); ?></li>
                        </ul>
                        <div class="input-group-btn srch-btn">
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover list table-condensed" id="containers-report-table">
                    <?php if ((!empty($this->request->data['Filter']['cal_from']) || !empty($this->request->data['Filter']['cal_to']))) : ?>
                    <tr>
                        <td colspan="9">
                            Date : 
                            <?php echo !empty($this->request->data['Filter']['cal_from']) ? $this->request->data['Filter']['cal_from'].' ' : ''; ?>
                            To
                            <?php echo !empty($this->request->data['Filter']['cal_to']) ? $this->request->data['Filter']['cal_to'].' ' : ''; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td><?php echo h('Id'); ?></td>
                        <td><?php echo h('Container No'); ?></td>
                        <td><?php echo h('Seal No'); ?></td>
                        <td><?php echo h('Empty Tare Wt'); ?></td>
                        <td><?php echo h('Type'); ?></td>
                        <td><?php echo h('Container Type'); ?></td>
                        <td><?php echo h('Status'); ?></td>
                        <td><?php echo h('User'); ?></td>
                        <td><?php echo h('Loaded On'); ?></td>			
                        <td><?php echo h('Customer'); ?></td>			
                    </tr>

                    <?php foreach ($containers as $container): ?>
                        <tr>
                            <td><?php echo h($container['Container']['id']); ?></td>
                            <td><?php echo h($container['Container']['container_no']); ?></td>
                            <td><?php echo h($container['Container']['seal_no']); ?></td>
                            <td><?php echo h($container['Container']['empty_tare_wt']); ?></td>
                            <td><?php
                                foreach (Configure::read('CONT_TYPES') as $k => $v) {
                                    if ($k == $container['Container']['type']) {
                                        echo h($v);
                                    }
                                }
                                ?></td>
                            <td><?php
                                foreach (Configure::read('CONT_VP_CTN') as $k => $v) {
                                    if ($k == $container['Container']['vp_ctn']) {
                                        echo h($v);
                                    }
                                }
                                ?></td>
                            <?php
                                $cls = 'text-success';
                                $status = '';
                                foreach (Configure::read('CONT_STATUS') as $k => $v) {
                                    if ($k == $container['Container']['status']) {

                                        switch ($container['Container']['status']) {
                                            case 1:
                                                $cls = 'text-warning';
                                                break;
                                            case 2:
                                                $cls = 'text-danger';
                                                break;
                                            default:
                                                $cls = 'text-success';
                                                break;
                                        }
                                        $status = $v;
                                    }
                                }
                                ?>
                            <td class="<?php echo $cls; ?>">
                                <?php echo $status; ?>
                            </td>
                            <td><?php echo h($container['User']['username']); ?>&nbsp;</td>
                            <td><?php echo h(date('d-m-Y', strtotime($container['Container']['load_date']))); ?>&nbsp;</td>
                            <td><?php echo h($container['Customer']['name']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div><!-- /.box-body -->         
            <div class="box-footer clearfix">
                                 
            </div>              
        </div><!-- /.box -->
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#FilterCalFrom').datepicker({format: 'dd-mm-yyyy'});
        $('#FilterCalTo').datepicker({format: 'dd-mm-yyyy'});
        
        $("#export_to_csv").on('click', function(event) {
            var date = new Date();
            var filename = 'containers-report-' + date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
            exportTableToCSV.apply(this, [$('#containers-report-table'), filename + '.csv']);
        });
    });
</script>
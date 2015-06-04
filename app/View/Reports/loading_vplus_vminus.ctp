<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Loading Report V+ and V- Segregation</li>
        <li><a href="javascript:void(0)" id="export_to_csv"><span class="glyphicon glyphicon-export"></span>Export</a></li>
        <li><a href="javascript:void(0)" onclick="printData('loading-report')" class="print" rel="list-saps"><i class="fa fa-print"></i>&nbsp;Print List</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box" id="loading-report">
            <div class="box-header">
                <h3 class="box-title">Loading Report V+ and V- Segregation</h3>
                <div class="box-tools noprint">
                    <?php $url = array('controller' => 'Reports', 'action' => 'loading_vplus_vminus'); ?>
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
                <table class="table table-hover list" id="loading_report_table">
                    <?php if (!empty($this->request->data['Filter']['cal_from'])): ?>
                        <tr>
                            <td colspan="9" class="text-center">LOADING REPORT FROM <?php echo h($this->Form->value('Filter.cal_from')) ?> TO <?php echo h($this->Form->value('Filter.cal_to')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr class="tr-head">
                        <td>SAP Code</td>
                        <td>Description</td>
                        <td>Container No</td>
                        <td>T. CTN</td>
                        <td>L. Weight</td>
                        <td>N. Weight</td>
                        <td>Diff. Kg.</td>
                        <td>Diff. %</td>
                        <td>AVG WT/CTN</td>
                        <td>Loaded On</td>
                    </tr>
                    <?php foreach ($palletLoad_data as $key => $palletLoads): ?>
                        <tr>
                            <td colspan="10"><?php echo 'V - ' . ucfirst($key); ?></td>
                        </tr>
                        <?php foreach ($palletLoads as $palletLoad): ?>
                            <tr>
                                <td><?php echo h($palletLoad['Sap']['sapcode']); ?></td>
                                <td><?php echo h($palletLoad['Sap']['description']); ?></td>
                                <td><?php echo h($palletLoad['Container']['container_no']); ?></td>
                                <td><?php echo h($palletLoad[0]['total_no_of_ctn']); ?></td>
                                <td><?php echo h($palletLoad[0]['total_net_product_wt']); ?></td>
                                <td><?php echo h($palletLoad[0]['net_cust_product_wt']); ?></td>
                                <td><?php echo h($palletLoad[0]['total_diff']); ?></td>
                                <?php
                                $diff_perc = round($palletLoad[0]['total_diff'] / $palletLoad[0]['net_cust_product_wt'] * 100, 2);
                                $cls = 'text-success';
                                if (abs($diff_perc) >= 10) {
                                    $cls = 'text-danger';
                                }
                                ?>
                                <td class="<?php echo $cls; ?>"><?php echo $diff_perc; ?></td>
                                <td><?php echo h(round($palletLoad[0]['total_net_product_wt'] / $palletLoad[0]['total_no_of_ctn'], 2)); ?></td>
                                <td><?php echo h($palletLoad['Container']['load_date']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="box-footer clearfix">

            </div>              
        </div><!-- /.box -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#FilterCalFrom').datepicker({format: 'dd-mm-yyyy'});
        $('#FilterCalTo').datepicker({format: 'dd-mm-yyyy'});

        $("#export_to_csv").on('click', function (event) {
            var date = new Date();
            var filename = 'loading-report-' + date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
            exportTableToCSV.apply(this, [$('#loading_report_table'), filename + '.csv']);
        });
    });
</script>

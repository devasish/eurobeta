<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Transfer</li>
        <li><a href="javascript:void(0)" id="export_to_csv"><span class="glyphicon glyphicon-export"></span>  Export</a></li>
        <li><a href="javascript:void(0)" onclick="printData('transfer-report-2')" class="print" rel="list-saps"><i class="fa fa-print"></i>&nbsp;Print List</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box" id="transfer-report-2">
            <div class="box-header">
                <h3 class="box-title">Transfer Report 2</h3>
                <div class="box-tools noprint">
                    <?php $url = array('controller' => 'Reports', 'action' => 'transfer_report_2'); ?>
                    <?php echo $this->Form->create('Filter', array('url' => $url)); ?>
                    <div class="input-group"> 

                        <ul class="filters">
                            <li><?php echo $this->Form->input('factory', array('class' => 'form-control input-sm', 'label' => false, 'options' => array('' => 'Factory', '1' => 'F1', '2' => 'F3'))); ?></li>
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
                <table class="table table-hover table-striped table-bordered table-condensed" id="transfer_report_table">
                    <tr>
                        <td>Transfer Report 2</td>
                        <?php if (!empty($this->request->data['Filter']['cal_from'])): ?>
                        <td>FROM: <?php echo $this->request->data['Filter']['cal_from']; ?></td>
                        <?php endif;?>
                        <?php if (!empty($this->request->data['Filter']['cal_from'])): ?>
                        <td>TO: <?php echo $this->request->data['Filter']['cal_from']; ?></td>
                        <?php endif;?>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php $totals = array(); ?>
                <?php foreach ($transfers as $key => $transfer): ?>
                    <?php
                    if (!isset($totals[$key]['net_wt'])) {
                        $totals[$key]['net_wt'] = 0;
                    }
                    if (!isset($totals[$key]['ctn_per_pallet'])) {
                        $totals[$key]['ctn_per_pallet'] = 0;
                    }
                    if (!isset($totals[$key]['total_wt'])) {
                        $totals[$key]['total_wt'] = 0;
                    }
                    ?>
                    
                    <tr class="tr-head">
                        <td colspan="6" class="text-center title-td">
                            <?php 
                            if ($key == 'morning') {
                                echo 'SHIFT : A (Morning 7AM-7PM)';
                            } else {
                                echo 'SHIFT : B (Night 7PM-7AM)';
                            }
                            ?>
                        </td>
                        </tr> 
                        <tr class="tr-head">
                            <td>Serial No</td>
                            <td>Sap Code</td>
                            <td>Product</td>
                            <td>Weight</td>
                            <td>No. of CTN</td>                        
                            <td>Total Wt.</td>                        
                        </tr>
                        
                        <?php foreach ($transfer as $trans): ?>                       
                        <tr>
                            <td><?php echo h($trans['Transfer']['serial_no']); ?></td>
                            <td><?php echo h($trans['Transfer']['sap_code']); ?></td>
                            <td><?php echo h($trans['Transfer']['description']); ?></td>
                            <td><?php echo h($trans['Transfer']['net_wt']); ?></td>
                            <td><?php echo h($trans['Transfer']['ctn_per_pallet']); ?></td>
                            <td><?php echo h($trans['Transfer']['ctn_per_pallet'] * $trans['Transfer']['net_wt']); ?></td>
                        </tr>
                        
                        <?php 
                        $totals[$key]['net_wt'] = isset($totals[$key]['net_wt']) ? $totals[$key]['net_wt'] + $trans['Transfer']['net_wt'] : $trans['Transfer']['net_wt']; 
                        $totals[$key]['ctn_per_pallet'] = isset($totals[$key]['ctn_per_pallet']) ? $totals[$key]['ctn_per_pallet'] + $trans['Transfer']['ctn_per_pallet'] : $trans['Transfer']['ctn_per_pallet']; 
                        $totals[$key]['total_wt'] = $totals[$key]['total_wt'] + $trans['Transfer']['ctn_per_pallet'] * $trans['Transfer']['net_wt']; 
                        ?>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php //echo h($totals[$key]['net_wt']); ?></td>
                            <td><?php echo h($totals[$key]['ctn_per_pallet']); ?></td>
                            <td><?php echo h($totals[$key]['total_wt']); ?></td>
                        </tr>
                <?php endforeach;?>
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
            var filename = 'transfer-report-2' + '-' + date.getDate() + '-' + (date.getMonth()+1) + '-' + date.getFullYear();
            exportTableToCSV.apply(this, [$('#transfer_report_table'), filename + '.csv']);
        });
    });
</script>

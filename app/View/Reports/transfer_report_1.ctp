<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Transfer</li>
        <li><a href="javascript:void(0)" id="export_to_csv"><span class="glyphicon glyphicon-export"></span>  Export</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Transfer Report</h3>
                <div class="box-tools">
                    <?php $url = array('controller' => 'Reports', 'action' => 'transfer_report_1'); ?>
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
                    <?php if (!empty($this->request->data['Filter']['cal_from'])): ?>
                        <tr>
                            <td colspan="9" class="text-center">TRANSFER REPORT <?php echo h($this->Form->value('Filter.cal_from')) ?> TO <?php echo h($this->Form->value('Filter.cal_to')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr class="tr-head">
                        <td colspan="3"></td>
                        <td colspan="2" class="text-center">Morning</td>
                        <td colspan="2" class="text-center">Night</td>
                        <td colspan="2" class="text-center">Total</td>
                    </tr>
                    <tr class="tr-head">
                        <td>SAP</td>
                        <td>Product</td>
                        <td>Weight</td>
                        <td>CTN</td>
                        <td>MT</td>
                        <td>CTN</td>
                        <td>MT</td>
                        <td>Total CTN</td>
                        <td>Acc Total</td>
                    </tr>
                    <?php 
                    $sums = array(
                        'morning' => array(
                            'ctn' => 0,
                            'mt' => 0,
                        ),
                        'night' => array(
                            'ctn' => 0,
                            'mt' => 0,
                        ),
                        'total' => array(
                            'ctn' => 0,
                            'mt' => 0,
                        )
                    ); 
                    ?>
                    <?php foreach ($transfers as $transfer): ?>
                        <?php
                        $sums['morning']['ctn'] += $transfer['morning']['total_ctn_per_pallet'];
                        $sums['morning']['mt'] += $transfer['sap']['net_wt'] * $transfer['morning']['total_ctn_per_pallet'];
                        $sums['night']['ctn'] += $transfer['night']['total_ctn_per_pallet'];
                        $sums['night']['mt'] += $transfer['sap']['net_wt'] * $transfer['night']['total_ctn_per_pallet'];
                        $total_ctn = $transfer['morning']['total_ctn_per_pallet'] + $transfer['night']['total_ctn_per_pallet'];
                        $total_mt = $transfer['sap']['net_wt'] *  ($transfer['morning']['total_ctn_per_pallet'] + $transfer['night']['total_ctn_per_pallet']);
                        
                        $sums['total']['ctn'] += $total_ctn;
                        $sums['total']['mt'] += $total_mt;
                        ?>
                        <tr>
                            <td><?php echo h($transfer['sap']['sapcode']); ?></td>
                            <td><?php echo h($transfer['sap']['description']); ?></td>
                            <td><?php echo h($transfer['sap']['net_wt']); ?></td>
                            <td><?php echo h($transfer['morning']['total_ctn_per_pallet']); ?></td>
                            <td><?php echo h($transfer['sap']['net_wt'] * $transfer['morning']['total_ctn_per_pallet']); ?></td>
                            <td><?php echo h($transfer['night']['total_ctn_per_pallet']); ?></td>
                            <td><?php echo h($transfer['sap']['net_wt'] * $transfer['night']['total_ctn_per_pallet']); ?></td>
                            <td><?php echo h($total_ctn); ?></td>
                            <td><?php echo h($total_mt); ?></td>
                        </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $sums['morning']['ctn']; ?></td>
                            <td><?php echo $sums['morning']['mt']; ?></td>
                            <td><?php echo $sums['night']['ctn']; ?></td>
                            <td><?php echo $sums['night']['mt']; ?></td>
                            <td><?php echo $sums['total']['ctn']; ?></td>
                            <td><?php echo $sums['total']['mt']; ?></td>
                        </tr>
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
            var filename = 'transfer-report-1' + '-' + date.getDate() + '-' + (date.getMonth()+1) + '-' + date.getFullYear();
            exportTableToCSV.apply(this, [$('#transfer_report_table'), filename + '.csv']);
        });
    });
</script>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Transfer</li>        
        <li><a href="javascript:void(0)" onclick="printData('transfer-report-3')" class="print" rel="list-saps"><i class="fa fa-print"></i>&nbsp;Print List</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box" id="transfer-report-3">
            <div class="box-header">
                <h3 class="box-title">Transfer Report 3</h3>
                <div class="box-tools">
                    <?php $url = array('controller' => 'Reports', 'action' => 'transfer_report_3'); ?>
                    <?php echo $this->Form->create('Filter', array('url' => $url)); ?>
                    <div class="input-group"> 

                        <ul class="filters noprint">  
                            <li><?php echo $this->Form->input('cal_from', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'From')); ?></li>
                            <li><?php echo $this->Form->input('cal_to', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'To')); ?></li>
                            <li><?php echo $this->Form->input('value', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                            <li><?php echo $this->Form->input('field', array('options' => array('serial_no' => 'Serial No', 'sap_code' => 'Sap Code'), 'label' => false, 'class' => 'form-control input-sm')); ?></li>
                        </ul>
                        <div class="input-group-btn srch-btn noprint">
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-striped table-bordered table-condensed list" id="transfer_report_table">
                    <?php if (!empty($this->request->data['Filter']['cal_from'])): ?>
                        <tr>
                            <td colspan="9" class="text-center">TRANSFER REPORT <?php echo h($this->Form->value('Filter.cal_from')) ?> TO <?php echo h($this->Form->value('Filter.cal_to')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr class="tr-head" no-export="y">
                        <td>serial</td>
                        <td>Sap Code</td>
                        <td>Product Serial No</td>
                        <td>Manufacture Date</td>
                        <td>Loaded Serial NO</td>
                        <td>Load Date</td>
                        <td>Status</td>
                    </tr>
                    <?php $x = 1; ?>
                    <?php foreach ($transfers as $transfer): ?> 
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo h($transfer['transfers']['sap_code']); ?></td>
                            <td><?php echo h($transfer['transfers']['serial_no']); ?></td>
                            <td><?php echo h(date('d-m-Y', strtotime($transfer['transfers']['transfer_date']))); ?></td>
                            <td><?php 
                                if(!empty($transfer['pallet_loads']['loaded_serial_no'])){
                                    echo h($transfer['pallet_loads']['loaded_serial_no']);
                                }else{
                                    echo '-';
                                }  
                            ?></td>
                            <td><?php echo h(date('d-m-Y', strtotime($transfer['pallet_loads']['created']))); ?></td>
                            <td><?php if($transfer['transfers']['serial_no'] = $transfer['pallet_loads']['loaded_serial_no']){
echo '<span class="label label-success">loaded</span>';}else{echo'<span class="label label-danger">not loaded</span>';} ?></td>
                            
                        </tr>
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
            var filename = 'transfer-report-1' + '-' + date.getDate() + '-' + (date.getMonth()+1) + '-' + date.getFullYear();
            exportTableToCSV.apply(this, [$('#transfer_report_table'), filename + '.csv']);
        });
    });
</script>

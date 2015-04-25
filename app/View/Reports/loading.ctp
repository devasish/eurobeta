<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Loading</li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Loading Report</h3>
                  <div class="box-tools">
                      <?php $url = array('controller' => 'Reports', 'action' => 'loading'); ?>
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
                    <table class="table table-hover" id="loading_report_table">
                        <?php if (!empty($this->Form->value('Filter.cal_from'))): ?>
                      <tr>
                          <td colspan="9" class="text-center">LOADING REPORT FROM <?php echo h($this->Form->value('Filter.cal_from'))?> TO <?php echo h($this->Form->value('Filter.cal_to'))?></td>
                      </tr>
                      <?php endif;?>
                      <tr class="tr-head">
                        <td><?php echo $this->Paginator->sort('Sap.sapcode'); ?></td>
			<td><?php echo $this->Paginator->sort('Sap.description'); ?></td>
			<td>T. CTN</td>
                        <td>L. Weight</td>
			<td>N. Weight</td>
			<td>Diff. Kg.</td>
			<td>Diff. %</td>
			<td>AVG WT/CTN</td>
			<td>Loaded on</td>
                    </tr>
                   <?php foreach ($palletLoads as $palletLoad): ?>
                        <tr>
                            <td><?php echo h($palletLoad['Sap']['sapcode']); ?></td>
                            <td><?php echo h($palletLoad['Sap']['description']); ?></td>
                            <td><?php echo h($palletLoad[0]['total_no_of_ctn']); ?></td>
                            <td><?php echo h($palletLoad[0]['total_net_product_wt']); ?></td>
                            <td><?php echo h($palletLoad[0]['net_cust_product_wt']); ?></td>
                            <td><?php echo h($palletLoad[0]['total_diff']); ?></td>
                            <td><?php echo h(round($palletLoad[0]['total_diff'] / $palletLoad[0]['net_cust_product_wt'] * 100, 2)); ?></td>
                            <td><?php echo h(round($palletLoad[0]['total_net_product_wt'] / $palletLoad[0]['total_no_of_ctn'], 2)); ?></td>
                            <td><?php echo h($palletLoad['PalletChecklist']['created']); ?></td>
                        </tr>
                    <?php endforeach;  ?>
                  </table>
                </div>
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

<a href="javascript:void(0)" id="export_to_csv" class="btn btn-info">Export</a>

<script type="text/javascript">
    $(document).ready(function() {
        $('#FilterCalFrom').datepicker({format: 'dd-mm-yyyy'});
        $('#FilterCalTo').datepicker({format: 'dd-mm-yyyy'});
    });
</script>

<script>
    $(document).ready(function () {

    function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td)'),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace('"', '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
            .attr({
            'download': filename,
                'href': csvData,
                'target': '_blank'
        });
    }

    // This must be a hyperlink
    $("#export_to_csv").on('click', function (event) {
        // CSV
        exportTableToCSV.apply(this, [$('#loading_report_table'), 'export.csv']);
        
        // IF CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
});
</script>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Loading Analysis Report</li>
        <li><a href="javascript:void(0)" id="export_to_csv"><span class="glyphicon glyphicon-export"></span> Export</a></li>
        <li><a href="javascript:void(0)" onclick="printData('loading-analysis-report')" class="print" rel="list-saps"><i class="fa fa-print"></i>&nbsp;Print List</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box" id="loading-analysis-report">
            <div class="box-header">
                <h3 class="box-title">Loading Analysis Report</h3>
                <div class="box-tools noprint">
                    <div class="input-group"> 
                        <ul class="filters">  
                            <li><?php echo $this->Form->input('cal_from', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'From')); ?></li>
                            <li><?php echo $this->Form->input('cal_to', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'To')); ?></li>
                        </ul>
                        <div class="input-group-btn srch-btn">
                            <button type="submit" class="btn btn-sm btn-default" id="btn_go"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="box-body">
                <table id="loading_ana_table" class="table table-bordered list" >
                </table>
            </div>
            <div class="box-footer clearfix">

            </div>              
        </div>
    </div>
</div>
<input type="hidden" id="start_index" value="0"/>
<input type="hidden" id="max_index" value="0"/>

<script type="text/javascript">
    $(document).ready(function() {
        
        $('#cal_from').datepicker();
        $('#cal_to').datepicker();
        
        $('#btn_go').on('click', function() {
            $('#loading_ana_table').html('');
            $('#start_index').val(0);
            $('#max_index').val(0);
                    
            var from = $('#cal_from').val();
            var to = $('#cal_to').val();
            var data = {from : from, to : to};
            $.ajax({
                url : SITE_URL + 'reports/loading_analysis_data_count',
                data: data,
                success: function(r) {
                    var json = $.parseJSON(r);
                    $('#start_index').val(0);
                    $('#max_index').val(json.count);
                    
                    loadData();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            })
        });
        
        var term = 0;
        
        function loadData() {
            term++;
            var start = $('#start_index').val();
            var max = $('#max_index').val();
            
            if (start >= max || term > 100) {
                console.log('completed');
                return;
            }
            
            var from = $('#cal_from').val();
            var to = $('#cal_to').val();
            
            var data = {from : from, to : to, start: start};
            
            $.ajax({
                url : SITE_URL + 'reports/loading_analysis_data',
                data: data,
                success: function(r) {
                    var json = $.parseJSON(r);
                    
                    if ($('#loading_ana_table tr#t_head').find('td').length == 0) {
                        var htds = '<td>SAP</td><td>Description</td>';
                        var htds_export_only = '<td>SAP</td><td>Description</td>';
                        var grCols = '<td>Loaded CTN</td><td>Loaded WT</td><td>AVG Loading WT</td><td>DIFF %</td>';
                        var colHeads = '<td colspan="">&nbsp;</td><td colspan="">&nbsp;</td>'                        
                        $.each(json.gr_dates, function(i, v) {
                            htds += '<td colspan="4">' + v + '</td>';
                            htds_export_only += '<td>' + v + '</td><td></td><td></td><td></td>';
                            colHeads += grCols;
                        });
                        
                        $('<tr>').attr('id', 't_head').attr('no-export', 'y').html(htds).appendTo('#loading_ana_table');
                        $('<tr>').addClass('only-export').html(htds_export_only).appendTo('#loading_ana_table');
                        $('<tr>').html(colHeads).appendTo('#loading_ana_table');
                    }
                    
                    
                    var tds = '<td>' + json.sapcode + '</td>';
                    tds += '<td>' + json.sapdesc + '</td>';
                    $.each(json.data, function(i, v) {
                        tds += '<td>' + v.total_no_of_ctn + '</td>';
                        tds += '<td>' + v.total_net_product_wt + '</td>';
                        tds += '<td>' + Custom.round((v.total_net_product_wt / (v.total_no_of_ctn > 0 ? v.total_no_of_ctn : 1)), 2) + '</td>';
                        var cls = 'text-success';
                        if (Math.abs(v.total_diff_perc) >= 10) {
                            cls = 'text-danger';
                        }
                        tds += '<td class="'+ cls +'">' + v.total_diff_perc + '</td>';
                    });
                    
                    $('<tr>').html(tds).appendTo('#loading_ana_table');
                },
                complete: function() {
                    start++;
                    $('#start_index').val(start);
                    
                    loadData();
                }
            });
        }
        
//        $('#search_sapcode_txt').autocomplete({
//            source: SITE_URL + 'transfers/prediction',
//            select: function (event, ui) {
//                console.log(ui.item.value);
//                loadReport(ui.item.value);
//            }
//        });
        
        
        function loadReport(sapcode) {
            var data = 'sapcode='+sapcode;
            $.ajax({
                url: SITE_URL + 'reports/ctn_loading_report_data',
                data: data,
                type: 'post',
                beforeSend: function() {
                    $('#box-body').html('Loading...');
                },
                success: function(r) {
                    $('#box-body').html(r);
                }
            });
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#FilterCalFrom').datepicker({format: 'dd-mm-yyyy'});
        $('#FilterCalTo').datepicker({format: 'dd-mm-yyyy'});

        $("#export_to_csv").on('click', function(event) {
            var date = new Date();
            var filename = 'loading-analysis-report-' + date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
            exportTableToCSV.apply(this, [$('#loading_ana_table'), filename + '.csv']);
        });
    });
</script>

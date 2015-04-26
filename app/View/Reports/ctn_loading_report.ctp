<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#">Report</a></li>
        <li class="active">CTN Loading Report</li>
        <li><a href="javascript:void(0)" id="export_to_csv"><span class="glyphicon glyphicon-export"></span> Export</a></li>
    </ol>
</div><!--/.row-->

<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">CTN Loading Report</h3>
                <div class="box-tools">
                    <div class="input-group"> 
                        <ul class="filters">  
                            <li><?php echo $this->Form->input('search_sapcode_txt', array('class' => 'date form-control input-sm', 'label' => false, 'placeholder' => 'Search')); ?></li>
                        </ul>
<!--                        <div class="input-group-btn srch-btn">
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>-->
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="box-body">
                <table class="table table-hover" id="ctn_loading_report_table">
                    
                </table>
            </div>
            <div class="box-footer clearfix">

            </div>              
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#search_sapcode_txt').autocomplete({
            source: SITE_URL + 'transfers/prediction',
            select: function (event, ui) {
                console.log(ui.item.value);
                loadReport(ui.item.value);
            }
        });
        
        
        function loadReport(sapcode) {
            var data = 'sapcode='+sapcode;
            $.ajax({
                url: SITE_URL + 'reports/ctn_loading_report_data',
                data: data,
                type: 'post',
                beforeSend: function() {
                    $('#box-body>table').html('Loading...');
                },
                success: function(r) {
                    $('#box-body>table').html(r);
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
            var filename = 'ctn_loading-report-' + date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
            exportTableToCSV.apply(this, [$('#ctn_loading_report_table'), filename + '.csv']);
        });
    });
</script>

<style>
    font{
        font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
        font-size:50px;
        font-weight:700;
        color: #0088cc;
        text-shadow: 1px 1px 5px  #AAA;
        padding-left: 30px;
    }
</style>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Dashboard</li>
    </ol>
</div><!--/.row-->

<!--<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>/.row-->

<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget ">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-transfer glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large" id="transfer-last-month">0</div>
                    <div class="text-muted">Transfers</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-orange panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-transfer glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large" id="transfer-yesterday">0</div>
                    <div class="text-muted">Yesterday Transfers</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-log-out glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large" id="dispatch-last-month">0</div>
                    <div class="text-muted">Dispatch</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-log-out glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large" id="dispatch-yesterday">0</div>
                    <div class="text-muted">Yesterday Dispatch</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-padding">
        <div class="col-xs-12 col-md-6 col-lg-12" id="dash-line-chart"></div>
    </div>
</div><!--/.row-->
<!--<div class="row">
    <div class="col-lg-4 col-md-offset-4 text-center">
      <div class="panel panel-info">  
<?php
echo $this->Html->link(
        $this->Html->image('sme.jpg', array('alt' => 'logo')), '', array('target' => 'self', 'escape' => false, 'class' => 'logo')
);
?>
      </div>
    </div>
</div>-->

<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: SITE_URL + 'reports/dash_data',
            success: function (r) {
                var json = $.parseJSON(r);
                $('#transfer-last-month').html(json.transfer.last_month)
                $('#transfer-yesterday').html(json.transfer.yesterday)
                $('#dispatch-last-month').html(json.dispatch.last_month)
                $('#dispatch-yesterday').html(json.dispatch.yesterday)
            }
        });

        $.ajax({
            url: SITE_URL + 'reports/dash_graph',
            success: function (r) {
                var json = $.parseJSON(r);
                drawChart(json);
            }
        });
        
        
        
        function drawChart(json) {
            $('#dash-line-chart').highcharts({
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'Monthly Transfer and Dispatch',
                    //x: -20 //center
                },
                subtitle: {
                    text: 'Based on last one month records',
                    //x: -20
                },
                xAxis: {
                    categories: json.categories
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                },
                tooltip: {
                    valueSuffix: 'KG'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: json.series
            });
        }
    });
    
</script>
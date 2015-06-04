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
                    <div class="large" id="transfer-last-month">120</div>
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
                    <div class="large" id="transfer-yesterday">52</div>
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
                    <div class="large" id="dispatch-last-month">24</div>
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
                    <div class="large" id="dispatch-yesterday">25.2k</div>
                    <div class="text-muted">Yesterday Dispatch</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" id="dash-line-chart"></div>
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
                $('#transfer-last-month').html(json.transfer.last_month)
                $('#transfer-yesterday').html(json.transfer.yesterday)
                $('#dispatch-last-month').html(json.dispatch.last_month)
                $('#dispatch-yesterday').html(json.dispatch.yesterday)
            }
        });
        drawChart();
        
        function drawChart() {
            $('#dash-line-chart').highcharts({
                title: {
                    text: 'Monthly Average Temperature',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Source: WorldClimate.com',
                    x: -20
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Temperature (°C)'
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                },
                tooltip: {
                    valueSuffix: '°C'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                        name: 'Tokyo',
                        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                    }, {
                        name: 'New York',
                        data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                    }, {
                        name: 'Berlin',
                        data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                    }, {
                        name: 'London',
                        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                    }]
            });
        }
    });
    
</script>
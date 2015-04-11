<style>
    #transfer_print td{
       font-size: 14px; 
    }
    #print_div{
        background:#FFF    ;
        width: 450px; 
        height: 385px; 
        border: 1px solid #123456;
        padding: 15px;
        border-radius: 5px;
        font-size: 16px;
        color: brown; 
         
       
    }
    #print_div table tr td{
        font-family: cursive; 
        background: #ffffff;
        color: #001;
        border: none;

    }
    #print_div h3{
        color: #000;
        margin-bottom:0px;
        padding-bottom: 2px;

    }
    #print_div h4{
        color: #000;
        margin-bottom:0px;
        padding-bottom: 4px;
    }
    #print_div tr td{
       font-size: 14px;
       font-weight: normal;
    }
    #trnasfer_print_btn{
      text-decoration: none;
      padding: 7px;
      /*border-style:  ;*/
      border: 1px solid #2aabd2;
      border-radius: 3px; 
      font-size: 11px;
      font-weight: bold;
      color: #FFF;
      background: #30a5ff; 
    }
    #trnasfer_print_btn:hover{
     color: #30a5ff;
     background: #FFF;
     border: 1px solid #2aabd2;
     -webkit-transition: all 0.5s ease;
    transition: all 0.5s ease;
    } 
    .display_none{
      visibility: hidden; 
    }
    .display_all    {
      visibility: visible; 
    }
    .bar-details{
        width: 90%;
    }  

</style>

<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>' . '&nbsp;&nbsp;' . __('Edit Transfer'), array('action' => 'edit', $transfer['Transfer']['id']), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Transfer'), array('action' => 'delete', $transfer['Transfer']['id']), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $transfer['Transfer']['id'])); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Transfers'), array('action' => 'index'), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Transfer'), array('action' => 'add'), array('escape' => FALSE)); ?> </li>
    </ol>
</div><!--/.row-->
<br/><br/>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php echo __('Transfer'); ?>
            </div>
            <div class="panel-body">
                <dl class="bar-details">
                    <dt><?php echo __('Id'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['id']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Sap Id'); ?></dt>
                    <dd>
                        <?php echo $this->Html->link($transfer['Sap']['id'], array('controller' => 'saps', 'action' => 'view', $transfer['Sap']['id'])); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Sap Code'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['sap_code']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Description'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['description']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Ctn Per Pallet'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['ctn_per_pallet']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Net Wt'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['net_wt']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Remarks'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['remarks']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Serial No'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['serial_no']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Created'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['created']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Modified'); ?></dt>
                    <dd>
                        <?php echo h($transfer['Transfer']['modified']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Status'); ?></dt>
                    <dd>
                        <?php
                        foreach (Configure::read('STATUS') as $k => $v) {
                            if ($k == $transfer['Transfer']['status']) {
                                echo h($v);
                            }
                        }
                        ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Created By'); ?></dt>
                    <dd>
                        <?php echo $this->Html->link($transfer['User']['username'], array('controller' => 'users', 'action' => 'view', $transfer['User']['id'])); ?>
                        &nbsp;
                    </dd>
                </dl>
            </div>                 
        </div>
    </div>
    <div class="col-md-6">
        <div id="print_div">  
            <div>
                <center>
                    <h3>EURO SME SDN BHD</h3>
                    <h4>Finished Goods Slip</h4>
                    <div id="barcode-div1"></div>
                    <table style="text-align: center;">
                        <tr>
                            <td style="text-align: right;">SAP Code</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><b><?php echo h($transfer['Transfer']['sap_code']); ?></b></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Description</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><?php echo h($transfer['Transfer']['description']); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Ctn Per Pallet</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><?php echo h($transfer['Transfer']['ctn_per_pallet']); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Quantity</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><?php echo h($transfer['Transfer']['net_wt']); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Date</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><?php echo date('d-m-y'); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="325px" style="margin-top: 20px;" >
                                    <tr>
                                        <td style=" width: 40%;padding: 10px; border: 1px solid #23300f;border-radius: 4px;text-align: center;background: #d9edf7;color: #900;font-size: 20px;">QA Stamp</td>
                                        <td></td>
                                        <td style=" width: 40%;padding: 10px; border: 1px solid #23300f;border-radius: 4px;text-align: center;background: #d9edf7;color: #900;font-size: 20px;" >Prod Stamp</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                        <center>
                            </br>   
                            <a href="javascript:void(0)" id="trnasfer_print_btn" class="noprint"><i class="fa fa-print"></i>  Print</a> 
                        </center>
                        </td>
                        </tr>
                    </table>
                </center>    
            </div>    
            <div id="counter_div"  class="display_none">
                <hr style=" border: none; border-bottom: 1px dotted silver; width: 100%">
                <center>
                    <h3>EURO SME SDN BHD</h3>
                    <h4>Finished Goods Slip</h4>
                    <div id="barcode-div2"></div>
                    <table>
                        <tr>
                            <td style="text-align: right;">SAP Code</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><b><?php echo h($transfer['Transfer']['sap_code']); ?></b></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Description</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><?php echo h($transfer['Transfer']['description']); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Ctn Per Pallet</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><?php echo h($transfer['Transfer']['ctn_per_pallet']); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Quantity</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><?php echo h($transfer['Transfer']['net_wt']); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Date</td>
                            <td>:</td>
                            <td style="text-align: left; padding-left: 5px;"><?php echo date('d-m-y'); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="30%" style="margin-top: 20px;" >
                                    <tr>
                                        <td style=" width: 40%;padding: 10px; border: 1px solid #23300f;border-radius: 4px;text-align: center;background: #d9edf7;color: #900;font-size: 20px;">QA Stamp</td>
                                        <td></td>
                                        <td style=" width: 40%;padding: 10px; border: 1px solid #23300f;border-radius: 4px;text-align: center;background: #d9edf7;color: #900;font-size: 20px;" >Prod Stamp</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>
                </center> 

            </div>        
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#barcode-div1').barcode('<?php echo h($transfer['Transfer']['serial_no']); ?>', 'code39', {barWidth: 1, barHeight: 30});
          $('#barcode-div2').barcode('<?php echo h($transfer['Transfer']['serial_no']); ?>', 'code39', {barWidth: 1, barHeight: 30});


        $('#trnasfer_print_btn').on('click', function () {
             $('#trnasfer_print_btn').removeAttr('a');
             $('#trnasfer_print_btn').addClass('dispaly_none');
             $('#trnasfer_print_btn').removeClass('dispaly_none');
             $('#trnasfer_print_btn').addClass('dispaly_all');
            printData('print_div');
        });
    });


</script>

<style>
    #transfer_print td{
       font-size: 14px; 
    }
    #print_div{
        background:#FFF    ;
        width: 300px; 
        height: 400px; 
        border: 2px solid #123456;
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
      padding: 5px;
      /*border-style:  ;*/
      border: 1px solid #333;
      border-radius: 4px; 
      font-size: 12px;
      color: #900;
    }
    #trnasfer_print_btn:hover{
     /*background: #666;*/  
     border: 1px solid #000; 
     box-shadow: 1px 1px 1px #AAA;
    } 
    .display_none{
      visibility: hidden; 
    }
    .display_all    {
      visibility: visible; 
    }
      

</style>
<div class="transfers view">
    <h2><?php echo __('Transfer'); ?></h2>
    <table width="100%" id="transfer_print">
        <tr>
                <td width="70%">
                <div class="left-panel">
                    <dl>
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
            </td >
            <td width="30%">
                <div id="print_div">  
                    <div>
                <center>
                    <h3>EURO SME SDN BHD</h3>
                <h4>Finished Goods Slip</h4>
                <div id="barcode-div1"></div>
                <table>
                    <tr>
                        <td>SAP Code</td>
                        <td>:</td>
                        <td><b><?php echo h($transfer['Transfer']['sap_code']); ?></b></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td><?php echo h($transfer['Transfer']['description']); ?></td>
                    </tr>
                    <tr>
                        <td>Ctn Per Pallet</td>
                        <td>:</td>
                        <td><?php echo h($transfer['Transfer']['ctn_per_pallet']); ?></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>:</td>
                        <td><?php echo h($transfer['Transfer']['net_wt']); ?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td><?php echo date('d-m-y'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table width="30%" >
                                <tr>
                                    <td style=" width: 40%;padding: 10px; border: 1px solid #23300f;border-radius: 4px;text-align: center;background: #cee7a8;color: #900;font-size: 20px;">QA Stamp</td>
                                    <td></td>
                                    <td style=" width: 40%;padding: 10px; border: 1px solid #23300f;border-radius: 4px;text-align: center;background: #cee7a8;color: #900;font-size: 20px;" >Prod Stamp</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                           <center>
                            </br>   
                            <a href="javascript:void(0)" id="trnasfer_print_btn" class="noprint"> Print</a> 
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
                        <td>SAP Code</td>
                        <td>:</td>
                        <td><b><?php echo h($transfer['Transfer']['sap_code']); ?></b></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td><?php echo h($transfer['Transfer']['description']); ?></td>
                    </tr>
                    <tr>
                        <td>Ctn Per Pallet</td>
                        <td>:</td>
                        <td><?php echo h($transfer['Transfer']['ctn_per_pallet']); ?></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>:</td>
                        <td><?php echo h($transfer['Transfer']['net_wt']); ?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td><?php echo date('d-m-y'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table width="30%" >
                                <tr>
                                    <td class="left_td" >QA Stamp</td>
                                    <td></td>
                                    <td class="right_td" >Prod Stamp</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                </table>
            </center> 

            </div>        
            </div>
            

            </td>


</tr>
</table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>' . '&nbsp;&nbsp;' . __('Edit Transfer'), array('action' => 'edit', $transfer['Transfer']['id']), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Transfer'), array('action' => 'delete', $transfer['Transfer']['id']), array('escape' => FALSE), __('Are you sure youw ant to delete # %s?', $transfer['Transfer']['id'])); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Transfers'), array('action' => 'index'), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Transfer'), array('action' => 'add'), array('escape' => FALSE)); ?> </li>
    </ul>
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

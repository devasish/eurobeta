<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-eye"></i>' . '&nbsp;&nbsp;' . __('View Container'), array('controller' => 'containers', 'action' => 'view', $this->Form->value('Container.id')), array('escape' => FALSE)); ?> </li>
        <li><a href="javascript:void(0)" onclick="printData('palletchecklist-print')"><i class="fa fa-print"></i>&nbsp;&nbsp;Print</a></li>  
    </ol>
</div>

<br/><br/>
<?php $plt_wts = Configure::read('CONT_VP_CTN_PLT_WT'); ?>
<div class="row">
    <div class="col-xs-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <?php
                    echo __('Edit Pallet Checklist to Container # ');
                    echo $this->Html->link($this->Form->value('Container.container_no'), array('controller' => 'containers', 'action' => 'view', $this->Form->value('Container.id')))
                    ?>

                </h3>
                <div class="box-tools">
                    <div class="input-group"> 

                    </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <?php echo $this->Form->create('PalletChecklist'); ?>
                <table class="table table-hover" id="loads-table">
                    <tr>
                        <th width="2%">Serial</th>
                        <th width="42%">Serial No</th>
                        <th width="15%">QTY CTN</th>
                        <th width="15%">WEIGHT(KG) WITH PALLET</th>
                        <th width="20%">WEIGHT/CTN</th>
                        <th><a href="javascript:void(0)" id="add_new_load">Add New</a></th>
                    </tr>
                    <?php
                    $x = 1;
                    $row_index = 0;
                    ?>

                    <?php foreach ($this->Form->value('PalletLoad') as $k => $palletLoad) : ?>
                        <tr>
                            <td>
                                <?php echo $x++; ?>
                                <?php echo $this->Form->input('PalletLoad.' . $row_index . '.id', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads_id_input form-control', 'data-index' => $row_index)); ?>
                            </td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.loaded_serial_no', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input form-control', 'data-index' => $row_index)); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.quantity', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input form-control', 'data-index' => $row_index)); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.wt_with_pallet', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input form-control', 'data-index' => $row_index)); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.wt_per_ctn', array('label' => FALSE, 'div' => FALSE, 'readonly' => true, 'data-index' => $row_index, 'class' => 'loads_wt_per_ctn form-control')); ?></td>
                            <td>
                                <?php if ($x > 2): ?>
                                <a href="javascript:void(0)" id="del_load_<?php echo $row_index; ?>" class="del_load">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $row_index++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="box-footer clearfix">
                <table>
                    <tr>
                        <td width="18%">&nbsp;</td>
                        <td width="28%">Total</td>
                        <td width="14%" style="padding-right: 7px;"><?php echo $this->Form->input('no_of_ctn', array('label' => FALSE, 'div' => FALSE, 'readonly' => true, 'class' => 'form-control')); ?></td>
                        <td width="14%" style="padding-left: 7px;"><?php echo $this->Form->input('total_wt_with_pallet', array('label' => FALSE, 'div' => FALSE, 'readonly' => true, 'class' => 'form-control')); ?></td>
                        <td width="27%">&nbsp;</td>                        
                    </tr>
                </table>
            </div>              
        </div><!-- /.box -->
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">                   
            <div class="panel-body">
                <div class="col-md-12">                            
                    <div class="form-group">
                        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('container_id', array('type' => 'hidden', 'value' => $this->Form->value('Container.id'))); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('sap_id', array('type' => 'hidden')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('sap_code', array('class' => 'form-control lg-input')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('sap_desc', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>                            
                    <div class="form-group">
                        <?php echo $this->Form->input('product_cust_wt', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('no_of_pallet', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $this->Form->input('single_empty_pallet_wt', array('type' => 'hidden', 'readonly' => true, 'class' => 'form-control', 'value' => $plt_wts[$this->Form->value('Container.vp_ctn')]));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('empty_pallet_wt', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('single_empty_ctn_wt', array('type' => 'hidden', 'readonly' => true, 'class' => 'form-control', 'value' => $this->Form->value('Sap.empty_ctn_wt'))); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('empty_ctn_wt', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('cbm', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('net_product_wt', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('net_wt_per_ctn', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('gross_wt_per_ctn', array('readonly' => true, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('diff', array('type' => 'hidden', 'class' => 'form-control')); ?>
                    </div>                            
                    <div class="form-group">
                        <?php echo $this->Form->input('diff_perc', array('readonly' => true, 'class' => 'form-control', 'label' => array('text' => 'Diff (%)', 'class' => 'control-label'))); ?>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6"> 
        <button type="submit" class="btn btn-primary">Save</button><br/><br/>
    </div>
</div>

<?php echo $this->Html->script('View/PalletChecklists/add') ?>

<!-- print section -->
<div id="palletchecklist-print" class="print-hidden">
    <center>
        <table>
            <tr>
                <td width="10%"><?php echo $this->Html->image('sme.jpg', array('width' => '100')); ?></td>
                <td width="70%" valign="top">
                    <table style="border: 1px solid #666; border-collapse: collapse;">
                        <tr>
                            <td style="text-align: center; border: 1px solid #000; height: 50px;"><font size="4">EURO SME SDN BHD</font></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border: 1px solid #000; height: 50px;">
                                <font size="3">WAREHOUSE DEPARTMENT</font>
                            </td>
                        </tr>
                    </table>
                </td>
                <td valign="top">
                    <table style="border: 1px solid #666; border-collapse: collapse;">
                        <tr>
                            <td style="text-align: center; border: 1px solid #000;"><font size="4">Date</font></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border: 1px solid #000;">
                                <font size="3">
                                    <?php 
                                    $loaded_on = strtotime($this->Form->value('PalletChecklist.modified')) > 0 ? strtotime($this->Form->value('PalletChecklist.modified')) : strtotime($this->Form->value('PalletChecklist.created'));
                                    echo date('d-m-Y', $loaded_on);
                                    ?>
                                </font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <h1>
            PALLET CHECKLIST
        </h1>

        <table>
            <tr>
                <td width="60%" valign="top">
                    <table style=" border-collapse: collapse;" cellpadding="0" cellspacing="0">
                        <tr>
                            <th style="border: 1px solid #666;">DESCRIPTION</th>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;">
                                <table style="border-collapse: collapse;">
                                    <tr>
                                        <th style="border-right: 1px solid #666;" width="7%">Serial</th>
                                        <th style="border-right: 1px solid #666;" width="27%">QTY CTN</th>
                                        <th style="border-right: 1px solid #666;" width="27%">WEIGHT(KG) WITH PALLET</th>
                                        <th style="border-right: 0px solid #666;" width="27%">WEIGHT/CTN</th>                                        
                                    </tr>
                                    <?php
                                    $x = 1;
                                    $row_index = 0;
                                    ?>

                                    <?php foreach ($this->Form->value('PalletLoad') as $k => $palletLoad) : ?>
                                        <tr>
                                            <td style="border: 1px solid #666; text-align: center;">
                                                <?php echo $x++; ?>
                                            </td>
                                            <td style="border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletLoad.' . $row_index . '.quantity'); ?></td>
                                            <td style="border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletLoad.' . $row_index . '.wt_with_pallet'); ?></td>
                                            <td style="border: 1px solid #666; text-align: center; border-right: 0px;"><?php echo $this->Form->value('PalletLoad.' . $row_index . '.wt_per_ctn'); ?></td>                                            
                                        </tr>
                                        <?php $row_index++; ?>
                                    <?php endforeach; ?>
                                        <tr>
                                        <td width="7%" style="border-right: 1px solid #666; text-align: center;"><b>TOTAL</b></td>
                                        <td width="27%" style="padding-right: 6px; border-right: 1px solid #666; text-align: center;"><b><?php echo $this->Form->value('PalletChecklist.no_of_ctn'); ?></b></td>
                                        <td width="27%" style="padding-left: 7px; border-right: 1px solid #666; text-align: center;"><b><?php echo $this->Form->value('PalletChecklist.loaded_wt'); ?></b></td>
                                        <td style=" border-right: 0px;" width="27%">&nbsp;</td>                                        
                                    </tr>
                                </table>
                            </td>                            
                        </tr>
                    </table>
                </td>
                <td width="10%">&nbsp;</td>
                <td valign="top">
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td style=" border: 1px solid #666;">Sap Code</td>
                            <td style=" border: 1px solid #666;"><?php echo $this->Form->value('PalletChecklist.sap_code'); ?></td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid #666;">Sap Description</td>
                            <td style=" border: 1px solid #666;"><?php echo $this->Form->value('PalletChecklist.sap_desc'); ?></td>
                        </tr>
                    </table>
                    <br/>
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;">PRODUCT CUSTOMER WT</td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletChecklist.product_cust_wt'); ?></td>
                        </tr>
                    </table>
                    <br/>
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td width="30%" style=" border: 1px solid #666; text-align: center;">NO OF PALLETS</td>
                            <td style=" border: 1px solid #666; text-align: center;">EMPTY PALLET WT</td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletChecklist.no_of_pallet'); ?></td>
                            <td style=" border: 1px solid #666; text-align: center;">
                                <?php 
                                echo $this->Form->value('PalletChecklist.no_of_pallet') * $plt_wts[$this->Form->value('Container.vp_ctn')];
                                //echo $this->Form->value('PalletChecklist.empty_pallet_wt'); 
                                ?>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;">EMPTY CTN/VPN WEIGHT</td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletChecklist.empty_ctn_wt'); ?></td>
                        </tr>
                    </table>
                    <br/>
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;">NET WEIGHT OF PRODUCT</td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletChecklist.net_product_wt'); ?></td>
                        </tr>
                    </table>
                    <br/>
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;">NET WEIGHT/CTN</td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletChecklist.net_wt_per_ctn'); ?></td>
                        </tr>
                    </table>
                    <br/>
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;">GROSS WEIGHT/CTN</td>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletChecklist.gross_wt_per_ctn'); ?></td>
                        </tr>
                    </table>
                    <br/>
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td width="30%" style=" border: 1px solid #666;">DIFF%</td>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('PalletChecklist.diff_perc'); ?></td>
                        </tr>                        
                    </table>
                </td>                
            </tr>
        </table>
        <table>
            <tr>
                <td width="40%">
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td width="30%" style=" border: 1px solid #666;">CHECKED BY</td>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('Container.Checker.checker_name'); ?></td>
                        </tr>
                        <tr>
                            <td width="30%" style=" border: 1px solid #666;">CONTAINER NO</td>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('Container.container_no'); ?></td>
                        </tr>
                    </table>
                </td>
                <td width="20%">&nbsp;</td>
                <td valign="bottom">
                    <table style=" border-collapse: collapse;">
                        <tr>
                            <td width="30%" style=" border: 1px solid #666;">SEAL NO</td>
                            <td style=" border: 1px solid #666; text-align: center;"><?php echo $this->Form->value('Container.seal_no'); ?></td>
                        </tr>                        
                    </table>
                </td>
            </tr>
        </table>
    </center>
</div>
<?php 
?>


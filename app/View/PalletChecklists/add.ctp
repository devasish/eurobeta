<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-eye"></i>' . '&nbsp;&nbsp;' . __('View Container'), array('controller' => 'containers', 'action' => 'view', $container_id), array('escape' => FALSE)); ?> </li>
    </ol>
</div><!--/.row-->

<br/><br/>
<div class="row">
    <div class="col-xs-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <?php echo __('Add Pallet Checklist to Container # '); 
                     echo $this->Html->link($container_no, array('controller' => 'containers', 'action' => 'view', $container_id));
                    ?>
                </h3>
                <div class="box-tools">
                    <div class="input-group"> 
                        
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <?php echo $this->Form->create('PalletChecklist'); ?>
                <table class="table table-hover" id="loads-table">
                    <tr>
                        <th width="7%">Serial</th>
                        <th width="27%">QTY CTN</th>
                        <th width="27%">WEIGHT(KG) WITH PALLET</th>
                        <th width="27%">WEIGHT/CTN</th>
                        <th><a href="javascript:void(0)" id="add_new_load">Add New</a></th>
                    </tr>

                    <?php $x = 1; ?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.0.quantity', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input form-control', 'data-index' => '0')); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.0.wt_with_pallet', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input form-control', 'data-index' => '0')); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.0.wt_per_ctn', array('label' => FALSE, 'div' => FALSE, 'readonly' => true , 'data-index' => '0', 'class' => 'loads_wt_per_ctn form-control')); ?></td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                </table>
            </div><!-- /.box-body -->         
            <div class="box-footer clearfix">
                <table>
                    <tr>
                        <td width="8%"><b>Total</b></td>
                        <td width="27%" style="padding-right: 7px;"><?php echo $this->Form->input('no_of_ctn', array('label' => FALSE, 'div' => FALSE, 'readonly' => true, 'class'=>'form-control')); ?></td>
                        <td width="27%" style="padding-left: 7px;"><?php echo $this->Form->input('total_wt_with_pallet', array('label' => FALSE, 'div' => FALSE, 'readonly' => true, 'class'=>'form-control')); ?></td>
                        <td width="27%">&nbsp;</td>
                        <td>
                            &nbsp;
                        </td>
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
                                <?php echo $this->Form->input('container_id', array('type' => 'hidden', 'value' => $container_id, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('sap_id', array('type' => 'hidden', 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('sap_code', array('class'=>'form-control lg-input', 'autofocus' => true)); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('sap_desc', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>                            
                            <div class="form-group">
                                <?php echo $this->Form->input('product_cust_wt', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('no_of_pallet', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php 
                                $plt_wts = Configure::read('CONT_VP_CTN_PLT_WT');
                                echo $this->Form->input('single_empty_pallet_wt', array('type' => 'hidden', 'readonly' => true, 'class'=>'form-control', 'value' => $plt_wts[$container['Container']['vp_ctn']])); 
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('empty_pallet_wt', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('single_empty_ctn_wt', array('type' => 'hidden', 'readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('empty_ctn_wt', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('cbm', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('net_product_wt', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('net_wt_per_ctn', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('gross_wt_per_ctn', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('diff', array('type' => 'hidden', 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('diff_perc', array('readonly' => true, 'class'=>'form-control', 'label' => array('text' => 'Diff (%)', 'class' => 'control-label'))); ?>
                            </div>
                            
                        </div>
                    </div>
            </div>
    </div>
        <div class="col-md-6"> 
            <button type="submit" class="btn btn-primary">Save</button><br/><br/>
        </div>
</div>
<?php echo $this->Html->script('View/PalletChecklists/add'); ?>


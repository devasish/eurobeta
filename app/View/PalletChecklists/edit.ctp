<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Dashboard</li>
    </ol>
</div>

<br/><br/>

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
                        <th width="7%">Serial</th>
                            <th width="27%">QTY CTN</th>
                            <th width="27%">WEIGHT(KG) WITH PALLET</th>
                            <th width="27%">WEIGHT/CTN</th>
                            <th><a href="javascript:void(0)" id="add_new_load">Add New</a></th>
                    </tr>
                    <?php $x = 1;
                    $row_index = 0; ?>

<?php foreach ($this->Form->value('PalletLoad') as $k => $palletLoad) : ?>
                        <tr>
                            <td>
                                <?php echo $x++; ?>
    <?php echo $this->Form->input('PalletLoad.' . $row_index . '.id', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads_id_input form-control', 'data-index' => $row_index)); ?>
                            </td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.quantity', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input form-control', 'data-index' => $row_index)); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.wt_with_pallet', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input form-control', 'data-index' => $row_index)); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.' . $row_index . '.wt_per_ctn', array('label' => FALSE, 'div' => FALSE, 'readonly' => true, 'data-index' => $row_index, 'class' => 'loads_wt_per_ctn form-control')); ?></td>
                            <td>
                                <a href="javascript:void(0)" id="del_load_<?php echo $row_index; ?>" class="del_load">Delete</a>
                            </td>
                        </tr>
                        <?php $row_index++; ?>
                        <?php endforeach; ?>
                </table>
            </div>
            <div class="box-footer clearfix">
                <table>
                    <tr>
                        <td width="8%">&nbsp;</td>
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
                        <div class="col-md-6">                            
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
                                <?php echo $this->Form->input('sap_code', array('class'=>'form-control lg-input')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('sap_desc', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>                            
                            <div class="form-group">
                                <?php echo $this->Form->input('product_cust_wt', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php  echo $this->Form->input('no_of_pallet', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('empty_pallet_wt', array('readonly' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('single_empty_ctn_wt', array('type' => 'hidden', 'readonly' => true, 'class'=>'form-control', 'value' => $this->Form->value('Sap.empty_ctn_wt'))); ?>
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
                                <?php echo $this->Form->input('diff_perc', array('readonly' => true, 'class'=>'form-control', 'label' => 'Diff (%)')); ?>
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

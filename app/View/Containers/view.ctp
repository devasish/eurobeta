<?php 
$loaded_cbm = 0;
$container_cbm = 40;
$cont_gross_wt = 0;
$total_plt_wt = 0;
if (is_array($container['PalletChecklist']) && !empty($container['PalletChecklist'])) {
    foreach ($container['PalletChecklist'] as $key => $value) {
        $loaded_cbm += $value['loaded_cbm'];
        $cont_gross_wt += $value['loaded_wt'];
        $total_plt_wt += $value['empty_pallet_wt'];
    }
}
$empty_space = $container_cbm - $loaded_cbm;
$empty_space_perc = $empty_space / $container_cbm * 100;
?>
<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>' . '&nbsp;&nbsp;' . __('Edit Container'), array('action' => 'edit', $container['Container']['id']), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Container'), array('action' => 'delete', $container['Container']['id']), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $container['Container']['id'])); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('Containers List'), array('action' => 'index'), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Container'), array('action' => 'add'), array('escape' => FALSE)); ?> </li>
        <li><a href="javascript:void(0)" onclick="printData('container-view-print')"><i class="fa fa-print"></i>&nbsp;&nbsp;Print</a></li>
    </ol>
</div><!--/.row-->
<br/><br/>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php echo __('Container'); ?>
            </div>
            <div class="panel-body">
                <div class="row show-grid">
                    <div class="pull-left col-md-4">
                        <dl>
                            <dt><?php echo __('Id'); ?></dt>
                            <dd>
                                <?php echo h($container['Container']['id']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Container No'); ?></dt>
                            <dd>
                                <?php echo h($container['Container']['container_no']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Seal No'); ?></dt>
                            <dd>
                                <?php echo h($container['Container']['seal_no']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Empty Tare WT'); ?></dt>
                            <dd>
                                <?php echo h($container['Container']['empty_tare_wt']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Type'); ?></dt>
                            <dd>
                                <?php
                                foreach (Configure::read('CONT_TYPES') as $k => $v) {
                                    if ($k == $container['Container']['type']) {
                                        echo h($v);
                                    }
                                }
                                ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Container Type'); ?></dt>
                            <dd>
                                <?php
                                foreach (Configure::read('CONT_VP_CTN') as $k => $v) {
                                    if ($k == $container['Container']['vp_ctn']) {
                                        echo h($v);
                                    }
                                }
                                ?>
                            </dd>
                            <dt><?php echo __('Status'); ?></dt>
                            <dd>
                                <?php
                                foreach (Configure::read('CONT_STATUS') as $k => $v) {
                                    if ($k == $container['Container']['status']) {
                                        echo h($v);
                                    }
                                }
                                ?>

                                <!--
                                <span>
                                    <select id="status_select" data-contid="<?php echo $container['Container']['id']; ?>">
                                <?php foreach (Configure::read('CONT_STATUS') as $k => $v) : ?>
                                    <?php $selected = ($k == $container['Container']['status']) ? 'selected' : ''; ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $k ?>">
                                    <?php echo $v ?>
                                                            </option>
                                <?php endforeach; ?>
                                    </select>
                                </span>
                                <a href="javascript:void(0)" id="go_change_status">Save</a>
                                --->

                            </dd>
                            <dt><?php echo __('Destination'); ?></dt>
                            <dd>
                                <?php
                                $destn = Configure::read('CONT_DESTINATION');
                                echo!empty($destn[$container['Container']['destination']]) ? $destn[$container['Container']['destination']] : 'NOT SET';
                                ?>
                            </dd>

                            <dt><?php echo __('Created'); ?></dt>
                            <dd>
                                <?php echo h($container['Container']['created']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Modified'); ?></dt>
                            <dd>
                                <?php echo h($container['Container']['modified']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Customer'); ?></dt>
                            <dd>
                                <?php echo h($container['Customer']['name']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('User'); ?></dt>
                            <dd>
                                <?php echo $this->Html->link($container['User']['username'], array('controller' => 'users', 'action' => 'view', $container['User']['id'])); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Modified By'); ?></dt>
                            <dd>
                                <?php echo $this->Html->link($container['Editor']['username'], array('controller' => 'users', 'action' => 'view', $container['Editor']['id'])); ?>
                                &nbsp;
                            </dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl>
                            <dt><?php echo __('Container CBM'); ?></dt>
                            <dd>
                                <?php echo h($container_cbm); ?>&nbsp;
                            </dd>
                            <dt><?php echo __('Loaded CBM'); ?></dt>
                            <dd>
                                <?php echo h($loaded_cbm); ?>&nbsp;
                            </dd>
                            <dt><?php echo __('Empty Space'); ?></dt>
                            <dd>
                                <?php echo h($empty_space); ?>&nbsp;
                            </dd>
                            <dt><?php echo __('Empty Space (%)'); ?></dt>
                            <dd>
                                <?php echo h($empty_space_perc); ?>&nbsp;
                            </dd>
                            <dt><?php echo __('Container Gross WT'); ?></dt>
                            <dd>
                                <?php echo h($cont_gross_wt); ?>&nbsp;
                            </dd>
                            <dt><?php echo __('Gross Goods WT <br/><small>(without pallet)</small>'); ?></dt>
                            <dd>
                                <?php echo h($cont_gross_wt - $total_plt_wt); ?>&nbsp;
                            </dd>
                           <dt><?php echo __('Total Pallet WT'); ?></dt>
                            <dd>
                                <?php echo h($total_plt_wt); ?>&nbsp;
                            </dd>
                          <!--   <dt><?php echo __('Gross WT <br/><small>(with pallet)</small>'); ?></dt>
                            <dd>
                                <?php echo h($container['Container']['id']); ?>&nbsp;
                            </dd>-->
                        </dl>
                    </div>
                    <div class="pull-right col-md-4">
                        <?php echo $this->Form->create('Container', array('url' => array('controller' => 'containers', 'action' => 'update_container'))); ?>
                        <?php echo $this->Form->input('id', array('value' => $container['Container']['id'])); ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('loader_id', array('class' => 'form-control', 'empty' => true, 'selected' => $container['Container']['loader_id'], 'required' => true, 'label' => 'Loader 1')); ?>
                            <?php echo $this->Form->input('loader_id_2', array('class' => 'form-control', 'empty' => true, 'selected' => $container['Container']['loader_id_2'], 'required' => true, 'label' => 'Loader 2', 'options' => $loaders)); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('checker_id', array('class' => 'form-control', 'empty' => true, 'selected' => $container['Container']['checker_id'], 'required' => true, 'label' => 'Checker 1')); ?>
                            <?php echo $this->Form->input('checker_id_2', array('class' => 'form-control', 'empty' => true, 'selected' => $container['Container']['checker_id_2'], 'required' => true, 'label' => 'Checker 2', 'options' => $checkers)); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('status', array('options' => Configure::read('CONT_STATUS'), 'class' => 'form-control', 'selected' => $container['Container']['status'], 'required' => true)); ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $load_date = (strtotime($container['Container']['load_date']) > 0) ? date('d-m-Y', strtotime($container['Container']['load_date'])) : date('d-m-Y');
                            ?>
                            <?php echo $this->Form->input('load_date', array('type' => 'text', 'class' => 'form-control', 'required' => true, 'value' => $load_date, 'readonly' => true)); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('remarks', array('class' => 'form-control', 'type' => 'textarea', 'rows' => 1, 'value' => $container['Container']['remarks'])); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Pallet Checklist'); ?></h3>
                <div class="box-tools">
                    <div class="input-group"> 
                        <?php if ($container['Container']['status'] != 2): ?>
                            <span class="label label-success"><?php echo $this->Html->link('<i class="fa fa-cart-plus"></i>' . __('Add New'), array('controller' => 'pallet_checklists', 'action' => 'add', $container['Container']['id'], $container['Container']['container_no']), array('escape' => FALSE)) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Serial</th>
                        <th>Product Desc</th>
                        <th>SAP Code</th>
                        <th>No of CTN</th>
                        <th>Net Product WT</th>
                        <th><?php echo __('Action'); ?></th>
                    </tr>

                    <?php
                    $x = 1;
                    $total_ctn = 0;
                    $total_net_wt = 0;
                    ?>
                    <?php foreach ($container['PalletChecklist'] as $pallet) : ?>
                        <?php
                        $total_ctn += $pallet['no_of_ctn'];
                        $total_net_wt += $pallet['net_product_wt'];
                        ?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo h($pallet['sap_desc']) ?></td>
                            <td><?php echo h($pallet['sap_code']) ?></td>
                            <td><?php echo h($pallet['no_of_ctn']) ?></td>
                            <td><?php echo h($pallet['net_product_wt']) ?></td>

                            <td>
                                <?php if ($container['Container']['status'] != 2): ?>
                                    <span class="label label-warning"><?php echo $this->Html->link(__('Edit'), array('controller' => 'pallet_checklists', 'action' => 'edit', $pallet['id'])) ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td><?php echo h($total_ctn) ?></td>
                        <td><?php echo h($total_net_wt) ?></td>
                        <td></td>
                    </tr>
                </table>                    
            </div><!-- /.box-body -->                                     
        </div><!-- /.box -->
        <br/><br/>
    </div>
</div>

<!-- print section start-->
<div id="container-view-print" class="print-hidden">
    <center>
        <table>
            <tr>
                <td width="10%"><?php echo $this->Html->image('sme.jpg', array('width' => '100')); ?></td>
                <td style="text-align: center;">
                    <table>
                        <tr>
                            <td style="text-align: center; border: 1px solid #000;"><font size="4">EURO SME SDN BHD</font></td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td width="60%">
                                            <table style="border: 1px solid #666; border-collapse: collapse;">
                                                <tr>
                                                    <td style="border: 1px solid #666">DATE</td>
                                                    <td style="border: 1px solid #666">
                                                        <?php echo date('d-m-Y', strtotime($container['Container']['load_date'])); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid #666">CONTAINER</td>
                                                    <td style="border: 1px solid #666"><?php echo h($container['Container']['container_no']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid #666">SEAL NO</td>
                                                    <td style="border: 1px solid #666"><?php echo h($container['Container']['seal_no']); ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table style="border: 1px solid #666; border-collapse: collapse;">
                                                <tr>
                                                    <td style="border: 1px solid #666; height: 35px;">EMPTY TARE WT</td>
                                                    <td style="border: 1px solid #666; height: 35px;"><?php echo h($container['Container']['empty_tare_wt']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid #666;">TYPE</td>
                                                    <td style="border: 1px solid #666; background: #DDD;">
                                                        <?php
                                                        $types = Configure::read('CONT_TYPES');
                                                        echo $types[$container['Container']['type']];
                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>                                        
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table> 
                </td>
                <td width="10%">&nbsp;</td>
            </tr>
        </table>
        <h1>
            Loading Advice
        </h1>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid #666;">SL NO</th>
                <th style="border: 1px solid #666;">PRODUCT DESC</th>
                <th style="border: 1px solid #666;">SAP CODE</th>
                <th style="border: 1px solid #666;">NO OF CTN</th>
                <th style="border: 1px solid #666;">CBM</th>
                <th style="border: 1px solid #666; width:40%;">REMARKS</th>
            </tr>            
            <?php
            $x = 1;
            $total_ctn = 0;
            $total_net_wt = 0;
            ?>
            <?php foreach ($container['PalletChecklist'] as $pallet) : ?>
                <?php
                $total_ctn += $pallet['no_of_ctn'];
                $total_net_wt += $pallet['net_product_wt'];
                ?>
                <tr>
                    <td style="border: 1px solid #666; padding-left: 10px;"><?php echo $x++; ?></td>
                    <td style="border: 1px solid #666; padding-left: 10px;"><?php echo h($pallet['sap_desc']) ?></td>
                    <td style="border: 1px solid #666; padding-left: 10px;"><?php echo h($pallet['sap_code']) ?></td>
                    <td style="border: 1px solid #666; padding-left: 10px;"><?php echo h($pallet['no_of_ctn']) ?></td>
                    <td style="border: 1px solid #666; padding-left: 10px;"><?php echo h($container['Container']['id']); ?></td>
                    <td style="border: 1px solid #666; padding-left: 10px;height: 50px;"><?php echo h($container['Container']['remarks']) ?><td/>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td style="border: 1px solid #666; text-align: center; background: #DDD;">&nbsp;</td>
                <td style="border: 1px solid #666; text-align: center; background: #DDD;"><b>TOTAL</b></td>
                <td style="border: 1px solid #666; text-align: center; background: #DDD;">&nbsp;</td>
                <td style="border: 1px solid #666; text-align: center; background: #DDD;"><b><?php echo h($total_ctn) ?></b></td>
                <td style="border: 1px solid #666; text-align: center; background: #DDD;">&nbsp;</td>
                <td style="border: 1px solid #666; text-align: center; background: #DDD;">&nbsp;</td>
            </tr>
        </table>
        <br>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td width="40%" valign="top">
                    <table style="border-collapse: collapse;">
                        <tr>
                            <td width="10%" style="border: 1px solid #666;"><b>LOADED BY</b></td>
                            <td width="40%" style="border: 1px solid #666; text-align: center;"><?php echo h($container['Loader']['loader_name']); ?></td>
                            <td width="10%" style="border: 1px solid #666; text-align: center;"><b>SHIPPING</b></td>
                            <td width="20%" style="border: 1px solid #666;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666; height: 15px;" colspan="4"></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>CHECKED BY</b></td>
                            <td style="border: 1px solid #666; text-align: center;"><?php echo h($container['Checker']['checker_name']); ?></td>
                            <td style="border: 1px solid #666; text-align: center;"><b>HOD</b></td>
                            <td style="border: 1px solid #666;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666; height: 35px; border-left: 0px; border-right: 0px;" colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border: 1px solid #666;"><b>CONTAINER CBM</b></td>
                            <td colspan="2" style="border: 1px solid #666; text-align: center;"><?php echo $container_cbm; ?></td>                            
                        </tr>
                        <tr>
                            <td colspan="2" style="border: 1px solid #666;"><b>LOADED CBM</b></td>
                            <td colspan="2" style="border: 1px solid #666; text-align: center;"><?php echo $loaded_cbm; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border: 1px solid #666;"><b>EMPTY SPACE</b></td>
                            <td colspan="2" style="border: 1px solid #666; text-align: center;"><?php echo $empty_space; ?></td>                            
                        </tr>
                        <tr>
                            <td colspan="2" style="border: 1px solid #666;"><b>EMPTY SPACE (%)</b></td>
                            <td colspan="2" style="border: 1px solid #666; text-align: center;"><?php echo $empty_space_perc; ?></td>                            
                        </tr>
                    </table>
                </td>
                <td valign="top">
                    <table style="border-collapse: collapse;">
                        <tr>
                            <td width="40%" style="border: 1px solid #666; height: 30px;"><b>CONTAINER GROSS WT</b></td>
                            <td style="border: 1px solid #666; height: 30px;">23.8900</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666; height: 30px;"><b>GROSS GOODS WT <br>(with out pallet)</b></td>
                            <td style="border: 1px solid #666; height: 30px;">21.4567</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666; height: 30px;"><b>T. PALLET WT</b></td>
                            <td style="border: 1px solid #666; height: 30px;">10.567</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666; height: 30px;"><b>GROSS WT <br>(with pallet)</b></td>
                            <td style="border: 1px solid #666; height: 30px;">24.8979</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table style="border-collapse: collapse;">
                        <tr>
                            <td style="border: 1px solid #666; text-align: center;" colspan="2"><b>CONTAINER CHECKLIST</b></td>
                        </tr>
                        <tr>
                            <td width="70%" style="border: 1px solid #666;"><b>FRONT WALL</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>FLOOR</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>CELLING/ROOF</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>RIGHT/LEFT SIDE</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>IN/OUT SIDE CARRIAGE</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>IN/OUT SIDE DOOR</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>NO HOLES</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>NO DAMP</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>NO WETNESS</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>NO O DOOR</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666;"><b>CLEANLINESS</b></td>
                            <td style="border: 1px solid #666;">OK</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </center>
</div>

<script>
            $(function() {
                $('#go_change_status').click(function() {
                    var st = $('#status_select').val();
                    var id = $('#status_select').data('contid');
                    var data = {status: st, id: id};
                    $.ajax({
                        url: SITE_URL + 'containers/change_status',
                        data: data,
                        success: function(r) {
                            var json = $.parseJSON(r);
                            if (json.success) {
                                alert('Status Changed Successfully');
                                window.location.reload();
                            } else {
                                alert('Error!! Status Not Changed');
                            }
                        }
                    })
                });

                $('#ContainerLoadDate').datepicker({format: 'dd-mm-yyyy'})
            });

</script>
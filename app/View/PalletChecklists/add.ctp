<style type="text/css">
    /*    .left-panel{
            float: left;
            width: 70%;
        }
    
        .right-panel{
            float: right;
            width: 25%;
        }
        .clear{
            clear: both;
        }*/

</style>
<div class="palletChecklists form">
    <?php echo $this->Form->create('PalletChecklist'); ?>

    <table width="100%">
        <tr>
            <td width="70%">
                <div class="left-panel">
                    <table id="loads-table">
                        <tr>
                            <th>Serial</th>
                            <th>QTY CTN</th>
                            <th>WEIGHT(KG) WITH PALLET</th>
                            <th>WEIGHT/CTN</th>
                            <th><a href="javascript:void(0)" id="add_new_load">Add New</a></th>
                        </tr>
                        <?php $x = 1; ?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.0.quantity', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input', 'data-index' => '0')); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.0.wt_with_pallet', array('label' => FALSE, 'div' => FALSE, 'class' => 'loads-input', 'data-index' => '0')); ?></td>
                            <td><?php echo $this->Form->input('PalletLoad.0.wt_per_ctn', array('label' => FALSE, 'div' => FALSE, 'readonly' => true , 'data-index' => '0', 'class' => 'loads_wt_per_ctn')); ?></td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td>
                <div class="right-panel">
                    <fieldset>
                        <legend><?php echo __('Add Pallet Checklist to Container # ' . $container_no); ?></legend>
                        <?php
                        echo $this->Form->input('container_id', array('type' => 'text', 'value' => $container_id));
                        echo $this->Form->input('sap_id', array('type' => 'hidden'));
                        echo $this->Form->input('sap_code');
                        echo $this->Form->input('sap_desc');
                        echo $this->Form->input('product_cust_wt');
                        echo $this->Form->input('no_of_pallet');
                        echo $this->Form->input('empty_pallet_wt');
                        echo $this->Form->input('empty_ctn_wt');
                        echo $this->Form->input('cbm');
                        echo $this->Form->input('net_product_wt');
                        echo $this->Form->input('net_wt_per_ctn');
                        echo $this->Form->input('gross_wt_per_ctn');
                        echo $this->Form->input('diff');
                        echo $this->Form->input('status');
                        echo $this->Form->input('user_id');
                        ?>
                    </fieldset>
                </div>
            </td>
        </tr>
    </table>


    <?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Pallet Checklists'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Containers'), array('controller' => 'containers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Container'), array('controller' => 'containers', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Saps'), array('controller' => 'saps', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Sap'), array('controller' => 'saps', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Pallet Loads'), array('controller' => 'pallet_loads', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Pallet Load'), array('controller' => 'pallet_loads', 'action' => 'add')); ?> </li>
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        
        $('.palletChecklists').on('blur', '.loads-input', function() {
            var this_ = $(this);
            var row_index = $(this).data('index');
            console.log(row_index);
            var empty_pallet_wt = 20;
            
            var qty_ctn = $('#PalletLoad' + row_index + 'Quantity').val();
            var wt_wth_pallet = $('#PalletLoad' + row_index + 'WtWithPallet').val();
            
            if (qty_ctn > 0 && wt_wth_pallet > 0) {
                var wt_per_ctn = (wt_wth_pallet - empty_pallet_wt) / qty_ctn;
                $('#PalletLoad' + row_index + 'WtPerCtn').val(wt_per_ctn);
                
            } else {
                $('#PalletLoad' + row_index + 'WtPerCtn').val(0);
            }
            
            count_loads();
        });
        
        
        $('#PalletChecklistSapCode').autocomplete({source: SITE_URL + 'transfers/prediction', select: function (event, ui) {
                console.log(ui);
                $('#PalletChecklistSapDesc').val(ui.item.data.description);
                $('#PalletChecklistSapId').val(ui.item.data.id);
                $('#PalletChecklistProductCustWt').val(ui.item.data.net_wt);
                $('#PalletChecklistCbm').val(ui.item.data.cbm);
                $('#PalletChecklistEmptyCtnWt').val(ui.item.data.empty_ctn_wt);
            }
        });
        
        $('#add_new_load').on('click', function () {
            var row_index = $('#loads-table tbody').find('tr').length - 1;
            var qty = $('<input>')
                    .attr('id', 'PalletLoad' + row_index + 'Quantity')
                    .attr('name', 'data[PalletLoad][' + row_index + '][quantity]')
                    .attr('type', 'number')
                    .attr('data-index', row_index)
                    .addClass('loads-input')
                    .attr('required', true);
            var wtWithPallet = $('<input>')
                    .attr('id', 'PalletLoad' + row_index + 'WtWithPallet')
                    .attr('name', 'data[PalletLoad][' + row_index + '][wt_with_pallet]')
                    .attr('type', 'number')
                    .attr('data-index', row_index)
                    .addClass('loads-input')
                    .attr('required', true);
            var wtPerCtn = $('<input>')
                    .attr('id', 'PalletLoad' + row_index + 'WtPerCtn')
                    .attr('name', 'data[PalletLoad][' + row_index + '][wt_per_ctn]')
                    .attr('data-index', row_index)
                    .attr('type', 'number')
                    .addClass('loads_wt_per_ctn')
                    .attr('required', true);
            $('<tr>')
                    .append(
                            $('<td>').text(row_index + 1)
                            )
                    .append($('<td>').append(qty))
                    .append($('<td>').append(wtWithPallet))
                    .append($('<td>').append(wtPerCtn))
                    .append(
                            $('<td>')
                            .append(
                                    $('<a>')
                                    .attr('href', 'javascript:void(0)')
                                    .attr('id', 'del_load_' + row_index)
                                    .addClass('del_load')
                                    .html('Delete')
                                    )
                            ).appendTo($('#loads-table tbody'))

        });
        
        $('body').on('click', '.del_load', function () {
            $(this).parents('tr:first').fadeOut(500, function () {
                $(this).remove();
                re_arrange();
                count_loads();
            })
        });
        
        function re_arrange() {
            $('#loads-table tbody tr').each(function (index) {
                if (index > 0) {
                    var row_index = index - 1;
                    $(this).find('td:nth-child(1)').html(index);
                    $(this).find('td:nth-child(2)').find('input')
                            .attr('id', 'PalletLoad' + row_index + 'Quantity')
                            .attr('name', 'data[PalletLoad][' + row_index + '][quantity]')

                    $(this).find('td:nth-child(3)').find('input')
                            .attr('id', 'PalletLoad' + row_index + 'WtWithPallet')
                            .attr('name', 'data[PalletLoad][' + row_index + '][wt_with_pallet]')

                    $(this).find('td:nth-child(4)').find('input')
                            .attr('id', 'PalletLoad' + row_index + 'WtPerCtn')
                            .attr('name', 'data[PalletLoad][' + row_index + '][wt_per_ctn]')
                }

            });
        }
        
        function count_loads() {
            var ct = 0;
            $('.loads_wt_per_ctn').each(function() {
                if ($(this).val() > 0) {
                    ct ++;
                }
            });
            $('#PalletChecklistNoOfPallet').val(ct);
            return ct;
        }
        
    })
</script>
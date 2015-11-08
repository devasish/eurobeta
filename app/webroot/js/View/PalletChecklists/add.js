$(document).ready(function () {
        
        $('body').on('blur', '.loads-input', function() {
            var this_ = $(this);
            var row_index = $(this).data('index');
            var empty_pallet_wt = $('#PalletChecklistSingleEmptyPalletWt').val();
            
            var qty_ctn = $('#PalletLoad' + row_index + 'Quantity').val();
            var wt_wth_pallet = $('#PalletLoad' + row_index + 'WtWithPallet').val();
            
            if (qty_ctn > 0 && wt_wth_pallet > 0) {
                var wt_per_ctn = Custom.round((wt_wth_pallet - empty_pallet_wt) / qty_ctn, 2);
                $('#PalletLoad' + row_index + 'WtPerCtn').val(wt_per_ctn);
                
            } else {
                $('#PalletLoad' + row_index + 'WtPerCtn').val(0);
            }
            
            go_check();
            
        });
        
        
        $('#PalletChecklistSapCode').autocomplete({source: SITE_URL + 'transfers/prediction', select: function (event, ui) {
                $('#PalletChecklistSapDesc').val(ui.item.data.description);
                $('#PalletChecklistSapId').val(ui.item.data.id);
                $('#PalletChecklistProductCustWt').val(ui.item.data.net_wt);
                $('#PalletChecklistCbm').val(ui.item.data.cbm);
//                $('#PalletChecklistEmptyCtnWt').val(ui.item.data.empty_ctn_wt);
                $('#PalletChecklistSingleEmptyCtnWt').val(ui.item.data.empty_ctn_wt);
                
                $('.loads-input:first').trigger('blur');
            }
        });
        
        $('#add_new_load').on('click', function () {
            var row_index = $('#loads-table tbody').find('tr').length - 1;
            var loaded_serial_no = $('<input>')
                    .attr('id', 'PalletLoad' + row_index + 'LoadedSerialNo')
                    .attr('name', 'data[PalletLoad][' + row_index + '][loaded_serial_no]')                    
                    .attr('data-index', row_index)
                    .addClass('loads-input')
                    .addClass('form-control')
                    .attr('required', true);
            var qty = $('<input>')
                    .attr('id', 'PalletLoad' + row_index + 'Quantity')
                    .attr('name', 'data[PalletLoad][' + row_index + '][quantity]')
                    .attr('type', 'number')
                    .attr('data-index', row_index)
                    .addClass('loads-input')
                    .addClass('form-control')
                    .attr('required', true);
            var wtWithPallet = $('<input>')
                    .attr('id', 'PalletLoad' + row_index + 'WtWithPallet')
                    .attr('name', 'data[PalletLoad][' + row_index + '][wt_with_pallet]')
                    .attr('type', 'number')
                    .attr('data-index', row_index)
                    .addClass('loads-input')
                    .addClass('form-control')
                    .attr('required', true);
            var wtPerCtn = $('<input>')
                    .attr('id', 'PalletLoad' + row_index + 'WtPerCtn')
                    .attr('name', 'data[PalletLoad][' + row_index + '][wt_per_ctn]')
                    .attr('data-index', row_index)
                    .attr('type', 'number')
                    .addClass('loads_wt_per_ctn dddd')
                    .addClass('form-control')
                    .attr('required', true)
                    .prop('readonly', 'readonly');
            $('<tr>')
                    .append(
                            $('<td>').text(row_index + 1)
                            )
                    .append($('<td>').append(loaded_serial_no))
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
            if (!confirm('Do you really want to delete?')) {
                return;
            } 
            $(this).parents('tr:first').fadeOut(500, function () {
                var id = $(this).find('input.loads_id_input').val();
                if (id > 0) {
                    $.ajax({
                        url : SITE_URL + 'pallet_loads/delete/' + id,
                        type: 'post',
                        success: function (response) {
                            
                        },
                        error : function (jqXhr, textSt, error) {
                            console.error(error);
                        }
                    });
                }
                $(this).remove();
                re_arrange();
                go_check()
            })
        });
        
        $('.loads-input:first').trigger('blur');
        
        function re_arrange() {
            //<input type="hidden" id="PalletLoad1Id" value="209" data-index="1" class="loads_id_input form-control" name="data[PalletLoad][1][id]">
            $('#loads-table tbody tr').each(function (index) {
                if (index > 0) {
                    var row_index = index - 1;
                    var id_field = $(this).find('td:nth-child(1)').find('input');
                    $(this).find('td:nth-child(1)').html(index).append(id_field);
                    $(this).find('td:nth-child(2)').find('input')
                            .attr('id', 'PalletLoad' + row_index + 'LoadedSerialNo')
                            .attr('name', 'data[PalletLoad][' + row_index + '][loaded_serial_no]')
                    
                    $(this).find('td:nth-child(3)').find('input')
                            .attr('id', 'PalletLoad' + row_index + 'Quantity')
                            .attr('name', 'data[PalletLoad][' + row_index + '][quantity]')

                    $(this).find('td:nth-child(4)').find('input')
                            .attr('id', 'PalletLoad' + row_index + 'WtWithPallet')
                            .attr('name', 'data[PalletLoad][' + row_index + '][wt_with_pallet]')

                    $(this).find('td:nth-child(5)').find('input')
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
                    $(this).parents('tr:first').addClass('valid-data')
                } else {
                    $(this).parents('tr:first').removeClass('valid-data')
                }
            });
            
            return ct;
        }
        
        function do_sum() {
            var qty_ctn = 0;
            var wt_wth_pallet = 0;
            $('#loads-table tbody tr.valid-data').each(function (index) {
                var that = $(this);
                qty_ctn += parseInt(that.find('td:nth-child(3) input').val(), 10);
                wt_wth_pallet += parseInt(that.find('td:nth-child(4) input').val(), 10);
                
               // console.info(that.find('input:nth-child(0)').length);
                
//                that.find('input:nth-child(1)').each(function() {
//                    console.info($(this));
//                    qty_ctn += parseInt($(this).val(), 10);
//                });
                
//                that.find('input:nth-child(2)').each(function() {
//                    console.log($(this).val());
//                    wt_wth_pallet += parseInt($(this).val(), 10);
//                });
            });
            
            $('#PalletChecklistNoOfCtn').val(qty_ctn);
            $('#PalletChecklistTotalWtWithPallet').val(wt_wth_pallet);
            
        }
        
        function set_data(params) {
            var load_count = typeof(params) !== 'undefinde' ? params.load_count : 0;
            var single_empty_pallet_wt = $('#PalletChecklistSingleEmptyPalletWt').val();
            var empty_pallet_wt = load_count * single_empty_pallet_wt;
            
            var cutomer_prod_wt = $('#PalletChecklistProductCustWt').val();
            var empty_ctn_wt = $('#PalletChecklistSingleEmptyCtnWt').val();
            var total_ctn = $('#PalletChecklistNoOfCtn').val();
            var total_wt_with_pallet = $('#PalletChecklistTotalWtWithPallet').val();
            var total_empty_ctn_wt = empty_ctn_wt * total_ctn;
            var net_product_wt = total_wt_with_pallet - (total_empty_ctn_wt + empty_pallet_wt)
            var net_wt_per_ctn = Custom.round(net_product_wt / total_ctn, 2);
            var gross_wt_per_ctn = Custom.round((total_wt_with_pallet - empty_pallet_wt)/total_ctn, 2);
            var diff = Custom.round((net_wt_per_ctn - cutomer_prod_wt), 2);
            var diff_perc = Custom.round(((net_wt_per_ctn - cutomer_prod_wt) / cutomer_prod_wt) * 100, 2);
            
            $('#PalletChecklistNoOfPallet').val(load_count);
            $('#PalletChecklistEmptyPalletWt').val(empty_pallet_wt);
            $('#PalletChecklistEmptyCtnWt').val(total_empty_ctn_wt);
            $('#PalletChecklistNetProductWt').val(net_product_wt);
            $('#PalletChecklistNetWtPerCtn').val(net_wt_per_ctn);
            $('#PalletChecklistGrossWtPerCtn').val(gross_wt_per_ctn);
            $('#PalletChecklistDiff').val(diff);
            $('#PalletChecklistDiffPerc').val(diff_perc);
            
            highlightDiff(diff_perc);
        }
        
        function go_check() {
            var ct = count_loads();
            do_sum();
            set_data({'load_count' : ct});
        }
        
        function highlightDiff(diff_perc) {
            if (Math.abs(diff_perc) >= 15) {
                $('#PalletChecklistDiffPerc').parents('.form-group:first').addClass('has-error')
            } else {
                $('#PalletChecklistDiffPerc').parents('.form-group:first').removeClass('has-error')
            }
        }
    });
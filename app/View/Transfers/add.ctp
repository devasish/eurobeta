<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('List Transfers'), array('action' => 'index'), array('escape' => FALSE)); ?></li>
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo __('Make Transfer'); ?>                         
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <?php echo $this->Form->create('Transfer'); ?>
                            <div class="form-group">
                                <?php echo $this->Form->input('sap_code', array('label' => 'SAP Code', 'class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('sap_id', array('type' => 'hidden', 'class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('description', array('readonly' => true, 'class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('ctn_per_pallet', array('readonly' => true,'required' => false, 'label' =>'<b>Ctn Per Pallet<font color=red>*</font></b> <a id="editCtnPerPallet" href="javascript:void(0)" style="font-size:18px; color: #111111" title="Edit Ctn Per Pallet" ><i class="fa fa-edit"></i></a>', 'class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('net_wt', array('readonly' => true, 'class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <label>Transfer Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php echo $this->Form->input('transfer_date', array('class'=>'form-control pull-right', 'id'=>'transferDate', 'type'=>'text', 'label'=>FALSE)); ?>  
                                </div><!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('shift', array('options' => Configure::read('SHIFT'), 'label' => 'Shift', 'class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('remarks', array('type' => 'textarea','escape' => true, 'rows' => 2, 'class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('status', array('type' => 'hidden', 'class' => 'form-control')); ?>
                            </div>                            
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#transferDate').datepicker({format:'dd-mm-yyyy',}).datepicker('setDate', new Date()).datepicker('update');
        
        
        $('#TransferSapCode').autocomplete({
            source : 'prediction',
            select : function (event, ui) {
                $('#TransferDescription').val(ui.item.data.description);
                $('#TransferSapId').val(ui.item.data.id);
                $('#TransferCtnPerPallet').val(ui.item.data.ctn_per_pallet);
                $('#TransferNetWt').val(ui.item.data.net_wt);
                $('#TransferRemarks').val(ui.item.data.remarks);
                $('#TransferSerialNo').val(ui.item.data.serial_no);
                $('#TransferStatus').val(ui.item.data.status);
            }
        });
    })
    $('#editCtnPerPallet').on('click', function(){
        $('#TransferCtnPerPallet').removeAttr('readonly');
        $('#TransferRemarks').attr('required', true).parents('div:first').addClass('required');
    })
</script>
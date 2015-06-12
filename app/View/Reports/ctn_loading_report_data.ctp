<?php if (!empty($arr)): ?>
<tr>
    <td>CTN Loading Report for</td>
    <td class="text-center" colspan="">
        <?php echo h($arr[0]['Sap']['description']) ?> 
    </td>
    <td>
        <?php echo h($arr[0]['Sap']['sapcode']) ?>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<?php endif;?>


<tr class="tr-head">
    <td>Date</td>
    <td>Container No</td>
    <td>T. CTN</td>
    <td>L. Weight</td>
    <td>N. Weight</td>
    <td>Diff Kg</td>
    <td>Diff %</td>
</tr>
<?php foreach ($arr as $palletChecklist): ?>
    <tr>
        <td><?php echo h($palletChecklist['Container']['load_date']); ?></td>
        <td><?php echo h($palletChecklist['Container']['container_no']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['no_of_ctn']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['loaded_wt']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['net_product_wt']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['diff']); ?></td>
        <?php
        $cls = 'text-success';
        if (abs($palletChecklist['PalletChecklist']['diff_perc']) >= 10) {
            $cls = 'text-danger';
        }
        ?>
        <td class="<?php echo $cls; ?>"><?php echo h($palletChecklist['PalletChecklist']['diff_perc']); ?></td>
        
    </tr>
<?php endforeach; ?>

<?php if (empty($arr)): ?>
    <tr>
        <td colspan="7"> No Record Found</td>
    </tr>
<?php endif; ?>

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
        <td><?php echo h($palletChecklist['PalletChecklist']['created']); ?></td>
        <td><?php echo h($palletChecklist['Container']['container_no']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['no_of_ctn']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['net_product_wt']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['net_product_wt']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['diff']); ?></td>
        <td><?php echo h($palletChecklist['PalletChecklist']['diff_perc']); ?></td>
    </tr>
<?php endforeach; ?>

<?php if (empty($arr)): ?>
    <tr>
        <td colspan="7"> No Record Found</td>
    </tr>
<?php endif; ?>



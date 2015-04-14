<table class="table table-hover">
    <tr>
        <th>Date</th>
        <th>Container No</th>
        <th>T. CTN</th>
        <th>L. Weight</th>
        <th>N. Weight</th>
        <th>Diff Kg</th>
        <th>Diff %</th>
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

</table>


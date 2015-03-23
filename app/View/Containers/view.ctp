<div class="containers view">
    <h2><?php echo __('Container'); ?></h2>
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
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($container['User']['id'], array('controller' => 'users', 'action' => 'view', $container['User']['id'])); ?>
            &nbsp;
        </dd>
    </dl>

    <h3><?php echo __('Related Pallet Checklist'); ?></h3>

    <?php //pr($container); ?>

    <table>
        <tr>
            <th>Serial</th>
            <th>Product Desc</th>
            <th>SAP Code</th>
            <th>No of CTN</th>
            <th>Remarks</th>
            <th><?php echo $this->Html->link('Add New', array('controller' => 'pallet_checklists', 'action' => 'add', $container['Container']['id'], $container['Container']['container_no']))?></th>
        </tr>
        <?php $x = 1;?>
        <?php foreach ($container['PalletChecklist'] as $pallet) : ?>
        <tr>
            <td><?php $x++; ?></td>
            <td><?php echo h($pallet['sap_desc'])?></td>
            <td><?php echo h($pallet['sap_code'])?></td>
            <td>no of ctn</td>
            <td>remarks</td>
            <td>
                <a href="javascript:void(0)">Edit</a>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
</div>


<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Container'), array('action' => 'edit', $container['Container']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Container'), array('action' => 'delete', $container['Container']['id']), array(), __('Are you sure you want to delete # %s?', $container['Container']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Containers'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Container'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>' . '&nbsp;&nbsp;' . __('Edit Sap'), array('action' => 'edit', $sap['Sap']['id']), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Sap'), array('action' => 'delete', $sap['Sap']['id']), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $sap['Sap']['id'])); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Saps'), array('action' => 'index'), array('escape' => FALSE)); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Sap'), array('action' => 'add'), array('escape' => FALSE)); ?></li>
    </ol>
</div><!--/.row-->
<br/><br/>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
               <?php echo h($sap['Sap']['sapcode']); ?>
            </div>
            <div class="panel-body">
                <dl>
                    <dt><?php echo __('Id'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['id']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Sapcode'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['sapcode']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Description'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['description']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Net Wt'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['net_wt']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Gross Wt'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['gross_wt']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Empty Ctn Wt'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['empty_ctn_wt']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Cbm'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['cbm']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Ctn Per Pallet'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['ctn_per_pallet']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Created'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['created']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Modified'); ?></dt>
                    <dd>
                        <?php echo h($sap['Sap']['modified']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Status'); ?></dt>
                    <dd>
                        <?php
                        foreach (Configure::read('STATUS') as $k => $v) {
                            if ($k == $sap['Sap']['status']) {
                                echo h($v);
                            }
                        }
                        ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Created By'); ?></dt>
                    <dd>
                        <?php echo $this->Html->link($sap['User']['username'], array('controller' => 'users', 'action' => 'view', $sap['Sap']['user_id'])); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Last Edited By'); ?></dt>
                    <dd>
                        <?php echo $this->Html->link($sap['Editor']['username'], array('controller' => 'users', 'action' => 'view', $sap['Sap']['last_edited_by'])); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Customer'); ?></dt>
                    <dd>
                        <?php echo h($sap['Customer']['name']); ?>
                        &nbsp;
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
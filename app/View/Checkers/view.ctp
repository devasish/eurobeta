<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>' . '&nbsp;&nbsp;' . __('Edit Checker'), array('action' => 'edit', $checker['Checker']['id']), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Checker'), array('action' => 'delete', $checker['Checker']['id']), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $checker['Checker']['id'])); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Checkers'), array('action' => 'index'), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Checker'), array('action' => 'add'), array('escape' => FALSE)); ?> </li>
    </ol>
</div><!--/.row-->
<br/><br/>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php echo h($checker['Checker']['checker_name']); ?>
            </div>
            <div class="panel-body">
                <dl>
                    <dt><?php echo __('Id'); ?></dt>
                    <dd>
                        <?php echo h($checker['Checker']['id']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Checker Name'); ?></dt>
                    <dd>
                        <?php echo h($checker['Checker']['checker_name']); ?>
                        &nbsp;
                    </dd> 
                </dl>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>' . '&nbsp;&nbsp;' . __('Edit Loader'), array('action' => 'edit', $loader['Loader']['id']), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Loader'), array('action' => 'delete', $loader['Loader']['id']), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $loader['Loader']['id'])); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Loaders'), array('action' => 'index'), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Loader'), array('action' => 'add'), array('escape' => FALSE)); ?> </li>        
    </ol>
</div><!--/.row-->
<br/><br/>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
               <?php echo h($loader['Loader']['loader_name']); ?>
            </div>
            <div class="panel-body">
                <dl>
                    <dt><?php echo __('Id'); ?></dt>
                    <dd>
                        <?php echo h($loader['Loader']['id']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Loader Name'); ?></dt>
                    <dd>
                        <?php echo h($loader['Loader']['loader_name']); ?>
                        &nbsp;
                    </dd>                    
                </dl>
            </div>
        </div>
    </div>
</div>
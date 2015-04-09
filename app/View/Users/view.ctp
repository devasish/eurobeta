<?php
    if ($user['User']['role'] == 1) {
        $role = 'Admininstrator';
    } elseif ($user['User']['role'] == 2) {
        $role = 'QA';
    } else {
        $role = 'Not Defined';
    }

    if ($user['User']['status'] == 1) {
        $status = 'Active';
    } elseif ($user['User']['status'] == 0) {
        $status = 'Inactive';
    } else {
        $status = 'Not Defined';
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Dashboard</li>
    </ol>
</div><!--/.row-->
<br/><br/>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
               <?php echo ucfirst(h($user['User']['username'])); ?>
            </div>
            <div class="panel-body">
                <dl>
                    <dt><?php echo __('Id'); ?></dt>
                    <dd>
                        <?php echo h($user['User']['id']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Username'); ?></dt>
                    <dd>
                        <?php echo h($user['User']['username']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Role'); ?></dt>
                    <dd>
                        <?php echo $role; ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Created'); ?></dt>
                    <dd>
                        <?php echo h($user['User']['created']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Modified'); ?></dt>
                    <dd>
                        <?php echo h($user['User']['modified']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Status'); ?></dt>
                    <dd>
                        <?php echo $status; ?>
                        &nbsp;
                    </dd>
                </dl>
            </div>            
        </div>
    </div>
</div>

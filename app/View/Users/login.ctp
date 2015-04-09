<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
<div class="login-panel panel panel-default">
    <div class="panel-heading">Log in</div>
    <div class="panel-body">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <div class="form-group">
                <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Enter Your Username')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Enter Your Password')); ?>
            </div>
            <div class="checkbox">
                <label>
                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </fieldset>
    </div>
</div>
</div>
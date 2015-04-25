
    <div class="login-panel-body">
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <div class="trnsp-input1">
                <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Enter Your Username', 'label'=>FALSE)); ?>
            </div>
            <div class="trnsp-input2">
                <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Enter Your Password', 'label'=>FALSE)); ?>
            </div>
            <div class="login-checkbox">
                <label>
                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                </label>
                <button type="submit" class="btn btn-primary pull-right">Login</button>
            </div>
            
        </fieldset>
        <div class="forgot">
            <a href="#">I forgot my password</a>
        </div>
        <div class="register">
            <a href="#">I don't have an account</a>
        </div>
        <div class="help">
            <a href="#">I need some help</a>
        </div>
    </div>
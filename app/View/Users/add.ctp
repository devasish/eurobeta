<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            New User
        </h3>
    </div>
</div>
<div class="col-lg-6">
    <form role="form" accept-charset="utf-8" method="post" id="UserAddForm" action="/eurobeta/users/add">
        <div class="form-group">
            <label for="UserUsername">Username</label>
            <input type="text" class="form-control" id="UserUsername" maxlength="50" name="data[User][username]">
        </div>

        <div class="form-group">
            <label for="UserPassword">Password</label>
            <input type="password" class="form-control" id="UserPassword" name="data[User][password]">
        </div>

        <div class="form-group">
            <label for="UserRole">Role</label>
            <div class="form-group">
                <select class="form-control" id="UserRole" name="data[User][role]">
                    <option value="">Select Role</option>
                    <option value="1">Admin</option>
                    <option value="2">QA Department</option>
                    <option value="3">Production F1</option>
                    <option value="4">Production F3</option>
                    <option value="5">Warehouse</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="UserStatus">Status</label>
            <div class="form-group">
                <select class="form-control" id="UserStatus" name="data[User][status]">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>


        <button class="btn btn-default" type="submit">Submit Button</button>
        <button class="btn btn-default" type="reset">Reset Button</button>

    </form>
</div>

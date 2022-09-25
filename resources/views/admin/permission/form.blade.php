
<div class="form-group">
    <label for="">Module</label>
    <input type="text" name="module" class="form-control" value="{{ isset($permission) ? $permission->module_name : ''}}" required>
</div>

<div class="form-group">
    <div class="row">
       
        <div class="col-sm-6">
            <label for="">Display Name</label>
            <input type="text" name="display_name" class="form-control" value="{{ isset($permission) ? $permission->display_name : ''}}">
        </div>

         <div class="col-sm-6">
            <label for="">Permission</label>
            <input type="text" name="name" class="form-control" value="{{ isset($permission) ? $permission->name : ''}}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="resource">
        <input type="checkbox" name="resource" id="resource">
        Add resource Permission
    </label>
</div>

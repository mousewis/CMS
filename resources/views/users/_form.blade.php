@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php
  $method = $action == 'update' ? '<input type="hidden" name="_method" value="PUT">' : '';
  $action = $action == 'update' ? $action.'/'.$users->user_id : $action; 
?>
<form action="<?= url('users/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Uder Password</label>
		<input type="text" name="uder_password" value ="<?= isset($users) ? $users->uder_password : ''?>" required ='required' class="col-md-4 form-control" placeholder="Uder Password"></div>
		<div class="form-group"><label class="control-label">User Email</label>
		<input type="text" name="user_email" value ="<?= isset($users) ? $users->user_email : ''?>" required ='required' class="col-md-4 form-control" placeholder="User Email"></div>
		<div class="form-group"><label class="control-label">User Name</label>
		<input type="text" name="user_name" value ="<?= isset($users) ? $users->user_name : ''?>" required ='required' class="col-md-4 form-control" placeholder="User Name"></div>
		<div class="form-group"><label class="control-label">User Role</label>
		<input type="text" name="user_role" value ="<?= isset($users) ? $users->user_role : ''?>" required ='required' class="col-md-4 form-control" placeholder="User Role"></div>
		<div class="form-group"><label class="control-label">User Created At</label>
		<input type="datetime" name="user_created_at" value ="<?= isset($users) ? $users->user_created_at : ''?>" required ='required' class="col-md-4 form-control" placeholder="User Created At"></div>
		<div class="form-group"><label class="control-label">User Updated At</label>
		<input type="datetime" name="user_updated_at" value ="<?= isset($users) ? $users->user_updated_at : ''?>" required ='required' class="col-md-4 form-control" placeholder="User Updated At"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
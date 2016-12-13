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
<form action="<?= url(((session('user_id')&&(session('user_role')=='admin'))?'admin/':'').'users/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Mật khẩu</label>
		<input type="password" name="user_password" value ="<?= isset($users) ? $users->user_password : ''?>" required ='required' class="col-md-4 form-control" placeholder="Mật khẩu"></div>
		<div class="form-group"><label class="control-label">Email</label>
		<input type="text" name="user_email" value ="<?= isset($users) ? $users->user_email : ''?>" required ='required' class="col-md-4 form-control" placeholder="Email"></div>
		<div class="form-group"><label class="control-label">Tên người dùng</label>
		<input type="text" name="user_name" value ="<?= isset($users) ? $users->user_name : ''?>" required ='required' class="col-md-4 form-control" placeholder="Tên đăng nhập"></div>
		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Lưu" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
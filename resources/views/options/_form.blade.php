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
  $action = $action == 'update' ? $action.'/'.$options->opt_id : $action; 
?>
<form action="<?= url('options/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Opt Name</label>
		<input type="text" name="opt_name" value ="<?= isset($options) ? $options->opt_name : ''?>" required ='required' class="col-md-4 form-control" placeholder="Opt Name"></div>
		<div class="form-group"><label class="control-label">Opt Detail</label>
		<input type="text" name="opt_detail" value ="<?= isset($options) ? $options->opt_detail : ''?>"  class="col-md-4 form-control" placeholder="Opt Detail"></div>
		<div class="form-group"><label class="control-label">Opt Updated At</label>
		<input type="datetime" name="opt_updated_at" value ="<?= isset($options) ? $options->opt_updated_at : ''?>"  class="col-md-4 form-control" placeholder="Opt Updated At"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
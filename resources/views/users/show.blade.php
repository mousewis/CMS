@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$users->user_id?></span></h2>
<br>	<p><strong>Uder Password</strong>
	<?=$users->uder_password?><p>
	<p><strong>User Email</strong>
	<?=$users->user_email?><p>
	<p><strong>User Name</strong>
	<?=$users->user_name?><p>
	<p><strong>User Role</strong>
	<?=$users->user_role?><p>
	<p><strong>User Created At</strong>
	<?=$users->user_created_at?><p>
	<p><strong>User Updated At</strong>
	<?=$users->user_updated_at?><p>
<p>
	<a href="{{url('users/edit/'.$users->user_id)}}"> Edit</a> |
	<a href="{{url('users')}}">Back</a>
</p>
</div>
@endsection
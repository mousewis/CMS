@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$options->opt_id?></span></h2>
<br>	<p><strong>Opt Name</strong>
	<?=$options->opt_name?><p>
	<p><strong>Opt Detail</strong>
	<?=$options->opt_detail?><p>
	<p><strong>Opt Updated At</strong>
	<?=$options->opt_updated_at?><p>
<p>
	<a href="{{url('options/edit/'.$options->opt_id)}}"> Edit</a> |
	<a href="{{url('options')}}">Back</a>
</p>
</div>
@endsection
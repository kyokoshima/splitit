@extends('layouts.master')
@section('title', 'Bill')

@section('sidebar')
	@parent
@stop

@section('content')
@if(Session::has('success'))
	<div class="bg-info">
		<p>{{ Session::get('success') }}</p>
	</div>

@endif
<div class="row">
{{ Form::open(['route' => 'bills.store', 'class' => 'form-horizontal']) }}
<div class="form-group">
	@foreach($errors->get('title') as $message)
		<span class="bg-danger">{{ $message }}</span>
	@endforeach
	<label class="col-sm-2 control-label" for="title">タイトル</label>
	<div class="col-sm-8">
		<input class="form-control" type="text" name="title">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="description">
	内容
	</label>
	<div class="col-sm-8">
		<textarea id="" class="form-control" name="description" cols="30" rows="10"></textarea>
	</div>
</div>

<div class="form-group">
	@foreach($errors->get('amount') as $message)
		<span class="bg-danger">{{ $message }}</span>
	@endforeach
	<label class="col-sm-2 control-label" for="amount">金額</label>
	<div class="col-sm-8"><input class="form-control" type="text" name="amount"></div>
</div>

<div class="form-actions form-group">
	<button class="btn btn-primary" type="submit">作成する</button>
</div>
{{ Form::close() }}

</div>
@stop

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
	{{ Form::open(['route' => 'bills.store', 'class' => 'form-horizontal col-sm-8 col-sm-offset-2']) }}
		<div class="form-group text-center">
				<label class="control-label col-sm-offset-2">
					<img src="/images/receipt.png" alt="" class="img-thumbnail img-responsive thumbnail">
				</label>
		</div>
		<div class="form-group">
				<div>
					<label class="control-label col-sm-2" for="title">
						{{ trans('words.title') }}
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="title">

						@foreach($errors->get('title') as $message)
							<span class="help-block">{{ $message }}</span>
						@endforeach
					</div>
				</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2" for="description">
				{{ trans('words.description') }}
			</label>
			<div class="col-sm-10">
				<textarea id="" class="form-control" name="description" rows="3"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2" for="amount">
				{{ trans('words.amount') }}
			</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="amount">
				@foreach($errors->get('amount') as $message)
					<span class="help-block">{{ $message }}</span>
				@endforeach
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div id="member-table" />
			</div>
		</div>

		<div class="form-group text-center">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn btn-default" type="submit">
					{{ trans('words.create') }}
				</button>
			</div>
		</div>
	{{ Form::close() }}
</div>
<script type='text/javascript'>
	users = [
		{ id: "1", name: "Yamada"},
		{ id: "2", name: "Tanaka"},
		{ id: "3", name: "Sasaki"}
	];
	candidateMembers = [
		{ id: "4", name: "Sato" },
		{ id: "5", name: "Takahashi" },
		{ id: "6", name: "Yoshida" },
	];
	captions = {
		top: "{{ trans_choice('words.members', 3)}}",
		col: { 
			seq: "#", name: "{{ trans('words.name') }}"
		},
		addMember: "{{ trans('words.add.member') }}",
		newMember: "New member"
	};
</script>
{{ Html::script('js/app.js')}}
@stop

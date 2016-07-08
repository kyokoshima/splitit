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
				<div id="member-table">

				</div>
				<button class="btn btn-success">
					{{ trans('words.add.member') }}
				</button>
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
<div id="example"></div>
{{-- <script src="https://fb.me/react-15.2.0.min.js"></script>
<script src="https://fb.me/react-dom-15.2.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react-bootstrap/0.29.5/react-bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script> --}}
<script type='text/javascript'>
	users = [
		{ id: "1", name: "Yamada"},
		{ id: "2", name: "Tanaka"},
		{ id: "3", name: "Sasaki"}
	];
	captions = {
		top: "{{ trans_choice('words.members', 3)}}",
		col: { 
			seq: "#", name: "{{ trans('words.name') }}"
		},
		addMember: "{{ trans('words.add.member') }}"
	};
{{-- 
  var Table = ReactBootstrap.Table;
  var Button = ReactBootstrap.Button;
  var Glyphicon = ReactBootstrap.Glyphicon;
	var MemberTable = React.createClass({
		render: function(){
			return(
				<Table condenced>
					<caption>{this.props.captions.top}</caption>
					<thead>
						<tr>
							<th>{this.props.captions.col.seq}</th>
							<th>{this.props.captions.col.name}</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						{this.props.users.map(function(user, index){
							return <tr>
								<td>{index}</td>
								<td>{user.name}</td>
								<td>
									<Button bsStyle="danger" bsSize="xsmall">
										<Glyphicon glyph="remove" />
									</Button>
								</td>
								</tr>;
						})}
					</tbody>
				</Table>
			)
		}
	});
	ReactDOM.render(<MemberTable captions={captions} users={users}/>, document.getElementById('member-table')) --}};
</script>
{{ Html::script('js/app.js')}}
@stop

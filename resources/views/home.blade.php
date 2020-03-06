@extends ('layouts.app')

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-right">
			<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#uploadModal">Upload IPA</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead class="thead-light">
					<th>ID</th>
					<th>Name</th>
					<th>Bundle Identifier</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach ($apps as $app)
						<tr>
							<td>{{ $app->id }}</td>
							<td>{{ $app->name }}</td>
							<td>{{ $app->identifier . '.' . $app->name }}</td>
							<td>
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Action
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									@if ($app->favorite)
										<a class="dropdown-item" href="{{ route('unfavorite', ['app' => $app]) }}">Unfavorite</a>
									@else
										<a class="dropdown-item" href="{{ route('favorite', ['app' => $app]) }}">Favorite</a>
									@endif

									<a class="dropdown-item" href="{{ route('delete', ['app' => $app]) }}">Delete</a>
								</div>
							</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="uploadModalLabel">Upload IPA</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>IPA Name</label>
						<input class="form-control" type="text" name="ipa_name" required>
                        @if ($errors->has('ipa_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ipa_name') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="form-group">
						<label>IPA Identifier</label>
						<input class="form-control" type="text" name="ipa_identifier" placeholder="com.0x15f" required>
                        @if ($errors->has('ipa_identifier'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ipa_identifier') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="form-group">
						<label>IPA Description</label>
						<textarea rows="3" class="form-control" name="ipa_description" required></textarea>
                        @if ($errors->has('ipa_identifier'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ipa_identifier') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="form-group">
						<label>IPA Image (App Image)</label>
						<input class="form-control" type="file" name="ipa_image" required>
                        @if ($errors->has('ipa_image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ipa_image') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="form-group">
						<label>IPA Banner (App Store Banner)</label>
						<input class="form-control" type="file" name="ipa_banner" required>
                        @if ($errors->has('ipa_banner'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ipa_banner') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="form-group">
						<label>IPA File</label>
						<input class="form-control" type="file" name="ipa_file" required>
                        @if ($errors->has('ipa_file'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ipa_file') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary" style="width: 100%;">Upload IPA</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section ('js')
<script type="text/javascript">
	@if (!$errors->isEmpty())
		$(document).ready(function() {
			$('#uploadModal').modal();
		});
	@endif
</script>
@endsection
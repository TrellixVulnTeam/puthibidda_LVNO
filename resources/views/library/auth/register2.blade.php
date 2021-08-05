@extends('super.layouts')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-success">
				<div class="panel-heading">Register A Seller</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/libraries/register') }}">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('library_title') ? ' has-error' : '' }}">
							<label for="library_title" class="col-md-4 control-label">Title</label>
							<div class="col-md-6">
								<input id="library_title" type="text" class="form-control" name="library_title" value="{{ old('library_title') }}" required autofocus>
								@if ($errors->has('library_title'))
								<span class="help-block">
									<strong>{{ $errors->first('library_title') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('library_description') ? ' has-error' : '' }}">
							<label for="library_description" class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<input id="library_description" type="text" class="form-control" name="library_description" value="{{ old('library_description') }}" required autofocus>
								@if ($errors->has('library_description'))
								<span class="help-block">
									<strong>{{ $errors->first('library_description') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('library_address') ? ' has-error' : '' }}">
							<label for="library_address" class="col-md-4 control-label">Address</label>

							<div class="col-md-6">
								<input id="library_address" type="textarea" class="form-control" name="library_address" value="{{ old('library_address') }}" required>

								@if ($errors->has('library_address'))
								<span class="help-block">
									<strong>{{ $errors->first('library_address') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('library_district') ? ' has-error' : '' }}">
							<label for="library_district" class="col-md-4 control-label">District</label>

							<div class="col-md-6">
								<input id="library_district" type="text" class="form-control" name="library_district" value="{{ old('library_district') }}" required>

								@if ($errors->has('library_district'))
								<span class="help-block">
									<strong>{{ $errors->first('library_district') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('library_state') ? ' has-error' : '' }}">
							<label for="library_state" class="col-md-4 control-label">State</label>

							<div class="col-md-6">
								<input id="library_state" type="text" class="form-control" name="library_state" value="{{ old('library_state') }}" required>

								@if ($errors->has('library_state'))
								<span class="help-block">
									<strong>{{ $errors->first('library_state') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('library_payment_type') ? ' has-error' : '' }}">
							<label for="library_payment_type" class="col-md-4 control-label">Payment Type</label>

							<div class="col-md-6">
								<input id="library_payment_type" type="text" class="form-control" name="library_payment_type" value="{{ old('library_payment_type') }}" required>

								@if ($errors->has('library_payment_type'))
								<span class="help-block">
									<strong>{{ $errors->first('library_payment_type') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('library_owner') ? ' has-error' : '' }}">
							<label for="library_owner" class="col-md-4 control-label">Owner</label>

							<div class="col-md-6">
								<input id="library_owner" type="text" class="form-control" name="library_owner" value="{{ old('library_owner') }}" required>

								@if ($errors->has('library_owner'))
								<span class="help-block">
									<strong>{{ $errors->first('library_owner') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('library_contactno') ? ' has-error' : '' }}">
							<label for="library_contactno" class="col-md-4 control-label">Contact No</label>

							<div class="col-md-6">
								<input id="library_contactno" type="text" class="form-control" name="library_contactno" value="{{ old('library_contactno') }}" required>

								@if ($errors->has('library_contactno'))
								<span class="help-block">
									<strong>{{ $errors->first('library_contactno') }}</strong>
								</span>
								@endif
							</div>
						</div>


						<div class="form-group{{ $errors->has('library_telephone') ? ' has-error' : '' }}">
							<label for="library_telephone" class="col-md-4 control-label">Telephone</label>

							<div class="col-md-6">
								<input id="library_telephone" type="text" class="form-control" name="library_telephone" value="{{ old('library_telephone') }}" required>

								@if ($errors->has('library_telephone'))
								<span class="help-block">
									<strong>{{ $errors->first('library_telephone') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('library_cover') ? ' has-error' : '' }}">
							<label for="library_cover" class="col-md-4 control-label">Cover</label>

							<div class="col-md-6">
								<input id="library_cover" type="file" class="form-control" name="library_cover" value="{{ old('library_cover') }}" required>

								@if ($errors->has('library_cover'))
								<span class="help-block">
									<strong>{{ $errors->first('library_cover') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('library_est_date') ? ' has-error' : '' }}">
							<label for="library_est_date" class="col-md-4 control-label">Establishment Date</label>

							<div class="col-md-6">
								<input id="library_est_date" type="date" class="form-control" name="library_est_date" value="{{ old('library_est_date') }}" required>

								@if ($errors->has('library_est_date'))
								<span class="help-block">
									<strong>{{ $errors->first('library_est_date') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('library_email') ? ' has-error' : '' }}">
							<label for="library_email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input id="library_email" type="email" class="form-control" name="library_email" value="{{ old('library_email') }}" required>

								@if ($errors->has('library_email'))
								<span class="help-block">
									<strong>{{ $errors->first('library_email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('library_password') ? ' has-error' : '' }}">
							<label for="library_password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="library_password" type="password" class="form-control" name="library_password" required>

								@if ($errors->has('library_password'))
								<span class="help-block">
									<strong>{{ $errors->first('library_password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="library_password_confirmation" class="col-md-4 control-label">Confirm Password</label>

							<div class="col-md-6">
								<input id="library_password_confirmation" type="password" class="form-control" name="library_password_confirmation" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">
									Register Library
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
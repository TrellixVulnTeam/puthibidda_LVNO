@extends('layouts.app')
@section('content')
<!-- MultiStep Form -->
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		{!! Form::open(['method'=>'POST','action' => ['Auth\Library\RegisterController@register'],'enctype'=>"multipart/form-data",'id'=>"msform"]) !!}
		@csrf
		<!-- progressbar -->
		<ul id="progressbar">
			<li class="active">Library Details</li>
			<li>Owner Profiles</li>
			<li>Add Your Library</li>
		</ul>
		<!-- fieldsets -->
		<fieldset>
			<h2 class="fs-title">Library Details</h2>
			<span id="error_library_detail" class="text-danger"></span>
			{{-- <h3 class="fs-subtitle">Tell us something more about you</h3> --}}

			<div class="form-group">
				<input  id="library_title" name="library_title" minlength="6" maxlength="100"  required autofocus type="text" class="form-control" value="" placeholder="নাম *" />
			</div>
			<div class="form-group">
				<textarea id="library_description" name="library_description" autofocus class="form-control"  maxlength="500" placeholder="সংক্ষিপ্ত বিবরণ" value=""></textarea>
			</div>
			<div class="form-group">
				<textarea id="library_address" name="library_address" required autofocus class="form-control" placeholder="ঠিকানা/অবস্থান  *" value="" minlength="6" maxlength="200" ></textarea>
			</div>
			<div class="form-group">
				<select id="library_state" name="library_state" required autofocus type="text"class="form-control">
					<option disabled selected value>বিভাগের নাম *</option>
					<option value="ঢাকা">ঢাকা</option>
					<option value="রাজশাহী">রাজশাহী</option>
					<option value="সিলেট">সিলেট</option>
					<option value="বরিশাল">বরিশাল</option>
					<option value="খুলনা">খুলনা</option>
					<option value="চট্টগ্রাম">চট্টগ্রাম</option>
					<option value="রংপুর">রংপুর</option>
					<option value="ময়মনসিংহ">ময়মনসিংহ</option>
				</select>
			</div>
			<div class="form-group">
				<select id="library_district"  name="library_district"  required autofocus class="form-control" disabled="true">
					<option value="" disabled selected >জেলার নাম *</option>
				</select>
			</div>
			<div class="form-group">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i id='uploadIcon' class="material-icons" style="font-size: 20px" aria-hidden="true">cloud_upload</i></span>
					</div>
					<div class="custom-file">
						<label id="cover_status" style="text-align: left" class="custom-file-label" for="library_cover"> লাইব্রেরীর ছবি *</label>
						<input type="file" accept="image/x-png,image/jpeg" ref="file" class="custom-file-input" id="library_cover" required autofocus>						
					</div>
				</div>
			</div>
			<input type="button" name="next" class="next action-button" value="Next"/>
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Owner Profiles</h2>
			<span id="error_owner_profile" class="text-danger"></span>
			
			{{-- <h3 class="fs-subtitle">Your presence on the social network</h3> --}}
			<div class="form-group">
				<input id="library_owner"  name="library_owner" required autofocus type="text" class="form-control" placeholder="মালিকের নাম *" value="" minlength="6" maxlength="100"/>
			</div>
			<div class="form-group">
				<input id="library_contactno" name="library_contactno" required autofocus type="number" minlength="11" maxlength="11" class="form-control" placeholder="মোবাইল নং *" value="" />
			</div>
			<div class="form-group">
				<input id="library_telephone" name="library_telephone" type="text" maxlength="50" class="form-control" placeholder="টেলিফোন নং" value="" />
			</div>
			<div class='form-group'>
				<input id="library_est_date" name="library_est_date"  class="form-control mb-1" type="text" placeholder="স্থাপনের সময়কাল *" >
			</div>

			{{-- <div class="row">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" for="library_est_date"></span>
					</div>
					<input id="library_est_date"  data-provide="datepicker" name="library_est_date"  class="form-control" type="date" value="{{ date('Y-m-d') }}" >					
				</div>
			</div> --}}
			
		{{-- 	<div class="input-group">
				<div class="input-group-prepend mb-2">
					<span class="input-group-text" for="library_est_date">স্থাপনের সময়কাল</span>
				</div>
				<div>
					<input id="library_est_date"  name="library_est_date"  class="form-control mb-2 pt-1" type="date" value="{{ date('Y-m-d') }}" >	
				</div>
			</div> --}}

			<div class="form-group">
				<select id="library_payment_type"  name="library_payment_type" required autofocus class="form-control" single>
					<option value="" disabled selected > <span>বিনিময়ের ধরন * </span></option>
					<option value="cash"> <span> নগদ ক্যাশ </span></option>
					<option value="cash_card"> <span> নগদ ক্যাশ এবং পেমেন্ট কার্ড </span></option>
					<option value="cash_card_bkash"> <span> নগদ ক্যাশ, পেমেন্ট কার্ড এবং বিকাশ </span></option>
				</select>
			</div>
			<div class="form-group">
				<select id="library_preferences" name="library_preferences"  required autofocus class="form-control" multiple="true">
					<option disabled value="" selected >Select Preferences</option>
				</select>
			</div>
			<input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
			<input type="button" name="next" class="next action-button" value="Next"/>
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Add Your Library</h2>
			<span id="error_add_library" class="text-danger"></span>
			<div class="form-group">
				<input id="library_email"  name="library_email" required autofocus  type="email" class="form-control" placeholder="ইমেইল আইডি *" minlength="6" maxlength="100"/>
			</div>

			<div class="form-group">
				<input id="library_password"  name="library_password" required autofocus type="password" class="form-control" placeholder="Password *" value="" />
			</div>
			<div class="form-group">
				<input id="library_password_confirmation" name="library_password_confirmation" type="password" class="form-control"  placeholder="Confirm Password *" value="" />
			</div>
			<div class="form-group">
				<div class="form-check">
					<input style="width:auto" class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
					<label class="form-check-label" for="invalidCheck">
						Agree to 
					</label>
					<span id="termscondition" style="color:purple; cursor: pointer;">Terms and Conditions</span>
					<div class="invalid-feedback">
						You must agree before submitting.
					</div>
				</div>
			</div>
			<input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
			<input type="submit" name="submit" class="submit action-button" value="Submit"/>
		</fieldset>
		<div class="modal fade" id="agreementModel" role="dialog">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						Terms and Conditions
					</div>
					<div class="modal-body">
						Faisal Try to write sth here.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Back to Registration</button>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
<!-- /.MultiStep Form -->
{{-- 
<h3 class="register-heading">লাইব্রেরী সম্পর্কিত তথ্য </h3>

{!! Form::open(['method'=>'POST','action' => ['Auth\Library\RegisterController@register'],'enctype'=>"multipart/form-data"]) !!}
@csrf
<div class="row register-form">
	<div class="col-md-2">
		<div class="form-group">
			<input  id="library_title" name="library_title" minlength="6" maxlength="100"  required autofocus type="text" class="form-control" value="" placeholder="নাম *" />
		</div>
		<div class="form-group">
			<textarea id="library_description" name="library_description" autofocus class="form-control"  maxlength="500" placeholder="সংক্ষিপ্ত বিবরণ" value=""></textarea>
		</div>

		<div class="form-group">
			<textarea id="library_address" name="library_address" required autofocus class="form-control" placeholder="ঠিকানা/অবস্থান  *" value="" minlength="6" maxlength="200" ></textarea>
		</div>
		<div class="form-group">
			<select id="library_state" name="library_state" required autofocus type="text" class="form-control">
				<option disabled selected value>বিভাগের নাম *</option>
				<option value="ঢাকা">ঢাকা</option>
				<option value="রাজশাহী">রাজশাহী</option>
				<option value="সিলেট">সিলেট</option>
				<option value="বরিশাল">বরিশাল</option>
				<option value="খুলনা">খুলনা</option>
				<option value="চট্টগ্রাম">চট্টগ্রাম</option>
				<option value="রংপুর">রংপুর</option>
				<option value="ময়মনসিংহ">ময়মনসিংহ</option>
			</select>
		</div>
		<div class="form-group">
			<select id="library_district"  name="library_district"  required autofocus class="form-control">
				<option value="" disabled selected >জেলার নাম *</option>
				<option value="বাগেরহাট">বাগেরহাট</option>
				<option value="বান্দরবন">বান্দরবন</option>
				<option value="বরগুনা">বরগুনা</option>
				<option value="বরিশাল">বরিশাল</option>
				<option value="ভোলা">ভোলা</option>
				<option value="বগুড়া">বগুড়া</option>
				<option value="ব্রাহ্মণবাড়িয়া">ব্রাহ্মণবাড়িয়া</option>
				<option value="চাঁদপুর">চাঁদপুর</option>
				<option value="চাঁপাইনবাবগঞ্জ">চাঁপাইনবাবগঞ্জ</option>
				<option value="চট্টগ্রাম">চট্টগ্রাম</option>
				<option value="চুয়াডাঙ্গা">চুয়াডাঙ্গা</option>
				<option value="কুমিল্লা">কুমিল্লা</option>
				<option value="কক্সবাজার">কক্সবাজার</option>
				<option value="ঢাকা">ঢাকা</option>
				<option value="দিনাজপুর">দিনাজপুর</option>
				<option value="ফরিদপুর">ফরিদপুর</option>
				<option value="ফেনী">ফেনী</option>
				<option value="গাইবান্ধা">গাইবান্ধা</option>
				<option value="গাজীপুর">গাজীপুর</option>
				<option value="গোপালগঞ্জ">গোপালগঞ্জ</option>
				<option value="হবিগঞ্জ">হবিগঞ্জ</option>
				<option value="জামালপুর">জামালপুর</option>
				<option value="যশোর">যশোর</option>
				<option value="ঝালকাঠি">ঝালকাঠি</option>
				<option value="ঝিনাইদহ">ঝিনাইদহ</option>
				<option value="জয়পুরহাট">জয়পুরহাট</option>
				<option value="খাগড়াছড়">খাগড়াছড়ি</option>
				<option value="খুলনা">খুলনা</option>
				<option value="কিশোরগঞ্জ">কিশোরগঞ্জ</option>
				<option value="কুড়িগ্রাম">কুড়িগ্রাম</option>
				<option value="কুষ্টিয়া">কুষ্টিয়া</option>
				<option value="লক্ষ্মীপুর">লক্ষ্মীপুর</option>
				<option value="লালমনিরহাট">লালমনিরহাট</option>
				<option value="মাদারীপুর">মাদারীপুর</option>
				<option value="মাগুরা">মাগুরা</option>
				<option value="মানিকগঞ্জ">মানিকগঞ্জ</option>
				<option value="মৌলবীবাজার">মৌলবীবাজার</option>
				<option value="মেহেরপুর">মেহেরপুর</option>
				<option value="মুন্সিগঞ্জ">মুন্সিগঞ্জ</option>
				<option value="ময়মনসিংহ">ময়মনসিংহ</option>
				<option value="নওগাঁ">নওগাঁ</option>
				<option value="নড়াইল">নড়াইল</option>
				<option value="নারায়ণগঞ্জ">নারায়ণগঞ্জ</option>
				<option value="নরসিংদী">নরসিংদী</option>
				<option value="নাটোর">নাটোর</option>
				<option value="নবাবগঞ্জ">নবাবগঞ্জ</option>
				<option value="নেত্রকোনা">নেত্রকোনা</option>
				<option value="নীলফামারী">নীলফামারী</option>
				<option value="নোয়াখালী">নোয়াখালী</option>
				<option value="পাবনা">পাবনা</option>
				<option value="পঞ্চগর">পঞ্চগর</option>
				<option value="পটুয়াখালী">পটুয়াখালী</option>
				<option value="পিরোজপুর">পিরোজপুর</option>
				<option value="রাজবাড়ি">রাজবাড়ি</option>
				<option value="রাজশাহী">রাজশাহী</option>
				<option value="রাঙামাটি">রাঙামাটি</option>
				<option value="রংপুর">রংপুর</option>
				<option value="সাতক্ষীরা">সাতক্ষীরা</option>
				<option value="শরিয়তপুর">শরিয়তপুর</option>
				<option value="শেরপুর">শেরপুর</option>
				<option value="সিরাজগঞ্জ">সিরাজগঞ্জ</option>
				<option value="সুনামগঞ্জ">সুনামগঞ্জ</option>
				<option value="সিলেট">সিলেট</option>
				<option value="টাংগাইল">টাংগাইল</option>
				<option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
			</select>
		</div>
		<div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text"><i style="font-size: 20px" aria-hidden="true"></i></span>
				</div>
				<div class="custom-file">
					<input type="file" accept="image/x-png,image/jpeg" ref="file" onchange="handleFileUpload()" class="custom-file-input" id="library_cover" required autofocus >
					<label class="custom-file-label" for="library_cover">ছবি *</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<select id="library_payment_type"  name="library_payment_type" required autofocus class="form-control" single>
				<option value="" disabled selected > <span>বিনিময়ের ধরন * </span></option>
				
			</select>
		</div>
		<div class="form-group">
			<select id="library_preferences" name="library_preferences" required autofocus type="text" class="form-control" multiple="true">
			</select>
		</div>
		<div class="form-group">
			<input id="library_owner"  name="library_owner" required autofocus type="text" class="form-control" placeholder="মালিকের নাম *" value="" minlength="6" maxlength="100"/>
		</div>
		<div class="form-group">
			<input id="library_contactno" name="library_contactno" required autofocus type="text" minlength="11" maxlength="11" class="form-control" placeholder="মোবাইল নং *" value="" />
		</div>
		<div class="form-group">
			<input id="library_telephone" name="library_telephone" type="text" maxlength="50" class="form-control" placeholder="টেলিফোন নং" value="" />
		</div>
		<div class='form-group'>
			<input id="library_est_date"  name="library_est_date"  class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="স্থাপনাকাল *" />
		</div>

		<div class="form-group">
			<input id="library_email"  name="library_email" required autofocus  type="email" class="form-control" placeholder="ইমেইল আইডি *" minlength="6" maxlength="100"/>
		</div>

		<div class="form-group">
			<input id="library_password"  name="library_password" required autofocus type="password" class="form-control" placeholder="Password *" value="" />
		</div>
		<div class="form-group">
			<input id="library_password_confirmation" name="library_password_confirmation" type="password" class="form-control"  placeholder="Confirm Password *" value="" />
		</div>
		<div class="form-group">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
				<label class="form-check-label" for="invalidCheck">
					Agree to 
				</label>
				<a style="color:purple; cursor: pointer;" onclick="showAgreement()">Terms and Conditions</a>

				<div class="invalid-feedback">
					You must agree before submitting.
				</div>
			</div>
		</div>
		<input type="submit" class="btnRegister"  value="Register"/>
	</div>
</div>
{!! Form::close() !!} --}}
@endsection
<template>
	<div class="container register">
		<div id="snackbar">
			{{ errors }}
		</div>
		<div class="row">
			<div class="col-md-3 register-left">
				<div class="customselectapi">
					<ul class="nav nav-tabs nav-justified" id="registerTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">লাইব্রেরী</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ব্যক্তিগত</a>
						</li>
					</ul>
				</div>
				<img src="/storage/logos/logoshort.png" alt=""/>
				<h3>পুঁথিবিদ্যায় স্বাগতম</h3>
				<p>সদস্য হউন এবং অন্যকে জানান।</p>
				<input type="submit" name="" value="Login"/><br/>
			</div>
			<div class="col-md-9 register-right">
				<div v-if="reRegistration" class="tab-content" id="registerTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<form @submit="checkAndSubmit" method="post" >
							<h3 class="register-heading">লাইব্রেরী সম্পর্কিত তথ্য </h3>
							<input type="hidden" name="_token" :value="csrf">
							<div class="row register-form">
								<div class="col-md-12">
									<div class="form-group"> 
										<label>Register With: </label>
										<a href="/login/facebook" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
										<a href="/login/twitter" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
										<a href="login/google" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
										<a href="login/linkedin" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input  id="library_title" v-model="library_title" name="library_title" minlength="6" maxlength="100"  required autofocus type="text" class="form-control" value="" placeholder="নাম *" />
									</div>
									<div class="form-group">
										<textarea id="library_description" v-model="library_description" name="library_description" autofocus class="form-control"  maxlength="500" placeholder="সংক্ষিপ্ত বিবরণ" value="" />
									</div>

									<div class="form-group">
										<textarea id="library_address" v-model="library_address" name="library_address" required autofocus class="form-control" placeholder="ঠিকানা/অবস্থান  *" value="" minlength="6" maxlength="200" />
									</div>
									<div class="form-group">
										<select id="library_state" v-model="library_state" name="library_state" v-on:change="updatedDistricts()" required autofocus type="text" class="form-control">
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
										<select id="library_district"  name="library_district" v-model="library_district" required autofocus class="form-control" disabled="true">
											<option value="" disabled selected >জেলার নাম *</option>
											<option  v-for="(item, key) in districts" :value="key" v-if="item == library_state">
												<span>{{key}}</span>
											</option>
										</select>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i :class="isUploaded"  style="font-size: 20px" aria-hidden="true"></i></span>
											</div>
											<div class="custom-file">
												<input type="file" accept="image/x-png,image/jpeg" ref="file" v-on:change="handleFileUpload()" class="custom-file-input" id="library_cover" required autofocus >
												<label class="custom-file-label" for="library_cover">ছবি *</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<select id="library_payment_type" v-model="library_payment_type" name="library_payment_type" required autofocus class="form-control" single>
											<option value="" disabled selected > <span>বিনিময়ের ধরন * </span></option>
											<option v-for="(item, key) in payment_type" :value="key">
												<span>{{item}}</span>
											</option>
										</select>
									</div>
									<div class="form-group">
										<select id="library_preferences" v-model="library_preferences" name="library_preferences" required autofocus type="text" class="form-control" multiple="true">
											<option  v-for="(item, key) in preferences" :value="item">
												<span>{{item}}</span>
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">

									<div class="form-group">
										<input id="library_owner" v-model="library_owner" name="library_owner" required autofocus type="text" class="form-control" placeholder="মালিকের নাম *" value="" minlength="6" maxlength="100"/>
									</div>
									<div class="form-group">
										<input id="library_contactno" v-model="library_contactno" name="library_contactno" required autofocus type="text" minlength="11" maxlength="11" class="form-control" placeholder="মোবাইল নং *" value="" />
									</div>
									<div class="form-group">
										<input id="library_telephone" v-model="library_telephone" name="library_telephone" type="text" maxlength="50" class="form-control" placeholder="টেলিফোন নং" value="" />
									</div>
									<div class='form-group'>
										<input id="library_est_date" v-model="library_est_date" name="library_est_date"  class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="স্থাপনাকাল *" />
									</div>

									<div class="form-group">
										<input id="library_email" v-model="library_email" name="library_email" required autofocus  type="email" class="form-control" placeholder="ইমেইল আইডি *" minlength="6" maxlength="100"/>
									</div>

									<div class="form-group">
										<input id="library_password" v-model="library_password" name="library_password" required autofocus type="password" class="form-control" placeholder="Password *" value="" />
									</div>
									<div class="form-group">
										<input id="library_password_confirmation" v-model="library_password_confirmation" name="library_password_confirmation" type="password" class="form-control"  placeholder="Confirm Password *" value="" />
									</div>
									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
											<label class="form-check-label" for="invalidCheck">
												Agree to 
											</label>
											<a style="color:purple; cursor: pointer;" @click="showAgreement">Terms and Conditions</a>

											<div class="invalid-feedback">
												You must agree before submitting.
											</div>
										</div>
									</div>
									<input type="submit" class="btnRegister"  value="Register"/>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<h3  class="register-heading">পুঁথিবিদ্যায় নিবন্ধন করুন</h3>
						<div class="row register-form">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="First Name *" value="" />
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Last Name *" value="" />
								</div>
								<div class="form-group">
									<input type="email"  class="form-control" placeholder="Email *" value="" />
								</div>
								<div class="form-group">
									<input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password *" value="" />
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Confirm Password *" value="" />
								</div>
								<div class="form-group">
									<select class="form-control">
										<option class="hidden"  selected disabled>Please select your Sequrity Question</option>
										<option>What is your Birthdate?</option>
										<option>What is Your old Phone Number</option>
										<option>What is your Pet Name?</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="`Answer *" value="">
								</div>
								<input type="submit" class="btnRegister"  value="Register"/>
							</div>
						</div>
					</div>
				</div>
				<div v-if="onSuccess" class="tab-pane fade show active">
					<h3 class="registered-heading"> নিবন্ধন সফলভাবে সম্পন্ন হয়েছে</h3>
					<div  class="row register-success" id="successTabContent">
						<div class="content ">
							<div class="card">							
								<div class="row">
									<div class="col-md-5 profilecover"><img :src="'/storage/librarycovers/'+ library_info['library_cover']"/>
										<div class="profiletitle">
											<h4>{{ library_info['library_title'] }}</h4>
											<p><strong> সংক্ষিপ্ত বিবরণ </strong></p>
											<p>  {{ library_info['library_description'] }}</p>
										</div>

									</div>
									<div class="col-md-7 profileinfo">
										<p><strong>ঠিকানা/অবস্থানঃ </strong> {{ library_info['library_address'] }} </p>
										<p><strong>জেলার নামঃ </strong> {{ library_info['library_district'] }} </p>
										<p><strong>বিভাগের নামঃ </strong> {{ library_info['library_state'] }} </p>
										<p><strong>বিনিময়ের ধরণঃ </strong> {{ payment_type[library_info['library_payment_type']] }} </p>
										<p><strong>মালিকের নামঃ </strong> {{ library_info['library_owner'] }} </p>
										<p><strong>মোবাইল নং- </strong> {{ library_info['library_contactno'] }} </p>
										
										<p><strong>টেলিফোন নং- </strong> {{ library_info['library_telephone'] }} </p>
										<p><strong>স্থাপন কালঃ </strong> {{ library_info['library_est_date'] }} </p>
										<p><strong>বইয়ের ধরণঃ</strong> {{ library_info['library_preferences'] }} </p>
									</div>
								</div>
								<button type="button" @click="backToRegister" class="btn btn-success">Back to Register</button>						</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
		</div>
	</template>
	<style scoped>

	*, *:before, *:after {
		box-sizing: border-box;
	}

	.content {
		width: 100%;
		position: relative;
		animation: animatop 0.9s cubic-bezier(0.425, 1.14, 0.47, 1.125) forwards;
	}

	.card {
		width: 100%;
		min-height: 100%;
		padding: 20px;
		border-radius: 3px;
		background-color:  white;
		box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
		position: relative;
		overflow: hidden;
	}
	.card:after {
		content: '';
		display: block;
		width: 253px;
		height: 400px;
		background: cadetblue;
		position: absolute;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		animation: rotatemagic 0.75s cubic-bezier(0.425, 1.04, 0.47, 1.105) 1s both;
	}
	.profilecover {
		flex-direction: row;
		z-index: 2;
	}
	.profileinfo {
		flex-direction: row;
		z-index: 2;
	}
	.profilecover img {
		border-radius: 10%;
		width: 100%;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

	}
	.profilecover .profiletitle {
		padding: 0px 20px;
	}

	@keyframes animatop {
		0% {
			opacity: 0;
			right: -500px;
		}
		100% {
			opacity: 1;
			right: 0px;
		}
	}
	@keyframes animainfos {
		0% {
			right: 10px;
		}
		100% {
			right: -42px;
		}
	}
	@keyframes rotatemagic {
		0% {
			opacity: 0;
			transform: rotate(0deg);
			top: -24px;
			left: -253px;
		}
		100% {
			transform: rotate(-30deg);
			top: -24px;
			left: -78px;
		}
	}
	#snackbar {
		visibility: hidden;
		min-width: 250px;
		margin-left: -125px;
		background-color: #333;
		color: #fff;
		text-align: center;
		border-radius: 2px;
		padding: 16px;
		position: fixed;
		z-index: 1;
		left: 50%;
		bottom: 30px;
		font-size: 17px;
	}

	#snackbar.show {
		visibility: visible;
		-webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
		animation: fadein 0.5s, fadeout 0.5s 2.5s;
	}

	@-webkit-keyframes fadein {
		from {bottom: 0; opacity: 0;} 
		to {bottom: 30px; opacity: 1;}
	}

	@keyframes fadein {
		from {bottom: 0; opacity: 0;}
		to {bottom: 30px; opacity: 1;}
	}

	@-webkit-keyframes fadeout {
		from {bottom: 30px; opacity: 1;} 
		to {bottom: 0; opacity: 0;}
	}

	@keyframes fadeout {
		from {bottom: 30px; opacity: 1;}
		to {bottom: 0; opacity: 0;}
	}

	.register{
		background: -webkit-linear-gradient(left, #3931af, #00c6ff);
		margin-top: 2%;
	}
	.register-left{
		text-align: center;
		color: #fff;
		margin-top: 8%;
	}
	.register-left input{
		border: none;
		border-radius: 1.5rem;
		padding: 2%;
		width: 60%;
		background: #f8f9fa;
		font-weight: bold;
		color: #383d41;
		margin-bottom: 3%;
		cursor: pointer;
	}
	.register-right{
		background: #f8f9fa;
		border-top-left-radius: 10% 50%;
		border-bottom-left-radius: 10% 50%;
	}
	.register-left img{
		margin-top: 15%;
		margin-bottom: 5%;
		width: 25%;
		-webkit-animation: mover 2s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	@-webkit-keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-20px); }
	}
	@keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-20px); }
	}
	.register-left p{
		font-weight: lighter;
		padding: 12%;
		margin-top: -9%;
	}
	.register .register-form{
		padding: 10%;
		margin-top: 10%;
	}

	.register .register-success{
		padding: 10%;
	}

	.btnRegister{
		float: right;
		border: none;
		border-radius: 1.5rem;
		padding: 2%;
		background: #0062cc;
		color: #fff;
		font-weight: 600;
		width: 50%;
		cursor: pointer;
	}
	.register .nav-tabs{
		margin-top: 3%;
		border: none;
		background: #0062cc;
		border-radius: 1.5rem;
		width: 100%;
		float: right;
	}
	.register .nav-tabs .nav-link{
		padding: 2%;
		height: 34px;
		font-weight: 600;
		color: #fff;
		border-top-right-radius: 1.5rem;
		border-bottom-right-radius: 1.5rem;
	}
	.register .nav-tabs .nav-link:hover{
		border: none;
	}
	.register .nav-tabs .nav-link.active{
		width: 100px;
		color: #0062cc;
		border: 2px solid #0062cc;
		border-top-left-radius: 1.5rem;
		border-bottom-left-radius: 1.5rem;
	}
	.register-heading{
		text-align: center;
		margin-top: 3%;
		margin-bottom: -15%;
		color: #495057;
	}
	.registered-heading{
		margin-top: 3%;
		text-align: center;
		margin-bottom: -5%;
		color: #495057;
	}
	.field_with_errors{
		border: 2px solid red !important;
	}

</style>
<script>
	export default{
		name: "NewRegistration",
		data:function() {
			return {
				errors: '',
				payment_type:{cash:'নগদ ক্যাশ', cash_card:'নগদ ক্যাশ এবং পেমেন্ট কার্ড',cash_card_bkash:'নগদ ক্যাশ, পেমেন্ট কার্ড এবং বিকাশ'},
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				library_title:'',
				library_description:'',
				library_address:'',
				library_state:'',
				library_district:'',
				library_payment_type:'',
				library_preferences:[],
				library_owner:'',
				library_contactno:'',
				library_telephone:'',
				library_cover:[],
				library_est_date:'',
				library_email:'',
				library_password:'',
				library_password_confirmation:'',
				preferences:[],
				districts: [],
				isUploaded:'fa fa-cloud-upload',
				library_info:[],
				reRegistration: true,
				onSuccess:false
			}
		},
		mounted(){
			this.loadData();
			this.initialize();
		},
		methods:{
			initialize: function(){
				var select= $("#library_preferences");
				select.select2({
					placeholder: 'বইয়ের ধরন',
					dropdownAutoWidth: true,
					allowClear: true,
					width: '100%'}).on('change', () => {this.library_preferences=select.val()});
			},
			showAgreement: function() {
				$("#agreementModel").modal('show');
			},
			loadData: function () {
				// axios.get('/libraries/4').then(response=>(this.library_info=response.data));
				axios.get('/resources/').then(response=>{
					this.districts=response.data.districts;
					this.preferences = response.data.categories;
				});
			},
			updatedDistricts(){
				$('#library_district').prop('disabled',false);
			},
			handleFileUpload(){
				if(typeof this.$refs.file.files[0] === "undefined")
					this.isUploaded = 'fa fa-cloud-upload';
				else
					this.isUploaded = 'fa fa-check-square';
				this.library_cover = this.$refs.file.files[0];
			},
			backToRegister(){
				this.reRegistration = true;
				this.onSuccess = false;
				this.initialize();
			},
			checkAndSubmit: function(e){
				e.preventDefault();
				var x = document.getElementById("snackbar");
				let formData =new FormData();				
				
				formData.append('library_title',this.library_title);
				formData.append('library_description',this.library_description);
				formData.append('library_address',this.library_address);
				formData.append('library_state',this.library_state);
				formData.append('library_district',this.library_district);
				formData.append('library_payment_type',this.library_payment_type);            
				formData.append('library_preferences',this.library_preferences);
				formData.append('library_cover',this.library_cover);
				formData.append('library_owner',this.library_owner);
				formData.append('library_contactno',this.library_contactno);
				formData.append('library_telephone',this.library_telephone);
				formData.append('library_est_date',this.library_est_date);
				formData.append('library_email',this.library_email);
				formData.append('library_password',this.library_password);
				formData.append('library_password_confirmation',this.library_password_confirmation);
				formData.append('_token',this.csrf);

				axios.post('/libraries/register',formData,
				{
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				})
				.then((response) => {
					this.reRegistration = false;
					this.onSuccess = true;
					this.library_info= response.data;
					
				}).catch((error) => {
					if (error.response) {
						let errorPack= error.response.data.errors;
						var element ="";
						if(errorPack.library_password!=null){
							this.errors = errorPack.library_password;
							element = document.getElementById("library_password");
						}
						else if(errorPack.library_email!=null){
							this.errors = errorPack.library_email;
							element = document.getElementById("library_email");
						}
						else if(errorPack.library_contactno!=null){
							this.errors = errorPack.library_contactno;
							element = document.getElementById("library_contactno");
						}
						else if(errorPack.library_cover!=null){
							this.errors = errorPack.library_cover;
							element = document.getElementById("library_cover");
						}

						element.classList.add("field_with_errors");
					} else if (error.request) {
						console.log(error.request);
					} else {
						console.log('Error', error.message);
					}
					
					x.classList.add("show");
					setTimeout(()=>{x.classList.remove("show"); element.classList.remove("field_with_errors"); }, 5000);	
				});	
			}
		}
	}
</script>
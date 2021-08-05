require('./bootstrap');
$(document).ready(function(){
  let districts=[];
  let preferences=[];

  $("#library_preferences").change(function(){
    $("#library_preferences option:first-child").attr("selected",false);
  });
  axios.get('/resources/').then(function (response){
    districts=response.data.districts;
    preferences = response.data.categories;
    for (var key in preferences) {
      $("#library_preferences").append(new Option(preferences[key], key));
    }
  });

  $("#library_cover").change(function(){
    if(typeof this.files[0] === "undefined"){
      $('#uploadIcon').html('cloud_upload').css('color','#770000');
      $('#cover_status').html('লাইব্রেরীর ছবি *');
    }
    else{
      $('#uploadIcon').html('done').css('color','#007700');
      $('#cover_status').html('ছবি সংযুক্ত হয়েছে');
    }
        // this.library_cover = this.$refs.file.files[0];
      });

  // $('#library_est_date').focus(function(){
  //     this.type = 'date';
  //   });
  $("#library_est_date").focus(function(){

    if(this.type=='text'){
      this.type='date';
      let now = new Date();
      let day = ("0" + now.getDate()).slice(-2);
      let month = ("0" + (now.getMonth() + 1)).slice(-2);
      let today = now.getFullYear()+"-"+(month)+"-"+(day) ;
      this.value=today;
    }

  });

  $("#library_state").change(function(){
    $('#library_district').prop('disabled',false);
    $("#library_district").empty().append('<option value="" disabled selected >জেলার নাম *</option>');
    for (var key in districts) {
      if (districts.hasOwnProperty(key) &  districts[key]===this.value) {
        $("#library_district").append(new Option(key, key));
      }
    }
  });



//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$.fn.verify = function(index){


  if(index=='0'){
    let error_library_detail='';
    if($.trim($('#library_title').val()).length == 0)
    {
      error_library_detail = 'Library Title is required';
      $('#error_library_detail').text(error_library_detail);
      $('#library_title').addClass('has-error');
      return false;
    }
    else
    {
     error_library_detail = '';
     $('#error_library_detail').text(error_library_detail);
     $('#library_title').removeClass('has-error');
   }
   if($.trim($('#library_address').val()).length == 0)
   {
    error_library_detail = 'Library Address is required';
    $('#error_library_detail').text(error_library_detail);
    $('#library_address').addClass('has-error');
    return false;
  }
  else
  {
   error_library_detail = '';
   $('#error_library_detail').text(error_library_detail);
   $('#library_address').removeClass('has-error');
 }
 if($.trim($('#library_state').val()).length == 0)
 {
  error_library_detail = 'State name is required';
  $('#error_library_detail').text(error_library_detail);
  $('#library_state').addClass('has-error');
  return false;
}
else
{
 error_library_detail = '';
 $('#error_library_detail').text(error_library_detail);
 $('#library_state').removeClass('has-error');
}
if($.trim($('#library_district').val()).length == 0)
{
  error_library_detail = 'District name is required';
  $('#error_library_detail').text(error_library_detail);
  $('#library_district').addClass('has-error');
  return false;
}
else
{
 error_library_detail = '';
 $('#error_library_detail').text(error_library_detail);
 $('#library_district').removeClass('has-error');
}
if($.trim($('#library_cover').val()).length == 0)
{
  error_library_detail = 'Library Cover is required';
  $('#error_library_detail').text(error_library_detail);
  $('#library_cover').addClass('has-error');
  return false;
}
else
{
 error_library_detail = '';
 $('#error_library_detail').text(error_library_detail);
 $('#library_cover').removeClass('has-error');
}
return true;

}
else if(index == '1'){
  let error_owner_profile='';

  if($.trim($('#library_owner').val()).length == 0)
  {
    error_owner_profile = 'Owner name is required';
    $('#error_owner_profile').text(error_owner_profile);
    $('#library_owner').addClass('has-error');
    return false;
  }
  else
  {
   error_owner_profile = '';
   $('#error_owner_profile').text(error_owner_profile);
   $('#library_owner').removeClass('has-error');
 }
 if($.trim($('#library_contactno').val()).length == 0)
 {
  error_owner_profile = 'Contact Number is required';
  $('#error_owner_profile').text(error_owner_profile);
  $('#library_contactno').addClass('has-error');
  return false;
}
else
{
 error_owner_profile = '';
 $('#error_owner_profile').text(error_owner_profile);
 $('#library_contactno').removeClass('has-error');
}
if($.trim($('#library_est_date').val()).length == 0)
{
  error_owner_profile = 'Establishment date is required';
  $('#error_owner_profile').text(error_owner_profile);
  $('#library_est_date').addClass('has-error');
  return false;
}
else
{
 error_owner_profile = '';
 $('#error_owner_profile').text(error_owner_profile);
 $('#library_est_date').removeClass('has-error');
}
if($.trim($('#library_payment_type').val()).length == 0)
{
  error_owner_profile = 'Payment Type is required';
  $('#error_owner_profile').text(error_owner_profile);
  $('#library_payment_type').addClass('has-error');
  return false;
}
else
{
 error_owner_profile = '';
 $('#error_owner_profile').text(error_owner_profile);
 $('#library_payment_type').removeClass('has-error');
}
if($.trim($('#library_preferences').val()).length == 0)
{
  error_owner_profile = 'Preferences are required';
  $('#error_owner_profile').text(error_owner_profile);
  $('#library_preferences').addClass('has-error');
  return false;
}
else
{
 error_owner_profile = '';
 $('#error_owner_profile').text(error_owner_profile);
 $('#library_preferences').removeClass('has-error');
}
return true;
}
else
  return false;
}
$("#termscondition").click(function(){
  $("#agreementModel").modal('show');
});

$(".next").click(function(){
  current_fs = $(this).parent();
  if($.fn.verify($('fieldset').index(current_fs))==true){

    if(animating) return false;
    animating = true;

    next_fs = $(this).parent().next();
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

  //show the next fieldset
  next_fs.show();
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    },
    duration: 800,
    complete: function(){
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
}

});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;

  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();

  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

  //show the previous fieldset
  previous_fs.show();
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    },
    duration: 800,
    complete: function(){
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".submit").click(function(e){
  e.preventDefault();
  var x = document.getElementById("snackbar");
  let formData =new FormData();

  formData.append('library_title',$('#library_title'));
  formData.append('library_description',$('#library_description'));
  formData.append('library_address',$('#library_address'));
  formData.append('library_state',$('#library_state'));
  formData.append('library_district',$('#library_district'));
  formData.append('library_payment_type',$('#library_payment_type'));
  formData.append('library_preferences',$('#library_preferences'));
  formData.append('library_cover',$('#library_cover'));
  formData.append('library_owner',$('#library_owner'));
  formData.append('library_contactno',$('#library_contactno'));
  formData.append('library_telephone',$('#library_telephone'));
  formData.append('library_est_date',$('#library_est_date'));
  formData.append('library_email',$('#library_email'));
  formData.append('library_password',$('#library_password'));
  formData.append('library_password_confirmation',$('#library_password_confirmation'));


  axios.post('/libraries/register',formData,
  {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  })
  .then((response) => {
  console.log(response.data);

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
})
});

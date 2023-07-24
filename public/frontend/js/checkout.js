$(document).ready(function(){
    $('.bKash_button').click(function(e){
        e.preventDefault();
       
        var fname=$('.fname').val();
        var  lname=$('.lname').val();
        var email=$('.email').val();
        var phone=$('.phone').val();
        var address1=$('.address1').val();
        var address2=$('.address2').val();
        var city=$('.city').val();
        var state=$('.state').val();
        var country=$('.country').val();
        var pincode=$('.pincode').val();

        if(!fname){
            fname_error="fname name is require"
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }else{
            fname_error="";
            $('#fname_error').html('');
        }
        if(!lname){
            lname_error="lname name is require"
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }else{
            fname_error="";
            $('#lname_error').html('');
        }
        if(!email){
            email_erorr="Email is require"
            $('#email_erorr').html('');
            $('#email_erorr').html(email_erorr);
        }else{
            email_erorr="";
            $('#email_erorr').html('');
        }
        if(!phone){
            phone_erorr="Phone name is require"
            $('#phone_erorr').html('');
            $('#phone_erorr').html(phone_erorr);
        }else{
            phone_erorr="";
            $('#phone_erorr').html('');
        }
        if(!address1){
            address1_erorr="Address1  is require"
            $('#address1_erorr').html('');
            $('#address1_erorr').html(address1_erorr);
        }else{
            address1_erorr="";
            $('#address1_erorr').html('');
        }
        if(!address2){
            address2_erorr="Address2 is require"
            $('#address1_erorr').html('');
            $('#address1_erorr').html(address2_erorr);
        }else{
            address2_erorr="";
            $('#address1_erorr').html('');
        }
        if(!city){
            city_erorr="City is require"
            $('#city_erorr').html('');
            $('#city_erorr').html(city_erorr);
        }else{
            city_erorr="";
            $('#city_erorr').html('');
        }
        if(!state){
            state_erorr="State_erorr is require"
            $('#state_erorr').html('');
            $('#state_erorr').html(state_erorr);
        }else{
            state_erorr="";
            $('#state_erorr').html('');
        }
        if(!country){
            country_erorr="Country_erorr name is require"
            $('#country_erorr').html('');
            $('#country_erorr').html(country_erorr);
        }else{
            country_erorr="";
            $('#country_erorr').html('');
        }
        if(!pincode){
            pincode_error="Pincode_error is require"
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
        }else{
            pincode_error="";
            $('#pincode_error').html('');
        }
       if(fname_error !=''|| lname_error !='' || email_erorr !='' || phone_erorr !='' || address1_erorr !=''|| address2_erorr !='' || city_erorr !='' || state_erorr !='' || country_erorr !='' || pincode_error !=''){
        return false;
       }else
       {
        data={

        'fname':fname,
        'lname':lname,
         'email':email,
         'phone':phone,
        'address1':address1,
       'address2':address2,
        'city':city,
        'state':state,
        'country':country,
         'pincode':pincode,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        

       }
       
       

    });

});

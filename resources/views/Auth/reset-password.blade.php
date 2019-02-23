@extends('layouts.front')

@push('styles')
<link href="/css/education-center.css" rel="stylesheet" type="text/css"/>
<link href="/css/education-right.css" rel="stylesheet" type="text/css"/>
<link href="/css/faq.css" rel="stylesheet" type="text/css"/>
@endpush

@section('content')

<div id="WidePane">
    <div id="Pane" class="Funnel"><div style="display:none;"><details encemail="066018206240133145175173027022108103032174136091100144183048112063157030074143112243178031219009" t="VGIKISiq00e26fzGERTEBQf395efd1"></details></div>
        <h1>Reset Password</h1>
        <h2 style="margin:0;">Choose a new password</h2>
        <form id="reset-password" method="post" action="/reset-password-post" class="ResetPassword" style="margin: 58px auto auto; width: 275px;">
            <p class="alert-danger reset-error"></p>
            <p class="alert-success reset-success"></p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <h6>New Password</h6>
            <input id="password" type="password" class="required newPassword" name="new_password" style="margin-bottom:0;">
            <br><span class="newPassword-err f-12 alert-danger"></span>
            <h6>Confirm New Password</h6>
            <input id="" type="password" name="confirm_password" class="required confirmPassword" style="margin-bottom:0;">
            <span class="confirmPassword-err f-12 alert-danger"></span>
            <input class="bigButton reset-pwd-btn" id="" type="submit" value="Confirm" style="margin-top:10px">
        </form>
    </div>
</div>

@endsection

@push('view-scripts')
<script>
    
    $(".reset-pwd-btn").click(function()
    {
        var newpassword = $('.newPassword').val()
        var confirmpassword = $('.confirmpassword').val()
        if((newpassword == "" && newpassword.length < 6) || (confirmpassword == "" && newpassword != confirmpassword || confirmpassword != newpassword))
        {
            if(newpassword == "")
            {
                $('.newpassword').addClass('border-red'); 
                $('.newPassword-err').html('This field is required.');
                
            }
            else if(newpassword.length < 6)
            {
                $('.newPassword-err').html('The password must be at least 6 characters.');
            }
            else
            {
                $('.newpassword').removeClass('border-red'); 
                $('.newPassword-err').html(''); 
            } 
            
            if(confirmpassword == "")
            {
                $('.confirmpassword').addClass('border-red'); 
                $('.confirmPassword-err').html('This field is required.'); 
            }
            else if(newpassword != confirmpassword || confirmpassword != newpassword)
            {
                $('.confirmpassword').addClass('border-red'); 
                $('.confirmPassword-err').html('Password and confirm password should be same.'); 
            }
            else
            {
                $('.confirmpassword').removeClass('border-red'); 
                $('.confirmPassword-err').html(''); 
            }
            return false;
        }
        else
        {
            return true;
        }
        
        $('.reset-error').html("");
        $('.reset-success').html("");
    });
    var options = {
        success: function(res)
        {
            if(res.status == 1)
            {
               $('.reset-success').html(res.message);
               $('#reset-password')[0].reset();
               $('.confirmpassword').removeClass('border-red'); 
               $('.confirmPassword-err').html(''); 
               $('.newpassword').removeClass('border-red'); 
               $('.newPassword-err').html(''); 
            }
            else
            {
                $('.reset-error').html(res.message);
            }
        }
    }
    $('#reset-password').ajaxForm(options); 
</script>
@endpush
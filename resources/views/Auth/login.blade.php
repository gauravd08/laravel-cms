@extends('layouts.login')

@section('content')
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="/login" method="post">
        {{ csrf_field() }}
        <div class="logo" style="margin: 0 auto; padding-bottom: 0;">
            <a href="index.html">
                <img src="/assets/frontend/img/logo.png" width="200" alt="" /> 
            </a>
        </div>
        <h3 class="form-title font-green" style="margin-top: 5px;">Sign In</h3>
        <div class="row">
             @include('Admin/partials/message')
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix email" type="text" 
                   autocomplete="off" placeholder="Email" name="email" 
                   value="<?php if (isset($_COOKIE["email"])) {echo $_COOKIE["email"];}?>" /> 
            <span class="email-error text-danger"></span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control password form-control-solid placeholder-no-fix password" type="password" 
                   value="<?php if (isset($_COOKIE["password"])) {echo $_COOKIE["password"];}?>"
                   autocomplete="off" placeholder="Password" name="password" /> 
            <span class="password-error text-danger"></span>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn login-btn green uppercase">Login</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1"
                    <?php if (isset($_COOKIE["remember"])) {?> checked <?php }?>   
                       />Remember
                <span></span>
            </label>
            <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
        </div>
    </form>
    <!-- END LOGIN FORM -->

    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgot-pwd-form" class="forget-form" method="post"  >
        <p class="success-res alert-success"></p>
        <p class="failure-res alert-danger"></p>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h3 class="font-green">Forgot Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control fgp-email" type="email"  placeholder="Email" name="email" /> 
            <span class="fgpEmail-error text-danger"></span>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
            <!--<input type="submit" class="btn-forgot btn btn-success uppercase pull-right" value="Submit">-->
            <button type="button" class="btn-forgot btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
@endsection
@push('view-scripts')
<script type="text/javascript">
    
    $(document).ready(function()
    {
        $('.btn-forgot').click(function (e) 
        {
            
            var data = new FormData($('#forgot-pwd-form')[0]);
            $.ajax(
            {
                url: "/forgot-password?admin",
                data: {email : $('.fgp-email').val() },
                headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                type: 'POST',
                success: function (res) 
                {
                    if(res.status == 1)
                    {
                        $('.success-res').html(res.message);
                        $('.failure-res').hide();
                        $('#forgot-pwd-form')[0].reset();
                    }
                    else
                    {
                        $('.failure-res').html(res.message);
                    }
                }
            });

        });
        
        $('.login-btn').click(function()
        {
            var email = $('.email').val();
            var password = $('.password').val();
            
            if(email == "")
            {
                $('.email-error').html('Email is required');
            }
            else if(!validateEmail(email))
            {
                $('.email-error').html('Please fill a valid email address');
            }
            else
            {
                $('.email-error').html('');
            }
            
            if(password == "")
            {
                $('.password-error').html('Password is required');
            }
            else
            {
               $('.password-error').html(''); 
            }
        });
        
        $('.btn-forgot').click(function()
        {
            var fgpEmail = $('.fgp-email').val();
            
            if(fgpEmail == "")
            {
                $('.fgpEmail-error').html('Email is required.');
            }
            else if(!validateEmail(fgpEmail))
            {
                $('.fgpEmail-error').html('Please fill a valid email address.');
                
                return false;
            }
            else
            {
                $('.fgpEmail-error').html('');
                 return false;
            }
        });
        
        $(document).on('click', '#back-btn', function()
        {
            $('.fgpEmail-error').html('');
            $('.fgp-email').val('');
        });
        
        $('#forget-password').click(function()
        {
            $('.email-error').html('');
            $('.password-error').html(''); 
        });
        
    });
    
</script>
@endpush

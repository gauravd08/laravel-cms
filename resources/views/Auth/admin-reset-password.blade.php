@extends('layouts.login')

@section('content')
<div class="content">

    <p class="success-res text-success"></p>
        <p class="failure-res text-danger"></p>
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="reset-pwd-form" style="display:block;" class="forget-form" method="post" >
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="token" value="{{ $token }}">
        <h3 class="font-green">Reset Password ?</h3>
        <div class="form-group">
            <input class="form-control new_password" type="password"  placeholder="New Password" name="new_password" /> 
            <span class="text-danger new-pwd f-12"></span>
        </div>
        <div class="form-group">
            <input class="form-control confirm_password" type="password"  placeholder="Confirm Password" name="confirm_password" /> 
            <span class="text-danger confirm-pwd f-12"></span>
        </div>
        <div class="form-actions">
            <button type="button" class="btn-reset-pwd btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
@endsection
@push('view-scripts')
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.btn-reset-pwd').click(function (e) 
        {
            var newPassword = $('.new_password').val();
            var confirmPassword = $('.confirm_password').val();
            if(newPassword == "")
            {
                $('.new-pwd').html('New password is required');
            }
            else
            {
                $('.new-pwd').html('');
            }
            if(confirmPassword == "")
            {
                $('.confirm-pwd').html('New password is required');
                return false
            }
            else if(confirmPassword != newPassword || newPassword != confirmPassword)
            {
                $('.confirm-pwd').html('The confirm password and new password should be same.');
                return false;
            }
            else
            {
                $('.confirm-pwd').html('');
                
                $.ajax(
                    {
                        url: "/reset-password-post",
                        data: {new_password : $('.new_password').val(),confirm_password : $('.confirm_password').val(), 'token' : $('input[name=token]').val() },
                        headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                        type: 'POST',
                        success: function (res) 
                        {
                            if(res.status == 1)
                            {
                                $('.failure-res').hide();
                                $('.success-res').html(res.message);
                                location.href='/admin';
                            }
                            else
                            {
                                $('.failure-res').html(res.message);
                            }
                        }
                });
            }
           

        });

    });
</script>
@endpush
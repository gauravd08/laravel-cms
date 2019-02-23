<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
               <?php echo isset($modules['Footer About'])?$modules['Footer About']:'' ?>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <?php echo isset($modules['Footer Navigation'])?$modules['Footer Navigation']:'' ?>
            </div>	
                
            <!-- start Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                      <p id = "modal-text" style="text-align:center;font-size: 30px"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal -->
            
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <?php echo isset($modules['Footer Newsletter'])?$modules['Footer Newsletter']:'' ?>
                    <div>
                        <form id="subscription-form" style="padding-top: 13px;">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="input-group d-flex flex-row">
                                <input name="email" placeholder="Email Address" id = "subscription-email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                <button type="submit" value="submit" class="btn sub-btn"><span class="lnr lnr-location"></span></button>		
                            </div>									
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget instafeed">
                    <h6 class="footer_title">InstaFeed</h6>
                    <ul class="list instafeed d-flex flex-wrap">
                         @foreach($instagram_feeds as $key => $image)
                         <li><img src="{{ $image }}" height="58px" width="58px" alt=""></li>
                         @endforeach
                    </ul>
                </div>
            </div>						
        </div>

    </div>
    <div class="border_line"></div>
    <div class="container">
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                {{$social_links['copy_write']}}
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-4 footer-social">
                <a href="{{$social_links['facebook_link']}}" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="{{$social_links['twitter_link']}}" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="{{$social_links['instagram_link']}}" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="{{$social_links['google_link']}}" target="_blank"><i class="fa fa-google"></i></a>
                <a href="{{$social_links['pinterest_link']}}" target="_blank"><i class="fa fa-pinterest"></i></a>
            </div>
        </div>
    </div>
</footer>

@push('view-scripts')
    <script>
          $('#subscription-form').on('submit', function(e){
            var email = document.getElementById("subscription-email").value;
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') } 
              });
            $.ajax({
                url: ("/subscription/" + email),
                cache: false,
                type: "POST",
                success: function(response){
                  document.getElementById("modal-text").innerHTML = response;
                  document.getElementById("modal-text").style.color = 'green'
                  $('#myModal').modal('show');
                  document.getElementById("subscription-form").reset();
                  e.preventDefault();
                }
              });
            return false;
       	});
    </script>
@endpush

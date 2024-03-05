<div class="chat-icon" id="toggleButton">
    <i class="ri-message-2-line"></i>
</div>
<div id="myElement" class="chat-box">
    <div class="chat-heading">
        <div class="img-prfl">
            <img class="profile-chat" src="{{asset('admin/img/user.avif')}}" alt="">
        </div>
        <div class="chat-profl-name">
            <h6 class="chat-user-name mb-0 text-white">Shammaz</h6>
            <p class="status-txt mb-0 text-white">Online</p>
        </div>
    </div>
    <div class="chat-content mt-5 mb-5">
        <h5 class="left-chat">Hi there👋</h5>
        <h5 class="left-chat">How can i help you?</h5>
        <h5 class="right-chat">Hi</h5>
        <h5 class="right-chat">I need medicine for this disease</h5>
        <h5 class="left-chat">How can I help you today?</h5>
        <h5 class="right-chat">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum eius vitae voluptas quos ducimus ea.</h5>
        <h5 class="left-chat">How can i help you?</h5>
        <h5 class="right-chat">Hi</h5>
        <h5 class="right-chat">I need medicine for this disease</h5>
        <h5 class="left-chat">How can I help you today?</h5>
        <div class="chat-add-box mt-3">
            <form>
                <div class="chat-add">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type your Message here....">
                </div>
            </form>
            <i class="ri-send-plane-2-line"></i>
        </div>
    </div>
</div>


  <!-- footer section  -->
  <footer class="text-lg-start text-lg-start mt-4">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 col-sm-6  mb-4 mb-md-0">
                <div class="box-footer">
                    <a href="{{ route('index') }}">
                        <img class="logo-footer" src="{{asset('homeweb/images/Logo-main.png')}}" alt="">
                    </a>
                </div>
            </div>
            <!--Grid column-->


            <!--Grid column-->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-0">
                <div class="vl">
                    <h5 class="footer-main-head">Quick Links</h5>
                </div>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{route('index')}}" class="">Home</a></li>
                    <li><a href="{{route('product')}}" class="">Products</a></li>
                    <li><a href="{{route('about')}}" class="">About Us</a></li>
                    <li><a href="{{route('contact')}}" class="">Contact Us</a></li>
                </ul>
            </div>
            <!--Grid column-->
                    <!--Grid column-->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-0">
                <div class="vl">
                    <h5 class="footer-main-head">Privacy</h5>
                </div>
                <ul class="list-unstyled mb-0">
                    <li><a href="#!" class="">Terms & Conditions</a></li>
                    <li><a href="#!" class="">Privacy & Policy</a></li>
                    <li><a href="#!" class="">Refund Policy</a></li>
                </ul>
            </div>
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-0">

                <ul class="list-unstyled">
                    <a href="#"><i class="ri-instagram-line"></i></a>
                    <a href=""><i class="ri-facebook-circle-line"></i></a>
                    <a href=""><i class="ri-linkedin-box-line"></i></a>
                    <a href=""><i class="ri-youtube-line"></i></a>
                </ul>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
        <hr class="mb-0">
    </div>
    <div class="copy-right text-center">
        <p class="mb-0 all-right">2023 All right reserved to Farmer’s Grid<br>
    </div>
    <!-- Copyright -->
</footer>
{{-- <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script> --}}
<script src="{{asset('homeweb/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    {{-- <script>
         if ($('#defadd').prop('checked',true)) {
                var defaultadd = 1;
            } else {
                var defaultadd = 0;
            }
    </script> --}}


</body>
</html>

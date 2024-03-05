<body>
    <header>
        <div class="container-main">
            <div class="navbar-main-dv">
                <div class="logo-dv">
                    <a href="{{ route('index') }}">
                        <img class="logo-main" src="{{ asset('homeweb/images/Logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="nav-items">
                    <ul class="mb-0">
                        <li><a href="{{ route('index') }}" class="nav-linkss">Home</a></li>
                        <li><a href="{{ route('disease') }}" class="nav-linkss">Shop By Disease</a></li>
                        <li><a href="{{ route('product') }}" class="nav-linkss">Shop By Product</a></li>
                        <li><a href="{{ route('about') }}" class="nav-linkss">About</a></li>
                        <li><a href="{{ route('contact') }}" class="nav-linkss">Contact Us</a></li>
                    </ul>
                </div>
                <div class="nav-profl-login">
                    <a href="{{ route('profile') }}"><i class="ri-user-line text-white"></i></a>
                    <a href="{{ route('cart') }}"><i class="ri-shopping-cart-2-line text-white"></i></a>
                    <div class="menulogo d-md-block d-lg-none" onclick="toggleCartt()"><i
                            class="ri-menu-2-line text-white"></i></div>
                </div>
            </div>

            <div class="serach-box">
                <div class="input-group">
                    <input style="border-radius: 0.25rem;" type="search" class="form-control" placeholder="Search..."
                        id="pid" onkeyup="ProdSearch(this.value)">



                    <!-- Options are added directly in the HTML -->
                    {{-- @php
                            $products=DB::table('products')->where('status','active')->get();
                        @endphp
                        @foreach ($products as $product) --}}
                    <div id="subOptions">
                        {{-- <div class="img-with-name">
							<a href="{{ route('product.single',$product->id) }}">
								<img class="p-img-search" src="{{$product->image1}}" alt="">
								<h5 class="mb-0 sub-option">{{$product->name_english}}</h5>
							</a>
						</div> --}}
                    </div>
                    {{-- @endforeach --}}


                </div>
            </div>

            <select class="select-language" id="abc" onchange="lang1(this.value)">
                <option value="1">English</option>
                <option value="2">Malayalam</option>
            </select>


        </div>
    </header>
    <!-- header end  -->
    <!-- sidebar  -->
    <div class="sidebar">
        <div class="navbar-sidebar">
            <ul>
                <li><a class="active" href="{{ route('index') }}">Home</a></li>
                <li><a class="active" href="{{ route('disease') }}">Shop By Disease</a></li>
                <li><a class="active" href="{{ route('product') }}">Shop By Product</a></li>
                <li><a class="active" href="{{ route('about') }}">About</a></li>
                <li><a class="active" href="{{ route('contact') }}">Contact Us</a></li>
                <li><a class="active" href="{{ route('profile') }}">Profile</a></li>
                <li><a class="active" href="{{ route('cart') }}">Cart</a></li>
                <li><a class="active" href="{{ route('signin') }}">Sign in</a></li>
                <li><a class="active" href="{{ route('signup') }}">Sign up</a></li>
                <select class=" mobl-width" name="" id="abc" onchange="lang1(this.value)">
                    <option value="1">English</option>
                    <option value="2">Malayalam</option>
                </select>
            </ul>
        </div>
        <div class="d-inline closse" onclick="toggleCartt()"><i class="ri-close-circle-line"></i></div>
    </div>






    <script>
        function ProdSearch(search) {

            var Pid = $('input#pid').val();


            $.post("/prod-search", {
                pid: Pid,
                _token: "{{ csrf_token() }}"
            }, function(result) {


                $('#subOptions').html(result);



            });

            if (search === '') {
                $('#subOptions').hide();

            } else {
                $('#subOptions').show();

            }
        }




        function toggleCartt() {
            document.querySelector('.sidebar').classList.toggle('open-cart');
        }


        var currentUrl = window.location.pathname;

        // Define a mapping of URLs to option values
        var urlToOptionValue = {
            '/': '1',
            '/home': '2',
            // Add more URL mappings as needed
        };

        // Set the selected option based on the current URL
        var languageSelect = document.getElementById('abc');
        if (urlToOptionValue[currentUrl]) {
            languageSelect.value = urlToOptionValue[currentUrl];
        }

        function lang1(selectedValue) {
            if (selectedValue === '1') {
                // Handle the English selection
                window.location.href = '/'; // Replace with your actual URL
            } else if (selectedValue === '2') {
                // Handle the Malayalam selection
                window.location.href = '/home'; // Replace with your actual URL
            }
        }
    </script>








    <script>
        const searchInput = document.getElementById('pid');
        const subOptions = document.getElementById('subOptions');

        // Event listener for input focus
        searchInput.addEventListener('focus', () => {
            subOptions.style.display = 'none';
        });

        // Event listener for input blur
        searchInput.addEventListener('blur', () => {
            // Delay hiding sub-options to handle click events on sub-options
            setTimeout(() => {
                subOptions.style.display = 'none';
            }, 200);
        });
    </script>

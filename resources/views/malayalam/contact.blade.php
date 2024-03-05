@extends('malayalam.layouts.master')
@section('content')

<div class="container-main mt-4">
    <div class="row" id="prodiv">
    </div>
</div>
    <div class="container-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="signin-main-dv">
                    <h3 class="text-center mb-0 signin-text">കീപ് ഇൻ ടച്ച് </h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                placeholder="Full Name">
                            <div class="nameerror" style="color: red; font-size: 14px; "></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mobile" aria-describedby="emailHelp"
                                placeholder="Phone Number">
                            <div class="moberror" style="color: red; font-size: 14px; "></div>

                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" aria-describedby="emailHelp"
                                placeholder="Subject">
                            <div class="suberror" style="color: red; font-size: 14px; "></div>

                        </div>
                        <div class="form-group">
                            <textarea placeholder="Describe your Concern" class="form-control" id="message" rows="5"></textarea>
                            <div class="mesgerror" style="color: red; font-size: 14px; "></div>
                        </div>
                        <a onclick="submit()" class="signin-btn-main primary-bg btn text-white text-center">Submit</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function submit() {
            var name = $('input#name').val();
            var mobile = $('input#mobile').val();
            var subject = $('input#subject').val();
            var message = $('textarea#message').val();

            if (name == '') {
                $('#name').focus();
                $('#name').css({
                    'border': '1px solid red'
                });
                $('.nameerror').show();
                $('.nameerror').text("enter name*");
                return false;
            } else

                $('#name').css({
                    'border': '1px solid #CCC'
                });

            $('.nameerror').hide();

            if (mobile == '') {
                $('#mobile').focus();
                $('#mobile').css({
                    'border': '1px solid red'
                });
                $('.moberror').show();
                $('.moberror').text("enter mobile*");
                return false;
            } else

                $('#mobile').css({
                    'border': '1px solid #CCC'
                });

            $('.moberror').hide();

            if (subject == '') {
                $('#subject').focus();
                $('#subject').css({
                    'border': '1px solid red'
                });
                $('.suberror').show();
                $('.suberror').text("enter subject*");
                return false;
            } else

                $('#subject').css({
                    'border': '1px solid #CCC'
                });

            $('.suberror').hide();

            if (message == '') {
                $('#message').focus();
                $('#message').css({
                    'border': '1px solid red'
                });
                $('.mesgerror').show();
                $('.mesgerror').text("enter message*");
                return false;
            } else

                $('#message').css({
                    'border': '1px solid #CCC'
                });

            $('.mesgerror').hide();


            data = new FormData();

            data.append('name', name);
            data.append('mobile', mobile);
            data.append('subject', subject);
            data.append('message', message);



            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-contact",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {
                        Swal.fire({
                            title: 'Thank You for contacting us! We will get back to you soon',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = window.location.href;
                            }
                        })
                    }
                }
            })
        }
    </script>
@endsection

@extends('layouts.Admin')
@section('title')
    Chat
@endsection


@section('contents')
    <div class="chat-box">
        <div class="chat-heading">
            <div class="img-prfl">
                <img class="profile-chat" src="{{ asset('admin/img/user.avif') }}" alt="">
            </div>
            <div class="chat-profl-name">
                <h6 class="chat-user-name mb-0 text-white">Shammaz</h6>
                <p class="status-txt mb-0 text-white">Online</p>
            </div>
        </div>

        <div class="chat-content mt-5 mb-5" id="msgdivadmin">

            @foreach ($chat as $c)
                @if ($c->sender == 'admin')
                <h5 class="right-chat">{{ $c->message }}</h5>

                @else
                <h5 class="left-chat">{{ $c->message }}</h5>
                @endif
            @endforeach


        </div>
        <div class="chat-add-box mt-3">
            <form>
                <div class="chat-add">
                    <input type="text" class="form-control" id="admessage" placeholder="Type your Message here....">
                    <div class="inputerror" style="color: red; font-size: 14px; "></div>

                </div>
            </form>
            <i class="ri-send-plane-2-line" onclick="sendmessageadm()"></i>
        </div>

    </div>


    <script>

        function GetMessage() {

            $.post("/get-messages-admin", {

                sender_id:'{{$id}}',

                _token: @json(csrf_token())
            }, function(result) {

                $('#msgdivadmin').html(result);
            });
        }

        function sendmessageadm() {
            var message = $('input#admessage').val();

            if (message == '') {
                $('#admessage').focus();
                $('#admessage').css({
                    'border': '1px solid red'
                });
                $('.inputerror').show();
                $('.inputerror').text("Type Message*");
                return false;
            } else

                $('#admessage').css({
                    'border': '1px solid #CCC'
                });
            $('.inputerror').hide();



            data = new FormData();
            data.append('user_id', '{{$id}}');
            data.append('admessage', message);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/save-chats-admin",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        $('#admessage').val('');
                        GetMessage();
                    }
                }
            })
        }
    </script>
@endsection

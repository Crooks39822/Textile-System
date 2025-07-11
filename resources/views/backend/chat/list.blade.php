@extends('backend.layouts.app')
@section('style')
<style type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/font-awesome.min.css') }}">
    

.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
   
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff;
    height: 500px;
    overflow: auto;
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}
.chat-list
{
    height: 675px;
    overflow: auto; 
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 85%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-list
{
    height: 465px;
     
}

    .chat-app .people-list {
        /* height: 465px; */
        width: 100%;
        overflow-x: auto;
        background: #fff;
        /* left: -400px;
        display: none */
        position: relative;
        border-bottom: 2px dashed #d1d1d1;
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 500px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
@endsection

@section('content')

  <div class="content-wrapper">
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> My Chats</h1>
          </div>
          
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="getSearchUser"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" id="getSearch" class="form-control" placeholder="Search...">
                            <input type="hidden" id="getRecieverIDDynamic" value="{{$reciever_id}}">
                         </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0" id="getSearchUserDynamic">
                            @include('backend/chat/_user')
                        </ul>
                       </div>
                    <div class="chat" id="getChatMessageAll">
                        @if(!empty($getReciever))

                         @include('backend/chat/_messages')
                         @else
                        
                         
                         @endif
                    </div>
                </div>
            </div>
        </div>
     </div>
    </section>
      </div>

@endsection

 @section('script')

<script type="text/javascript">

$('body').delegate('.getChatWindows','click',function(e){
            e.preventDefault();
            var reciever_id = $(this).attr('id');
            $('#getRecieverIDDynamic').val('reciever_id');
            
            $('.getChatWindows').removeClass('active');
            $(this).addClass('active');
            $.ajax({
            type: 'POST',
            url: "{{ url('get_chat_windows') }}",
            data: {
             'reciever_id':reciever_id,
             "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data){
                $('#ClearMessage'+reciever_id).hide();
                $('#getChatMessageAll').html(data.success);
                window.history.pushState("", "", "{{ url('chat?reciever_id=') }}"+data.reciever_id);
                scrolldown();
                 },

            error: function(response){
        },
            });
        });

        $('body').delegate('#getSearchUser','click',function(e){
            var search = $('#getSearch').val();
            var reciever_id =  $('#getRecieverIDDynamic').val();
            
            $.ajax({
                    type: 'POST',
                    url: "{{ url('get_chat_search_user') }}",
                    data: {
                    'search':search,
                    'reciever_id':reciever_id,
                    "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(data){
                        $('#getSearchUserDynamic').html(data.success);
                        },
                    error: function(response){
                },
            });
        });

        $('body').delegate('#submit_message','submit',function(e){
            e.preventDefault();
            $.ajax({
            type: 'POST',
            url: "{{ url('submit_message') }}",
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data){
                $('#AppendMessage').append(data.success);
                $('#ClearMessage').val('');
                $('#file_name').val('');
                $('#getFileName').html('');
                scrolldown();
            },

            error: function(response){
        },
            });
        });
        function scrolldown()
        {
            $('.chat-history').animate({scrollTop: $('.chat-history').prop("scrollHeight")+10000},500);
        }
        $('body').delegate('#OpenFile','click',function(e){
            $('#file_name').trigger('click');
        });

        $('body').delegate('#file_name','change',function(e){
            var filename = this.files[0].name;
            $('#getFileName').html(filename);
        });
        
        scrolldown();
</script>

 @endsection
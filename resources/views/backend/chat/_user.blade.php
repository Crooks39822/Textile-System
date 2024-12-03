                           @foreach($getChatUser as $user)
                           <li class="clearfix getChatWindows @if(!empty($reciever_id)) @if($reciever_id == $user['user_id']) active  @endif  @endif" id="{{ $user['user_id'] }}">
                           
                                <img src="{{$user['prifile_pic']}}" style="height: 45px" alt="avatar">
                                <div class="about">
                                    <div class="name">{{$user['name']}} 
                                        @if(!empty($user['message_count']))
                                        <span id="ClearMessage{{$user['user_id']}}" style="background:green;color: #fff; border-radius: 5px; padding: 1px 7px;">
                                        {{$user['message_count']}}</span>
                                        @endif
                                    </div>
                                    @if(!empty($user['is_online']))
                                    <i class="fa fa-circle online"></i>
                                    @else
                                    <i class="fa fa-circle offline"></i>
                                    @endif
                                    <div class="status">  {{ Carbon\Carbon::parse($user['created_date'])->diffForHumans()}} </div>
                                </div>
                        
                            </li>
                            @endforeach
                           
                            
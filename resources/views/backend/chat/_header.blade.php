<div class="row">
  <div class="col-lg-12">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
        <img style="height:40px; width:40px;" src="{{$getReciever->getProfileDirectory()}}"  alt="avatar">
        </a>
         <div class="chat-about">
             <h6 style="margin-bottom: 0px;" class="m-b-0">{{$getReciever->name}} {{$getReciever->last_name}}</h6>
                    <small>
                             @if(!empty($getReciever->OnlineUser()))  
                            <span style="color: green;"> Online</span>
                         @else
                        Last seen: 
                                        
                        {{ Carbon\Carbon::parse($getReciever->updated_at)->diffForHumans()}}
                         @endif  
                                        
                                        
                    </small>
        </div>
  </div>
                                
 </div>

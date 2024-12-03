<div class="chat-header clearfix">
@include('backend/chat/_header')
</div>
<div class="chat-history">
 @include('backend/chat/_chat')
 </div>
 <div class="chat-message clearfix">
                            <form action="" id="submit_message" method="post" class="mb-0" enctype="multipart/form-data">
                                <input type="hidden" name="reciever_id" value="{{$getReciever->id}}">
                            @csrf
                                <textarea class="form-control" id="ClearMessage" name="message" require></textarea>
                       
                                <div class="row">
                                    
                                <div class="col-md-6 hidden-sm">
                                    
                                    <a href="javascript:void(0);" id="OpenFile" style="margin-top: 10px;" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                    <input type="file" style="display: none;" name="file" id="file_name">
                                <spam id="getFileName"></spam>
                                </div>
                                    <div class="col-md-6" style="text-align: right">
                                    <button type="submit" style="margin-top: 10px;" class="btn btn-primary"> Send</button>
                                </div>
                                </div>
                            </form>
                        </div>

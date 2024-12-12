@if ($data->status != 'DIAJUKAN' && $data->status != 'TERKIRIM')
<h4 class="page-title">Pesan Masuk</h4>
<div class="container">
    <div class="panel messages-panel">
        <div class="tab-content">
            <div class="tab-pane message-body active" id="inbox-message-1">
                <div class="new-message-wrapper">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Send message to...">
                        <a class="btn btn-danger close-new-message" href="#"><i class="fa fa-times"></i></a>
                    </div>
                    <div class="chat-footer new-message-textarea">
                        <textarea class="send-message-text"></textarea>
                        <label class="upload-file">
                            <input type="file" required="">
                            <i class="fa fa-paperclip"></i>
                        </label>
                        <button type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>
                    </div>
                </div>
            </div>
            <div class="message-chat">
                <div class="chat-body">
                    <div class="message info">
                        <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                        <div class="message-body">
                            <div class="message-info">
                                <h4> {{ $data->users->name }} </h4>
                                <h5> <i class="fa fa-clock-o"></i> 2:25 PM </h5>
                            </div>
                            <hr>
                            <div class="message-text">
                                {{ $data->detailissue }}
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="message my-message">
                        <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                        <div class="message-body">
                            <div class="message-body-inner">
                                <div class="message-info">
                                    <h4> Dennis Novac </h4>
                                    <h5> <i class="fa fa-clock-o"></i> 2:28 PM </h5>
                                </div>
                                <hr>
                                <div class="message-text">
                                    Thanks, I think I will use this for my next dashboard system.
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="chat-footer">
                    <textarea class="send-message-text"></textarea>
                    <label class="upload-file">
                        <input type="file" required="">
                        <i class="fa fa-paperclip"></i>
                    </label>
                    <button type="button" class="send-message-button btn-info"> <i class="fas fa-paper-plane"></i> </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
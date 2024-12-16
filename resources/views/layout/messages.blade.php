@include('css/message/message')
<style>
    .tab-content .messages .file-gmail p {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        color: #333;
        font-weight: thin;
    }

    .tab-content .messages .file-gmail {
        display: flex;
        width: auto;
        margin: 5px 0px;
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 5px 10px;
    }

    .tab-content .messages span,
    .tab-content .messages p {
        font-size: 14px;
    }

    .tab-content .messages .file-gmail .logo-container {
        display: flex;
        align-items: center;
        width: 35px;
    }

    .tab-content .messages .file-gmail .filename-container {
        display: flex;
        margin-left: -15px;
        justify-content: end;
        width: auto;
    }

    .tab-content .messages .title-container {
        font-size: 14px;
    }

    .tab-content .messages .date-container span {
        font-size: 11px;
    }

    .tab-content .messages .title-container .from {
        font-weight: bold;
    }

    #uploaded-file-container div {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px 10px;
        background-color: #f9f9f9;
        font-family: 'Poppins', sans-serif;
    }

    #uploaded-file-container i {
        font-size: 18px;
    }

    .tab-content .messages .file-container {
        display: flex;
        flex-direction: row;
    }

    .tab-content .messages .file-container>div {
        margin-right: 10px;
    }

</style>
<div class="email-app mb-4">
    <main class="inbox">
        @php
        $user = '';
        if (auth()->user()->level == '3') {
        $user = 'pic';
        } elseif (auth()->user()->level == '4') {
        $user = 'user';
        }
        @endphp
        <form action="{{ url("$user/message_store/" . $data->id) }}" method="post">
            @csrf
            <div class="message-tools">
                <div class="btn-group">
                    <button type="button" class="btn btn-light active" id="conversation-btn" onclick="setActiveTab('conversation')">
                        <span class="fa fa-comments"></span> Conversation
                    </button>
                    <button type="button" class="btn btn-light" id="attachments-btn" onclick="setActiveTab('attachments')">
                        <span class="fa fa-paperclip"></span> Attachments
                    </button>
                </div>
            </div>
            <div class="message-input">
                <div class="input-wrapper">
                    <textarea name="message" placeholder="Tulis Sesuatu disini ..."></textarea>
                    <label for="file-upload" class="attach-icon">
                        <i class="fas fa-paperclip"></i>
                    </label>
                    <input type="file" id="file-upload" accept=".pdf, .jpg, .jpeg, .png" style="display: none;" onchange="uploadFile(event)">
                </div>
                <div id="uploaded-file-container" style="margin-top: 10px; font-size: 14px; color: #666;">
                </div>
                <button type="submit" class="btn btn-info">Kirim</button>
            </div>
        </form>
        <div id="conversation" class="tab-content">
            <ul class="messages">
                @foreach ($collection as $item)
                <li class="message unread" style="cursor: default;">
                    <div class="message-container">
                        <div class="profile-picture">
                            <img src="{{ url('/back-end/assets/img/' . $item->user_from->image ?? 'default.jpg') }}" alt="Profile Picture" class="profile-img">
                        </div>
                        <div class="message-content">
                            <div class="header">
                            </div>
                            <div class="title-container">
                                <span class="from">{{ $item->user_from->name }} :</span>
                                <br>
                                <span class="dear">Dear {{ $item->user_to->name }},</span>
                            </div>
                            <div class="description">
                                <p>
                                    {!! nl2br(e($item->message)) !!}
                                </p>
                            </div>
                            <div class="FOOTER">
                                <span class="signature-container">Regards,</span>
                            </div>
                            <div>
                                <span class="name">{{ $item->user_from->name }}</span>
                            </div>
                            <div class="date-container">
                                <span> Reply : {{ $item->created_at->format('l, d F Y H:i') }}</span>
                            </div>
                            <div class="file-container" style="cursor: pointer;">
                                @php
                                $data = \App\Models\Document::where('idmessage', $item->id)->get();
                                @endphp
                                @foreach ($data as $itemofitem)
                                <div class="file-gmail">
                                    <div class="logo-container">
                                        <i class="fas fa-file" style="font-size: 15px; color: #666;"></i>
                                    </div>
                                    <div class="filename-container">
                                        <p>
                                            {{ $itemofitem->documentname ?? 'Tidak ada nama file' }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div id="attachments" class="tab-content" style="display: none;">
            <div class="attachments">
                <div class="attachment-item">
                    <a href="path_to_file_1.pdf" target="_blank">
                        <i class="fas fa-file-pdf" style="font-size: 30px; color: rgb(255, 0, 0);"></i>
                    </a>
                    <p><a href="path_to_file_1.pdf" target="_blank">File1.pdf</a></p>
                </div>
                <div class="attachment-item">
                    <a href="path_to_image2.jpg" target="_blank">
                        <i class="fas fa-image" style="font-size: 30px; color: rgb(62, 84, 197);"></i>
                    </a>
                    <p><a href="path_to_image2.jpg" target="_blank">Image2.jpg</a></p>
                </div>
            </div>
        </div>

    </main>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script>
    function setActiveTab(tabName) {
        if (tabName === 'conversation') {
            document.getElementById('conversation').style.display = 'block';
            document.getElementById('attachments').style.display = 'none';
            document.getElementById('conversation-btn').classList.add('active');
            document.getElementById('attachments-btn').classList.remove('active');
        } else {
            document.getElementById('conversation').style.display = 'none';
            document.getElementById('attachments').style.display = 'block';
            document.getElementById('attachments-btn').classList.add('active');
            document.getElementById('conversation-btn').classList.remove('active');
        }
    }
    document.querySelectorAll('.attachment-item a').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            window.open(this.href, '_blank');
        });
    });

    function setActiveTab(tabName) {
        if (tabName === 'conversation') {
            document.getElementById('conversation').style.display = 'block';
            document.getElementById('attachments').style.display = 'none';
            document.getElementById('conversation-btn').classList.add('active');
            document.getElementById('attachments-btn').classList.remove('active');
            document.querySelector('.message-input').style.display = 'flex';
        } else {
            document.getElementById('conversation').style.display = 'none';
            document.getElementById('attachments').style.display = 'block';
            document.getElementById('attachments-btn').classList.add('active');
            document.getElementById('conversation-btn').classList.remove('active');
            document.querySelector('.message-input').style.display = 'none';
        }
    }
    document.querySelectorAll('.attachment-item a').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            window.open(this.href, '_blank');
        });
    });

    // function uploadFile(event) {
    //     const fileName = event.target.files[0].name;
    //     console.log("File yang dipilih: " + fileName);
    // }

    function uploadFile(event) {
        const fileInput = event.target;
        const fileName = fileInput.files[0].name;

        const uploadedFileContainer = document.getElementById('uploaded-file-container');
        uploadedFileContainer.innerHTML = `
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-file" style="color: #333;"></i>
            <span>${fileName}</span>
        </div>
    `;
    }

</script>
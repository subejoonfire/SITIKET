@include('css/message/message')
<style>
    .tab-content .messages .file-gmail p {
        font-family: 'lato', 'sans-serif';
    }

    .tab-content .messages .file-gmail {
        display: flex;
        align-items: center;
        width: auto;
        margin-top: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding-top: 5px;
        padding-bottom: 5px;
        /* box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) */
    }

    .tab-content .messages .file-gmail .logo-container {
        display: flex;
        align-items: center;
        justify-content: center;
        /* background: green; */
        width: 20%;
    }

    .tab-content .messages .file-gmail .filename-container {
        width: auto;
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
                    <button type="button" class="btn btn-light active" id="conversation-btn"
                        onclick="setActiveTab('conversation')">
                        <span class="fa fa-comments"></span> Conversation
                    </button>
                    <button type="button" class="btn btn-light" id="attachments-btn"
                        onclick="setActiveTab('attachments')">
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
                    <input type="file" id="file-upload" accept=".pdf" style="display: none;"
                        onchange="uploadFile(event)">
                </div>
                <button type="submit" class="btn btn-info">Kirim</button>
            </div>
        </form>
        <div id="conversation" class="tab-content">
            <ul class="messages">
                @foreach ($collection as $item)
                    <li class="message unread">
                        <div class="message-container">
                            <div class="profile-picture">
                                <img src="{{ url('/back-end/assets/img/' . $item->user_from->image ?? 'default.jpg') }}"
                                    alt="Profile Picture" class="profile-img">
                            </div>
                            <div class="message-content">
                                <div class="header" style="font-size: 17px;">
                                    <span class="from">{{ $item->user_from->name }}</span>
                                </div>
                                <div class="title">
                                    Dear {{ $item->user_to->name }},
                                </div>
                                <div class="description" style="font-size: 14px;">
                                    {!! nl2br(e($item->message)) !!}
                                </div>
                                <div class="file-gmail">
                                    <div style="margin-right: 8px;" class="logo-container">
                                        @if (Str::endsWith($item->file_name, ['.jpg', '.jpeg', '.png', '.gif']))
                                            <i class="fas fa-image" style="font-size: 18px; color: #4caf50; font-weight: normal; font-family: 'Poppins', sans-serif;"></i>
                                        @elseif (Str::endsWith($item->file_name, ['.pdf']))
                                            <i class="fas fa-file-pdf" style="font-size: 18px; color: #e53935; font-weight: normal; font-family: 'Poppins', sans-serif;"></i>
                                        @else
                                            <i class="fas fa-file-pdf" style="font-size: 18px; color: #3f51b5;"></i>
                                        @endif
                                    </div>
                                    <div class="filename-container">
                                        <p style="margin: 0; font-weight: bold; color: #333; font-weight: normal; font-family: 'Poppins', sans-serif;">
                                            {{ $item->file_name ?? 'Kurdick OTW IMO' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="FOOTER">
                                    <span class="signature">Regards,</span><br />
                                </div>
                                <div>
                                    <span class="name">{{ $item->user_from->name }}</span>
                                </div>
                                <div class="fa fa-paper-clip" style="font-size: 14px;"> {{ $item->created_at->format('l, d F Y H:i') }}</div>
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
                        <!-- Ikon Foto -->
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

    function uploadFile(event) {
        const fileName = event.target.files[0].name;
        console.log("File yang dipilih: " + fileName);
    }
</script>

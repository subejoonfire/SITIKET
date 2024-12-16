@include('css/message/message')
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
        <form action="{{ url("$user/message_store/" . $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="message-tools">
                <div class="btn-group">
                    <button type="button" class="btn btn-light active" id="conversation-btn" onclick="setActiveTab('conversation')">
                        <span class="fa fa-comments"></span> Percakapan
                    </button>
                    <button type="button" class="btn btn-light" id="attachments-btn" onclick="setActiveTab('attachments')">
                        <span class="fa fa-paperclip"></span> Dokumen
                    </button>
                </div>
            </div>
            <div class="message-input">
                <div class="input-wrapper">
                    <textarea name="message" placeholder="Tulis Sesuatu disini ..."></textarea>
                    <label for="file-upload" class="attach-icon">
                        <i class="fas fa-paperclip"></i>
                    </label>
                    <input type="file" name="documentname[]" id="file-upload" accept=".pdf, .jpg, .jpeg, .png" style="display: none;" multiple onchange="uploadFiles(event)">
                </div>
                <div id="uploaded-file-container" style="margin-top: 10px; font-size: 14px; color: #666;"></div>
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
                            <div class="file-container">
                                @foreach($item->documents as $key => $value)
                                <a href="{{ url('storage/'. $value->path_documentname) }}" class="file-gmail">
                                    <div class="logo-container">
                                        <i class="fas fa-file" style="font-size: 15px; color: #666;"></i>
                                    </div>
                                    <div class="filename-container">
                                        <p>
                                            {{ Str::limit($value->documentname ?? 'Tidak ada nama file', 20) }}
                                        </p>
                                    </div>
                                </a>
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
                @foreach ($documents as $item)
                <a href="{{ url('storage/'. $item->path_documentname) }}" class="attachment-item">
                    <i class="fas fa-file-pdf" style="font-size: 30px;"></i>
                    <p style="text-decoration: none;">{{ Str::limit($item->documentname ?? 'Tidak ada nama file', 20) }}</p>
                </a>
                @endforeach
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

    function uploadFiles(event) {
        const fileInput = event.target;
        const files = fileInput.files;
        const uploadedFileContainer = document.getElementById('uploaded-file-container');

        uploadedFileContainer.innerHTML = ''; // Clear existing file display
        for (let i = 0; i < files.length; i++) {
            const fileName = files[i].name;
            uploadedFileContainer.innerHTML += `
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-file" style="color: #333;"></i>
                <span>${fileName}</span>
            </div>
        `;
        }
    }

</script>

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
        <form action="{{ url('message_store', ['id' => $data->tickets->id]) }}" method="post" enctype="multipart/form-data">
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
                    <input type="file" name="documentname[]" id="file-upload" accept=".pdf, .jpg, .jpeg, .png" style="display: none;" onchange="uploadFiles(event)">
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
                            <img src="{{ url('/storage/profiles/' . ($item->user_from->image == '' ? 'default.jpg' : $item->user_from->image)) }}" alt="Profile Picture" class="profile-img">
                        </div>
                        <div class="message-content">
                            <div class="header">
                            </div>
                            <div class="title-container">
                                <span class="from">{{ $item->user_from->name }} :</span>
                                <br>
                                @if ($item->user_to->level == 3)
                                <span class="dear">Dear {{ $data->pics->map(fn($item) => $item->users->name)->implode(', ') }}</span>
                                @else
                                <span class="dear">Dear {{ $item->user_to->name }},</span>
                                @endif
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
                                @foreach($item->documents as $document)
                                <a href="{{ url('storage/'. $document->path_documentname) }}" class="file-gmail">
                                    <div class="logo-container">
                                        <i class="fas fa-file" style="font-size: 15px; color: #666;"></i>
                                    </div>
                                    <div class="filename-container">
                                        <p>
                                            {{ Str::limit($document->documentname ?? 'Tidak ada nama file', 20) }}
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

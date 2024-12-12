{{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"> --}}
<style>
    .active {
        background-color: #0056b3;
        color: white;
    }

    .attachments {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .attachment-item {
        background-color: #f1f1f1;
        padding: 10px;
        border-radius: 5px;
    }

    .attachment-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
    </style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="email-app mb-4">
    <main class="inbox">
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
            <textarea placeholder="Post something here..."></textarea>
            <button type="button" class="btn btn-primary">Send</button>
        </div>

        <div id="conversation" class="tab-content">
            <ul class="messages">
                <li class="message unread">
                    <div class="message-container">
                        <div class="profile-picture">
                            <img src="{{ url('/images/logo/gkt.jpg') }}" alt="Profile Picture" class="profile-img">
                        </div>
                        <div class="message-content">
                            <div class="header">
                                <span class="from">Ferdi Electric Team</span>
                            </div>
                            <div class="title">
                                Dear SAP,
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                            <br>
                            <div class="FOOTER">
                                <span class="signature">Regards,</span><br />
                            </div>
                            <div>  
                                <span class="name">Eclectic Support Team</span>
                            </div>
                            <div class="fa fa-paper-clip"> Today, 3:47 PM</div>
                        </div>
                    </div>
                </li>

                <li class="message unread">
                    <div class="message-container">
                        <div class="profile-picture">
                            <img src="{{ url('/images/logo/gkt.jpg') }}" alt="Profile Picture" class="profile-img">
                        </div>
                        <div class="message-content">
                            <div class="header">
                                <span class="from">Rizky Budi</span>
                            </div>
                            <div class="title">
                                Dear Electric Team,
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                            <br>
                            <div class="FOOTER">
                                <span class="signature">Regards,</span><br />
                            </div>
                            <div>  
                                <span class="name">Jhonlin Support Team</span>
                            </div>
                            <div class="fa fa-paper-clip"> Today, 3:47 PM</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div id="attachments" class="tab-content" style="display: none;">
            <div class="attachments">
                <!-- File PDF dengan ikon -->
                <div class="attachment-item">
                    <a href="path_to_file_1.pdf" target="_blank">
                        <i class="fas fa-file-pdf" style="font-size: 30px; color: red;"></i>
                    </a>
                    <p><a href="path_to_file_1.pdf" target="_blank">File1.pdf</a></p>
                </div>
                <div class="attachment-item">
                    <a href="path_to_image2.jpg" target="_blank">
                        <i class="fas fa-image" style="font-size: 30px; color: green;"></i> <!-- Ikon Foto -->
                    </a>
                    <p><a href="path_to_image2.jpg" target="_blank">Image2.jpg</a></p>
                </div>
            </div>
        </div>
        
    </main>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>

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
</script>
</body>
</html>
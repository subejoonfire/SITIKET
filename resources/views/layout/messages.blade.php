{{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"> --}}
   
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">



<style>/* Styling the message header */
    .message-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    
    /* Styling the content section */
    .message-content {
        margin-bottom: 20px;
    }
    
    /* Styling the toolbar buttons */
    .toolbar-buttons {
        display: flex;
        gap: 10px;
    }
    
    .toolbar-buttons button {
        display: flex;
        align-items: center;
        padding: 5px 10px;
    }
    
    /* Styling the textarea and send button */
    .message-input {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
    }
    
    .message-input textarea {
        flex-grow: 1;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        resize: vertical;
        min-height: 50px;
    }
    
    .message-input button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .message-input button:hover {
        background-color: #0056b3;
    }

    /* dibawha ini css profile */

      .message-container {
        display: flex;
        align-items: flex-start;
    }

    .profile-picture {
        margin-right: 15px; /* Jarak antara gambar dan konten pesan */
    }

    .profile-img {
        width: 50px; /* Atur ukuran gambar sesuai keinginan */
        height: 50px;
        border-radius: 50%; /* Membuat gambar bulat */
        object-fit: cover;
    }

    .message-content {
        max-width: 90%; /* Membatasi lebar konten pesan */
    }

    .header {
        font-weight: bold;
    }

    .title {
        font-size: 18px;
        margin-top: 5px;
    }

    .description {
        margin-top: 10px;
        font-size: 14px;
    }

    .signature {
        font-style: italic;
    }
    </style>
<div class="email-app mb-4">
    <main class="inbox">
        <div class="message-tools">
            <div class="btn-group">
                {{-- <button type="button" class="btn btn-light" data-toggle="dropdown">
                    <span class="fa fa-comments"></span> Conversation
                </button> --}}
                <button type="button" class="btn btn-light">
                    <span class="fa fa-paperclip"></span> Attachments
                </button>
                <button type="button" class="btn btn-light">
                    <span class="fa fa-info-circle"></span> Details
                </button>
            </div>
        </div>
        
        <div class="message-input">
            <textarea placeholder="Post something here..."></textarea>
            <button type="button" class="btn btn-primary">Send</button>
        </div>
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
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
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
         

            <ul class="message unread">    
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
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                    <br>
                    <div class="FOOTER">
                        <span class="signature">Regards,</span><br />
                    </div>
                    <div>  
                        <span class="name">Jhonlin Support Team</span>
                    </div>
                    <div class="fa fa-paper-clip"></span> Today, 3:47 PM</div>
                </div>
                </div>
            </li>



        </ul>
    </main>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
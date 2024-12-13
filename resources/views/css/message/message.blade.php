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

    .message-input {
        display: flex;
        align-items: center;
        width: 100%;
        gap: 10px;
        position: relative;
    }

    .input-wrapper {
        position: relative;
        flex-grow: 1;
    }

    textarea {
        width: 100%;
        height: 100px;
        padding-right: 35px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: none;
    }

    .attach-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #0056b3;
    }

    .attach-icon i {
        font-size: 20px;
    }

    button.send-btn {
        padding: 10px 20px;
        background-color: #0056b3;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button.send-btn:hover {
        background-color: #00409e;
    }

</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
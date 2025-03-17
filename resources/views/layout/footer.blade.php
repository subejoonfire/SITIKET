<script src="{{ asset('back-end/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/moment/moment.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/gmaps/gmaps.js') }}"></script>
<script src="{{ asset('back-end/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/ready.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/setting-demo.js') }}"></script>
<script src="{{ asset('back-end/assets/js/demo.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
        $('#multi-filter-select').DataTable({
            "pageLength": 5
            , initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
            }
        });

        $('#add-row').DataTable({
            "pageLength": 5
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val()
                , $("#addPosition").val()
                , $("#addOffice").val()
                , action
            ]);
            $('#addRowModal').modal('hide');
        });
    });
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('mouseenter', () => {
            const dropdown = item.querySelector('.dropdown-menu');
            if (dropdown) {
                dropdown.style.display = 'block';
                setTimeout(() => {
                    dropdown.style.opacity = '1';
                }, 10);
            }
        });
        item.addEventListener('mouseleave', () => {
            const dropdown = item.querySelector('.dropdown-menu');
            if (dropdown) {
                dropdown.style.opacity = '0';
                setTimeout(() => {
                    dropdown.style.display = 'none';
                }, 300);
            }
        });
    });

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

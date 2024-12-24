<script src="{{ url('back-end/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/core/popper.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/moment/moment.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/gmaps/gmaps.js') }}"></script>
<script src="{{ url('back-end/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/ready.min.js') }}"></script>
<script src="{{ url('back-end/assets/js/setting-demo.js') }}"></script>
<script src="{{ url('back-end/assets/js/demo.js') }}"></script>
<script>
    function initializeDataTable(selector, options) {
        $(selector).DataTable(options);
    }
    $(document).ready(function() {
        initializeDataTable('#basic-datatables', {});
        initializeDataTable('#multi-filter-select', {
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
                    column.data().unique().sort().each(function(d) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
            }
        });
        initializeDataTable('#add-row', {
            "pageLength": 5
        });
        var action = '<td><div class="form-button-action"><button type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" title="Edit Task"><i class="fa fa-edit"></i></button><button type="button" data-toggle="tooltip" class="btn btn-link btn-danger" title="Remove"><i class="fa fa-times"></i></button></div></td>';
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
    WebFont.load({
        google: {
            "families": ["Open+Sans:300,400,600,700"]
        }
        , custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"]
            , "urls": ["back-end/assets/css/fonts.css"]
        }
        , active: function() {
            sessionStorage.fonts = true;
        }
    });

</script>

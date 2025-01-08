@extends('layout.main')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tiket</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Semua Tiket</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Tiket</th>
                                            <th>Nama Pelapor</th>
                                            <th>Module</th>
                                            <th>Status</th>
                                            <th>Masalah</th>
                                            <th>Tanggal Diajukan</th>
                                            <th style="width: 10%" data-orderable="false">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tickets->ticketcode }}</td>
                                            <td>{{ $item->users->name }}</td>
                                            <td>{{ $item->tickets->modules->modulename }}</td>
                                            <td>{{ $item->tickets->status }}</td>
                                            <td>{{ $item->tickets->issue }}</td>
                                            <td>{{ $item->tickets->created_at->format('l, d F Y H:i') }}</td>
                                            <td>
                                                <div class="btn-review">
                                                    <a href="{{ url('pic/ticket/review/index/'. $item->tickets->id)}}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </a>
                                                    @if ($item->tickets->messages->where('iduser_to', auth()->user()->id)->where('read_pic', false)->count() > 0)
                                                    <span class="notification-badge">
                                                        {{ $item->tickets->messages->where('iduser_to', auth()->user()->id)->where('read_pic', false)->count() }}
                                                    </span>
                                                    @else
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
<script>
    var pusher = new Pusher("fkvo02hvlofirqbq1wkf", {
        cluster: ""
        , enabledTransports: ['ws']
        , forceTLS: false
        , wsHost: "127.0.0.1"
        , wsPort: "8080"
    });
    var channel = pusher.subscribe("pic-channel");
    channel.bind("App\\Events\\TicketEvent", (data) => {
        let tableBid = document.getElementById('table-bid').getElementsByTagName('tbody')[0];
        var row = tableBid.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        cell1.innerHTML = tableBid.rows.length;
        cell2.innerHTML = data.ticketcode; // Accessing the data directly
        cell3.innerHTML = data.name;
        cell4.innerHTML = data.module;
        cell5.innerHTML = data.status;
        cell6.innerHTML = data.issue;
        cell7.innerHTML = new Date(data.created_at).toLocaleString();
        cell8.innerHTML = '<div class="btn-review"><a href="your_detail_url_here" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a></div>';
        console.log(data)
    });

</script>

@endsection

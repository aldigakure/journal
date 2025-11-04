@extends('authenticated.layouts.app')

@section('content')
    <h5 class="mb-3">Recent Orders</h5>
    <div class="card tbl-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless mb-0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>STATUS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (range(1, 7) as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>aldi</td>
                                <td>aldi@gmail.com</td>
                                <td>
                                    <span class="d-flex align-items-center gap-2"><i
                                            class="fas fa-circle text-warning f-10 m-r-5"></i>menunggu</span>
                                </td>
                                <td class="text-center"><button class="btn btn-primary">Setujui</button></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

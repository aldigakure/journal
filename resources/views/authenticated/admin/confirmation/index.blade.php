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
                        @foreach ($users as $index=> $user)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="d-flex align-items-center gap-2"><i
                                            class="fas fa-circle text-warning f-10 m-r-5"></i>menunggu</span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary"  data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal" type="button">Setujui</button>
                                   

                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmationModal" tabindex="-1"
                                        aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                              <form method="POST" action="{{ route('accept-teacher', $user->id) }}">
                                                @csrf
                                                  <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="confirmationModalLabel">Konfirmasi Guru</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Ingin Menerima?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tidak Yakin</button>
                                                    <button type="submit" class="btn btn-primary">Yakin</button>
                                                </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection

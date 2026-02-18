@extends('menu.navbar')

@section('content')

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="card">

            <h5 class="card-header">
                Tabel Data Dokter
            </h5>

            <div class="card-body">

                <div class="mb-3">
                    <a href="{{ route('Dokter.create') }}" class="btn btn-primary">
                        Create
                    </a>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered first">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Poli</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($Dokter as $s)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    @if($s->avatar)
                                    <img src="{{ asset('storage/'.$s->avatar) }}"
                                        style="width:60px;height:60px;object-fit:cover;border-radius:4px;">
                                    @else
                                    <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>

                                <td>{{ $s->name }}</td>
                                <td>{{ $s->email }}</td>
                                <td>{{ $s->nama_poli }}</td>
                                <td>{{ $s->status }}</td>

                                <td>

                                    <a href="{{ route('Dokter.edit',$s->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('Dokter.destroy',$s->id) }}"
                                        style="display:inline;">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus Dokter ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                            {{-- MODAL DETAIL --}}
                            <div class="modal fade" id="modalDokter{{ $s->id }}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Dokter</h5>
                                            <button class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body text-center">

                                            @if($s->avatar)
                                            <img src="{{ asset('storage/'.$s->avatar) }}"
                                                style="width:120px;height:120px;object-fit:cover;" class="rounded mb-3">
                                            @endif

                                            <p><strong>Nama:</strong> {{ $s->name }}</p>
                                            <p><strong>Email:</strong> {{ $s->email }}</p>
                                            <p><strong>Poli:</strong> {{ $s->nama_poli }}</p>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    Belum ada data dokter
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
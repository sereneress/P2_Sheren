@extends('menu.navbar')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <h5 class="card-header">Tabel Data Farmasi</h5>

            <div class="card-body">

                <a href="{{ route('Farmasi.create') }}" class="btn btn-primary mb-3">
                    Create
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($Farmasi as $s)
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
                                <td>{{ $s->status }}</td>

                                <td>
                                    <a href="{{ route('Farmasi.edit',$s->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('Farmasi.destroy',$s->id) }}"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus Farmasi ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data kosong</td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
@foreach($Farmasi as $s)
<div class="modal fade" id="modalFarmasi{{ $s->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Farmasi</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                @if($s->avatar)
                <img src="{{ asset('storage/'.$s->avatar) }}" style="width:120px;height:120px;object-fit:cover;"
                    class="rounded mb-3">
                @endif

                <p><strong>Nama:</strong> {{ $s->name }}</p>
                <p><strong>Email:</strong> {{ $s->email }}</p>
            </div>

        </div>
    </div>
</div>
@endforeach

@endsection
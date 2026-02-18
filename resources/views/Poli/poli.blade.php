@extends('menu/navbar')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Tabel Poli</h4>

                {{-- BUTTON CREATE --}}
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <a href="{{ route('Poli.create') }}" class="btn btn-primary">
                        Create
                    </a>
                </div>

                {{-- TABLE --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Poli</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($poli as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_poli }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <div class="d-flex gap-2 flex-wrap">

                                        {{-- EDIT --}}
                                        <a href="{{ url('Poli/create?id=' . $item->id) }}"
                                            class="btn btn-warning btn-sm text-white">
                                            Edit
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('Poli.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus poli ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Data kosong
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
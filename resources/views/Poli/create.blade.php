@extends('menu.navbar')

@section('content')
<div class="card">
    <div class="card-body">

        <h4>Tambah Poli Pesan</h4>

        <form action="{{ route('Poli.store') }}" method="POST">
            @csrf

            {{-- hidden id (dipakai saat edit) --}}
            <input type="hidden" name="id" value="{{ $poli['id'] ?? '' }}">

            <div class="mb-3">
                <label for="nama_poli">Nama Poli</label>
                <input type="text" name="nama_poli" class="form-control" value="{{ $poli['nama_poli'] ?? '' }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ isset($poli['id']) ? 'Update' : 'Simpan' }}
            </button>

        </form>

    </div>
</div>
@endsection
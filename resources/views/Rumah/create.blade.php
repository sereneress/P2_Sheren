@extends('menu.navbar')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Tambah Rumah Sakit (RS) </h4>

        <form action="{{ route('Rumah.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $rumah['id'] ?? '' }}">

            <div class="mb-3">
                <label for="nama_rumah">Rumah Sakit</label>
                <input type="text" name="nama_rumah" class="form-control" value="{{ $rumah['nama_rumah'] ?? '' }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ isset($rumah['id']) ? 'Update' : 'Simpan' }}
            </button>
        </form>

    </div>
</div>
@endsection
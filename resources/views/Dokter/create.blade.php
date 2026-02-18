@extends('menu.navbar')

@section('content')

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">

        <h5 class="card-header">
            {{ isset($Dokter) ? 'Edit Dokter' : 'Tambah Dokter' }}
        </h5>

        <div class="card-body">

            @if(isset($Dokter))
            <form action="{{ route('Dokter.update',$Dokter->id) }}" method="POST" enctype="multipart/form-data"
                data-parsley-validate="">
                @method('PUT')
                @else
                <form action="{{ route('Dokter.store') }}" method="POST" enctype="multipart/form-data"
                    data-parsley-validate="">
                    @endif

                    @csrf

                    {{-- Nama --}}
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" name="name" required class="form-control" value="{{ $Dokter->name ?? '' }}"
                            placeholder="Nama dokter">
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control"
                            value="{{ $Dokter->email ?? '' }}" placeholder="Email">
                    </div>

                    {{-- Poli --}}
                    <div class="form-group">
                        <label>Jenis Poli</label>
                        <select name="id_poli" class="form-control" required>

                            <option value="">-- pilih poli --</option>

                            @foreach($Poli as $j)
                            <option value="{{ $j->id }}"
                                {{ old('id_poli', $Dokter->id_poli ?? '') == $j->id ? 'selected' : '' }}>
                                {{ $j->nama_poli }} </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>

                            <option value="aktif" {{ old('status',$Dokter->status ?? '')=='aktif'?'selected':'' }}>
                                Aktif
                            </option>

                            <option value="nonaktif"
                                {{ old('status',$Dokter->status ?? '')=='nonaktif'?'selected':'' }}>
                                Nonaktif
                            </option>

                        </select>
                    </div>

                    {{-- Foto --}}
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="avatar" class="form-control">

                        @if(isset($Dokter) && $Dokter->avatar)
                        <img src="{{ asset('storage/'.$Dokter->avatar) }}" class="mt-2 rounded"
                            style="width:80px;height:80px;object-fit:cover">
                        @endif
                    </div>

                    {{-- Password hanya create --}}
                    @if(!isset($Dokter))
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control">
                    </div>
                    @endif

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('Dokter.dokter') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>

        </div>
    </div>
</div>

@endsection
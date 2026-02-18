@extends('menu.navbar')

@section('content')

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">

        <h5 class="card-header">
            {{ isset($Farmasi) ? 'Edit Farmasi' : 'Tambah Farmasi' }}
        </h5>

        <div class="card-body">

            <form action="{{ isset($Farmasi) ? route('Farmasi.update',$Farmasi->id) : route('Farmasi.store') }}"
                method="POST" enctype="multipart/form-data">

                @csrf
                @if(isset($Farmasi))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label>Nama Farmasi</label>
                    <input type="text" name="name" required class="form-control" value="{{ $Farmasi->name ?? '' }}"
                        placeholder="Nama farmasi">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required class="form-control" value="{{ $Farmasi->email ?? '' }}"
                        placeholder="Email">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>

                        <option value="aktif" {{ old('status',$Farmasi->status ?? '')=='aktif'?'selected':'' }}>
                            Aktif
                        </option>

                        <option value="nonaktif" {{ old('status',$Farmasi->status ?? '')=='nonaktif'?'selected':'' }}>
                            Nonaktif
                        </option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="avatar" class="form-control">

                    @if(isset($Farmasi) && $Farmasi->avatar)
                    <img src="{{ asset('storage/'.$Farmasi->avatar) }}" class="mt-2 rounded"
                        style="width:80px;height:80px;object-fit:cover">
                    @endif
                </div>

                @if(!isset($Farmasi))
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required class="form-control">
                </div>
                @endif

                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('Farmasi.farmasi') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
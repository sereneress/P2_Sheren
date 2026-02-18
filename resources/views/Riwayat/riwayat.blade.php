@extends('menu/navbar')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Riwayat Berobat Pasien</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pasien</th>
                                <th>Tanggal</th>
                                <th>Keluhan</th>
                                <th>Status Kunjungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($riwayat as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->kode_pasien }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->keluhan }}</td>
                                <td>{{ $item->status_kunjungan }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm"
                                        onclick="showDetail('{{ $item->kode_pasien }}')">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">
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

{{-- MODAL DETAIL --}}
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Riwayat Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td id="nama"></td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td id="umur"></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td id="alamat"></td>
                    </tr>
                    <tr>
                        <th>Kelurahan</th>
                        <td id="kelurahan"></td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td id="kecamatan"></td>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <td id="provinsi"></td>
                    </tr>
                    <tr>
                        <th>Kode Pos</th>
                        <td id="kode_pos"></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
function showDetail(kode_pasien) {
    fetch(`/Riwayat/detail/${kode_pasien}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('nama').innerText = data.nama ?? '-';
            document.getElementById('umur').innerText = data.umur ?? '-';
            document.getElementById('alamat').innerText = data.alamat ?? '-';
            document.getElementById('kelurahan').innerText = data.kelurahan ?? '-';
            document.getElementById('kecamatan').innerText = data.kecamatan ?? '-';
            document.getElementById('provinsi').innerText = data.provinsi ?? '-';
            document.getElementById('kode_pos').innerText = data.kode_pos ?? '-';

            new bootstrap.Modal(document.getElementById('detailModal')).show();
        });
}
</script>

@endsection
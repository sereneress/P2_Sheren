@extends('auth.auth')
@section('form')
<div class="container">

    <div class="form-section">
        <h2>Data Surat Lamaran</h2>

        <div class="step">
            <div class="kota">
                <label>Kota & Tanggal</label>
                <input type="text" id="kt" />
            </div>

            <div class="step">
                <label>Subject & Alamat</label>
                <textarea id="sa"></textarea>

                <label>Paragraph 1 (Pembuka) </label>
                <textarea id="paragraph1"></textarea>
            </div>

            <div class="step">
                <label>Paragraph 2 (Isi) </label>
                <textarea id="paragraph2"></textarea>

                <label>Paragraph 3 (Penutup) </label>
                <textarea id="paragraph3"></textarea>

                <hiden id="sincelery"></hiden>

                <label>Nama Penulis</label>
                <input type="text" id="nama" />
            </div>

            <div class="actions">
                <button onclick="prevStep()">Save</button> <!-- onclick="prevStep() memanggil fungsi prevstep -->
                <button class="primary" onclick="window.print()">Print PDF</button> <!--onclick="window.print()" memunculkan fungsi print dari objek window untuk mencetak halaman -->
                <button class="primary" id="nextBtn" onclick="nextStep()" disabled>Clear</button> <!-- onclick="nextStep() memanggil fungsi nextstep -->
            </div>
        </div>
    </div>

    <div class="preview-section">
        <h2>JOB APPLICATION LETTER</h2>
        <div class="preview-box" id="preview"></div>
        <br>
    </div>
</div>
@endsection
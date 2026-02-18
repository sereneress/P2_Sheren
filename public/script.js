const fields = {//ini untuk menyimpan input form agar lebih rapi dan gampang dipanggil
  kt: document.getElementById('kt'), //ini mengambil elemen HTML yang punya id="sa"
  sa: document.getElementById('sa'), //ini mengambil elemen HTML yang punya id="sa"
  paragraph1: document.getElementById('paragraph1'),//ini mengambil elemen HTML yang punya id="paragraph1"
  paragraph2: document.getElementById('paragraph2'),//ini mengambil elemen HTML yang punya id="paragraph2"
  paragraph3: document.getElementById('paragraph3'),//ini mengambil elemen HTML yang punya id="paragraph3"
  sincelery: document.getElementById('sincelery'),//ini mengambil elemen HTML yang punya id="sincelery"
  nama: document.getElementById('nama'),//ini mengambil elemen HTML yang punya id="nama"
};

const save = document.getElementById('save'); //ini mengambil elemen HTML yang punya id="save"
const nextBtn = document.getElementById('nextBtn'); //ini mengambil elemen HTML yang punya id="nextBtn"


function nl2br(text) {
  return text ? text.replace(/\n/g, '<br>') : '';
}

function updatePreview() {
  preview.innerHTML = `
    <div class="preview-kota-tanggal">
      ${fields.kt.value || 'City, Date'}
    </div>
    <p><strong>Subject: </strong> ${fields.sa.value || ''}</p> 
    <br>
    <div class="preview-paragraph">
      ${nl2br(fields.paragraph1.value || 
        'sheren alivia pembukaa slebew')}
    </div>
    <div class="preview-paragraph">
      ${nl2br(fields.paragraph2.value || 
        'anciss ini isi dari paragraph kedua slebew dmnwRIBGF WROIBGFPIWRNFIW RBGFOU  WRBFUOEwbciewbco  wu8vgfUEWBFCOQEUVBFO  GFQbcuovowgfiaerhgiahrb')}
    </div>
    <div class="preview-paragraph">
      ${nl2br(fields.paragraph3.value || 
        'anciss ini isi dari paragraph ketiga slebew')}
    </div>
    <br>
    <div class="preview-penutup">
      ${nl2br(fields.sincelery.value || 'Sincerely,')}<br><br>
      <strong>${fields.nama.value || 'Your Name'}</strong>
    </div>
  `;
}

function validateFlow() { 
  const isFilled =
    fields.kt.value.trim() ||
    fields.sa.value.trim() ||
    fields.paragraph1.value.trim() ||
    fields.paragraph2.value.trim() ||
    fields.paragraph3.value.trim();

  nextBtn.disabled = !isFilled;
}


function nextStep() { //clear form
  Object.values(fields).forEach(field => field.value = '');
  updatePreview();
  validateFlow();
}


//save data
function prevStep() {
  updatePreview();
}

   //live update
document.addEventListener('input', () => {
  updatePreview();
  validateFlow();
});
updatePreview();
validateFlow();
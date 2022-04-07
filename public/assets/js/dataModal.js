$(document).on("click", "#editAksesoris", function() {
  const id = $(this).data('id_aksesoris');
  const nama_aksesoris = $(this).data('nama_aksesoris');
  const deksripsi_aksesoris = $(this).data('deksripsi_aksesoris');
  const file = $(this).data('file_aksesoris');
  const baru = 'uploads/aksesoris/' + $(this).data('gambar');
  $('.modal-body #gambar').attr("src", baru);
  $(".modal-body #id_aksesoris").val(id);
  $(".modal-body #nama_aksesoris").val(nama_aksesoris);
  $(".modal-body #deksripsi_aksesoris").val(deksripsi_aksesoris);
  $(".modal-body #file_aksesoris").val(file);
});

$(document).on("click", "#editNews", function() {
  const id = $(this).data('id_berita');
  const judul = $(this).data('nama_berita');
  const deskripsi_berita = $(this).data('deskripsi_berita');
  const tanggal = $(this).data('tanggal_berita');
  const b = new Date(tanggal);
  const date = b.toISOString().slice(0,10) + 'T';
  const time = b.toTimeString().slice(0, 5);
  $(".modal-body #id_berita").val(id);
  $(".modal-body #nama_berita").val(judul);
  $(".modal-body #deskripsi_berita").val(deskripsi_berita);
  $(".modal-body #tanggal_berita").val(date + time);
});

$(document).on("click", "#Silsilah", function() {
  const id = $(this).data('id_sapi');
  const nama_sapi = $(this).data('nama_sapi');
  $(".modal-body #id_sapi").val(id);
  $(".modal-body #silsilah_nama_sapi").html(nama_sapi);
});

$(document).on("click", "#editSapi", function() {
  const id = $(this).data('edit_id_sapi');
  const nama_sapi = $(this).data('edit_nama_sapi');
  const jenis_kelamin = $(this).data('edit_jenis_kelamin');
  const tanggal_lahir = $(this).data('edit_tanggal_lahir');
  const status = $(this).data('edit_status_sapi');
  const tanggal_kepemilikan = $(this).data('edit_tanggal_kepemilikan');
  $(".modal-body #edit_id_sapi").val(id);
  $(".modal-body #edit_nama_sapi").val(nama_sapi);
  $(".modal-body .edit_jenis_kelamin").val(jenis_kelamin);
  $(".modal-body #edit_tanggal_lahir").val(tanggal_lahir);
  $(".modal-body #edit_status_sapi").val(status);
  $(".modal-body #edit_tanggal_kepemilikan").val(tanggal_kepemilikan);
  if (jenis_kelamin == '2') {
    $(".modal-body #betina").prop("checked", true);
  } else if (jenis_kelamin == '1') {
    $(".modal-body #jantan").prop("checked", true); 
  }
})

$(document).on("click", "#editPasangan", function(){
  const id = $(this).data('edit_id_pasangan');
  const nama_pasangan = $(this).data('edit_nama_pasangan');
  const nama_pasangan_kanan = $(this).data('edit_nama_sapi_kanan');
  const nama_pasangan_kiri = $(this).data('edit_nama_sapi_kiri');
  const id_pasangan_kanan = $(this).data('edit_id_pasangan_kanan');
  const id_pasangan_kiri = $(this).data('edit_id_pasangan_kiri');
  $(".modal-body #edit_id_pasangan").val(id);
  $(".modal-body #edit_nama_pasangan").val(nama_pasangan);
  $(".modal-body #edit_nama_pasangan_kanan").val(nama_pasangan_kanan);
  $(".modal-body #edit_nama_pasangan_kiri").val(nama_pasangan_kiri);
  $(".modal-body #edit_id_pasangan_kanan").val(id_pasangan_kanan);
  $(".modal-body #edit_id_pasangan_kiri").val(id_pasangan_kiri);
})

$(document).on("click", "#edit_data_prestasi", function(){
  const id = $(this).data('edit_id_prestasi');
  const nama_pasangan = $(this).data('edit_nama_pasangan');
  const prestasi = $(this).data('edit_nama_prestasi');
  const tahun = $(this).data('edit_tahun_prestasi');
  const file = $(this).data('edit_file_prestasi');
  $(".modal-body #edit_id_prestasi").val(id);
  $(".modal-body #edit_nama_pasangan").val(nama_pasangan);
  $(".modal-body #edit_nama_prestasi").val(prestasi);
  $(".modal-body #edit_tahun_prestasi").val(tahun);
  $(".modal-body #edit_file_prestasi").val(file);
})

$(document).on("click", "#updatePenawaran", function(){
  const id = $(this).data('id_penawaran');
  const edit_pasangan = $(this).data('edit_pasangan');
  const status = $(this).data('status');
  const nominal = $(this).data('nominal');
  const file = $(this).data('file_aksesoris');
  const baru = 'uploads/penawaran/foto_' + $(this).data('gambar');
  $('.modal-body #gambar').attr("src", baru);
  $(".modal-body #id_penawaran").val(id);
  $(".modal-body #edit_pasangan").val(edit_pasangan);
  $(".modal-body #status").val(status);
  $(".modal-body #nominal").val(nominal);
  $(".modal-body #file_prestasi").val(file);
})
function previewImg() {
  let changeImage = URL.createObjectURL(event.target.files[0]);
  $('.modal-body #gambar').attr("src", changeImage);
  console.log(hasil);
}
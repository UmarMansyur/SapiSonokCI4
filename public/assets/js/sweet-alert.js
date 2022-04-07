const swalUpdate = $('#swalUpdate').data('swal');
if (swalUpdate) {
  $('body').removeClass('timer-alert');
  swal(
    {
      title: 'Sukses!',
      text: 'Data Berhasil Diubah!',
      type: 'success',
      confirmButtonColor: '#57a94f'
    }
  )
}

const insertSwal = $('#swalInsert').data('swal');
if (insertSwal) {
  $('body').removeClass('timer-alert');
  swal(
    {
      title: 'Sukses!',
      text: 'Silsilah Berhasil ditambahkan!',
      type: 'success',
      confirmButtonColor: '#57a94f'
    }
  )
} 
$(document).on('click', '.delete', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');
  $('body').removeClass('timer-alert');
		swal({
		  title: "Apakah anda yakin menghapus data ini ?",
		  text: "Pilih Ok untuk menghapus",
		  type: "info",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true
		}, 
		function () {
      setTimeout(function () {
        document.location.href = href;
        swal({
          title: 'Berhasil!',
          text: 'Data Berhasil Dihapus!',
          type: 'success',
        });
		  }, 1000);
		});
});

$(document).on('click', '.hapus', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');
  $('body').removeClass('timer-alert');
		swal({
		  title: "Apakah anda yakin menghapus data ini ?",
		  text: "Pilih Ok untuk menghapus",
		  type: "info",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true
		}, 
		function () {
      setTimeout(function () {
        document.location.href = href;
		  });
		});
});


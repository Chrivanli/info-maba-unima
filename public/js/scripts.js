window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

$(function () {
  $(".pilih").change(function () {
    $("#myForm").submit();
  });
  //disable option  pada form select
  $("#kolom").change(function () {
    var selectedValue = $(this).val();
    if (selectedValue === "nama_fakultas") {
      $("#fakultas").prop("disabled", true);
    } else {
      $("#fakultas").prop("disabled", false);
    }
  });
  // Menaampilkan form Ubah Seleksi
  $(".tampilModalUbah").on("click", function () {
    const id = $(this).data("id");
    const url = $(this).data("url");
    $("#formModalLabel").html("Ubah Data Seleksi");
    $("#formModalAction").attr("action", url + "/action/ubah");
    $(".modal-footer button[type=submit]").html("Simpan Perubahan");
    // $(".modal-footer button[type=submit]").attr("hidden", "hidden");

    $.ajax({
      url: url + "/action/detail",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#kd_seleksi").val(data.kd_seleksi);
        $("#jalur").val(data.jalur);
        $("#nama_seleksi").val(data.nama_seleksi);
        $("#singkatan").val(data.singkatan);
      },
    });
  });

  // Menampilkan form Unggah Passed
  $(".modalUnggahPass").on("click", function () {
    const url = $(this).data("url");
    $("#importDataLabel").html("Unggah Berkas Lulus Seleksi");
    $("#formModalAction").attr("action", url + "/import/uploadDataPassed");
  });
  // Menampilkan form Unggah Regist
  $(".modalUnggahReg").on("click", function () {
    const url = $(this).data("url");
    $("#importDataLabel").html("Unggah Berkas Daftar Kembali");
    $("#formModalAction").attr("action", url + "/import/uploadDataRegist");
  });

  // Menampilkan form Hapus
  $(".modalHapus").on("click", function () {
    const id = $(this).data("id");
    const seleksi = $(this).data("seleksi");
    const title = $(this).data("title");
    $("#id").val(id);
    $("#seleksi").val(seleksi);
    $("#formHapusLabel").html("Hapus data " + title + " Tahun " + id);
  });
});

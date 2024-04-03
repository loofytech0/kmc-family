@extends("layouts.app-layout")
@section("patient", "active shadow-lg")

@push("css")
<link rel="stylesheet" href="{{ asset("datatables/datatables.min.css") }}">
@endpush

@section("content")
<div class="flex items-center mb-4">
  <span class="font-semibold w-[150px]">Pendaftaran Baru</span>
  <a href="{{ route("patient.new") }}" class="flex items-center gap-2 bg-white shadow-lg text-sm py-1 px-5 rounded-full">
    Daftar Pasien <img src="{{ asset("arrow-right.png") }}" class="mt-0.5" alt="">
  </a>
</div>
<table id="tables" class="patient-table">
  <thead>
    <tr>
      <th>NO</th>
      <th>Nama</th>
      <th>Usia</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>Pekerjaan</th>
      <th>Tanggal Pemeriksaan</th>
      <th>Aksi</th>
    </tr>
  </thead>
</table>
@endsection

@push("js")
<script src="{{ asset("js/jquery-3.7.1.min.js") }}"></script>
<script src="{{ asset("datatables/datatables.min.js") }}"></script>
<script>
  let table = $("#tables").DataTable({
    serverSide: true,
    processing: true,
    lengthChange: true,
    searching: true,
    info: true,
    order: [],
    pageLength: 10,
    lengthMenu: [10, 20, 50, 100],
    bSort: false,
    oLanguage: {
      sSearch: '<i class="fa fa-search" aria-hidden="true"></i>',
      oPaginate: {
        sPrevious: "Sebelumnya",
        sNext: "Selanjutnya",
      },
      sLengthMenu: "Menampilkan _MENU_Data",
      sZeroRecords: "Tidak menemukan data dengan keyword yang anda tulis"
    },
    // lengthMenu: "Menampilkan _MENU_ Data",
    // dom: `
    //     <'row'<'col-sm-6'<'flex items-center gap-2'>><'col-sm-6'f>>
    //     <'row'<'col-sm-12 my-3'tr>>
    //     <'flex items-center justify-between'<'col-sm-6'<'flex items-center gap-2'li>><'col-sm-6'p>>
    // `,
    dom: `
        <'flex justify-start'f>
        <'mt-10'l>
        <'row'<'col-sm-12 my-3'tr>>
        <'flex items-start justify-between'<'col-sm-6'<'flex items-center gap-2'i>><'col-sm-6'p>>
    `,
    ajax: {
        url: "{{ route('patient.data') }}",
        type: "GET",
        beforeSend: function() {},
        data: function(d) {},
        error: function(e) {},
        complete: function(response) {},
    },
    columns: [
      {"data": null, "sortable": false, render: function (data, type, row, meta) {
          return `
            <div class="text-center font-semibold">${meta.row + meta.settings._iDisplayStart + 1}</div>
          `;
      }},
      {data: "name", render: function (data, type, row, meta) {
        return `
          <div class="text-nowrap">${data}</div>
        `;
      }},
      {data: "birth_date", render: function (data, type, row, meta) {
        return `
          <div class="text-center text-nowrap">${getAge(data)} Tahun</div>
        `;
      }},
      {data: "gender", render: function (data, type, row, meta) {
        if (data == "L") {
          return `Laki - laki`
        } else {
          return `Perempuan`
        }
      }},
      {data: "address", render: function (data, type, row, meta) {
        return data.substr(0, 41) + "...";
      }},
      {data: "job", render: function (data, type, row, meta) {
        if (data == "tidak_bekerja") return "Tidak Bekerja";
        if (data == "pns") return "PNS";
        if (data == "tni_polri") return "TNI / POLRI";
        if (data == "bumn") return "BUMN";
        if (data == "pegawai_wirausaha") return "<div class='text-nowrap'>Pegawai Swasta / Wirausaha</div>";
        if (data == "pelajar_mahasiswa") return "Pelajar / Mahasiswa";
        if (data == "other") return "Lain - lain";
      }},
      {data: "uuid", render: function (data, type, row, meta) {
        return ``;
      }},
      {data: "uuid", render: function (data, type, row, meta) {
        return `
          <div class="flex justify-center">
            <a href="/dashboard/inspection/${data}" class="text-sm btn-checkin">
              Periksa
            </a>
          </div>
        `;
      }}
    ],
    fnInfoCallback: function( oSettings, iStart, iEnd, iMax, iTotal, sPre ) {
      if (iTotal != 0) {
        return `Menampilkan ${iStart} - ${iEnd} dari total ${iTotal} data`;
      }
      return `Tidak ada data tersedia di tabel`;
    },
  });

  $("#tables_filter").prepend("<span class='font-semibold' style='width: 150px'>Pencarian</span>");
</script>
@endpush
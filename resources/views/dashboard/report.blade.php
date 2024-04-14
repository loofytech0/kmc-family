@extends("layouts.app-layout")
@section("report", "active shadow-lg")

@push("css")
<link rel="stylesheet" href="{{ asset("datatables/datatables.min.css") }}">
@endpush

@section("content")
<table id="tables" class="patient-table">
  <thead>
    <tr>
      <th>NO</th>
      <th>Nama</th>
      <th>Usia</th>
      <th>Jenis Kelamin</th>
      {{-- <th>Alamat</th> --}}
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
    pageLength: 100,
    lengthMenu: [100, 300, 400, 500],
    bSort: false,
    oLanguage: {
      sSearch: '<i class="fa fa-search" aria-hidden="true"></i>',
      oPaginate: {
        sPrevious: "Sebelumnya",
        sNext: "Selanjutnya",
      },
      sLengthMenu: "Menampilkan _MENU_Data",
      sZeroRecords: "Tidak ada data yang ditemukan"
    },
    dom: `
        <'flex justify-start'f>
        <'mt-10'l>
        <'row'<'col-sm-12 my-3'tr>>
        <'flex items-start justify-between'<'col-sm-6'<'flex items-center gap-2'i>><'col-sm-6'p>>
    `,
    ajax: {
        url: "{{ route('report.data') }}",
        type: "GET",
        beforeSend: function() {},
        data: function(d) {},
        error: function(e) {},
        complete: function(response) {},
    },
    columns: [
      {"data": null, "sortable": false, render: function (data, type, row, meta) {
          return `
            <div class="text-center font-semibold patient-row" data-inspection="${row.inspection ? true : false}">${meta.row + meta.settings._iDisplayStart + 1}</div>
          `;
      }},
      {data: "patient", render: function (data, type, row, meta) {
        return `
          <div class="text-nowrap">${data.name}</div>
        `;
      }},
      {data: "patient", render: function (data, type, row, meta) {
        return `
          <div class="text-center text-nowrap">${getAge(data.birth_date)} Tahun</div>
        `;
      }},
      {data: "patient", render: function (data, type, row, meta) {
        if (data.gender == "L") {
          return `Laki - laki`
        } else {
          return `Perempuan`
        }
      }},
      // {data: "address", render: function (data, type, row, meta) {
      //   return data.substr(0, 41) + "...";
      // }},
      {data: "patient", render: function (data, type, row, meta) {
        if (data.job == "tidak_bekerja") return "Tidak Bekerja";
        if (data.job == "pns") return "PNS";
        if (data.job == "tni_polri") return "TNI / POLRI";
        if (data.job == "bumn") return "BUMN";
        if (data.job == "pegawai_wirausaha") return "<div class='text-nowrap'>Pegawai Swasta / Wirausaha</div>";
        if (data.job == "pelajar_mahasiswa") return "Pelajar / Mahasiswa";
        if (data.job == "other") return "Lain - lain";
      }},
      {data: "inspections_code", render: function (data, type, row, meta) {
        const date = new Date(row.created_at);
        const hour = date.getHours();
        const minute = date.getMinutes();
        return "JAM " + hour + ":" + minute;
      }},
      {data: "inspections_code", render: function (data, type, row, meta) {
        return `
          <div class="flex justify-center">
            <a href="/dashboard/report/${data}" target="_blank" class="text-black text-sm btn-checkin">
              Show Report
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
@extends("layouts.app-layout")
@section("patient", "active shadow-lg")

@section("content")
<div class="uppercase font-semibold text-center text-lg md:text-xl">identitas pasien</div>
<div class="mt-[50px] flex flex-col gap-[18px]">
  <div class="flex items-center">
    <div class="font-semibold text-lg w-[15%]">Nama</div>
    <div class="flex-1">
      <input type="text" id="name" class="shadow-sm bg-white border border-0 text-sm focus:ring-transparent focus:border-0 block w-full p-2.5" autocomplete="off" placeholder="Nama Lengkap" />
    </div>
  </div>
  <div class="flex items-center">
    <div class="font-semibold text-lg w-[15%]">Tanggal Lahir / Umur</div>
    <div class="flex-1">
      <div class="flex items-center gap-5">
        <div class="relative w-[40%]">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
          </div>
          <input datepicker type="text" id="birth_date" class="shadow-sm bg-white border border-0 text-sm focus:ring-transparent focus:border-0 block w-full ps-10 p-2.5" autocomplete="off" placeholder="Tanggal Lahir">
        </div>
        <div class="flex items-center font-semibold gap-3">
          <span class="text-[#DC2222]">Umur</span>
          <span></span>
          <span>Tahun</span>
          <span></span>
        </div>
      </div>
    </div>
  </div>
  <div class="flex items-center">
    <div class="font-semibold text-lg w-[15%]">Jenis Kelamin</div>
    <div class="flex-1">
      <select id="gender" class="shadow-sm text-gray-500 focus:text-black bg-white rounded-0 border-0 text-sm focus:ring-transparent focus:border-0 block w-full p-2.5">
        <option value="" selected hidden>Jenis Kelamin</option>
        <option value="L">Laki - Laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>
  </div>
  <div class="flex items-start">
    <div class="font-semibold text-lg w-[15%]">Alamat Lengkap</div>
    <div class="flex-1">
      <textarea id="address" rows="5" class="shadow-sm bg-white border border-0 text-sm focus:ring-transparent focus:border-0 block w-full p-2.5"></textarea>
    </div>
  </div>
  <div class="flex items-center">
    <div class="font-semibold text-lg w-[15%]">Pendidikan</div>
    <div class="flex-1">
      <select id="education" class="shadow-sm text-gray-500 focus:text-black bg-white rounded-0 border-0 text-sm focus:ring-transparent focus:border-0 block w-full p-2.5">
        <option value="" selected hidden>Pendidikan</option>
        <option value="sd">SD</option>
        <option value="smp">SMP</option>
        <option value="sma">SMA</option>
        <option value="d3">D-III</option>
        <option value="d4">D-IV</option>
        <option value="s1">S1</option>
        <option value="s2">S2</option>
        <option value="s3">S3</option>
      </select>
    </div>
  </div>
  <div class="flex items-center">
    <div class="font-semibold text-lg w-[15%]">Agama</div>
    <div class="flex-1">
      <select id="religion" class="shadow-sm text-gray-500 focus:text-black bg-white rounded-0 border-0 text-sm focus:ring-transparent focus:border-0 block w-full p-2.5">
        <option value="" selected hidden>Agama</option>
        <option value="islam">Islam</option>
        <option value="kristen">Kristen</option>
        <option value="katolik">Katolik</option>
        <option value="hindu">Hindu</option>
        <option value="budha">Budha</option>
        <option value="konghucu">Konghucu</option>
        <option value="other">Lain - lain</option>
      </select>
    </div>
  </div>
  <div class="flex items-center">
    <div class="font-semibold text-lg w-[15%]">Suku</div>
    <div class="flex-1">
      <select id="ethnic" class="shadow-sm text-gray-500 focus:text-black bg-white rounded-0 border-0 text-sm focus:ring-transparent focus:border-0 block w-full p-2.5">
        <option value="" selected hidden>Suku</option>
        <option value="jawa">Jawa</option>
        <option value="sunda">Sunda</option>
        <option value="lampung">Lampung</option>
        <option value="other">Lain - lain</option>
      </select>
    </div>
  </div>
  <div class="flex items-center">
    <div class="font-semibold text-lg w-[15%]">Pekerjaan</div>
    <div class="flex-1">
      <select id="job" class="shadow-sm text-gray-500 focus:text-black bg-white rounded-0 border-0 text-sm focus:ring-transparent focus:border-0 block w-full p-2.5">
        <option value="" selected hidden>Pekerjaan</option>
        <option value="tidak_bekerja">Tidak Bekerja</option>
        <option value="pns">PNS</option>
        <option value="tni_polri">TNI / POLRI</option>
        <option value="bumn">BUMN</option>
        <option value="pegawai_wirausaha">Pegawai Swasta / Wirausaha</option>
        <option value="pelajar_mahasiswa">Pelajar / Mahasiswa</option>
        <option value="other">Lain - lain</option>
      </select>
    </div>
  </div>
  <div class="flex items-center mt-10">
    <div class="font-semibold text-lg w-[15%]"></div>
    <div class="flex-1">
      <button onclick="submit(this)" class="w-[30%] bg-white shadow-lg text-lg text-black py-2 rounded font-semibold btn-patient">
        Simpan
        <div role="status" class="spinner">
          <svg aria-hidden="true" class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-green-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
          </svg>
          <span class="sr-only">Loading...</span>
        </div>
      </button>
    </div>
  </div>
</div>
@endsection

@push("js")
<script src="{{ asset("js/jquery-3.7.1.min.js") }}"></script>
<script>
  function submit(element) {
    $.ajax({
      url: "{{ route('patient.store') }}",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        name: $("#name").val(),
        birth_date: $("#birth_date").val(),
        gender: $("#gender").val(),
        address: $("#address").val(),
        education: $("#education").val(),
        religion: $("#religion").val(),
        ethnic: $("#ethnic").val(),
        job: $("#job").val(),
      },
      beforeSend: function() {
        $(element).attr("disabled", true);
      },
      success: function() {
        return location.href = "/dashboard/patient";
      },
      error: function(e) {
        console.log(e);
        $(element).attr("disabled", false);
      }
    });
    // console.log($("#birth_date").val())
  }

  document.getElementById("gender").addEventListener("change", function() {
    this.classList.remove("text-gray-500");
  });
  document.getElementById("education").addEventListener("change", function() {
    this.classList.remove("text-gray-500");
  });
  document.getElementById("religion").addEventListener("change", function() {
    this.classList.remove("text-gray-500");
  });
  document.getElementById("ethnic").addEventListener("change", function() {
    this.classList.remove("text-gray-500");
  });
  document.getElementById("job").addEventListener("change", function() {
    this.classList.remove("text-gray-500");
  });
</script>
@endpush
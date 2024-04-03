@extends("layouts.app-layout")
@section("inspection", "active shadow-lg")

@section("content")
<div class="uppercase font-semibold text-center text-lg md:text-2xl">pemeriksaan pasien</div>
<div style="margin-top: 80px">
  <div class="mb-2 font-bold">ANAMNESIS PENGALAMAN SAKIT (ILLNESS)</div>
  <table class="anamnesis-table">
    <tr>
      <th style="width: 60px">NO</th>
      <th>PERNYATAAN</th>
      <th style="width: 130px">Sangat Setuju</th>
      <th style="width: 130px">Setuju</th>
      <th style="width: 130px">Ragu-ragu</th>
      <th style="width: 130px">Tidak Setuju</th>
      <th style="width: 130px">Sangat Tidak Setuju</th>
    </tr>
    @foreach ($anamnesis as $key => $item)
      @if ($key == 0)
        <tr>
          <td colspan="7" class="font-bold" style="background: #D9D9D9">
            KEIMANAN PASIEN
          </td>
        </tr>
      @endif
      @if ($key == 14)
        <tr>
          <td colspan="7" class="font-bold" style="background: #D9D9D9">
            RUTINITAS IBADAH PASIEN
          </td>
        </tr>
      @endif
      @if ($key == 18)
        <tr>
          <td colspan="7" class="font-bold" style="background: #D9D9D9">
            MAKAN, MINUM, YANG HALAL DADN THAYYIB
          </td>
        </tr>
      @endif
      @if ($key == 23)
        <tr>
          <td colspan="7" class="font-bold" style="background: #D9D9D9">
            BERSEDEKAH DAN BERBUAT BAIK
          </td>
        </tr>
      @endif
      <tr>
        <td class="text-center font-semibold">{{ $key + 1 }}</td>
        <td class="font-semibold">{{ $item }}</td>
        <td>
          <label for="check-{{ $key + 1 }}-5" class="select-answer">
            <input type="radio" id="check-{{ $key + 1 }}-5" name="answer-{{ $key + 1 }}" value="5" class="form-control">
          </label>
        </td>
        <td>
          <label for="check-{{ $key + 1 }}-4" class="select-answer">
            <input type="radio" id="check-{{ $key + 1 }}-4" name="answer-{{ $key + 1 }}" value="4" class="form-control">
          </label>
        </td>
        <td>
          <label for="check-{{ $key + 1 }}-3" class="select-answer">
            <input type="radio" id="check-{{ $key + 1 }}-3" name="answer-{{ $key + 1 }}" value="3" class="form-control">
          </label>
        </td>
        <td>
          <label for="check-{{ $key + 1 }}-2" class="select-answer">
            <input type="radio" id="check-{{ $key + 1 }}-2" name="answer-{{ $key + 1 }}" value="2" class="form-control">
          </label>
        </td>
        <td>
          <label for="check-{{ $key + 1 }}-1" class="select-answer">
            <input type="radio" id="check-{{ $key + 1 }}-1" name="answer-{{ $key + 1 }}" value="1" class="form-control">
          </label>
        </td>
      </tr>
    @endforeach
    <tr>
      <td colspan="2" class="font-bold">TOTAL</td>
      <td colspan="5" class="font-bold text-center">0 (Tidak di ketahui)</td>
    </tr>
  </table>
</div>
@endsection

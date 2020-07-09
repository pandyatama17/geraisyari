<table class="table table-bordered">
  <thead>
    <tr>
      @if ($data->reseller == 1)
        <th>Nama Agen</th>
      @else
        <th>Nama Pemesan</th>
      @endif
      <th>No. Telepon</th>
      <th>Catatan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        @if ($data->reseller == 1)
          <td>{{$data->reseller_name}}</td>
          <td>{{$data->reseller_phone}}</td>
        @else
          <td>{{$data->client_name}}</td>
          <td>{{$data->client_phone}}</td>
        @endif
      <td>{{$data->notes}}</td>
    </tr>
  </tbody>
</table>
{{-- {{dd($data)}} --}}

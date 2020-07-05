<table class="table table-bordered">
  <thead>
    <tr>
      <th>Bagian</th>
      <th>Ukuran</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data->getAttributes() as $key => $value)
      <tr>
        @if($key != "id" && $key != "parent_id" && $key != "created_at" && $key != "updated_at")
          <td>{{ $key }}</td>
          <td>{{ $value }} cm</td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>
{{-- {{dd($data->getAttributes())}} --}}

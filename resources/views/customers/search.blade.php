@extends('layouts.master')

@section('content')
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <h5 class="card-header">Danh sách khách hàng</h5>
            <div class="card-body">
              @foreach ($customers as $row)
                  <tr>
                    <td>{{ $row['name'] }}</td>
                  </tr>
              @endforeach
            </div>
        </div>
    </div>

@endsection


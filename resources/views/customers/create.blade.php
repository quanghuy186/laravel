@extends('layouts.master')
@section('content')
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <h5 class="card-header">Thêm mới khách hàng</h5>
            <div class="card-body">
                <form method="post">
                    @method('POST')
                     @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" id="" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control" id="" name="dob">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@extends('templates.layout')
@section('title', $_title)
@section('content')
<!-- Main content -->
<section class="content appTuyenSinh">
    <link rel="stylesheet" href="{{ asset('default/bower_components/select2/dist/css/select2.min.css')}} ">
    <style>
        .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            padding: 3px 0px;
            height: 30px;
        }

        .select2-container {
            margin-top: -5px;
        }

        option {
            white-space: nowrap;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 0px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: #216992;
        }

        .select2-container--default .select2-selection--multiple {
            margin-top: 10px;
            border-radius: 0;
        }

        .select2-container--default .select2-results__group {
            background-color: #eeeeee;
        }
    </style>

    <?php //Hiển thị thông báo thành công
    ?>
    @if ( Session::has('success') )
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    @endif
    <?php //Hiển thị thông báo lỗi
    ?>
    {{-- @if ( Session::has('error') )--}}
    {{-- <div class="alert alert-danger alert-dismissible" role="alert">--}}
    {{-- <strong>{{ Session::get('error') }}</strong>--}}
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
    {{-- <span aria-hidden="true">&times;</span>--}}
    {{-- <span class="sr-only">Close</span>--}}
    {{-- </button>--}}
    {{-- </div>--}}
    {{-- @endif--}}
    {{-- @if ($errors->any())--}}
    {{-- <div class="alert alert-danger alert-dismissible" role="alert">--}}
    {{-- <ul>--}}
    {{-- @foreach ($errors->all() as $error)--}}
    {{-- <li>{{ $error }}</li>--}}
    {{-- @endforeach--}}
    {{-- </ul>--}}
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
    {{-- <span aria-hidden="true">&times;</span>--}}
    {{-- <span class="sr-only">Close</span>--}}
    {{-- </button>--}}
    {{-- </div>--}}
    {{-- @endif--}}

    <!-- Phần nội dung riêng của action  -->
    <form class="form-horizontal " action="{{route('route_BackEnd_Orders_update', ['id' =>request()->route('id')])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ten_de_thi" class="col-md-3 col-sm-4 control-label">Tên khách hàng<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <input type="text" name="customerName" id="customerName" class="form-control" value="{{$objItem->customerName}}">
                            <span id="mes_sdt"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-md-3 col-sm-4 control-label">Địa Chỉ<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <input type="text" name="address" id="address" class="form-control" value="{{$objItem->address}}">
                            <span id="mes_sdt"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-md-3 col-sm-4 control-label">Số điện thoại<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <input type="number" name="phoneNumber" id="phoneNumber" class="form-control" value="{{$objItem->phoneNumber}}">
                            <span id="mes_sdt"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-md-3 col-sm-4 control-label">email<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <input type="email" name="email" id="email" class="form-control" value="{{$objItem->email}}">
                            <span id="mes_sdt"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-3 col-sm-4 control-label">Mô tả<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <textarea class="form-control" name="description" rows="10" cols="30">{{$objItem->description}}</textarea>
                            <span id="mes_sdt"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-md-3 col-sm-4 control-label">Mã người dùng<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($list as $item)
                                <option value="{{$item->id}}">{{$item->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-md-3 col-sm-4 control-label">Tổng tiền<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <input type="number" name="totalPrice" id="totalPrice" class="form-control" value="{{$objItem->totalPrice}}">
                            <span id="mes_sdt"></span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary"> Save</button>
            <a href="{{ route('route_BackEnd_Orders_index') }}" class="btn btn-default">Cancel</a>
        </div>
        <!-- /.box-footer -->
    </form>

</section>
@endsection
@section('script')
<script src="{{ asset('default/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('default/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
@endsection
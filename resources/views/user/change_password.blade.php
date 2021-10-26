@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div class="content">
            <section class="row">
                <div class="col-12">
                    <form autocomplete="on" action="" method="post">
                        <div class="card">
                            <div class="card-header text-center">
                                <b>Đổi mật khẩu</b>
                            </div>
                            <div class="card-body">                        
                                <div class="form-group">
                                    <label for="password">Mật khẩu mới : </label>
                                    <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHid" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="re-password">Nhập lại mật khẩu mới :</label>
                                    <input type="password" class="form-control" name="re-password" id="re-password" aria-describedby="re-passwordHid" placeholder="">
                                </div>  
                            </div>            
                            <div class="card-footer" style="text-align: center;">
                                <button type="button" class="btn btn-success">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
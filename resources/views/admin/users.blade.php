@extends('admin.layout')

@section('data-table')
    <div>
        <table class="table table-bordered table-hover admin-table" id="dtOrderExample">
            <thead>
                <tr>
                    <th style="width: 7%;">
                        <b class="text-white">ID <i class="fas fa-sort" id="rl-id"></i></b>
                    </th>
                    <th style="width: 19%;">
                        <b class="text-white">Name <i class="fas fa-sort" id="rl-name"></i></b>
                    </th>
                    <th style="width: 18%;">
                        <b class="text-white">Date of birth</b>
                    </th>
                    <th style="width: 15%;">
                        <b class="text-white">Phone number</b>
                    </th>
                    <th style="width: 17%;">
                        <b class="text-white">Email <i class="fas fa-sort" id="rl-email"></i></b>
                    </th>
                    <th style="width: 20%;">
                        <b class="text-white">Company <i class="fas fa-sort" id="rl-company"></i></b>
                    </th>
                    <th style="width: 1%;"><b class="text-white">Operation</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Đặng Minh Hiếu</td>
                    <td>23-12-2021</td>
                    <td>01234567891</span></td>
                    <td>dangminhhieu@gmail.com</td>
                    <td>f</td>
                    <td style=" color: #6d9886; font-size: 18px;">
                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Phạm Ngọc Ánh</td>
                    <td>20-1-2021</td>
                    <td>01234563391</span></td>
                    <td>pna@gmail.com</td>
                    <td>a</td>
                    <td style=" color: #6d9886; font-size: 18px;">
                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Đặng Tiến Khánh</td>
                    <td>23-10-2021</td>
                    <td>0123456781</span></td>
                    <td>dtk@gmail.com</td>
                    <td>m</td>
                    <td style=" color: #6d9886; font-size: 18px;">
                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection

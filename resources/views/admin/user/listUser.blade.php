@extends('adminMaster')
@section('title', 'Admin - Danh sách tài khỏan.')
@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">User</h1>
        <a class=" btn btn-info text-white ms-2" href="{{ route('admin.user.list-user') }}">
            Danh sách tài khoản
        </a>
    </div>
    <div class="card flex-fill">
        <div class="card-header">

            <h5 class="card-title mb-0">List tài khoản nhân viên</h5>
        </div>
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Quyền</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @forelse ($user_role1 as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td><span class="badge bg-info">Nhân viên</span></td>
                            <td>31/06/2021</td>
                            <td>
                                @if ($item->status === 0)
                                    <span class="badge bg-warning">Tạm khóa</span>
                                @else
                                    <span class="badge bg-primary">Khích hoạt</span>
                                @endif
                            </td>
                            <td>

                            </td>
                        </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No User yet!</td>
                </tr>
                @endforelse
                
            </tbody>
        </table>
    </div>
    <div class="card flex-fill">
        <div class="card-header">

            <h5 class="card-title mb-0">List tài khoản thành viên</h5>
        </div>
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Quyền</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @forelse ($user_role0 as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>0{{ $item->phone }}</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td>31/06/2021</td>
                            <td>
                                @if ($item->status === 0)
                                    <span class="badge bg-warning">Tạm khóa</span>
                                @else
                                    <span class="badge bg-primary">Khích hoạt</span>
                                @endif
                            </td>
                            <td>

                            </td>
                        </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No User yet!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

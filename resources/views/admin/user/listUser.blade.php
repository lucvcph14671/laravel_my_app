@extends('adminMaster')
@section('title', 'Admin - Danh sách tài khỏan.')
@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">User</h1>
        <a class=" btn btn-info text-white ms-2" href="{{ route('admin.user.list-user') }}">
            Danh sách tài khoản
        </a>
        @if (Session::has('messenger'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ Session::get('messenger') }}
                    @php
                        Session::forget('messenger');
                    @endphp
                </div>
            </div>
        @endif
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
                        <td>
                            @if ($item->role === 1)
                                <a class="badge bg-info">Nhân viên</a>
                            @endif
                        </td>
                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                        <td>
                            @if ($item->status === 0)
                                <a class="badge bg-primary"
                                    href="{{ route('admin.update_status', ['nametable' => 'users', 'id' => $item->id, 'status' => 1]) }}">Khích
                                    hoạt</a>
                            @else
                                <a class="badge bg-warning"
                                    href="{{ route('admin.update_status', ['nametable' => 'users', 'id' => $item->id, 'status' => 0]) }}">Tạm
                                    khóa</a>
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
                        <td>
                            @if ($item->role === 0)
                                <a class="badge bg-info">Thành viên</a>
                            @endif
                        
                        </td>
                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                        <td>
                            @if ($item->status === 0)
                                <a class="badge bg-primary"
                                    href="{{ route('admin.update_status', ['nametable' => 'users', 'id' => $item->id, 'status' => 1]) }}">Khích
                                    hoạt</a>
                            @else
                                <a class="badge bg-warning"
                                    href="{{ route('admin.update_status', ['nametable' => 'users', 'id' => $item->id, 'status' => 0]) }}">Tạm
                                    khóa</a>
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

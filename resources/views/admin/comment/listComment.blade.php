@extends('adminMaster')
@section('title', 'Admin - Danh sách sản phẩm.')
@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Bình luận</h1>
        <a class=" btn btn-info text-white ms-2">
            Danh sách comment
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

            <h5 class="card-title mb-0">Danh sách bình luận</h5>

        </div>
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Sản phẩm</th>
                    <th>Time Comment</th>
                    <th>Tương tác</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                @foreach ($comments as $index => $comment)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->product->name }}</td>
                        <td>{{ date('d/m/Y', strtotime($comment->created_at)) }}</td>
                        <td>
                            <form action="{{ route('admin.comment.destroy-comment', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="badge bg-danger border border-danger show_confirm">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            </tbody>
        </table>
        <div class="mt-4 ml-2">
            {{ $comments->links() }}
        </div>
    </div>



@endsection

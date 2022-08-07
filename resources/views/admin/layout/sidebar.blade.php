<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand">
            <span class="align-middle text-info">Admin Disnep</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Tài khoản
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('admin./') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Thống kê</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.user.profile') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Thông tin
                        (Profile)</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.user.list-user') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">All Tài khoản</span>
                </a>
            </li>

            <li class="sidebar-header">
                Sản phẩm
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.product.form-product') }}">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Thêm mới sản
                        phẩm</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.product.list-product') }}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">List sản phẩm</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.category.form-category') }}">
                    <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Danh mục</span>
                </a>
            </li>

            <li class="sidebar-header">
                Màu & Kích thước
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.color.form-color') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Màu</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.size.form-size') }}">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Kích thước</span>
                </a>
            </li>
            <li class="sidebar-header">
                Đánh giá (Comment)
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.comment.list-comment') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-message-square align-middle me-2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="align-middle">Comment</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dang-xuat') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

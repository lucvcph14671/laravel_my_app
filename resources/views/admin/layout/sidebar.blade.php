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

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.order.list-order') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag align-middle me-2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    <span class="align-middle">Đơn hàng</span>
                </a>
            </li>
            <li class="sidebar-header">
                Tin tức(Blog)
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.color.form-color') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout align-middle me-2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                    <span class="align-middle">List Bài viết</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.color.form-color') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus align-middle me-2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                    <span class="align-middle">Thêm Bài viết</span>
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

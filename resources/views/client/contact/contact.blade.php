<p>
    Chào khách hàng: {{$name}}
    <br>
    <table class="table table-hover my-0">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Size & Màu</th>
                <th>SL</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$msg->product['name']}}</td>
                <td>{{$msg->name}}</td>
                <td>{{$msg->email}}</td>
                <td>{{$msg->phone}}</td>
                <td>{{$msg->sizeName['name']}} | {{$msg->colorName['name']}}</td>
                <td>{{$msg->num_product}}</td>
                <td>{{$msg->address}}</td>
                <td>{{number_format($msg->totalPrice)}}</td>
                <td>

                    <span class="badge bg-info" >Đang giao hàng</span>

                </td>
            </tr>
        </tbody>
    </table>
</p>
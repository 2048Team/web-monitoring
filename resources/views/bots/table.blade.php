<table class="table table-hover table-bordered table-striped toggle-arrow-tiny"
       id="exampleFooAccordion"
       data-sorting="true" data-show-toggle="true" data-toggle-column="last">
    <thead>
    <tr>
        <th data-name="title">Title</th>
        <th data-name="address">Address</th>
        <th data-name="address">Ngày hoạt động</th>
        <th data-name="address">Vốn đầu tư</th>
        <th data-name="address">Đã thu hồi</th>
        <th data-name="status">Trạng thái</th>
        <th data-name="status">Lịch sử giao dịch</th>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
            <tr>
                <td><a href="/bots/get/{{$row->id}}">{{ $row->title }}</a> </td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->action_day }}</td>
                <td><?php echo number_format($row->investment, 0, ',', '.');?></td>
                <td><?php echo number_format($row->current, 0, ',', '.');?></td>
                <td>

                    <span class="badge badge-table @if($row->isActive===1) badge-success @else badge-danger @endif"> @if($row->isActive===1) Active @else Suspend @endif</span>
{{--                    <span class="badge badge-table badge-danger">Suspended</span>--}}
                </td>
                <td><a href="/revenue/{{$row->id}}">Logs</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>

    {!! $data->links() !!}



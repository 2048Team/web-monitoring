<table class="table table-hover table-bordered table-striped toggle-arrow-tiny"
       id="exampleFooAccordion"
       data-sorting="true" data-show-toggle="true" data-toggle-column="last">
    <thead>
    <tr>
        <th data-name="title">ID</th>
        <th data-name="title">Plate Number</th>
        <th data-name="title">Time</th>
        <th data-name="title">Txs</th>

    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td><a href="/transactions/detail/{{ $row->id }}" >{{ $row->id }}</a> </td>
            <td>{{$row->plate_id}}</td>
            <td>{{$row->time}}</td>
            <td><a target="_blank" href="https://scan.testnet.tomochain.com/txs/{{ $row->txs }}" >{{ $row->txs }}</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>

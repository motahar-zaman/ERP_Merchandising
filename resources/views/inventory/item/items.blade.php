<h1 class="btn btn-info btn-block">Item's List</h1>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#SL</th>
            <th>Code</th>
            <th>Name</th>
            <th>Store Unit / Warehouse</th>
            <th>Department</th>
            <th>Group</th>
            <th>Qty</th>
            <th>total</th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @for($i=1;$i<9;$i++)
            <tr>
                <td> {{ $i }} </td>
                <td> 0001{{+$i }} </td>
                <td> {{ $i }} NO AMPER TUBE</td>
                <td> Warehouse {{ $i }}</td>
                <td> Department {{ $i }}</td>
                <td> Group {{ $i }}</td>
                <td> {{ 99+$i }}</td>
                <td> {{ (99+$i)*(50+$i) }} TK</td>
                <td>  {!! $i%2 ==0 ? "<label class='label label-danger' style='padding:5px 15px;'> Pending</label>" :  "<label style='padding:5px 15px;' class='label label-success'> Approved </label>"  !!} </td>
                <td>
                    <a href="#" class="btn btn-info fa fa-eye" ></a>
                </td>
            </tr>
        @endfor
    </tbody>
</table>
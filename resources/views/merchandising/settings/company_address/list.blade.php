<table class="table table-hover table-bordered">
    <thead>
    <th colspan="6"> <h5 class="text-center text-info">Company Details </h5></th>
    <tr>
        <th class="text-center">#SL</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        @can('merchandiser')
        <th>Action</th>
        @endcan
    </tr>
    </thead>
    <tbody>

    @php $i = 1; @endphp
    @foreach($repository->companyAddressList() as $companyAddress)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td> {{ $companyAddress->company_name }}</td>
            <td> {{ $companyAddress->address }}</td>
            <td> {{ $companyAddress->phone }}</td>
            <td> {{ $companyAddress->email }}</td>
            @can('merchandiser')
            <td>
                {{ Form::open(['action'=>['Inventory\CompanyAddressController@destroy',$companyAddress->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit.companyCategory',$companyAddress->id) }}" type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                </button>
                {{ Form::close() }}
            </td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pull-right">
    {{ $repository->companyAddressList()->links() }}

</div>
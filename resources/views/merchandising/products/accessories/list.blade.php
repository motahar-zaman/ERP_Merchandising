<table class="table table-hover table-bordered">
    <thead>
    <th colspan="6"> <h5 class="text-center text-info">Accessories list </h5></th>
    <tr>
        <th class="text-center">#SL</th>
        <th>Name</th>
        <th>Category</th>
        <th>Unit</th>
        <th>Description</th>
        @can('merchandiser')
        <th>Action</th>
        @endcan
    </tr>
    </thead>
    <tbody>

    @php $i = 1; @endphp
    @foreach($repository->accessoriesList() as $accessories)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td> {{ $accessories->name }}</td>
            <td> {{ $accessories->accessories_category->name}}</td>
            <td> {{ $accessories->product_unit->name }}</td>
            <td> {{ $accessories->description }}</td>
            @can('merchandiser')
            <td>
                {{ Form::open(['route'=>['delete.accessories',$accessories->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit.accessories',$accessories->id) }}" type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fas fa-trash"></i>
                </button>
                {{ Form::close() }}
            </td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pull-right">
    {{ $repository->accessoriesList()->links() }}

</div>
<table class="table table-hover table-bordered">
    <thead>
    <th colspan="6"> <h5 class="text-center text-info">Fabrics list </h5></th>
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
    @foreach($repository->fabricList() as $fabric)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td> {{ $fabric->name != null ? $fabric->name : '' }}</td>
            <td> {{ $fabric->fabric_category->name }}</td>
            <td> {{ $fabric->product_unit != null ? $fabric->product_unit->name : '' }}</td>
            <td> {{ $fabric->description }}</td>
            @can('merchandiser')
            <td>
                {{ Form::open(['route'=>['delete.fabric',$fabric->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit.fabric',$fabric->id) }}" type="button" class="btn btn-info btn-sm">
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
    {{ $repository->fabricList()->links() }}

</div>
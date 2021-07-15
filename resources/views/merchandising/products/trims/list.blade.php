<table class="table table-hover table-bordered">
    <thead>
    <th colspan="6"> <h5 class="text-center text-info">Trims list </h5></th>
    <tr>
        <th class="text-center">#SL</th>
        <th>Name</th>
        <th>Category</th>
        <th>Unit</th>
        <th>Description</th>
        @can('merchandiser')
        <th>Action</th>
        @endif
    </tr>
    </thead>
    <tbody>

    @php $i = 1; @endphp
    @foreach($repository->trimList() as $trim)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td> {{ $trim->name }}</td>
            <td> {{ $trim->trims_category != null ? $trim->trims_category->name : '' }}</td>
            <td> {{ $trim->product_unit != null ? $trim->product_unit->name : '' }}</td>
            <td> {{ $trim->description }}</td>
            @can('merchandiser')
            <td>
                {{ Form::open(['route'=>['delete.trim',$trim->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit.trim',$trim->id) }}" type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fas fa-trash"></i>
                </button>
                {{ Form::close() }}
            </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pull-right">
    {{ $repository->trimList()->links() }}

</div>
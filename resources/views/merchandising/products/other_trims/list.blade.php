<table class="table table-hover table-bordered">
    <thead>
    <th colspan="6"> <h5 class="text-center text-info">Other Trim list </h5></th>
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
    @foreach($repository->otherTrimList() as $trim)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td> {{ $trim->name }}</td>
            <td> {{ $trim->other_trim_category != null ? $trim->other_trim_category->name : '' }}</td>
            <td> {{ $trim->product_unit != null ? $trim->product_unit->name : '' }}</td>
            <td> {{ $trim->description }}</td>
            @can('merchandiser')
            <td>
                {{ Form::open(['route'=>['delete.other-trim',$trim->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                <a href="{{ route('edit.other-trim',$trim->id) }}" type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-pencil-alt"></i>
                </a>
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
    {{ $repository->trimList()->links() }}

</div>
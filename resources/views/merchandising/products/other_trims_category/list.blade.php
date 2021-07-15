<table class="table table-hover table-bordered">
    <thead>
    <th colspan="5"> <h5 class="text-center text-info">Other Trims Category list </h5></th>
    <tr>
        <th class="text-center">#SL</th>
        <th>Unit</th>
        <th>Description</th>
        @can('merchandiser')
        <th>Action</th>
        @endcan
    </tr>
    </thead>
    <tbody>

    @php $i = 1; @endphp
    @foreach($repository->otherTrimCategoryList() as $unitData)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td> {{ $unitData->name }}</td>
            <td> {{ $unitData->description }}</td>
            @can('merchandiser')
            <td>
                {{ Form::open(['route'=>['delete.OtherTrimCategory',$unitData->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit.OtherTrimCategory',$unitData->id) }}" type="button" class="btn btn-info btn-sm">
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
    {{ $repository->trimsCategoryList()->links() }}

</div>
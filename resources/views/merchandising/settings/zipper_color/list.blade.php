<table class="table table-hover table-bordered">
    <thead>
    <th colspan="5"> <h5 class="text-center text-info">Color list </h5></th>
    <tr>
        <th class="text-center">#SL</th>
        <th>Name</th>
        <th>Description</th>
        @can('merchandiser')
        <th>Action</th>
        @endcan
    </tr>
    </thead>
    <tbody>

    @php $i = 1; @endphp

    @foreach($repository->zipperColorList() as $zipper_color)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td> {{ $zipper_color->name }}</td>
            <td> {{ $zipper_color->description }}</td>
            @can('merchandiser')
            <td>
                {{ Form::open(['action'=>['Inventory\ZipperColorController@destroy',$zipper_color->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit.zipperColor',$zipper_color->id) }}" type="button" class="btn btn-info btn-sm">
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
    {{ $repository->fabricCategoryList()->links() }}

</div>
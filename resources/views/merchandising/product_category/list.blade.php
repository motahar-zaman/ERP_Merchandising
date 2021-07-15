<table id="example2" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">#SL</th>
        <th class="text-center">Name</th>
        <th class="text-center">Description</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>

    @php $i = 1; @endphp
    @foreach($categories as $category)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td class="text-center"> {{ $category->name }} </td>
            <td class="text-center"> {{ $category->description }} </td>
            <td class="text-center">
                {{ Form::open(['route'=>['delete.ProductCategory',$category->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit.ProductCategory',$category->id) }}" type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fas fa-trash"></i>
                </button>
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pull-right">

</div>
<table class="table table-hover table-bordered">
    <thead>
    <th colspan="5"> <h5 class="text-center text-info">Type Of Price Quotations </h5></th>
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
    {{--@dd($Company_Unit->name)--}}
    @foreach($repository->PriceQuote() as $Price)
        <tr>
            <td class="text-center"> {{ $i++ }}</td>
            <td> {{ $Price->name }}</td>
            <td> {{ $Price->description }}</td>
            @can('merchandiser')
            <td>
                {{ Form::open(['action'=>['Merchandise\PriceQuotationController@destroy',$Price->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit.priceQuo',$Price->id) }}" type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                </button>
                {{ Form::close() }}
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pull-right">
    {{--{{ $repository->fabricCategoryList()->links() }}--}}

</div>
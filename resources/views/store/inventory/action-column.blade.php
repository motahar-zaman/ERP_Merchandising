<a title="Print" style="cursor: pointer;" onclick="window.open('{{url("inventory-report")}}/{{ $store_inventory->id }}/print','_blank')">
    <i class="fa text-success fa-print"></i>
</a>
<a title="Edit" href="{{ url('report/view-Store-inventory',$store_inventory->id) }}">
    <i class="fa text-success fa-eye"></i>
</a>&nbsp;  &nbsp;
@can('store')
<button type="button" onclick="Delete('{{ $store_inventory->id }}')" class="text-danger"><i class="fa fas fa-trash"></i></button>
@endcan
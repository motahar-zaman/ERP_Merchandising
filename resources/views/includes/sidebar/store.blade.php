
        <li class="nav-item">
            <a href="{{ url('store/manage-buyer') }}" class="nav-link {{ isActive('store/manage-buyer') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Buyer Details</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/manage-supplier') }}" class="nav-link {{ isActive('store/manage-supplier') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Supplier Details</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/manage-merchandiser') }}" class="nav-link {{ isActive('store/manage-merchandiser') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Merchandiser Details</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/manage-units') }}" class="nav-link {{ isActive('store/manage-units') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Unit Setup</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/manage-group') }}" class="nav-link {{ isActive('store/manage-group') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Group Setup</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/manage-order') }}" class="nav-link {{ isActive('store/manage-order') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Order Details</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/manage-booking') }}" class="nav-link {{ isActive('store/manage-booking') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Booking Details</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/manage-inventory') }}" class="nav-link {{ isActive('store/manage-inventory') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Inventory Details</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/manage-requisition') }}" class="nav-link {{ isActive('store/manage-requisition') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Store Requisition</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('store/report/mrr') }}" class="nav-link {{ isActive('store/report/mrr') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">MRR</p>
            </a>
        </li>

        {{-- <li class="nav-item has-treeview {{ isActive(['store/report/*']) }}">
            <a href="#" class="nav-link {{ isActive('store/report/*') }}">
                <i class="nav-icon fas fa-tools"></i>
                <p>Reports<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('store/report/mrr') }}" class="nav-link {{ isActive('store/report/mrr') }}">
                        <i class="fas fa-circle"></i>
                        <p style="margin-left:10px">MRR</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('store/report/supplier-wise-products') }}" class="nav-link {{ isActive('store/report/mrr/supplier-wise-products') }}">
                        <i class="fas fa-circle"></i>
                        <p style="margin-left:10px">Supplier Wise Products</p>
                    </a>
                </li>
            </ul>
        </li> --}}

    {{--<li class="nav-item has-treeview {{ isActive(['report/*']) }}">--}}
        {{--<a href="#" class="nav-link {{ isActive('report/*') }}">--}}
            {{--<i class="fas fa-tools"></i>--}}
            {{--<p> Reports<i class="fas fa-angle-left right"></i> </p>--}}
        {{--</a>--}}
        {{--<ul class="nav nav-treeview">--}}
            {{--<li class="nav-item">--}}
                {{--<a href="{{ url('report/invoice_wise') }}" class="nav-link {{ isActive('report/invoice_wise') }}">--}}
                    {{--<i class="fas fa-circle"></i>--}}
                    {{--<p style="margin-left:10px">Chalan Wise Report</p>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<ul class="nav nav-treeview">--}}
            {{--<li class="nav-item">--}}
                {{--<a href="{{ url('report/supplier_wise') }}" class="nav-link {{ isActive('report/supplier_wise') }}">--}}
                    {{--<i class="fas fa-circle"></i>--}}
                    {{--<p style="margin-left:10px">Supplier Wise Report</p>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<ul class="nav nav-treeview">--}}
            {{--<li class="nav-item">--}}
                {{--<a href="{{ url('report/date_wise') }}" class="nav-link {{ isActive('report/date_wise') }}">--}}
                    {{--<i class="fas fa-circle"></i>--}}
                    {{--<p style="margin-left:10px">Date Wise Report</p>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
{{--Store sidebar ends by Nishat Chowdhury --}}
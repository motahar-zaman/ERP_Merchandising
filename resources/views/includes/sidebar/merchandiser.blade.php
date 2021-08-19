<li class="nav-item has-treeview {{ isActive(['merchandise*']) }}">
    <a href="#" class="nav-link {{ isActive(['merchandise*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Merchandising<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        <li class="nav-item">
            <a href="{{ url('merchandiser-list') }}" class="nav-link {{ isActive('merchandiser-list') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Merchandiser</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('merchandise/manage-buyer') }}" class="nav-link {{ isActive('merchandise/manage-buyer') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buyer</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('create-order') }}" class="nav-link {{ isActive('create-order') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>New Order</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('order-list') }}" class="nav-link {{ isActive('order-list') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Order List</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('merchandise/manage-supplier') }}" class="nav-link {{ isActive('merchandise/manage-supplier') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Supplier</p>
            </a>
        </li>
        @can('merchandiser')
        <li class="nav-item">
            <a href="{{ url('merchandise/product-cost-sheet/create') }}" class="nav-link {{ isActive('merchandise/product-cost-sheet/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Cost Sheet</p>
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a href="{{ url('merchandise/budget-sheet/create') }}" class="nav-link {{ isActive('merchandise/budget-sheet/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Budget Sheet</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ isActive(['actionPlan/*']) }}">
    <a href="#" class="nav-link {{ isActive('actionPlan/*') }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>Time & Action Plan<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/create') }}" class="nav-link {{ isActive('actionPlan/create') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Create Action Plan</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/sample_tna') }}" class="nav-link {{ isActive('actionPlan/sample_tna') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Sample T&A</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/fabrics_tna') }}" class="nav-link {{ isActive('actionPlan/fabrics_tna') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">All Fabrics T&A</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/acc_tna') }}" class="nav-link {{ isActive('actionPlan/acc_tna') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">All ACC T&A</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/pre_production_act') }}" class="nav-link {{ isActive('actionPlan/pre_production_act') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Pre Production T&A</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/at-a-glance') }}" class="nav-link {{ isActive('actionPlan/at-a-glance') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">At A Glance</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item has-treeview {{ isActive(['actionPlan/reports*']) }}">
            <a href="#" class="nav-link {{ isActive('actionPlan/reports*') }}">
                <i class="nav-icon fas fa-tools"></i>
                <p>Reports<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('actionPlan/reports/order-summary') }}" class="nav-link {{ isActive('actionPlan/reports/order-summary') }}">
                        <i class="fas fa-circle"></i>
                        <p style="margin-left:10px">Order Summary</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('actionPlan/reports/order-summary-details') }}" class="nav-link {{ isActive('actionPlan/reports/order-summary-details') }}">
                        <i class="fas fa-circle"></i>
                        <p style="margin-left:10px">Order Summary Details</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('actionPlan/reports/sample-tna') }}" class="nav-link {{ isActive('actionPlan/reports/sample-tna') }}">
                        <i class="fas fa-circle"></i>
                        <p style="margin-left:10px">Sample T&A</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('actionPlan/reports/fabrics-tna') }}" class="nav-link {{ isActive('actionPlan/reports/fabrics-tna') }}">
                        <i class="fas fa-circle"></i>
                        <p style="margin-left:10px">Fabrics T&A</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('actionPlan/reports/all-acc-tna') }}" class="nav-link {{ isActive('actionPlan/reports/all-acc-tna') }}">
                        <i class="fas fa-circle"></i>
                        <p style="margin-left:10px">All ACC T&A</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('actionPlan/reports/pre-production-tna') }}" class="nav-link {{ isActive('actionPlan/reports/pre-production-tna') }}">
                        <i class="fas fa-circle"></i>
                        <p style="margin-left:10px">Pre Production T&A</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>


@can('merchandiser')
<li class="nav-item has-treeview {{ isActive(['booking*','booking/add-fabric*','booking/add-poly*','booking/add-zipper*','booking/add-button*','booking/add-other*','booking/add-thread*','booking/add-hangtag*','booking/add-label*','booking/add-hanger*']) }}">
    <a href="#" class="nav-link {{ isActive('booking/*') }}">
        <i class="nav-icon fas fa-book"></i>
        <p>Booking<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{ url('booking/add-fabric') }}" class="nav-link {{ isActive('booking/add-fabric') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Fabrics Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-poly') }}" class="nav-link {{ isActive('booking/add-poly') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Poly Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-zipper') }}" class="nav-link {{ isActive('booking/add-zipper') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Zipper Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-button') }}" class="nav-link {{ isActive('booking/add-button') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Button Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-thread') }}" class="nav-link {{ isActive('booking/add-thread') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Thread Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-hangtag') }}" class="nav-link {{ isActive('booking/add-hangtag') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">All Tag Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-label') }}" class="nav-link {{ isActive('booking/add-label') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Label Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-hanger') }}" class="nav-link {{ isActive('booking/add-hanger') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Hanger/Sizer Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-carton') }}" class="nav-link {{ isActive('booking/add-carton') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Carton Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-other') }}" class="nav-link {{ isActive('booking/add-other') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Other Booking</p>
            </a>
        </li>
    </ul>
</li>
@endcan


<li class="nav-item has-treeview {{ isActive(['report*']) }}">
    <a href="#" class="nav-link {{ isActive('report/*') }}">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p> Report<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{ url('report/view-cost-breakdown-sheet') }}" class="nav-link {{ isActive('report/view-cost-breakdown-sheet') }}">
                <i class="far fa-circle"></i>
                <p style="margin-left:10px">Cost Breakdown Sheets</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('report/view-all-budget-sheets') }}" class="nav-link {{ isActive('report/view-all-budget-sheets') }}">
                <i class="far fa-circle"></i>
                <p style="margin-left:10px">Budget Sheets</p>
            </a>
        </li>
        <li class="nav-item has-treeview {{ isActive(['report/view-fabrics-booking*','report/view-hanger-booking*',
        'report/view-poly-booking*','report/view-zipper-booking*','report/view-button-booking*','report/view-other-booking*','report/view-thread-booking*','report/view-hangtag-booking*','report/view-label-booking*','report/view-carton-booking*']) }}">
            <a href="#" class="nav-link }}">
                <i class="far fa-circle"></i>
                <p style="margin-left:10px">Booking Report<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-fabrics-booking') }}" class="nav-link {{ isActive('report/view-fabrics-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">Fabric Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-poly-booking') }}" class="nav-link {{ isActive('report/view-poly-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">poly Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-zipper-booking') }}" class="nav-link {{ isActive('report/view-zipper-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">Zipper Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-button-booking') }}" class="nav-link {{ isActive('report/view-button-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">Button Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-thread-booking') }}" class="nav-link {{ isActive('report/view-thread-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">Thread Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-hangtag-booking') }}" class="nav-link {{ isActive('report/view-hangtag-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">All Tag Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-label-booking') }}" class="nav-link {{ isActive('report/view-label-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">Label Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-hanger-booking') }}" class="nav-link {{ isActive('report/view-hanger-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">Hanger/Sizer Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-carton-booking') }}" class="nav-link {{ isActive('report/view-carton-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">Carton Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-other-booking') }}" class="nav-link {{ isActive('report/view-other-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:10px">Other Bookings</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ isActive(['products/*']) }}">
    <a href="#" class="nav-link {{ isActive('products/*') }}">
        <i class="nav-icon fas fa-boxes"></i>
        <p> Products<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('products/fabrics') }}" class="nav-link {{ isActive('products/fabrics') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Fabrics</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/accessories') }}" class="nav-link {{ isActive('products/accessories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Accessories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/trims') }}" class="nav-link {{ isActive('products/trims') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Trims</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/other-trims') }}" class="nav-link {{ isActive('products/other-trims') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Other Trims</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/fabrics_categories') }}" class="nav-link {{ isActive('products/fabrics_categories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Fabrics Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/accessories_categories') }}" class="nav-link {{ isActive('products/accessories_categories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Accessories Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/trims-categories') }}" class="nav-link {{ isActive('products/trims-categories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Trims Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/other-trims-categories') }}" class="nav-link {{ isActive('products/other-trims-categories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Other Trims Category</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('products/units') }}" class="nav-link {{ isActive('products/units') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Unit</p>
            </a>
        </li>
    </ul>
</li>

{{-- <li class="nav-item has-treeview {{ isActive(['actionPlan/*']) }}">
    <a href="#" class="nav-link {{ isActive('actionPlan/*') }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>Time & Action Plan<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/create') }}" class="nav-link {{ isActive('actionPlan/create') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Create Action Plan</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/sample_tna') }}" class="nav-link {{ isActive('actionPlan/sample_tna') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Sample T&A</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/fabrics_tna') }}" class="nav-link {{ isActive('actionPlan/fabrics_tna') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">All Fabrics T&A</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/acc_tna') }}" class="nav-link {{ isActive('actionPlan/acc_tna') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">All ACC T&A</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('actionPlan/pre_production_act') }}" class="nav-link {{ isActive('actionPlan/pre_production_act') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Pre Production Activities T&A</p>
            </a>
        </li>
    </ul>
</li> --}}

<li class="nav-item has-treeview {{ isActive(['settings/*']) }}">
    <a href="#" class="nav-link {{ isActive('settings/*') }}">
        <i class="nav-icon fas fa-tools"></i>
        <p> Settings<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('settings/company_address') }}" class="nav-link {{ isActive('settings/company_address') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Company Address</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('settings/colors') }}" class="nav-link {{ isActive('settings/colors') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Color</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('settings/company_unit') }}" class="nav-link {{ isActive('settings/company_unit') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Company Unit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('settings/price_quotation') }}" class="nav-link {{ isActive('settings/price_quotation') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Price Quotation</p>
            </a>
        </li>
    </ul>
</li>


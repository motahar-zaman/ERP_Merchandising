



<li class="nav-item has-treeview {{ isActive(['bookingPlan/*']) }}">
    <a href="#" class="nav-link {{ isActive('bookingPlan/*') }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>Booking Plan<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('bookingPlan/create') }}" class="nav-link {{ isActive('bookingPlan/create') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Capacity Booking Plan</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('bookingPlan/report') }}" class="nav-link {{ isActive('bookingPlan/report') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Report</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item has-treeview {{ isActive(['line-loading-plan/*']) }}">
    <a href="#" class="nav-link {{ isActive('line-loading-plan/*') }}">
        <i class="nav-icon fa fa-flag"></i>
        <p>Line Loading Plan<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('line-loading-plan/create') }}" class="nav-link {{ isActive('line-loading-plan/create') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Create Line Loading Plan</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('line-loading-plan/items') }}" class="nav-link {{ isActive('line-loading-plan/items') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Items</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('line-loading-plan/holidays') }}" class="nav-link {{ isActive('line-loading-plan/holidays') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Holidays</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('line-loading-plan/efficiency') }}" class="nav-link {{ isActive('line-loading-plan/efficiency') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Efficiency</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('line-loading-plan/report') }}" class="nav-link {{ isActive('line-loading-plan/report') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Report</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview {{ isActive(['daily-analysis-report/*']) }}">
    <a href="#" class="nav-link {{ isActive('daily-analysis-report/*') }}">
        <i class="nav-icon fas fa-clock"></i>
        <p>Daily Analysis Report<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('daily-analysis-report/style-review/create') }}" class="nav-link {{ isActive('daily-analysis-report/style-review/create') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Style Review</p>
            </a>
        </li>
    </ul>
    
</li>
<li class="nav-item has-treeview {{ isActive(['planningBoard/*']) }}">
    <a href="#" class="nav-link {{ isActive('planningBoard/*') }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>Planning Board<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('planningBoard/create') }}" class="nav-link {{ isActive('planningBoard/create') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:10px">Create</p>
            </a>
        </li>
    </ul>
</li>




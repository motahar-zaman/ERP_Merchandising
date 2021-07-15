<li class="nav-item has-treeview {{ isActive(['production/create-forecast','production/forecast-report']) }}">
    <a href="#" class="nav-link {{ isActive(['production/create-forecast','production/forecast-report']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Forecast<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        <li class="nav-item">
            <a href="{{ url('production/create-forecast') }}" class="nav-link {{ isActive('production/create-forecast') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('production/forecast-report') }}" class="nav-link {{ isActive('production/forecast-report') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Report</p>
            </a>
        </li>
        
    </ul>
</li>
<li class="nav-item has-treeview {{ isActive(['production/create-order-progress','production/order-progress-report']) }}">
    <a href="#" class="nav-link {{ isActive(['production/create-order-progress','production/order-progress-report']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Order Progress<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        <li class="nav-item">
            <a href="{{ url('production/create-order-progress') }}" class="nav-link {{ isActive('production/create-order-progress') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('production/order-progress-report') }}" class="nav-link {{ isActive('production/order-progress-report') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Report</p>
            </a>
        </li>
        
    </ul>
</li>
@php $active = ['production/daily-section-wise-report']; @endphp
<li class="nav-item has-treeview {{ isActive($active) }}">
    <a href="#" class="nav-link {{ isActive($active) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Daily Section Wise<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        <li class="nav-item">
            <a href="{{ url('production/daily-section-wise-report') }}" class="nav-link {{ isActive('production/daily-section-wise-report') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Report</p>
            </a>
        </li>
    </ul>
</li>



<li class="nav-item has-treeview {{ isActive(['principle*','group*','ac*','ledger/groups*']) }}">
    <a href="#" class="nav-link {{isActive(['principle*','group*','ac*','ledger/groups*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Accounts<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview" style="background-color: #292929">
        {{-- Accounts info start --}}
        <li class="nav-item has-treeview {{ isActive(['ac/principle*','ac/group*','ac/mainhead*','ac/head','ac/sub-head','ac/sub-child-head']) }}">
            <a href="#" class="nav-link {{ isActive(['ac/principle*','ac/group*','ac/mainhead*','ac/head','ac/sub-head','ac/sub-child-head']) }}">
                <i class="fas fa-tools"></i>
                <p> Account info<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav-treeview nav">
                <li class="nav-item">
                    <a href="{{ url('ac/principle') }}" class="nav-link {{ isActive('ac/principle') }}">
                        <p style="margin-left:30px">Ac Principle</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('ac/group') }}" class="nav-link {{ isActive('ac/group') }}">
                        <p style="margin-left:30px">Ac Group</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('ac/mainhead') }}" class="nav-link {{ isActive('ac/mainhead') }}">
                        <p style="margin-left:30px">Ac Main Head</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('ac/head') }}" class="nav-link {{ isActive('ac/head') }}">
                        <p style="margin-left:30px">Ac Head</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ url('ac/sub-head') }}" class="nav-link {{ isActive('ac/sub-head') }}">
                        <p style="margin-left:30px">Ac Sub  Head</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('ac/sub-child-head') }}" class="nav-link {{ isActive('ac/sub-child-head') }}">
                        <p style="margin-left:30px">Ac Sub Child Head</p>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Accounts info end --}}

        

        {{-- Laders Start --}}

        <li class="nav-item has-treeview {{ isActive(['ac/ledger','ac/ledger*','ledger/groups','ledger/groups*']) }}">
            <a href="#" class="nav-link {{ isActive('ac/ledger*','ledger/groups') }}">
                <i class="fas fa-tools"></i>
                <p>Ledger<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav-treeview nav">

                <li class="nav-item">
                    <a href="{{ url('ledger/groups') }}" class="nav-link {{ isActive('ledger/groups') }}">
                        <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Groups</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('ac/ledger') }}" class="nav-link {{ isActive('ac/ledger') }}">
                        <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Create Ledger</p>
                    </a>
                </li>
            </ul>
        </li>{{-- Ladgers End --}}
    </ul>

    <ul class="nav nav-treeview" style="background-color: #292929">
        {{-- Accounts Journal --}}
        <li class="nav-item has-treeview {{ isActive(['ac/principle*','ac/group*','ac/journal*']) }}">
            <a href="#" class="nav-link {{ isActive('ac/journal*') }}">
                <i class="fas fa-tools"></i>
                <p>Journal <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav-treeview nav">
                <li class="nav-item">
                    <a href="{{ url('ac/journal/create') }}" class="nav-link {{ isActive('ac/journal/create') }}">
                        <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Create Journal</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('ac/journal/lists') }}" class="nav-link {{ isActive('ac/journal/lists') }}">
                        <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Journal List</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    {{--Start Balance sheet --}}
    <ul class="nav nav-treeview" style="background-color: #292929">
        {{-- Accounts balance sheet  start --}}
        <li class="nav-item has-treeview {{ isActive(['ac/balance-sheet*']) }}">
            <a href="#" class="nav-link {{ isActive('ac/balance-sheet*') }}">
                <i class="fas fa-tools"></i>
                <p> Balance Sheet <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav-treeview nav">
                <li class="nav-item">
                    <a href="{{ url('ac/balance-sheet/lists') }}" class="nav-link {{ isActive('ac/balance-sheet/lists') }}">
                        <p style="margin-left:30px">Balance sheet (index)</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    {{--End Balance sheet --}}

</li>

<li class="nav-item has-treeview {{ isActive(['settings/company*','settings/chart-of-account']) }}">
    <a href="#" class="nav-link {{isActive(['settings/company*','settings/chart-of-account']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Account Settings<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview" style="background-color: #292929">
        <li class="nav-item">
            <a href="{{ url('settings/company/add') }}" class="nav-link {{ isActive('settings/company/add') }}">
                <p style="margin-left:30px">Company Setup</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('settings/chart-of-account') }}" class="nav-link {{ isActive('settings/chart-of-account') }}">
                <p style="margin-left:30px">Chart Of Account</p>
            </a>
        </li>


        {{-- Accounts info start --}}
{{--        <li class="nav-item has-treeview {{ isActive(['ac/principle*','ac/group*','ac*']) }}">--}}
{{--            <a href="#" class="nav-link {{ isActive('ac/*') }}">--}}
{{--                <i class="fas fa-tools"></i>--}}
{{--                <p> Account info<i class="fas fa-angle-left right"></i> </p>--}}
{{--            </a>--}}
{{--            <ul class="nav-treeview nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ url('ac/principle') }}" class="nav-link {{ isActive('ac/principle') }}">--}}
{{--                        <p style="margin-left:30px">Ac Principle</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ url('ac/group') }}" class="nav-link {{ isActive('ac/group') }}">--}}
{{--                        <p style="margin-left:30px">Ac Group</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ url('ac/mainhead') }}" class="nav-link {{ isActive('ac/mainhead') }}">--}}
{{--                        <p style="margin-left:30px">Ac Main Head</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>

{{--------------}}


@extends('layouts.fixed')

@section('title','Daily Section Wise')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"> 

    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div><
    </section> --}}

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" >
                        {{-- <button class="btn btn-info btn-lg btn-block"><a href="{{url('production/create-forecast')}}"><h4 style="color: white"><b>Add Forecast</b></h4></a></button><br> --}}
                        <form action="{{ url('production/daily-section-wise-report') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="from_date">Factory</label>
                                            <select required id="factory_id" name="factory_id" class="form-control">
                                                <option value=""> --- Select Factory --- </option>
                                                @foreach($factories as $key => $factory)
                                                    <option value="{{ $key }}">{{ $factory }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="from_date">Floor</label>
                                            <select required id="floor" name="floor" class="form-control">
                                                <option value=""> --- Select Floor --- </option>
                                                @foreach(floors() as $key => $floor)
                                                    <option value="{{ $key }}">{{ $floor }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="from_date">Line</label>
                                            <select required id="line_no" name="line_no" class="form-control">
                                                <option value=""> --- Select Line --- </option>
                                                @foreach(lines() as $key => $line)
                                                    <option value="{{ $key }}">{{ $line }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label for="from">From</label>
                                      <input required type="date" value="{{ $from }}" class="form-control" id="from" placeholder="Enter email" name="from">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                   <div class="form-group">
                                      <label for="to">To</label>
                                      <input required type="date" value="{{ $to }}" class="form-control" id="to" placeholder="Enter password" name="to">
                                    </div> 
                                </div>
                                <div class="col-md-2">
                                   <div class="row">
                                       <div class="col-md-12" style="margin-top: 30px">
                                           <button href="#" type="submit" id="search" class="btn-block btn btn-success"><i class="fa fa-search"></i> Search</button>
                                       </div>
                                       {{-- <div class="col-md-6" style="margin-top: 30px">
                                           <a href="#" class="btn-block btn btn-primary"><i class="fa fa-print"></i> Print</a>
                                       </div> --}}
                                   </div>
                                </div>
                            </div>
                            
                            
                            
                        </form>
                    </div>
                    <!-- /.card-header -->
                    {{-- <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Factory</th>
                                <th>Reporting Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @if(isset($forcasts))
                                    @foreach($forecasts as $key => $forecast)
                                        <tr id="tr-{{ $forecast->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $factories[$forecast->factory_id] }}</td>
                                            <td>{{ date('d-M-Y', strtotime($forecast->reporting_date)) }}</td>
                                            <td class="text-center">
                                                <button type="button" onclick="window.open('{{ url('production/forecast-report') }}/{{ $forecast->id }}')" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> View</button>
                                                <button type="button" onclick="Delete('{{ $forecast->id }}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach  
                                @endif                              
                            </tbody>

                        </table>
                    </div> --}}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('/') }}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>
@stop

@section('script')

    <!-- page script -->
    <script>
        // $( "#search" ).click(function( event ) {
        //   event.preventDefault();
        //   var factory_id = $('#factory_id').val();
        //   var floor = $('#floor').val();
        //   var line_no = $('#line_no').val();
        //   var from = $('#from').val();
        //   var to = $('#to').val();

        //   window.open('{{ url('production/daily-section-wise-report') }}/'+factory_id+'&'+floor+'&'+line_no+'&'+from+'&'+to,'_blank');
        // });
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        $('.select2').select2()

        function Delete(id) {
            $.confirm({
                title: 'Confirm!',
                content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
                buttons: {
                    confirm: function () {
                        $.ajax({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                          url: "{{url('production/forecast-delete')}}/"+id,
                          type: 'DELETE',
                          dataType: 'json',
                          data: {},
                          success:function(response) {
                            if(response.success){
                              $('#tr-'+id).fadeOut();
                            }else{
                              $.alert({
                                title:"Whoops!",
                                content:"<hr><strong class='text-danger'>Something Went Wrong!</strong><hr>",
                                type:"red"
                              });
                            }
                          }
                        });
                    },
                    cancel: function () {

                    }
                }
            });   
        }
    </script>
@stop
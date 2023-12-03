@extends('layouts.app')

@section('content')

    @section('styles')
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @endsection

    <div class="row h-100">
        <div class="col-xl pl-1 pr-5">
            <div class="info-box col-xl pl-4 ml-3">
                <img src="/images/{{ $barangay->image }}"  class="pt-sm-2 img-fluid" alt="Logo" style="width:128px; height:128px;">
                <div class="info-box-content pl-4">
                    <div class="row mb-1 h2">
                        <span class="font-weight-bold">{{ $barangay -> name }}</span>
                    </div><!-- /.row -->
                    <div class="row h5">
                        <span class="font-weight-normal">{{ $barangay -> city }}</span>
                    </div><!-- /.row -->
                    <div class="row h5">
                        <span class="font-weight-light">Tel No. {{$barangay -> telephone}}</span>
                    </div><!-- /.row -->
                    <div class="row pb-3">
                        <a href="{{route('barangay.index', $barangay->id)}}" class="btn bg-navy btn-sm mr-1"><i class="fa fa-list pr-1"></i> List of Barangays</a>
                        <a href="{{route('barangay.show', $barangay->id)}}" class="btn btn-secondary btn-sm mr-1"><i class="fa fa-vcard pr-1"></i> Officials</a>
                        <a href="{{route('barangay.edit', $barangay->id)}}" class="btn bg-teal btn-sm"><i class="fa fa-pencil"></i> Edit barangay details</a>
                    </div><!-- /.row -->
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="card mr-4 ml-sm-3 card-outline card-indigo">
        <div class="card-header">
            <h3 class="card-title font-weight-bold text-navy">List of {{$barangay->name}} Residents</h3>

            <div class="float-right">
                    <a href="{{ route('barangay.resident.create', ['barangay_id' => $barangay->id, 'name' => $barangay->name]) }}"  class="btn btn-success btn-sm">
                        <i class="fas fa-plus mt-sm-2"></i>
                        {{ __('Add new Resident') }}
                    </a>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Address name</th>
                    <th>Email</th>
                    <th>Complaint</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($barangay->residents as $resident)
                    <tr class="bg-light">
                        <td>{{ $resident->id }}</td>
                        <td>{{ $resident->lastname }}</td>
                        <td>{{ $resident->firstname }}</td>
                        <td>{{ $resident->middlename }}</td>
                        <td>{{ $resident->address }}</td>
                        <td>{{ $resident->email }}</td>
                        <td>{{ $resident->complaint }}</td>
                        @if($resident->status == 'Ongoing')
                            <td class="bg-warning">{{ $resident->status }}</td>
                        @elseif($resident->status == 'Resolved')
                            <td class="bg-teal">{{ $resident->status }}</td>
                        @else
                            <td>{{ $resident->status }}</td>
                        @endif
                        <td>
                            <form action="{{ route('barangay.resident.destroy', ['barangay_id' => $barangay->id, 'resident' => $resident->id], $resident->id) }}" method="POST">
                                {{ csrf_field()  }}
                                @method('DELETE')
                                <button type="button" class="btn btn-default dropdown-toggle bg-gray btn-sm" data-toggle="dropdown" >
                                    <i class="fa fa-gear"></i>
                                </button>
                                <div class="dropdown-menu pl-3">
                                    <a href="{{ route('barangay.resident.edit',  ['barangay_id' => $barangay->id, 'resident' => $resident->id]) }}" class="btn bg-olive btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete resident {{$resident->lastname}}, {{$resident->firstname}}?')"> <i class="fa fa-trash"></i>Delete</button>
    {{--                                <button class="btn btn-primary btn-sm" type="submit"> <i class="fa fa-check"></i>Mark as resolved</button>--}}
                                </div>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @section('scripts')
        <script>
            @if ($message = session('success'))
                toastr.options = {
                closeButton: true,
                debug: 'false',
                progressBar: 'true',
                showDuration: "400",
                hideDuration: "500",
                timeOut: "2500",
                extendedTimeOut: "100",
                positionClass: 'toast-top-right',
                onclick: null
            };
            toastr.success("{{$message}}");
            @endif

            function testButton(){
                toastr.options = {
                    closeButton: true,
                    debug: 'false',
                    progressBar: 'true',
                    showDuration: "400",
                    hideDuration: "500",
                    timeOut: "1500",
                    extendedTimeOut: "100",
                    positionClass: 'toast-top-right',
                    onclick: null
                };
                toastr.error("Toast Malone alert box");
            }
        </script>
    @endsection

@endsection

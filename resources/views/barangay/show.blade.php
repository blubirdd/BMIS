@extends('layouts.app')

@section('content')


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
                            <a href="/barangay/{{$barangay->id}}/resident" class="btn bg-info btn-sm mr-1"><i class="fa fa-home pr-sm-1"></i>Residents</a>
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
            <h3 class="card-title font-weight-bold text-navy">List of {{$barangay->name}} Officials</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($barangay->officials as $official)
                <tr>
                    <td>{{ $official->id }}</td>
                    <td>{{ $official->position }}</td>
                    <td>{{ $official->lastname }}</td>
                    <td>{{ $official->firstname }}</td>
                    <td>{{ $official->middlename }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection

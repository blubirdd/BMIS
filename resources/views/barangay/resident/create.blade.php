@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row mt-3 ml-4 mr-4">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add new Resident</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('barangay.resident.store', $barangay->id)}}" method="POST" >
                        {{ csrf_field() }}
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="mt-2 alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <div class="form-group">
                                    <label for="name">Barangay Name</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-teal">
                                            <span class="fa fa-institution"></span>
                                        </div>
                                        <input type="text" name="barangay" placeholder="Enter barangay name"  class="form-control" value="{{$barangayName}}"readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name  <span class="text-danger">*</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-teal">
                                            <span class="fa fa-address-card"></span>
                                        </div>
                                        <input type="text" name="lastname" placeholder="Last Name" class="form-control w-33 mr-4">
                                        <input type="text" name="firstname" placeholder="First Name" class="form-control w-33 mr-4">
                                        <input type="text" name="middlename" placeholder="Middle Name" class="form-control  w-33  mr-4">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">* </label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-teal">
                                            <span class="fa fa-home"></span>
                                        </div>
                                        <input type="text" name="address" placeholder="Enter Address"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail <span class="text-danger">* </span></label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-teal">
                                            <span class="fa fa-envelope"></span>
                                        </div>
                                        <input type="text" name="email" placeholder="Enter E-mail"  class="form-control">
                                    </div>
                                </div>

                                <div class="row float-right">
                                    <div class="col-12">
                                        <a href="{{  url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Add" class="btn bg-teal">
                                    </div>
                                </div>
                        </div>
{{--                    </form>--}}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

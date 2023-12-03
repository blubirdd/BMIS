@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row mt-3 ml-4 mr-4">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add new barangay</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('barangay.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="name">Barangay Name <span class="text-danger">*</span></label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-teal">
                                        <span class="fa fa-institution"></span>
                                    </div>
                                    <input type="text" name="name" placeholder="Enter barangay name" class="form-control">
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="city">City <span class="text-danger">*</span></label>
                                <div class="input-group-prepend ">
                                    <div class="input-group-text bg-teal">
                                        <span class="fa fa-building"></span>
                                    </div>
                                    <select name="city" class="form-control custom-select">
                                        <option selected disabled hidden>Select City</option>
                                        <option>Antipolo City</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-teal">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <input type="text" name="telephone" placeholder="Enter telephone no." class="form-control">
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
                                <input id="image" name="image" type="file" class="form-control">
                            </div>
                                <div class="row float-right">
                                    <div class="col-12">
                                        <a href="{{ route('barangay.index') }}" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Add" class="btn bg-teal">
                                    </div>
                                </div>
                        </div>
                    </form>
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

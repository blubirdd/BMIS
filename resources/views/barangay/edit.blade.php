@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row mt-3 ml-4 mr-4">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit barangay</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('barangay.update', $barangay->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
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
                                <input value="{{ $barangay->name }}" type="text" name="name" placeholder="Enter barangay name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="city">City <span class="text-danger">*</span></label>
                                <select name="city" class="form-control custom-select">
                                    <option selected="selected"> {{ $barangay->city }} </option>
                                    <option>Antipolo City</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input value="{{ $barangay->telephone }}" type="text" name="telephone" placeholder="Enter telephone no." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Image</label><br>
                                <img class="img-thumbnail" src="/images/{{ $barangay->image }}" width="150px">
                                <input id="image" name="image" type="file" class="form-control">

                            </div>
                            <div class="row float-right">
                                <div class="col-12">
                                    <a href="{{ route('barangay.index') }}" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Save changes" class="btn bg-teal">
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

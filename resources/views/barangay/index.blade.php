@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 pb-2 text-bold">{{ __('List of Barangays') }}</h1>
{{--                            <form>--}}
                                <div class="input-group input-group-md">
                                    <input type="search" class="form-control form-control-md" placeholder="{{__('Search...')}}">
                                    <div class="input-group-prepend">
                                        <button onclick="testButton()"class="btn btn-secondary mr-3">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                        <a href="{{route('barangay.create')}}"  class="btn bg-success btn-sm">
                                            <i class="fas fa-plus mt-sm-2"></i>
                                            {{ __('Add new barangay') }}
                                        </a>
                                </div>
{{--                            </form>--}}
                        <hr>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    <div class="row">
        @foreach($barangays as $barangay)
            <div class="pr-1 pl-1">
                <div class="info-box pl-4 ml-3 hover"  data-aos="fade-up">
                    <img src="/images/{{ $barangay->image }}"  class="img-fluid" alt="Logo" style="width:100px; height:100px;">
                        <div class="info-box-content pl-4">
                            <div class="row">
                                <span class="font-weight-bold">{{ $barangay -> name }}</span>
                            </div><!-- /.row -->
                                <div class="row">
                                    <span class="font-weight-normal">{{ $barangay -> city }}</span>
                                </div><!-- /.row -->
                            <div class="row">
                                <span class="font-weight-light">Tel No. {{$barangay -> telephone}}</span>
                           </div><!-- /.row -->
                            <div class="row-md-4">
                                 <div class="project-actions text-right">
                                     <form action="{{ route('barangay.destroy',$barangay->id) }}" method="POST">
                                         {{ csrf_field()  }}
                                         @method('DELETE')
                                         <a href="/barangay/{{$barangay->id}}" class="btn bg-gradient-secondary btn-sm"><i class="fa fa-vcard pr-1"></i>Officials</a>
                                         <a href="/barangay/{{$barangay->id}}/resident" class="btn bg-info btn-sm"><i class="fa fa-home pr-sm-1"></i>Residents</a>
                                         <button type="button" class="btn btn-default dropdown-toggle bg-teal btn-sm" data-toggle="dropdown" >
                                             <i class="fa fa-gear"></i>
                                         </button>
                                         <div class="dropdown-menu pl-3">
                                             <a href="{{route('barangay.edit', $barangay->id)}}" class="btn bg-olive btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                             <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete {{$barangay->name}}?')"> <i class="fa fa-trash"></i>Delete</button>
                                         </div>
                                     </form>
                                 </div>

                            </div><!-- /.row -->
                        </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        <!-- /.col -->
        @endforeach
    </div>
    <!-- /.row -->

    @section('scripts')
        <script>

            $(function() {
                AOS.init();
            });

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

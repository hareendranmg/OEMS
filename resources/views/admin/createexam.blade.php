@extends('adminlte::page')

@section('title', 'Create Exam')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
<div class="col-12 col-sm-12">
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="pt-2 px-3">
                    <h3 class="card-title">Create Exam</h3>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill"
                        href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home"
                        aria-selected="true">Basic Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill"
                        href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile"
                        aria-selected="false">Add Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill"
                        href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages"
                        aria-selected="false">Activate Exam</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel"
                    aria-labelledby="custom-tabs-two-home-tab">
                    <div class="card card-info">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Exam Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Exam Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="examtime" class="col-sm-2 col-form-label">Exam Time</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <div class="input-group date" id="examtime" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#examtime" />
                                                <div class="input-group-append" data-target="#examtime" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Sign in</button>
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-two-profile-tab">
                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula
                    tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas
                    sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus.
                    Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque
                    diam.
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-two-messages-tab">
                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id
                    mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac
                    tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                    condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique.
                    Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est
                    libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum
                    metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel"
                    aria-labelledby="custom-tabs-two-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac,
                    ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi
                    euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum
                    placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc
                    et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex
                    sit amet facilisis.
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@stop

@section('content')

@stop


@section('js')
<script type="text/javascript">
    $(function () {
        $('#examtime').datetimepicker();
    });
</script>
@stop
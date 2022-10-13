@extends('layouts.master')
@section('title', 'Add Drop')
@section('heading', 'Add Drop')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
            <h4 class="card-title">Add Drop</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="post" action="{{route('storeDrop')}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control">
                            <span class="bmd-help">Name of the drop</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label label-checkbox">Timing</label>
                    <div class="col-sm-10 checkbox-radios">
                        @for($i=2; $i <=24; $i += 2)
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="hours[]" value="{{$i}}"> {{Carbon\Carbon::createFromFormat('H', $i)->format('ha')}}
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                            </label>
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Drops for Left Eye ?</label>
                    <div class="col-sm-10">
                        <div class="togglebutton mt-3">
                        <label>
                          <input type="checkbox"checked name="is_left">
                          <span class="toggle"></span>
                        </label>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Drops for Right Eye ?</label>
                    <div class="col-sm-10">
                        <div class="togglebutton mt-3">
                        <label>
                          <input type="checkbox"checked name="is_right">
                          <span class="toggle"></span>
                        </label>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Is Active</label>
                    <div class="col-sm-10">
                        <div class="togglebutton mt-3">
                        <label>
                          <input type="checkbox"checked name="is_active">
                          <span class="toggle"></span>
                        </label>
                      </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="../../assets/img/image_placeholder.jpg" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image" />
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-fill btn-rose">Add Drop</button>
                    </div>
                </div>

            </form>
        </div>
        </div>
    </div>
</div>
@endsection
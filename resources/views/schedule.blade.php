@extends('layouts.master')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('content')

<div id="app">
    <schedule-maker inline-template>
        <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Simple Table</h4>
                </div>
                <div class="card-body">
                    <table class="table table-shopping">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Time</th>
                                <th>Eye Type</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        <tr v-for="(drop, dropIndex) in allDrops" :key="dropIndex">
                            <td>
                                <div style="height:150px;">
                                    <img class="img-fluid h-100" :src="drop.image" :alt="drop.name">
                                </div>
                            </td>
                            <td>@{{drop.name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-12 checkbox-radios">
                                        <div class="form-check form-check-inline" v-for="(hour, hourIndes) in hours" :key="hourIndes">
                                            <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" v-model="drop.hours" :value="hour"> @{{moment(hour, 'h').format('hh A')}}
                                            <span class="form-check-sign">
                                                <span class="check" style="margin-top: 13px;"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <select class="form-control btn btn-info btn-round px-3"  @change="eyeTypeChanged($event.target.value, dropIndex)">
                                            <option value="left" :checked="drop.is_left == true">Left Eye</option>
                                            <option value="right" :checked="drop.is_right == true">Right Eye</option>
                                            <option value="both" :checked="drop.is_left == true && drop.is_right == true">Both Eyes</option>
                                            <option value="both" :checked="drop.is_left == false && drop.is_right == false">None</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td class="td-actions text-right">
                                <button  rel="tooltip" class="btn btn-danger btn-link" @click="deleteDrop(dropIndex)">
                                        <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
   
                        </tbody>
                    </table>
                    <button class="btn btn-info float-right" :disabled="allDrops.length <= 0" @click="generatePDF">Generate PDF</button>
                    <button class="btn btn-info float-right" @click="addDropClicked">Add Drop</button>
                </div>
                </div>
            </div>
        </div>


        <!-- notice modal -->
        <div class="modal fade" id="addDropToSchedule" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-notice">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Drop to Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                          <select class="selectpicker w-100" data-size="7" data-style="btn btn-info btn-round" title="Single Select"  @change="dropSelected()" v-model="selectedDrop">
                            <option disabled selected>Single Option</option>
                            @foreach($drops as $drop)
                                <option value="{{$drop->id}}">{{$drop->name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-info btn-round" @click="addDrop" :disabled="isButtonDisabled">Add</button>
                </div>
                </div>
            </div>
        </div>
        <!-- end notice modal -->
        </div>
    </schedule-maker>
</div>





@endsection


@section('js')
<script src="{{asset('js/app.js')}}"></script>
@endsection
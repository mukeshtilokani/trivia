@extends('layouts.app')

@section('page-scripts')
    <script src="{{ asset('js/frontend/game/index.js') }}" defer></script>
@endsection

@section('content')
    <div class="mt-5 mb-5">
        <h1>Game</h1>
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <div class="stepwizard mt-2 mb-2">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-1" type="button" class="btn btn-success btn-circle pointer-events-none">1</a>
                    <!-- <p><small>Shipper</small></p> -->
                </div>
                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-2" type="button" class="btn btn-default btn-circle pointer-events-none" disabled="disabled">2</a>
                    <!-- <p><small>Destination</small></p> -->
                </div>
                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-3" type="button" class="btn btn-default btn-circle pointer-events-none" disabled="disabled">3</a>
                    <!-- <p><small>Schedule</small></p> -->
                </div>
                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-4" type="button" class="btn btn-default btn-circle pointer-events-none" disabled="disabled">4</a>
                    <!-- <p><small>Cargo</small></p> -->
                </div>
            </div>
        </div>
        <form role="form" x-data="{your_name:''}" id="game_form" method="POST" action="{{ route('game.store') }}">
            @csrf
            <div class="panel panel-primary setup-content" id="step-1">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">What is your name?</label>
                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Your name" x-model="your_name" name="your_name" id="your_name" />
                    </div>
                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
            </div>
            <div class="panel panel-primary setup-content" id="step-2">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Who is the best cricketer in the world?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="best_cricketer" id="cricket1" value="Sachin Tendulkar">
                            <label class="form-check-label" for="cricket1">
                                Sachin Tendulkar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="best_cricketer" id="cricket2" value="Virat Kohli">
                            <label class="form-check-label" for="cricket2">
                                Virat Kohli
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="best_cricketer" id="cricket3" value="Adam Gilchirst">
                            <label class="form-check-label" for="cricket3">
                                Adam Gilchirst
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="best_cricketer" id="cricket3" value="Jacques Kallis">
                            <label class="form-check-label" for="cricket3">
                                Jacques Kallis
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
            </div>
            <div class="panel panel-primary setup-content" id="step-3">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">What are the colors in the Indian national flag?</label>
                        <div class="form-check">
                            <input class="form-check-input js-national-flag-color" type="checkbox" value="White" id="national_flag_white" name="national_flag[]">
                            <label class="form-check-label" for="national_flag_white">
                                White
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input js-national-flag-color" type="checkbox" value="Yellow" id="national_flag_yellow" name="national_flag[]">
                            <label class="form-check-label" for="national_flag_yellow">
                                Yellow
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input js-national-flag-color" type="checkbox" value="Orange" id="national_flag_orange" name="national_flag[]">
                            <label class="form-check-label" for="national_flag_orange">
                                Orange
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input js-national-flag-color" type="checkbox" value="Green" id="national_flag_green" name="national_flag[]">
                            <label class="form-check-label" for="national_flag_green">
                                Green
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
            </div>
            <div class="panel panel-primary setup-content" id="step-4">
                <div class="panel-heading">
                    <h3 class="panel-title">Summary</h3>
                </div>
                <div class="panel-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <strong>Hello <span x-text="your_name"></span>,</strong>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    Here are the answers selected:
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-sm-12">
                                    <strong>Who is the best cricketer in the world?</strong>
                                </div>
                                <div class="col-sm-12">
                                    <span class="js-best-cricketer"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <strong>What are the colors in the national flag?</strong>
                                </div>
                                <div class="col-sm-12">
                                    <span class="js-national-flag"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary finishBtn pull-right" type="submit" value="Finish" />
                </div>
            </div>
        </form>
    </div>
@endsection
@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="card bg-success align-items-center" style="margin-top:22px">
            <header class="w3-container" >
                <b><h1 class="note"></h1></b>
            </header>
        </div>
        <hr>
        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
                <div class="w3-container w3-red w3-padding-16">
                    <div class="w3-left"><i class="fa fa-flask w3-xxxlarge" aria-hidden="true"></i>
                    </div>
                    <div class="w3-right">
                        <h3>52</h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Test Requests</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-blue w3-padding-16">
                    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>99</h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Closed Tests</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-teal w3-padding-16">
                    <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>23</h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Patients</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>0</h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Users</h4>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var welcome;
        var date = new Date();
        var hour = date.getHours();
        var minute = date.getMinutes();
        var second = date.getSeconds();
        if (minute < 10) {
            minute = "0" + minute;
        }
        if (second < 10) {
            second = "0" + second;
        }
        if (hour < 12) {
            welcome = "GOOD MORNING";
        } else if (hour < 17) {
            welcome = "GOOD AFTERNOON";
        } else {
            welcome = "GOOD EVENING";
        }

        $('.note').append(welcome);

    </script>

@endsection

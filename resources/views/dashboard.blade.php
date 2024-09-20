@extends('layouts.app')

@section('content')

<style>
    .status__box {
        margin-bottom: 30px;
        height: calc(100% - 30px);
        padding: 44px 25px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .status__box .overlay {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .status__box .dropdown-menu.show {
        background: #ffffff;
        border: 1px solid #E9EDF5;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-box-shadow: 0px 0px 10px rgba(163, 177, 204, 0.12), 0px 10px 20px -5px rgba(163, 177, 204, 0.2);
        box-shadow: 0px 0px 10px rgba(163, 177, 204, 0.12), 0px 10px 20px -5px rgba(163, 177, 204, 0.2);
        border-radius: 6px;
        padding: 8px 0;
        inset: 0px 0px auto auto !important;
    }

    .status__box .dropdown-menu.show .dropdown-item {
        font-weight: 400;
        padding: 5px 16px;
        font-size: 14px;
        line-height: 24px;
        color: #596680;
    }

    @media screen and (max-width: 1399px) {
        .status__box {
            padding: 44px 7px;
        }
    }

    @media screen and (max-width: 1199px) {
        .status__box {
            padding: 40px 13px;
        }
    }

    @media screen and (max-width: 991px) {
        .status__box {
            padding: 30px 15px;
        }
    }

    .status__box__v3 {
        padding: 30px 30px 20px;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        text-align: center;
        position: relative;
    }


    .status__box__v3 .status__box__img {
        margin-bottom: 14px;
        width: 50px;
        height: 50px;
        border-radius: 12px;
        overflow: hidden;
    }

    .status__box-3 .status__box__img img {
        width: 60px;
        height: 60px;
        border-radius: 12px;
    }

    .bg-style {
        background: #ffffff;
        border: 1px solid #E4E6EB;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-box-shadow: 0px 10px 25px rgba(163, 177, 204, 0.1);
        box-shadow: 0px 10px 25px rgba(163, 177, 204, 0.1);
        border-radius: 12px;
    }

    .status__box__img {
        margin-bottom: 0;
        width: 60px;
        height: 60px;
        border-radius: 12px;
        overflow: hidden;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .status__box__img img {
        width: 100%;
        height: 100%;
    }

    .status__box__text h2 {
        margin-bottom: 2px;
        text-transform: capitalize;
        font-weight: 600;
        font-size: 24px;
        line-height: 32px;
    }

    .status__box__text h2 {
        margin-bottom: 2px;
        text-transform: capitalize;
        font-weight: 600;
        font-size: 24px;
        line-height: 32px;
    }
</style>

<div class="row" style="margin: 20px;">

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="status__box status__box__v3 bg-style">
            <div class="status__box__img">
                <img src="/dashboard-icons/principal.png" alt="icon">
            </div>
            <div class="status__box__text">
                <h2 style="color: purple;">
                    {{ $admins}}
                </h2>
                <p style="font-size: 20px; color: #989595; font-weight: bold; margin-top: 5px;">Total Admin</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="status__box status__box__v3 bg-style">
            <div class="status__box__img">
                <img src="/dashboard-icons/laptop.png" alt="icon">
            </div>
            <div class="status__box__text">
                <h2 style="color: #5d2bd5;">{{ $teachers }}</h2>
                <p style="font-size: 20px; color: #989595; font-weight: bold; margin-top: 5px;">Total Teachers</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="status__box status__box__v3 bg-style">
            <div class="status__box__img">
                <img src="/dashboard-icons/study.png" alt="icon">
            </div>
            <div class="status__box__text">
                <h2 style="color: blue;">{{ $students }}</h2>
                <p style="font-size: 20px; color: #989595; font-weight: bold; margin-top: 5px;">Total Students</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="status__box status__box__v3 bg-style">
            <div class="status__box__img">
                <img src="/dashboard-icons/test.png" alt="icon">
            </div>
            <div class="status__box__text">
                <h2 style="color: #0c84ff;">{{ $courses }}</h2>
                <p style="font-size: 20px; color: #989595; font-weight: bold; margin-top: 5px;">Total Courses</p>
            </div>
        </div>
    </div>

 <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="status__box status__box__v3 bg-style">
            <div class="status__box__img">
                <img src="/dashboard-icons/website.png" alt="icon">
            </div>
            <div class="status__box__text">
                <h2 style="color: orangered">{{ $lessons }}</h2>
                <p style="font-size: 20px ; color: #989595 ; font-weight: bold ; margin-top: 5px">Total Lectures</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="status__box status__box__v3 bg-style">
            <div class="status__box__img">
                <img src="/dashboard-icons/checklist.png" alt="icon">
            </div>
            <div class="status__box__text">
                <h2 style="color: #ff42a1">{{ $homeworks }}</h2>
                <p style="font-size: 20px ; color: #989595 ; font-weight: bold ; margin-top: 5px">Total Homeworks</p>
            </div>
        </div>
    </div>
</div>
@endsection
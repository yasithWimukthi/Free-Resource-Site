<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>free resources</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="https://www.globaledulink.co.uk/wp-content/uploads/2020/01/GEL_Favicon2.png"/>
</head>

<body style="margin:20px !important;min-height:1000px " >

<div style="margin:20px !important; display: flex;flex-direction:column; width: 1000px">
    <header style="width: 1000px">
        <nav class="navbar navbar-expand-xl navbar-light bg-white sticky-top" style="width: 1000px;">
            <div class="container">
                <a class="navbar-brand me-0" href="#">
                    <img src="https://www.globaledulink.co.uk/wp-content/uploads/2020/10/gel_log.png" alt=""
                         class="d-inline-block align-text-top">
                </a>

                <!--Responsive icons-->
                <ul class="navbar-nav ms-auto notification-btns d-xl-none flex-row hide-destop">
                    <li class="nav-item">
                        <a class="btn btn-icon" href="#"><i class="fa fa-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-icon" href="#">
                            <i class="fa fa-heart"></i>
                            <span class="notification-badge">icons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-icon" href="#">
                            <i class="fa fa-shopping-basket"></i>
                            <!--<span class="notification-badge"></span>-->
                        </a>
                    </li>
                </ul>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="margin-right: 20px">
                            <a class="nav-link" href="#">Courses</a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px; ">
                            <a class="nav-link" href="#" style="width: 150px;">Awarding bodies</a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px">
                            <a class="nav-link" href="#" style="width: 120px;">Our products</a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px">
                            <a class="nav-link" href="#">Freebies</a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right: 20px;width: 100px !important; ">
                        <li class="nav-item" style="width: auto">
                            <a href="#" class="btn btn-outline-primary rounded-pill" style="width: 150px;">Enquiry Now</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav notification-btns ms-auto mb-2 mb-lg-0 d-xl-flex d-none">
                        <li class="nav-item">
                            <a class="btn btn-icon" href="#"><i class="fa fa-search"></i></a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="btn btn-icon" href="#">--}}
{{--                                <i class="fa fa-heart"></i>--}}
{{--                                <span class="notification-badge">icons</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="btn btn-icon" href="#">--}}
{{--                                <i class="fa fa-shopping-basket"></i>--}}
{{--                                <span class="notification-badge d-none">icons</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="d-flex loginDiv" style="margin-left: 100px">
                        <a href="#" class="btn btn-info rounded-pill" style="width: 100px">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
{{--    <a href="/logout">Logout</a>--}}
    <div class="row" style="flex-grow: 1;">
        <!-- side navigation -->
        <div class="col d-none d-sm-none d-md-inline col-3" style="background-color: aliceblue; padding-top:20px">
            <h4 style="text-align:center;">Refine your Search</h4><br>
            <h4>Awarding bodies</h4>

            <div class="container">
                @foreach($awardingbodies as $awardingBody)
                    <div class="form-check custom-control custom-checkbox mb-3">
                        <input
                            class="form-check-input custom-control-input awarding-body-check-box"
                            type="checkbox"
                            id="{{$awardingBody->name}}-check-box"
                            name="{{$awardingBody->id}}"
                            @click="selectAwardingBody({{$awardingBody->id}})">
                        <label class="form-check-label custom-control-label"
                               for="{{$awardingBody->name}}-check-box">{{$awardingBody->name}}</label>
                    </div>
                @endforeach
            </div>

            <h4>Courses</h4>
            <form action="#" class="courses container course-container">
                <p></p>
            </form>

            <h4 >Resource Type</h4>
            <div class="container">
                <div class="form-check custom-control custom-checkbox mb-3">
                    <input
                        class="form-check-input custom-control-input resource-check-box exam-check-box"
                        type="checkbox"
                        id="exam-check-box"
                        name="exam"
                    >
                    <label class="form-check-label custom-control-label" for="exam-check-box">Exam</label>
                </div>
                <div class="form-check custom-control custom-checkbox mb-3">
                    <input
                        class="form-check-input custom-control-input resource-check-box document-check-box"
                        type="checkbox"
                        id="document-check-box"
                        name="document"
                    >
                    <label class="form-check-label custom-control-label" for="document-check-box">Document</label>
                </div>
            </div>
            <div class="row m-0 causes_div">

            </div>
        </div>

        <!-- main area -->
        <div class="col-8">
                <div class="d-flex flex-row flex-grow-1 right-container" style="height: inherrit; padding-left: 20px">
{{--                                <div class="card" style="width: 300px; height: 350px; margin: 10px; border: 1px solid #ccc">--}}
{{--                                    <img class="card-img-top" src="//placeimg.com/280/180/tech" alt="Card image cap">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <h5 class="card-title border-bottom pb-3">Card title <a href="#" class="float-right d-inline-flex share"><i class="fas fa-share-alt text-primary"></i></a></h5>--}}
{{--                                        <button type="button" class="btn btn-primary">View Now</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                    @foreach($courses as $course)
                        <div class="card" style="width: 800px !important; height: 350px; margin: 10px; border: 1px solid #ccc">
                            <img class="card-img-top" src="/storage/{{$course->image}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title border-bottom pb-3">{{$course->name}} <a href="#" class="float-right d-inline-flex share"><i class="fas fa-share-alt text-primary"></i></a></h5>
                                <button type="button" class="btn btn-primary">View Now</button>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
<br><br>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script src="{{ asset('assets/js/filter.js') }}"></script>
</body>



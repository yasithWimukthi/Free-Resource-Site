<div>

    <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark" style="background: rgb(255,255,255);">
        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav flex-grow-1 justify-content-between">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-apple apple-logo"></i>&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Awarding Body</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Our Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Freebies</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Enquiry Now</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-search"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-heart"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="d-flex flex-row" style="height: 100%;margin-top: 55px">
        <div style="width: 200px;height: 100%;">
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <div id="sidenavAccordion" class="sb-sidenav accordion sb-sidenav-dark">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div>
                                    <div class="sb-sidenav-menu-heading"><span>refine your searches</span></div>
                                </div>
                                <div>
                                    <div class="sb-sidenav-menu-heading"><span>Awarding bodies</span></div>
                                </div>
                                <div class="container">
                                    @foreach($awardingbodies as $awardingBody)
                                    <div class="form-check custom-control custom-checkbox mb-3">
                                        <input
                                            class="form-check-input custom-control-input awarding-body-check-box"
                                            type="checkbox"
                                            id="{{$awardingBody->name}}-check-box"
                                            name="{{$awardingBody->id}}"
                                            @click="selectAwardingBody({{$awardingBody->id}})" >
                                        <label class="form-check-label custom-control-label" for="{{$awardingBody->name}}-check-box">{{$awardingBody->name}}</label>
                                    </div>
                                    @endforeach
                                </div>

                                <div>
                                    <div class="sb-sidenav-menu-heading"><span>Courses</span></div>
                                </div>
                                <div class="container course-container" >
{{--                                        <div class="form-check custom-control custom-checkbox mb-3">--}}
{{--                                            <input--}}
{{--                                                class="form-check-input custom-control-input course-check-box"--}}
{{--                                                type="checkbox"--}}
{{--                                                id="course-check-box"--}}
{{--                                                name="course-check-box"--}}
{{--                                            >--}}
{{--                                            <label class="form-check-label custom-control-label" for="course-check-box">Course 1</label>--}}
{{--                                        </div>--}}
                                </div>

                                <div>
                                    <div class="sb-sidenav-menu-heading"><span>resource types</span></div>
                                </div>
                                <div class="container">
                                        <div class="form-check custom-control custom-checkbox mb-3">
                                            <input
                                                class="form-check-input custom-control-input resource-check-box"
                                                type="checkbox"
                                                id="exam-check-box"
                                                name="exam"
                                                >
                                            <label class="form-check-label custom-control-label" for="exam-check-box">Exam</label>
                                        </div>
                                        <div class="form-check custom-control custom-checkbox mb-3">
                                            <input
                                                class="form-check-input custom-control-input resource-check-box"
                                                type="checkbox"
                                                id="document-check-box"
                                                name="document"
                                            >
                                            <label class="form-check-label custom-control-label" for="document-check-box">Document</label>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small"><span>Logged as : </span></div>
                        </div>
                    </div>
                </div>
                <div id="layoutSidenav_content">
                    <main></main>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row flex-grow-1 right-container" style="height: inherrit; padding-left: 20px" >
{{--            <div class="card" style="width: 300px; height: 350px; margin: 10px; border: 1px solid #ccc">--}}
{{--                <img class="card-img-top" src="//placeimg.com/280/180/tech" alt="Card image cap">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title border-bottom pb-3">Card title <a href="#" class="float-right d-inline-flex share"><i class="fas fa-share-alt text-primary"></i></a></h5>--}}
{{--                    <button type="button" class="btn btn-primary">View Now</button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </main>
</div>

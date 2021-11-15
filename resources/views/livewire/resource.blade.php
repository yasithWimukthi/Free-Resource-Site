<div>
    <main class="d-flex flex-row" style="height: 100%;">
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
                                            class="form-check-input custom-control-input"
                                            type="checkbox"
                                            id="{{$awardingBody->name}}-check-box"
                                            name="{{$awardingBody->name}}"
                                            @click="selectAwardingBody({{$awardingBody->id}})" >
                                        <label class="form-check-label custom-control-label" for="{{$awardingBody->name}}-check-box">{{$awardingBody->name}}</label>
                                    </div>
                                    @endforeach
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
        <div class="d-flex flex-column flex-grow-1" style="height: inherrit; padding-left: 20px">
            <div class="card" style="width: 300px; height: auto; margin: 10px; border: 1px solid #ccc">
                <img class="card-img-top" src="//placeimg.com/280/180/tech" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-3">Card title <a href="#" class="float-right d-inline-flex share"><i class="fas fa-share-alt text-primary"></i></a></h5>
                    <p>
                        @foreach ($awardingBodies as $a)
                            {{$a}}
                            @endforeach
                    </p>
                    <button type="button" class="btn btn-primary">View Now</button>
                </div>
            </div>
        </div>
    </main>
</div>

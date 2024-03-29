<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IPMS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="/static/images/favicon.ico"> -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}">

    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <!-- Style RTL Css -->
    <link rel="stylesheet" href="{{asset('css/style.rtl.css')}}"/>

</head>
<body>
<!-- Loading Animation-->
<div id="layout-loading">
    <div class="loader-effect"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="adv-content">
                    <video autoplay muted loop id="myVideo" src="{{asset('images/img_waiting.webm')}}"
                           type="video/webm">
                        Your browser does not support the video tag.
                    </video>

                </div>
                <div class="adv-overflow">
                    <div class="chosen">
                        <div class="title">أساس الاختيار</div>
                        <ul>
                            <li>
                                <img src="{{asset('images/brush.png')}}">
                                <span><small id="Age">جاري التحميل ..</small> عام</span>
                            </li>
                            <li>
                                <img src="{{asset('images/gender.png')}}">
                                <span id="Gender">جاري التحميل ..</span>
                            </li>
                            <li>
                                <img src="{{asset('images/smile.png')}}">
                                <span id="Emotion">جاري التحميل ..</span>
                            </li>
                            <li>
                                <img src="{{asset('images/glasses.png')}}">
                                <span id="Wearing_Glasses">جاري التحميل ..</span>
                            </li>
                        </ul>
                    </div>
                    <div class="statics">
                        <div class="title">الأحصائيات</div>
                        <fieldset>
                            <legend>المشاهدين</legend>
                            <ul>
                                <li>
                                    <label>الكل</label>
                                    <span style="font-weight: normal" id="All">0</span>
                                </li>
                                <li>
                                    <label>الذكور</label>
                                    <span style="font-weight: normal" id="Males">0</span>
                                </li>
                                <li>
                                    <label>الاناث</label>
                                    <span style="font-weight: normal" id="Females">0</span>
                                </li>
                                <li>
                                    <label>النظارات</label>
                                    <span style="font-weight: normal" id="Glasses">0</span>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset>
                            <legend>الإعلانات</legend>
                            <ul>
                                <li>
                                    <label>إعلانات ذكور</label>
                                    <span style="font-weight: normal" id="Males_Ads">0</span>
                                </li>
                                <li>
                                    <label>إعلانات الاناث</label>
                                    <span style="font-weight: normal" id="Females_Ads">0</span>
                                </li>
                                <li>
                                    <label>إعلانات النظارات</label>
                                    <span style="font-weight: normal" id="Glasses_Ads">0</span>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset>
                            <legend>وقت مشاهدة الإعلان</legend>
                            <ul>
                                <li>
                                    <label>للمشاهد الحالي</label>
                                    <span style="font-weight: normal" id="Current_Viewer">0</span>
                                </li>
                                <li>
                                    <label>الوقت الكلي</label>
                                    <span style="font-weight: normal" id="Total_times">0</span>
                                </li>
                                <br>
                                <small>الوقت بالثواني</small>
                            </ul>
                        </fieldset>
                        <fieldset>
                            <legend> ابتسم ل <small id="emotion_to_zero">7</small> ثواني</legend>
                            <ul>
                                <li>
                                    <label id="Happy">سعيد</label>
                                    <div class="progress">
                                        <div class="progress-bar" id="progressHappy" role="progressbar"
                                             aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label id="Normal">طبيعي</label>
                                    <div class="progress">
                                        <div class="progress-bar" id="progressNormal" role="progressbar"
                                             style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="wrap">


    <!-- Header -->
    <div id="header">
        <div class="navigation fixed-top background scroll">
            <div class="container">
                <nav id="navbar-example" class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand brand-logo" target="-blank" href="http://wakeb.tech/">
                        <img src="{{asset('images/logo.png')}}" alt="Wakeb" title="Wakeb">
                    </a>

                    <button class="navbar-toggler hamburger " style=" visibility: visible;" type="button"
                            data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="hamburger-box">
                            <span class="hamburger-label"></span>
                            <span class="hamburger-inner"></span>
                          </span>
                    </button>

                    <div class="top-nav collapse navbar-collapse" id="nav-content">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{url('/')}}">الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">المنتجات</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">الخدمات</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">الحلول</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">الأخبار</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">من نحن</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">تواصل معنا</a>
                            </li>
                            @if(session()->get('locale') == 'ar')
                                <li class="nav-item d-flex align-items-center">
                                    <a href={{route('locale', 'en')}}>
                                        <img src="{{asset('images/lang.png')}}" class="mr-1">
                                        <span>الانجليزية</span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item d-flex align-items-center">
                                    <a href={{route('locale', 'ar')}}>
                                        <img src="{{asset('images/lang.png')}}" class="mr-1">
                                        <span>Arabic</span>
                                    </a>
                                </li>
                            @endif
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a>
                                    {{--                                    {{ __('Login') }}--}}
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{--                                            {{ __('Logout') }}--}}
                                            تسجيل خروج
                                        </a>
                                        <a class="dropdown-item"
                                           href="@if(Auth::user()->role == 1)
                                                    {{route('admin.home')}}
                                                @else
                                                    {{route('client.home')}}
                                                @endif
                                           ">{{trans('admin/layout.Dashboard')}}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!--/. Header -->

    <!-- Page intro -->
    <div id="hero-bg" class="scroll top">
        <div class="container">
            <div class="hero-inner row">
                <div class="col-lg-6 col-md-7">
                    <div class="hero-content">
                        <div class="powered-by">
                            <div class="media">
                                <img src="{{asset('images/robot.png')}}" class="mr-2">
                                <div class="media-body">
                                    <h5 class="my-0">Product powered by</h5>
                                    <h3 class="my-0">MASBAR</h3>
                                </div>
                            </div>
                        </div>
                        <h1>نظام التسويق الشخصي الذكي (IPMS)</h1>
                        <p>الإعلان ( الموجه ) الذكي هي خدمة إعلانية متخصصة، تعتمد على رؤية الكمبيوتر والتعلم الآلي. تقوم
                            بتحديد المسافرين في الأماكن المفتوحة مثل متاجر التسوق، وتتعرف على ملامح الوجه الخاصة بهم
                            وتحديد المتغيرات مثل الجنس والعمر والتعبيرات العاطفية وارتداء النظارات وغيرها ثم تقوم بتحليل
                            تلك البيانات والوصول للتوصية للإعلانات بناءً على هذه النتائج.</p>
                        <ul>
                            @guest
                                <li>الخطوة الأولى</li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><span>تسجيل الدخول</span></a>
                                </li>
                                <li class="check"><img src="{{asset('images/check.png')}}"></li>
                            @endguest
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 hide-small">
                    <div class="here-side-img">
                        <img src="{{asset('images/face-IPMS.svg')}}" width="400px">
                        <div id="videocontainer" class="divcontainer text-center" style="display: none;">
                            <video onplay="onPlay(this)" id="inputVideo" autoplay muted type="video/webm"></video>
                            <canvas id="overlay"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /. Page intro -->

    <!--Footer-->
    <div class="dark-footer">
        <div class="container">
            <div class="row">
                <div class="logo col-md-4 ">
                    <a target="_blank" href="http://wakeb.tech/"><img src="{{asset('images/light-wakeb.png')}}"
                                                                      alt="wakeb"
                                                                      title="wakeb"></a>
                </div>
                <div class="col-md-8 cpr">
                    تم التطوير بواسطة واكب, جميع حقوق النشر محفوظة © 2019
                </div>
            </div>
        </div>
    </div>
    <!-- /. Footer -->


</div><!--./wrap -->


<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/face-api.min.js')}}"></script>


<script>
    faceapi.loadTinyFaceDetectorModel("{{asset('models')}}")

    faceapi.nets.ageGenderNet.loadFromUri("{{asset('models')}}")
    faceapi.nets.ssdMobilenetv1.loadFromUri("{{asset('models')}}")

    faceapi.nets.faceLandmark68Net.loadFromUri("{{asset('models')}}")
    faceapi.nets.faceExpressionNet.loadFromUri("{{asset('models')}}")
</script>
<script>
    // start of javascript ...................................
    // ...............................................................
    // ...............................................................
    // ...............................................................
    // ...............................................................
    // ...............................................................
    // ...............................................................
    // ...............................................................
    $(document).ready(function () {
        faceapi.tf.ENV.set('WEBGL_PACK', false)

    })
    const videoEl = document.getElementById('inputVideo')
    const canvas = document.getElementById('overlay')
    var video1 = document.getElementById("myVideo");

    function load_models() {
        faceapi.nets.tinyFaceDetector.loadFromUri("{{asset('models')}}")
        faceapi.nets.ageGenderNet.loadFromUri("{{asset('models')}}")
        faceapi.nets.ssdMobilenetv1.loadFromUri("{{asset('models')}}")

        faceapi.nets.faceExpressionNet.loadFromUri("{{asset('models')}}")

    }

    async function wait_for_load_models() {
        await load_models();
        console.log("models have been loaded")
    };

    async function run() {

        const stream = await navigator.mediaDevices.getUserMedia({video: true})
        videoEl.srcObject = stream;

    }

    function resizeCanvasAndResults(dimensions, canvas, results) {
        const {width, height} = dimensions instanceof HTMLVideoElement
            ? faceapi.getMediaDimensions(dimensions)
            : dimensions
        //return results.map(res => res)
        return results
    };

    function drawDetections(dimensions, canvas, results) {

    };

    function median(values) {
        if (values.length === 0) return 0;

        values.sort(function (a, b) {
            return a - b;
        });

        var half = Math.floor(values.length / 2);

        if (values.length % 2)
            return values[half];

        return (values[half - 1] + values[half]) / 2.0;
    }

    function getRandomArbitrary(min, max) {
        return Math.floor(Math.random() * (max - min) + min)
    }

    async function onPlay(videoEl) {

        const options = new faceapi.TinyFaceDetectorOptions({inputSize: 416, scoreThreshold: 0.2})
        var result = await faceapi.detectSingleFace(videoEl, options).withFaceLandmarks().withFaceExpressions().withAgeAndGender()

        if (result) {
            //console.log(result.age)
            if (ageCorrector === 1) {
                average_age = [result.age]
                ageCorrector = 0
            } else {
                average_age.push(result.age)

            }
            var age1 = Math.round(median(average_age))
            gender1 = result.gender
            var ex = result.expressions
            var ex1 = Object.keys(ex).reduce((a, b) => ex[a] > ex[b] ? a : b);


            document.getElementById('emotion_to_zero').innerHTML = emotion_to_zero;
            if (start_smiling_counter === 1) {
                emotion_to_zero = emotion_to_zero - 1
            }


            if (emotion_to_zero < 1) {
                emotion_to_zero = 7
                happyCounter = 0
                normalCounter = 0
                start_smiling_counter = 0
            }

            document.getElementById('Age').innerHTML = age1;
            if (gender1 === "male") {
                document.getElementById('Gender').innerHTML = "رجل";
            } else if (gender1 === "female") {
                document.getElementById('Gender').innerHTML = "إمرأه";
            }

            if (ex1 === "neutral") {
                document.getElementById('Emotion').innerHTML = "طبيعي";

                document.getElementById("Happy").style.color = "black";
                document.getElementById("Normal").style.color = "green";

                normalCounter = normalCounter + 1
                var percentageNormal = Math.round((normalCounter / (normalCounter + happyCounter)) * 100)
                var percentageHappy = Math.round((happyCounter / (normalCounter + happyCounter)) * 100)

                document.getElementById("progressNormal").style.width = percentageNormal.toString() + "%"
                document.getElementById("progressHappy").style.width = percentageHappy.toString() + "%"


            } else if (ex1 === "happy") {
                start_smiling_counter = 1
                document.getElementById('Emotion').innerHTML = "سعيد";

                document.getElementById("Happy").style.color = "green";
                document.getElementById("Normal").style.color = "black";

                happyCounter = happyCounter + 1
                var percentageNormal = Math.round((normalCounter / (normalCounter + happyCounter)) * 100)
                var percentageHappy = Math.round((happyCounter / (normalCounter + happyCounter)) * 100)
                document.getElementById("progressNormal").style.width = percentageNormal.toString() + "%"
                document.getElementById("progressHappy").style.width = percentageHappy.toString() + "%"

            } else if (ex1 === "sad") {
                document.getElementById('Emotion').innerHTML = "حزين";

                document.getElementById("Happy").style.color = "black";
                document.getElementById("Normal").style.color = "black";
            } else if (ex1 === "angry") {
                document.getElementById("Happy").style.color = "black";
                document.getElementById("Normal").style.color = "black";
            } else if (ex1 === "fearful") {
                document.getElementById("Happy").style.color = "black";
                document.getElementById("Normal").style.color = "black";
            } else if (ex1 === "disgusted") {
                document.getElementById("Happy").style.color = "black";
                document.getElementById("Normal").style.color = "black";
            } else if (ex1 === "surprised") {
                document.getElementById("Happy").style.color = "black";
                document.getElementById("Normal").style.color = "black";
            }


            if (run_every_other_time === 1) {

                const resizedResults = resizeCanvasAndResults(videoEl, canvas, result.detection)

                cropped_box = resizedResults.box

                dim_x = Math.round(cropped_box.x)
                dim_y = Math.round(cropped_box.y)
                dim_width = Math.round(cropped_box.width)
                dim_height = Math.round(cropped_box.height)
                var crop = {
                    top: Math.max((dim_y - 55), 0),
                    left: dim_x,
                    width: dim_width + 20,
                    height: dim_height + 50
                }
                var ctx = canvas.getContext("2d");

                canvas.width = 128
                canvas.height = 128
                ctx.drawImage(videoEl, crop.left, crop.top, crop.width, crop.height, 0, 0, 128, 128);


                send_canvas_ctx(age1, gender1, ex1);
                run_every_other_time = 0
            } else {
                run_every_other_time = 1
            }


            if (reversecounter > 0 && glassesvariable != '') {

                counter = counter + 1
                document.getElementById('All').innerHTML = counter;
                console.log("a new person passed by ")

                if (gender1 === "male" && glassesvariable === 'glasses') {

                    countermanglasses = countermanglasses + 1
                    document.getElementById('Males').innerHTML = countermanglasses + countermannoglasses;
                    document.getElementById('Glasses').innerHTML = countermanglasses + counterwomanglasses;
                } else if (gender1 === "female" && glassesvariable === 'glasses') {

                    counterwomanglasses = counterwomanglasses + 1
                    document.getElementById('Females').innerHTML = counterwomanglasses + counterwomannoglasses;
                    document.getElementById('Glasses').innerHTML = countermanglasses + counterwomanglasses;
                } else if (gender1 === "male" && glassesvariable === 'noglasses') {

                    countermannoglasses = countermannoglasses + 1
                    document.getElementById('Males').innerHTML = countermanglasses + countermannoglasses;
                } else if (gender1 === "female" && glassesvariable === 'noglasses') {

                    counterwomannoglasses = counterwomannoglasses + 1
                    document.getElementById('Females').innerHTML = counterwomanglasses + counterwomannoglasses;
                }


            }
            time_in_front_of_camera = time_in_front_of_camera + 1
            document.getElementById('Current_Viewer').innerHTML = time_in_front_of_camera;
            document.getElementById('Total_times').innerHTML = total_time + time_in_front_of_camera;


            if (glassesvariable != '') {
                reversecounter = 0
            }
            reverse_time_in_front_of_camera = 0


        } else {
            ageCorrector = 1
            emotion_to_zero = 0
            document.getElementById('emotion_to_zero').innerHTML = emotion_to_zero;
            document.getElementById("progressNormal").style.width = "0%"
            document.getElementById("progressHappy").style.width = "0%"


            current_video = ""
            if (video1.getAttribute("src") !== "{{asset('images/img_waiting.webm')}}") {
                video1.setAttribute("src", "{{asset('images/img_waiting.webm')}}")
            }
            reversecounter = reversecounter + 1

            reverse_time_in_front_of_camera = reverse_time_in_front_of_camera + 1
            if (reverse_time_in_front_of_camera > 0 && time_in_front_of_camera > 0) {
                console.log("time spent by last person was: ")
                console.log(time_in_front_of_camera)
                total_time = total_time + time_in_front_of_camera
                time_in_front_of_camera = 0
                reverse_time_in_front_of_camera = 0
                document.getElementById('Current_Viewer').innerHTML = 0;
                document.getElementById('Total_times').innerHTML = total_time;


            }

        }
        //console.log(ageCorrector)
        //console.log(age1)
        //console.log(average_age)
    }

    document.getElementById("snap").addEventListener("click", function () {
        run()
    });
    var counter = 0
    var happyCounter = 0
    var normalCounter = 0
    var sadCounter = 0
    var countermanglasses = 0
    var countermannoglasses = 0
    var counterwomanglasses = 0
    var counterwomannoglasses = 0
    var reversecounter = 20000
    var time_in_front_of_camera = 0
    var total_time = 0
    var reverse_time_in_front_of_camera = 0
    var gender1 = ''
    var glassesvariable = ''
    var sadzone = 0
    var emotion_to_zero = 7
    var Males_Ads = 0
    var Females_Ads = 0
    var Glasses_Ads = 0
    var average_age = [0]
    var ageCorrector = 1
    run_every_other_time = 1
    var start_smiling_counter = 0
    document.getElementById("play").addEventListener("click", function () {
        window.setInterval(function () {
            onPlay(videoEl)
        }, 1000);
    });
    var current_video = ""

    function send_canvas_ctx(age1, gender1, ex1) {

        input_data = canvas.toDataURL('image/png');
        window.fetch('/snap_a_signal', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                data: input_data,
                selected_model: "glass"
            })
        }).then((response) => response.json()).then((json) => {
            message_to_show = json["results"] + '\n' + json["accuracy"]
            glassesvariable = json["results"]
            if (video1.getAttribute("src") === "{{asset('images/m1.webm')}}" ||
                video1.getAttribute("src") === "{{asset('images/m2.webm')}}" ||
                video1.getAttribute("src") === "{{asset('images/m3.webm')}}"
            ) {
                current_video = "man"
            } else if (video1.getAttribute("src") === "{{asset('images/w.webm')}}") {
                current_video = "woman"
            } else if (video1.getAttribute("src") === "{{asset('images/g1.webm')}}" ||
                video1.getAttribute("src") === "{{asset('images/g2.webm')}}" ||
                video1.getAttribute("src") === "{{asset('images/g3.webm')}}"
            ) {
                current_video = "glasses"
            }
            //else if (video1.getAttribute("src") === "{{asset('images/sad.mp4')}}") {
            //   current_video = "sad"
            //}
            // if (ex1 === "sad" || sadzone > 0){
            // if (current_video != "sad"){
            //     sadzone = 7
            //      video1.setAttribute("src", "{{asset('images/sad.mp4')}}")
            //   }
            //} else
            if (json["results"] === "glasses") {
                if (current_video != "glasses") {
                    document.getElementById('Wearing_Glasses').innerHTML = "يرتدي نظارة";
                    var randomnum = getRandomArbitrary(1, 4)
                    if (randomnum === 1) {
                        video1.setAttribute("src", "{{asset('images/g1.webm')}}")
                    } else if (randomnum === 2) {
                        video1.setAttribute("src", "{{asset('images/g2.webm')}}")
                    } else if (randomnum === 3) {
                        video1.setAttribute("src", "{{asset('images/g3.webm')}}")
                    }
                    Glasses_Ads = Glasses_Ads + 1
                    document.getElementById('Glasses_Ads').innerHTML = Glasses_Ads;
                }
            } else if (json["results"] === "noglasses") {
                document.getElementById('Wearing_Glasses').innerHTML = "لا يرتدي نظارة";
                if (gender1 === "male") {
                    if (current_video != "man") {
                        Males_Ads = Males_Ads + 1
                        document.getElementById('Males_Ads').innerHTML = Males_Ads;
                        var randomnum = getRandomArbitrary(1, 4)
                        if (randomnum === 1) {
                            video1.setAttribute("src", "{{asset('images/m1.webm')}}'")
                        } else if (randomnum === 2) {
                            video1.setAttribute("src", "{{asset('images/m2.webm')}}")
                        } else if (randomnum === 3) {
                            video1.setAttribute("src", "{{asset('images/m3.webm')}}")
                        }

                    }
                } else if (gender1 === "female") {
                    if (current_video != "woman") {
                        video1.setAttribute("src", "{{asset('images/w.webm')}}")

                        Females_Ads = Females_Ads + 1
                        document.getElementById('Females_Ads').innerHTML = Females_Ads;
                    }
                }
            }

            //if (sadzone > 0){
            //    sadzone = sadzone - 1
            //}

        });
    }

</script>
<script src="{{asset('js/functions.js')}}"></script>

</body>
</html>

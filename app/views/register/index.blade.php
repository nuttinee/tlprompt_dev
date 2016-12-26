<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="Title" />
    <meta name="keywords" content="Title" />
    <title>Thai Life Prompt</title>
    <link rel="SHORTCUT ICON" href="assets/img/favicon.ico" />

    <!-- plugin css -->
    <link rel="stylesheet" type="text/css" href="assets/js/jquery.fancybox/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/pickadate/themes/classic.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/pickadate/themes/classic.date.css" />

    <!-- layout css -->
    <link rel="stylesheet" type="text/css" href="assets/css/fonts/icon/tl-prompt/styles.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/share.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
</head>


<body>
    <!-- start header -->
    <div id="header">
        <div class="boxHeaderTop">
            <div class="container">
                <h1 class="logo"><a id="menu_pic_logoTL" href="#">ไทยประกันชีวิต</a></h1>
                <ul class="headerTools">
                    <li>
                        <a class="boxThumbUser" href="#">
                            <img id="menu_pic_profile" src="assets/img/upload/img-profile.jpg" alt=""></a>
                    </li>
                    <li><a id="menu_bt_status" class="btnStatusTopUp" href="#"><i class="icon-tick-inside-circle"></i>สถานะ<br>TOP UP</a></li>
                    <li>
                        <div class="boxVersion">
                            <div class="txt1">ทีแอล <span>พร้อม</span></div>
                            <div id="menu_lb_tlprompt" class="txt2">TL PROMPT</div>
                            <div id="menu_lb_version" class="txt3">V.2.2.5</div>
                        </div>
                    </li>
                    <li><a id="menu_bt_network" class="btnSignal" href="#"><i class="icon-wifi-signal-waves"></i></a></li>
                    <li><a id="menu_bt_logout" class="btnLogout" href="login"><i class="icon-power"></i>ออกจาก<br>ระบบ</a></li>
                </ul>
            </div>
        </div>
        <div class="boxHeaderMenu">
            <div class="container">
                <div class="boxListHeaderMenu">
                    <a id="menu_bt_home" href="#"><span><i class="icon-web-page-home"></i>หน้าหลัก</span></a>
                    <a id="menu_bt_name" class="action" href="#"><span><i class="icon-lead-add fs40 lh0"></i>เพิ่มรายชื่อ<br>ผู้มุ่งหวัง</span></a>
                    <a id="menu_bt_search" href="#"><span><i class="icon-member-search fs40 lh0"></i>ค้นหารายชื่อ<br>ผู้มุ่งหวัง/ลูกค้าเดิม</span></a>
                    <a id="menu_bt_quatation" href="#"><span><i class="icon-file-add fs29"></i>สร้างใบ<br>เสนอขาย</span></a>
                    <a id="menu_bt_searchQuatation" href="#"><span><i class="icon-file-search fs29"></i>ค้นหาข้อมูล<br>ใบเสนอขาย</span></a>
                    <a id="menu_bt_appForm" href="#"><span><i class="icon-paper-search fs29"></i>ใบคำขอ</span></a>
                    <a id="menu_bt_hospital" href="#"><span><i class="icon-health-care"></i>โรงพยาบาล<br>เครือข่าย</span></a>
                    <a id="menu_bt_downloadFrom" href="#"><span><i class="icon-text-documents"></i>ดาวน์โหลด<br>แบบฟอร์ม</span></a>
                    <a id="menu_bt_newUpdate" href="#"><span><i class="icon-info"></i>News <br>UpDate</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <div id="lead_register_page" class="mainContainer">
        <div class="boxTitlePage">
            <div class="container">
                <h1>เพิ่มรายชื่อผู้มุ่งหวัง</h1>

                <div class="boxNoteDateTime">
                    <a id="head_bt_calendar" class="icon-calendar-with-a-clock-time-tools"></a>
                    <span id="head_lb_date">22/10/2559</span> |
                    <span id="head_la_time">13:30 น.</span>
                </div>
            </div>
        </div>

        <div class="boxContentPage">
            <div class="container">
                <div class="bgPaperShadow">
                    <div class="contentPaperShadow">
                        {{ Form::open(['route' => 'register.store','id'=>'postCheckCardId', 'files'=>true]) }}
                        <div class="boxCardId">
                            <label>เลขที่บัตรประชาชน :  </label>
                            <div class="boxInput">
                                <input id="username" name="username" type="text" value="" placeholder="0000000000000" />
                                <button class="btnCheckCardId" id="btnCheckCardId" type="button"><span>ตรวจสอบเลขที่บัตรประชาชน</span></button>
                            </div>
                            <div>*กรณี ระบุ หมายเลขบัตรประชาชน ให้ตรวจสอบ การ์ดเหลือง </div>
                        </div>
                        {{ Form::close() }}
                        <div class="boxListForm">
                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">คำนำหน้า :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group hasSelect">
                                        <select id="dp_title" name="dp_title" class="form-control">
                                                <option value="" hidden>คำนำหน้า</option>
                                                <option value="นาย">นาย</option>
                                                <option value="นาง">นาง</option>
                                                <option value="นางสาว">นางสาว</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">ชื่อ :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group">
                                        <input id="dp_name" name="dp_name" class="form-control" type="text" value="" placeholder="ชื่อ" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">นามสกุล :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group">
                                        <input id="tx_surname" name="tx_surname" class="form-control" type="text" value="" placeholder="นามสกุล" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">เพศ :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group hasSelect">
                                        <select id="dp_sex" name="dp_sex" class="form-control">
                                                <option value="" hidden>เพศ</option>
                                                <option value="ชาย">ชาย</option>
                                                <option value="หญิง">หญิง</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">ระบุวันเกิด :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group hasIcon">
                                        <input id="dp_birthdate" name="dp_birthdate" type='text' class="form-control js_pickadate" value="" placeholder="วัน เดือน ปี" />
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">อายุ :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group">
                                        <input id="tx_age" name="tx_age" class="form-control" type="text" value="" placeholder="00" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">อาชีพ :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group hasSelect">
                                        <select id="dp_ccupation" name="dp_ccupation" class="form-control">
                                                <option value="" hidden>เลือก</option>
                                                <option value="Designer">Designer</option>
                                                <option value="Programmer">Programmer</option>
                                                <option value="Other">Other</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">กรุณากรอก อาชีพ :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group">
                                        <input id="dp_ccupation_other" name="dp_ccupation_other" class="form-control" type="text" value="" placeholder="กรุณากรอก อาชีพ" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">ขั้นอาชีพ :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group hasSelect">
                                        <select id="dp_jobStages" name="dp_jobStages" class="form-control">
                                                <option value="" hidden>0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">เบอร์ติดต่อ :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group">
                                        <input id="tx_tel" name="tx_tel" class="form-control" type="text" value="" placeholder="0000000000" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">อีเมล :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group">
                                        <input id="tx_mail" name="tx_mail" class="form-control" type="text" value="" placeholder="example@example.com" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">Line ID :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group">
                                        <input id="dp_line" name="dp_line" class="form-control" type="text" value="" placeholder="ID000000" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-sm-5 pdl0 txt-sm-right lh-form-control ws-nowrap">Link Facebook :</div>
                                <div class="col-sm-7 pdlr0">
                                    <div class="form-group">
                                        <input id="tx_facebook" name="tx_facebook" class="form-control" type="text" value="" placeholder="http://www.facebook.com/username" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="boxBlue txt-center">
                <div class="container">
                    <button id="bt_save" class="btnSaveLeadRegister btn-style2" type="button"><span><i class="icon-save-file-option"></i> บันทึก</span></button>
                    <button id="bt_restart" class="btn-style3" type="button"><span><i class="icon-reload"></i> เริ่มใหม่</span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- start footer -->
    <div id="footer">
        <div id="Footer_la_address" class="container">
            สงวนสิทธิ์โดย บริษัท ไทยประกันชีวิต จำกัด (มหาชน)<br> 123 ถนนรัชดาภิเษก ดินแดง กรุงเทพฯ 10400 โทร. 02 247 0247
        </div>
    </div>
    <!-- end footer -->

    <!-- start javascript inc -->
    <script type="text/javascript" src="assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="assets/js/TweenMax.mo.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.number/jquery.number.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="assets/js/pickadate/picker.js"></script>
    <script type="text/javascript" src="assets/js/pickadate/picker.date.js"></script>

    <script type="text/javascript" src="assets/js/function.js"></script>
    <!-- end javascript inc -->

    <!-- start javascript this page -->
    <script type="text/javascript">
        $(document).ready(function() {
            // add date
            $('.js_pickadate').pickadate({
                format: 'd mmm yyyy',
                showMonthsShort: true,
                selectMonths: true,
                selectYears: true
            });

            // ctrl
            $('.btnCheckCardId').click(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: this.href,
                    data: $("#postCheckCardId").serializeArray(),
                    success: function(data) {
                            $.fancybox(data, {
                                padding: 0,
                                margin: 0,
                                fitToView: true,
                                autoSize: true,
                                closeClick: false,
                                openEffect: 'none',
                                closeEffect: 'none'
                            }); // fancybox
                        } // success
                }); // ajax
            });
            $('.btnSaveLeadRegister').click(function(e) {
                e.preventDefault();

                $.fancybox({
                    href: 'ajax/popup-lead-register-complete.html',
                    type: 'ajax',
                    padding: 0,
                    margin: 0,
                    fitToView: false
                });
            });
        });
    </script>
    <!-- end javascript this page -->
</body>

</html>
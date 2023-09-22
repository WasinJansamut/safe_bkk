@extends('layouts.boxed.app')
@section('page_title', 'คณะทำงาน')
@section('content')
    <style>
        .refImage {
            position: relative;
            background: white;
            border-radius: 0% 0% 0% 0% / 0% 0% 0% 0%;
            color: white;
            box-shadow: 20px 20px rgba(0, 0, 0, .15);
            transition: all .4s ease;
            margin-bottom: 30px;
            margin-right: 20px;
            height: 60px;
        }

        .refImage:hover {
            border-radius: 0% 0% 50% 50% / 0% 0% 5% 5%;
            box-shadow: 10px 10px rgba(0, 0, 0, .25);
        }
    </style>
    <div class="conatiner-fluid content-inner pb-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title text-center">
                            <h3 class="card-title">รายงานผลงานวิจัย</h3>
                            <p>มุ่งเป้าลดตายและบาดเจ็บ สาหัสของผู้ใช้ มอเตอร์ไซค์ในเมืองหลวง</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>แหล่งข้อมูลที่ใช้ในงานวิจัยนี้</h5>
                        <ul>
                            <li>
                                <strong>
                                    บูรณาการข้อมูลการตายจาก 3 ฐานข้อมูลหลัก ได้แก่ มรณบัตร, POLIS และ E-Claim
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    สำนักงานตำรวจแห่งชาติ: อบถ.ตร.
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    CCTV: สำนักการจราจรและขนส่ง(สจส); กรุงเทพมหานคร, Thai Intelligent Traffic Information
                                    Center Foundation (iTIC)
                                </strong>
                            </li>
                        </ul>
                        <h5>ผู้อำนวยการแผนงานวิจัย</h5>
                        <ul>
                            <li>
                                <strong>นางศรินทร สนธิศิริกฤตย์</strong>
                                - หน่วยงาน/ประธานมูลนิธิปันเพื่อสังคม (นักวิชาการสาธารณสุขเชี่ยวชาญ กรมควบคุมโรค
                                กระทรวงสาธารณสุข)
                            </li>
                        </ul>
                        <h5>ที่ปรึกษาโครงการ</h5>
                        <ul>
                            <li>
                                <strong>ศาสตราจารย์ ดร. เกษม ชูจารุกุล - หน่วยงาน: จุฬาลงกรณ์มหาวิทยาลัย</strong>
                                - สถานที่ติดต่อ: ภาควิชาวิศวกรรมโยธา คณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย
                            </li>
                            <li>
                                <strong>นายธนันท์ชัย เมฆประเสริฐวนิช</strong>
                                - ผู้อำนวยการกองนโยบายและแผนงาน. สำนักการจราจรและขนส่ง. กรุงเทพมหานคร
                            </li>
                            <li>
                                <strong>นายเฉลิมพล โชตนุชิต</strong>
                                - รองปลัด กรุงเทพมหานคร
                            </li>
                            <li>
                                <strong>นายแพทย์สุทัศน์ โชตนะพันธ์</strong>
                                - ผู้อำนวยการสถาบันป้องกันควบคุมโรคเขตเมือง กระทรวงสาธารณสุข
                            </li>
                            <li>
                                <strong>นางนงนุช ตันติธรรม</strong>
                                - รองผอ. กองป้องกันการบาดเจ็บ กรมควบคุมโรค กระทรวงสาธารณสุข
                            <li>
                                <strong>ผศ.ดร.สุภาภรณ์ เกียรติสิน</strong>
                                - หัวหน้ากลุ่มสาขาวิชาเทคโนโลยีการจัดการระบบสารสนเทศ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยมหิดล
                            </li>
                        </ul>
                        <h5>คณะทำงาน</h5>
                        <ul>
                            <li>
                                <strong>ดร. ไอศูรย์ เรืองรัตนอัมพร</strong>
                                - ผู้เชี่ยวชาญด้านการพัฒนาเมือง/ข้อมูลเมือง คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีสุรนารี
                            </li>
                            <li>
                                <strong>นายแพทย์ไผท สิงห์คำ</strong>
                                - ผู้อำนวยการศูนย์นวัตกรรมด้านสุขภาพและป้องกันควบคุมโรค
                                กรมควบคุมโรค กระทรวงสาธารณสุข
                            </li>
                            <li>
                                <strong>ดร.ปัญณ์ จันทร์พาณิชย์</strong>
                                - หัวหน้ากลุ่มฯ นักวิชาการสาธารณสุขชำนาญการ
                                กองป้องกันการบาดเจ็บ กรมควบคุมโรค กระทรวงสาธารณสุข
                            </li>
                            <li>
                                <strong>ผศ.ดร. ทวีศักดิ์ แตะกระโทก</strong>
                                - หัวหน้าภาควิชาวิศวกรรมโยธา วิศวกรรมขนส่ง
                                มหาวิทยาลัยนเรศวร
                            </li>
                            <li>
                                <strong>นายศรา สนธิศิริกฤตย์</strong>
                                - นักวิชาการคอมพิวเตอร์ กองป้องกันการบาดเจ็บ กรมควบคุมโรค
                                กระทรวงสาธารณสุข
                            </li>
                            <li>
                                <strong>นาย วศิลป์ จันทร์สมุทร</strong>
                                - นักวิชาการคอมพิวเตอร์ กองป้องกันการบาดเจ็บ กรมควบคุมโรค
                                กระทรวงสาธารณสุข
                            </li>
                            <li>
                                <strong>นาย อาทร สนธิศิริกฤตย์</strong>
                                - ผู้เชี่ยวชาญด้านการสื่อภาพยนตร์และวีดิทัศน์ หน่วยงานอิสระ
                            </li>
                            <li>
                                <strong>นาง นิติรัตน์ พูลสวัสดิ์</strong>
                                - รองผอ.สถาบันป้องกันควบคุมโรคเขตเมือง กรมควบคุมโรค
                            </li>
                            <li>
                                <strong>นายธนวันต์. กาบภิรมย์</strong>
                                - นักวิชาการสาธารณสุขชำนาญการ สถาบันป้องกันควบคุมโรคเขตเมือง
                                กรมควบคุมโรค
                            </li>
                            <li>
                                <strong>นางสาว สมรักษ์ ศิริเขตรกรณ์</strong>
                                - หัวหน้ากลุ่ม. นักวิชาการสาธารณสุขชำนาญการพิเศษ.
                                กลุ่มนวัตกรรมระบาดวิทยา สถาบันป้องกันควบคุมโรคเขตเมือง
                            </li>
                            <li>
                                <strong>นาย บุญสม สุวรรณปิฎกกุล</strong>
                                - วิศวกรโยธา. (ด้านศึกษาโครงการและวางแผนงาน).
                                หัวหน้ากลุ่มงาน กองนโยบาย และแผน สำนักการจราจรและขนส่ง
                            </li>
                            <li>
                                <strong>นางสาว เพ็ญนภา พรสุพิกุล</strong>
                                - ศูนย์วิชาการเพื่อความปลอดภัยทางถนน (ศวปถ.)
                            </li>
                            <li>
                                <strong>นางสาว ดารารัตน์ ช้างด้วง</strong>
                                - ศูนย์วิชาการเพื่อความปลอดภัยทางถนน (ศวปถ.)
                            </li>
                            <li>
                                <strong>นาย สิทธิโชค สิทธิราชา</strong>
                                - ศูนย์วิจัยเฉพาะทางวิศวกรรมการประเมินและความปลอดภัยยานยนต์
                            </li>
                            <li>
                                <strong>นางสาว วันวิสา สรีระศาสตร์</strong>
                                - นักวิชาการโครงการ กองป้องกันการบาดเจ็บ กรมควบคุมโรค
                                กระทรวงสาธารณสุข
                            </li>
                            <li>
                                <strong>นางสาว ศันศนีย์ หิรัญจันทร์</strong>
                                - อาจารย์พิเศษ สังกัด กลุ่มสาขาการเทคโนโลยีสารสนเทศ
                                คณะวิศวกรรมศาสตร์ มหาวิทยาลัยมหิดล
                            </li>
                            <li>
                                <strong>นาย ภัทรพล สุเมธลักษณ์</strong>
                                - อาจารย์พิเศษ สังกัด กลุ่มสาขาการเทคโนโลยีสารสนเทศ
                                คณะวิศวกรรมศาสตร์ มหาวิทยาลัยมหิดล
                            </li>
                            <li>
                                <strong>นางสาว มิสึโกะ ทาซิโร</strong>
                                - เจ้าหน้าที่การเงิน มูลนิธิปันเพื่อสังคม
                            </li>
                        </ul>
                        <h5>หน่วยงานหลัก</h5>
                        <ul>
                            <li><strong>มูลนิธิปันเพื่อสังคม</strong></li>
                            <li><strong>สำนักการจราจรและขนส่ง กรุงเทพมหานคร</strong></li>
                            <li><strong>ศูนย์วิชาการเพื่อความปลอดภัยทางถนน (ศวปถ.)</strong></li>
                            <li><strong>กองป้องกันการบาดเจ็บ กรมควบคุมโรค กระทรวงสาธารณสุข</strong></li>
                            <li><strong>คณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</strong></li>
                            <li><strong>สาขาวิชาวิศวกรรมขนส่ง สำนักวิชาวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีสุรนารี</strong>
                            </li>
                            <li><strong>ศูนย์บริการการแพทย์ฉุกเฉิน (เอราวัณ) กรุงเทพมหานคร</strong></li>
                            <li><strong>สถาบันการแพทย์ฉุกเฉินแห่งชาติ</strong></li>
                            <li><strong>คณะวิศวกรรมศาสตร์ มหาวิทยาลัยภาคตะวันออกเฉียงเหนือ</strong></li>
                        </ul>
                        <a href="https://dip.ddc.moph.go.th/rtddi/public/"> <img class="refImage"
                                src="{{ asset('/images/logo/rtddi.png') }}" alt=""> </a>
                        <a href="https://ddc.moph.go.th/iudc/"> <img class="refImage"
                                src="{{ asset('/images/logo/iudc.png') }}" alt=""> </a>
                        <a href="https://www.thairsc.com/"> <img class="refImage"
                                src="https://www.thairsc.com/img/logo_THAIRSC.67d70ccf.png" alt=""> </a>
                        <a href="https://www.royalthaipolice.go.th/"> <img class="refImage"
                                src="https://www.royalthaipolice.go.th/images/logo.png" alt=""> </a>
                        <a href="https://dip.ddc.moph.go.th/new/"> <img class="refImage"
                                src="https://dip.ddc.moph.go.th/new/photo/logo/2020/1585198053_1-org.png" alt="">
                        </a>
                        <a href="https://iticfoundation.org/"> <img class="refImage"
                                src="https://iticfoundation.org/wp-content/uploads/2020/12/thaitraffic3_logo.png"
                                alt=""> </a>
                        <a href="https://www.thairap.org/"> <img class="refImage"
                                src="{{ asset('/images/logo/thairap.webp') }}" alt=""> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

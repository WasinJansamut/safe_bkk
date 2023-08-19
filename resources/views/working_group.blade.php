@extends('layouts.boxed.app')
@section('page_title', 'คณะทำงาน')
@section('content')
    <style>

        .refImage{
            position: relative;
            background: white;
            border-radius: 0% 0% 0% 0% / 0% 0% 0% 0% ;
            color: white;
            box-shadow: 20px 20px rgba(0,0,0,.15);
            transition: all .4s ease;
            margin-bottom: 30px;
            margin-right: 20px;
            height: 60px;
        }
        .refImage:hover {
            border-radius: 0% 0% 50% 50% / 0% 0% 5% 5% ;
            box-shadow: 10px 10px rgba(0,0,0,.25);
        }

    </style>
    <div class="conatiner-fluid content-inner pb-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h3 class="card-title">โครงการนำร่องยุทธศาสตร์เชิงรุกด้านความปลอดภัยทางถนนสู่วิถีแห่งระบบที่ปลอดภัย</h3>
                            <p>Proactive Road Safety Strategy Pilot Scheme to Safe System Approach)</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>แหล่งข้อมูลที่ใช้ในงานวิจัยนี้</h5>
                        <ul>
                            <li><strong>บูรณาการข้อมูลการตายจาก 3 ฐานข้อมูลหลัก ได้แก่ มรณบัตร, POLIS และ E-Claim</strong> </li>
                            <li><strong>เมืือง</strong> - หน่วยงาน: จุฬาลงกรณ์มหาวิทยาลัย - สถานที่ติดต่อ: ภาควิชาวิศวกรรมโยธา คณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</li>
                        </ul>
                        <h5>ผู้อำนวยการแผนงานวิจัย</h5>
                        <ul>
                            <li><strong>นางศรินทร สนธิศิริกฤตย์</strong> - หน่วยงาน /ประธานมูลนิธิปันเพื่อสังคม (นักวิชาการสาธารณสุขเชี่ยวชาญ กรมควบคุมโรค กระทรวงสาธารณสุข) </li>
                            <li><strong>ศาสตราจารย์ ดร. เกษม ชูจารุกุล</strong> - หน่วยงาน: จุฬาลงกรณ์มหาวิทยาลัย - สถานที่ติดต่อ: ภาควิชาวิศวกรรมโยธา คณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</li>
                            <li><strong>ดร.ณภัทร จาตุศรีพิทักษ์</strong> - หน่วยงาน: บริษัท สยามเมทริกซ์คอนซัลติง้ จํำกัด (สําานักงานใหญ่) และ Thailand Future</li>
                        </ul>
                        <h5>ที่ปรึกษาโครงการ</h5>
                        <ul>
                            <li><strong>นายสมพงษ์ เวียงแก้ว</strong> - ที่ปรึกษาผู้ว่าราชการกรุงเทพมหานคร </li>
                            <li><strong>นางสุธาทิพย์ สนเอี่ยม</strong> - รองปลัด กรุงเทพมหานคร</li>
                            <li><strong>นายเฉลิมพล โชตนุชิต</strong> - รองปลัด กรุงเทพมหานคร </li>
                            <li><strong>นายประพาส เหลืองศิรินภา</strong> - ผู้อำนวยการสำนักการจราจรและขนส่ง กรุงเทพมหานคร </li>
                            <li><strong>นายแพทย์สุทัศน์ โชตนะพันธ์</strong> - ผู้อำนวยการสถาบันป้องกันควบคุมโรคเขตเมือง กระทรวงสาธารณสุข  </li>
                            <li><strong>นางนงนุช ตันติธรรม</strong> - รองผอ. กองป้องกันการบาดเจ็บ กรมควบคุมโรค กระทรวงสาธารณสุข  </li>
                        </ul>
                        <h5>คณะทำงาน</h5>
                        <ul>
                            <li><strong>นายแพทย์ไผท สิงห์คำ</strong> - ผู้อำนวยการศูนย์นวัตกรรมด้านสุขภาพและป้องกันควบคุมโรค กรมควบคุมโรค กระทรวงสาธารณสุข  </li>
                            <li><strong>นายศรา สนธิศิริกฤตย์ </strong> - นักวิชาการคอมพิวเตอร์ กองป้องกันการบาดเจ็บ กรมควบคุมโรค กระทรวงสาธารณสุข</li>
                            <li><strong>ดร.ไอศูรย์ เรืองรัตนอัมพร</strong> - ผู้เชี่ยวชาญด้านการพัฒนาเมือง/ข้อมูลเมือง คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีสุรนารี </li>
                            <li><strong>นางนิติรัตน์ พูลสวัสดิ์ </strong> - รองผอ.สถาบันป้องกันควบคุมโรคเขตเมือง กรมควบคุมโรค </li>
                        </ul>
                        <h5>หน่วยงานหลัก</h5>
                        <ul>
                            <li><strong>มูลนิธิปันเพื่อสังคม </strong>
                            <li><strong>สำนักการจราจรและขนส่ง กรุงเทพมหานคร</strong>
                            <li><strong>กองป้องกันการบาดเจ็บ กรมควบคุมโรค กระทรวงสาธารณสุข</strong>
                            <li><strong>คณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</strong>
                            <li><strong>สาขาวิชาวิศวกรรมขนส่ง สำนักวิชาวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีสุรนารี</strong>
                            <li><strong>ศูนย์บริการการแพทย์ฉุกเฉิน (เอราวัณ) กรุงเทพมหานคร</strong>
                            <li><strong>สถาบันการแพทย์ฉุกเฉินแห่งชาติ </strong>
                            <li><strong>คณะวิศวกรรมศาสตร์ มหาวิทยาลัยภาคตะวันออกเฉียงเหนือ </strong>
                        </ul>
                        <a href="https://dip.ddc.moph.go.th/rtddi/public/">  <img class="refImage" src="{{ url('/images/logo/rtddi.png') }}" alt=""> </a>
                        <a href="https://ddc.moph.go.th/iudc/">  <img class="refImage"  src="{{ url('/images/logo/iudc.png') }}" alt="">  </a>
                        <a href="https://www.thairsc.com/">  <img class="refImage"  src="https://www.thairsc.com/img/logo_THAIRSC.67d70ccf.png" alt="">  </a>
                        <a href="https://www.royalthaipolice.go.th/">  <img class="refImage"  src="https://www.royalthaipolice.go.th/images/logo.png" alt="">  </a>
                        <a href="https://dip.ddc.moph.go.th/new/">  <img class="refImage"  src="https://dip.ddc.moph.go.th/new/photo/logo/2020/1585198053_1-org.png" alt="">  </a>
                        <a href="https://iticfoundation.org/">  <img class="refImage"  src="https://iticfoundation.org/wp-content/uploads/2020/12/thaitraffic3_logo.png" alt="">  </a>
                        <a href="https://www.thairap.org/">  <img class="refImage"  src="{{ url('/images/logo/thairap.webp') }}" alt="">  </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

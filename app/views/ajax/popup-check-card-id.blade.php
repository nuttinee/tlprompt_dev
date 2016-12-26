<div class="popup popup-check-card-id">
    <div class="boxListForm">
        <h2 class="txtTitle2 underline">
        ผลการตรวจสอบบัตรประชาชน
        @if($status==1)
        <span class="c-blue">เลขที่ {{$username}} ผ่านการตรวจสอบ</span>
        @else
        <span class="c-blue" style="color: red;">เลขที่ {{$username}} ไม่ผ่านการตรวจสอบ</span>
        @endif
        </h2>
        <div class="boxListAddress">
            <div class="form-group">เลือกข้อมูลที่อยู่</div>
            <div class="pdb5">
                <input type="radio" name="address" id="radio-choice-1" class="radio-style" />
                <label for="radio-choice-1">123 ถนนรัชดาภิเษก ดินแดง กรุงเทพฯ 10400</label>
            </div>
            <div class="pdb5">
                <input type="radio" name="address" id="radio-choice-2" class="radio-style" />
                <label for="radio-choice-2">3/67 ถนนรัชดาภิเษก ดินแดง กรุงเทพฯ 10400</label>
            </div>
        </div>
        <div class="txt-center">
            <a class="btn-style4"><span>ยืนยัน</span></a>
        </div>
    </div>
</div>
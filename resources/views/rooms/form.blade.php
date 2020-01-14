
<div class="form-row form-group">
    <div class="col-3 ">اسم الغرفه</div>
    <div class="col-9 ">
        <input type="text" value="{{ old('name') ?? $room->name }}" name="name" class='form-control'
               placeholder='ادخل اسم الغرفه'>
        <div>{{ $errors->first('name') }}</div>
    </div>
</div>
<hr>
<div class="form-row form-group">
    <div class="col-3 ">الموقع</div>
    <div class="col-9 ">
        <input type="text" value="{{ old('location') ?? $room->location }}" name="location" class='form-control' placeholder='ادخل الموقع'>
        <div>{{ $errors->first('location') }}</div>
    </div>

</div>
<h6>تفاصيل مساحه الغرفه</h6>
<div class="card ">
    <div class="card-body">
        <div class="form-row form-group">
            <div class="col-3 ">مساحه الغرفه</div>
            <div class="col-9 ">
                <input type="number" value="{{ old('area') ?? $room->details['area'] }}" name="area" class='form-control' placeholder='المساحه بالمتر المربع'>
                <div>{{ $errors->first('area') }}</div>
            </div>
        </div>
        <div class="form-row form-group">
            <div class="col-3 ">عدد الكراسي</div>
            <div class="col-9 ">
                <input type="number" value="{{ old('no_of_chairs') ?? $room->details['no_of_chairs'] }}" name="no_of_chairs" class='form-control'
                       placeholder='ادخل عدد الكراسي'>
                <div>{{ $errors->first('no_of_chairs') }}</div>
            </div>
        </div>
        <div class="form-row form-group">
            <div class="col-3 ">عدد الكمبيوتر</div>
            <div class="col-9 ">
                <input type="number" value="{{ old('no_of_computers') ?? $room->details['no_of_computers'] }}" name="no_of_computers" class='form-control'
                       placeholder='ادخل عدد الكمبيوتر'>
                <div>{{ $errors->first('no_of_computers') }}</div>
            </div>
        </div>
    </div>
</div>
<br>
<h6>محتويات الغرفه</h6>
<div class="card ">
    <div class="card-body">
        <div class="row ">
            <div class="col-md-3">
                <input name="check" type="checkbox">
                <label>كاميرات مراقبه</label>
            </div>
            <div class="col-md-3">
                <input name="check" type="checkbox">
                <label>تكيف</label>
            </div>
            <div class="col-md-3">
                <input name="check" type="checkbox">
                <label>دتاشو</label>
            </div>
            <div class="col-md-3">
                <input type="checkbox" onClick="selectAll(this)">
                <label>تحديد الكل</label>
            </div>
        </div>
    </div>
</div>
<br>


<div class="form-row">

    <div class="col-sm-12 form-group">

        <label for="validationCustom01">الاسم باللغه العربيه</label>
        <input type="text" class="form-control" name="nameAr" id="validationCustom01" placeholder="بالاسم باللغه العربيه "  value="{{ old('nameAr') }}" >
        <div>{{ $errors->first('nameAr') }}</div>
    </div>

</div>

<div class="form-row">

    <div class="col-sm-12">
        <label for="validationCustom03">الاسم باللغه الانجليزيه</label>
        <span class="required">*</span>
        <input type="text" name= "nameEn" class="form-control" id="validationCustom03" placeholder="الاسم باللغه الانجليزيه" value="{{ old('nameEn') }}" required>
        <div>{{ $errors->first('nameEn') }}</div>
    </div>


</div>


<div class=" form-row">
    <label for="validationCustom05">البريد الالكترونى </label>
    <input type="text" name="email" id="validationCustom05" placeholder="ادخل البريد الالكترونى " class="form-control" value="{{ old('email') }}">
    <div>{{ $errors->first('email') }}</div>
</div>


<div class=" form-row">
    <div class="col-sm-6 ">
        <label>رقم التليفون المحمول</label>
        <input type="text" name="phoneNumber"  data-inputmask="'mask' : '(999) 99999999'"  placeholder="ادخل رقم التليفون المحمول"  class="form-control" value="{{ old('phoneNumber') }}">
        <div>{{ $errors->first('phoneNumber') }}</div>
    </div>
    <div class="col-sm-6 form-group">
        <label>تليفون اخر </label>
        <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{ old('phoneNumberSec') }}"   class="form-control">
        <div>{{ $errors->first('phoneNumberSec') }}</div>
    </div>

</div>

<div class=" form-row">
    <div class="col-sm-6">
        <label for="validationCustom06">الرقم القومى </label>
        <span class="required">*</span>
        <input type="text" name="idNumber" id="validationCustom06" value="{{ old('idNumber') }}"  placeholder="ادخل الرقم القومى " class="form-control" required>
        <div>{{ $errors->first('idNumber') }}</div>

    </div>
    <div class="col-sm-6">
        <label>رقم جواز السفر</label>
        <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{ old('passportNum') }}" class="form-control" >
        <div>{{ $errors->first('passportNum') }}</div>
    </div>

</div>
<br>
<div class=" form-row ">
    <div class="col-sm-6" >

        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="customFile" src="{{ old('image') }}" >
            <label class="custom-file-label" for="customFile">صوره الشخصيه</label>
            <div>{{ $errors->first('image') }}</div>
        </div>
    </div>
    <div class="col-sm-6 ">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="idImage" src="{{ old('idImage') }}" id="customFile">
            <label class="custom-file-label" for="customFile">صوره  البطاقه </label>
            <div>{{ $errors->first('idImage') }}</div>
        </div>
    </div>

</div>
<div class="form-row">
    <div class="col-sm-12  ">

    </div>
    <div class="col-sm-6 form-group ">
        <label for="">البلد </label>
        <input name="state" type="text" placeholder="البلد" value="{{ old('state') }}" class="form-control">
        <div>{{ $errors->first('state') }}</div>

    </div>

    <div class="col-sm-6 form-group ">
        <label for="">المدينه </label>
        <input name="city" type="text" placeholder="المدينه" value="{{ old('city') }}" class="form-control">
        <div>{{ $errors->first('city') }}</div>
    </div>
</div>

<div class=" form-row">
    <label>العنوان</label>
    <textarea name="address"  placeholder="{{ old(address) ?? $student->address }}"  rows="3" class="form-control"></textarea>
    <div>{{ $errors->first('address') }}</div>
</div>


<div class="form-row">
    <div class="col-sm-12  ">

    </div>
    <div class="col-sm-6 form-group ">
        <label for="">المؤهل الدراسى </label>
        <select name="degree" class="form-control" id="exampleFormControlSelect1">
            <option>طالب</option>
            <option>خريج</option>
        </select>
    </div>

    <div class="col-sm-6 form-group ">
        <label for="">الكليه </label>

        <select name="faculty" class="form-control" id="exampleFormControlSelect1">
            <option>هندسه</option>
            <option>تجاره</option>
        </select>
    </div>
</div>
<div class=" form-row">
    <div class="col-sm-6 form-group ">
        <label>skill card</label>
        <input type="text" value="{{ old('skillCardNumber') }}" placeholder="Enter skill card Id Here.." name="skillCardNumber" class="form-control" >
        <div>{{ $errors->first('skillCardNumber') }}</div>
    </div>

</div>



<div class="form-row save">
    <div class="col-sm-3  form-group">
    </div>
    <div class="col-sm-6  form-group">
        <br>
        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
        <button class="btn  btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> الغاء</button>
    </div>
    <div class="col-sm-3  form-group">
    </div>
</div>;

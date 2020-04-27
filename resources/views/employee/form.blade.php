<div class="form-row image-upload">
    <div class="col-sm-8">
        <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/*" name="idImage"
                   id="customFile1" src="" onchange="readURL(this, 1);" required>
            <input type="file" class="custom-file-input" accept="image/*" name="image"
                   id="customFile2" src="" onchange="readURL(this, 2);" required>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center  ">
    <div class="course-image-input">
        <img id="imageUploaded1" src="http://simpleicon.com/wp-content/uploads/camera-2.svg"
             alt="your image"/>
        <p>صورة البطاقه</p>
        <!--      <div id="photo1" class="photo" >هذه الخانه مطلوبه</div> -->
    </div>
    <div class="course-image-input">
        <img id="imageUploaded2" src="http://simpleicon.com/wp-content/uploads/camera-2.svg"
             alt="your image"/>
        <p>الصوره الشخصيه</p>
        <!--      <div id="photo2" class="photo" >هذه الخانه مطلوبه</div> -->

    </div>
</div>

<div class="form-row">
    <label>الاسم باللغه العربيه </label>
    <span class="required">*</span>
    <input type="text" class="form-control" name="nameAr" placeholder="الاسم " value="{{ $employee->nameAr ?? old('nameAr') }}">
    <div>{{ $errors->first('nameAr') }}</div>
</div>

<div class="form-row">
    <label>الاسم باللغه الانجليزيه </label>
    <span class="required">*</span>
    <input type="text" class="form-control" name="nameEn" placeholder="الاسم " value="{{ $employee->nameEn ?? old('nameEn') }}">
    <div>{{ $errors->first('nameEn') }}</div>
</div>

<div class="form-row">
    <label>الايميل</label>
    <input type="text" class="form-control" name="email" placeholder="ادخل الايميل " value="{{ $employee->email ?? old('email') }}">
    <div>{{ $errors->first('email') }}</div>
</div>


<div class=" form-row ">
    <div class="col-6 ">
        <label>رقم التليفون </label>
        <span class="required">*</span>
        <input type="text" name="phoneNumber" placeholder="ادخل رقم التليفون المحمول  "
               class="form-control" value="{{ $employee->phoneNumber ?? old('phoneNumber') }}">
        <div>{{ $errors->first('phoneNumber') }}</div>
    </div>


    <div class="col-sm-6">
        <label>تليفون اخر </label>
        <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{ $employee->phoneNumberSec ?? old('phoneNumberSec') }}"
               class="form-control">
    </div>
    <div>{{ $errors->first('phoneNumberSec') }}</div>


</div>
<div class="form-row">
    <div class="col ">
        <label>الوظيفه </label>
        <select name="job" class="form-control">
            <option value="0">اختار وظيفة</option>
            @foreach($jobs as $job)
                <option value="{{ $job->id }}" {{ $employee->job_id == $job->id ? 'selected' : ''}}>{{ $job->name }}</option>
            @endforeach
        </select>
        <div>{{ $errors->first('jobs') }}</div>
    </div>
</div>

<div class=" form-row form-group">
    <div class="col-sm-6 ">
        <label>الرقم القومى </label>
        <input type="text" name="idNumber" value="{{ $employee->idNumber ?? old('idNumber') }}"
               placeholder="ادخل الرقم القومى " class="form-control mb-1  ">
        <div>{{ $errors->first('idNumber') }}</div>
    </div>
    <div class="col-sm-6">
        <label>رقم جواز السفر</label>
        <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{ $employee->passportNum ?? old('passportNum') }}"
               class="form-control ">

        <div>{{ $errors->first('passportNum') }}</div>
    </div>
</div>
<br>

<div class="form-row">

    <div class="col  ">
        <label>البلد </label>
        <input name="state" type="text" placeholder="البلد" value="{{ $employee->address->state ?? old('state') }}" class="form-control">
        <div>{{ $errors->first('state') }}</div>
        <div></div>

    </div>

    <div class="col  ">
        <label >المدينه </label>
        <input name="city" type="text" placeholder="المدينه" value="{{ $employee->address->city ?? old('city') }}" class="form-control">
        <div>{{ $errors->first('city') }}</div>

    </div>
</div>

<div class=" form-row">
    <label>العنوان</label>
    <span class="required">*</span>
    <textarea name="address" placeholder="ادخل العنوان " rows="3"
              class="form-control">{{ $employee->address->address ?? old('address') }}</textarea>
    <div>{{ $errors->first('address') }}</div>
</div>

<!-- payment model -->
<div class="form-row  " id="model_form" >
    <div class="col form-group">
        <label>نظام المحاسبه</label>
        <span class="required">*</span>
        <select class="form-control" id="payment_models" name="payment_model" required>
            <option value="0">اختار</option>
            @foreach($payment_models as $payment_model)
                <option data-extra="{{ $payment_model }}" value="{{ $payment_model->id }}" {{ $employee->payment_model['model'] == $payment_model->name ? 'selected' : ''}}>{{ $payment_model->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<!-- user invitation checkbox-->
<div class="form-row">
    <div class="col-sm-6 form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input part-of-diploma" name="send_invitation" id="send_invitation">
            <label class="custom-control-label" for="send_invitation">دعوة هذا الموظف ليكون مستخدم</label>
        </div>
    </div>
</div>

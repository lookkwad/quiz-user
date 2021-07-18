<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('user/header')
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            Edit User
                        </div>
                        <div class="card-body">
                            <form class="row" action="{{url('user/editUser/'.$user->id)}}" method="post">
                                @csrf
                                <div class="col-md-5 mb-3">
                                    <label for="firstname" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{$user->firstname}}">
                                   @error('firstname')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="lastname" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}">
                                    @error('lastname')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="gender" class="form-label">เพศ</label>
                                    <select class="custom-select"id="gender" name="gender" value="{{$user->gender}}">
                                        <option value="">เลือก</option>
                                        <option value="ชาย" @if ($user->gender == "ชาย") {{ 'selected' }} @endif>ชาย</option>
                                        <option value="หญิง" @if ($user->gender == "หญิง") {{ 'selected' }} @endif>หญิง</option>
                                    </select>
                                    @error('gender')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="birthday" class="form-label">วันเกิด</label>
                                    <input type="text" class="form-control" id="birthday" name="birthday" value="{{$user->birthday}}">
                                    @error('birthday')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="email" class="form-label">อีเมล</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                                    @error('email')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone_number" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" maxlength="10" value="{{$user->phone_number}}">
                                    @error('phone_number')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div> 
                                <div class="col-md-12 mb-3">
                                    <label for="address" class="form-label">ที่อยู่</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
                                    @error('address')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-primary">บันทึก</button>
                                    <a href="{{route('user')}}" class="btn btn-sm btn-secondary">กลับ</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>    
            $('#birthday').datepicker({
                format: "yyyy-mm-dd",
            });
        </script>
    </body>
</html>

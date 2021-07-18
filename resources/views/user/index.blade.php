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
                            User
                            <a href="{{route('add')}}" class="btn btn-sm btn-primary">เพิ่ม User</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อ</th>
                                            <th scope="col">นามสกุล</th>
                                            <th scope="col">เพศ</th>
                                            <th scope="col">วันเกิด</th>
                                            <th scope="col">อีเมล</th>
                                            <th scope="col">ที่อยู่</th>
                                            <th scope="col">เบอร์โทรศัพท์</th>
                                            <th scope="col">แก้ไข / ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($user as $row)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td>{{$row->firstname}}</td>
                                            <td>{{$row->lastname}}</td>
                                            <td>{{$row->gender}}</td>
                                            <td>{{$row->birthday}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>{{$row->phone_number}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" href="{{url('user/edit/'.$row->id)}}">แก้ไข</a>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#smallModal" id="deleteButton" data-id="{{ $row->id }}">ลบ</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="exampleModalLabel">ยืนยันลบข้อมูล?</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('user/delete')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" id="user_id" value="" class="form-control">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-primary">ยืนยัน</button>
                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">กลับ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
        <!-- <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div> --> 
        <script>
            $('body').on('click', '#deleteButton', function (event) {
                event.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                $('#exampleModal').modal('show');
                $('#user_id').val(id);
            });
        </script>
    </body>
</html>

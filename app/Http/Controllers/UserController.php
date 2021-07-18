<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user/index', compact('user'));
    }

    public function add()
    {
       return view('user/add');
    }

    public function addUser(Request $request)
    {
        // ตรวจสอบข้อมูล
        $request->validate([
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'gender' => 'required|max:255',
                'birthday' => 'required|max:255|date_format:Y-m-d',
                'email' => 'required|max:255|email',
                'address' => 'required|max:255',
                'phone_number' => 'required|min:10',
            ],
            [
                'firstname.required'=>'กรุณากรอกข้อมูล',
                'firstname.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
                'lastname.required'=>'กรุณากรอกข้อมูล',
                'lastname.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
                'gender.required'=>'กรุณากรอกข้อมูล',
                'gender.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
                'birthday.required'=>'กรุณากรอกข้อมูล',
                'birthday.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
                'birthday.date_format'=>'กรอกข้อมูลผิด',
                'email.required'=>'กรุณากรอกข้อมูล',
                'email.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
                'email.email'=>'กรอกข้อมูลผิด',
                'address.required'=>'กรุณากรอกข้อมูล',
                'address.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
                'phone_number.required'=>'กรุณากรอกข้อมูล',
                'phone_number.min'=>'กรอกไม่ถึง 10 หลัก',
            ]
        );

        // บันทึกข้อมูลแบบ Eloqunt
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->save();

        // return redirect(route('user'))->back()->with('success', "บันทึกข้อมูลสำเร็จ");
        return redirect()->route('user');
    }

    public function edit($id)
    {
        $user = User::find($id); 
        return view('user/edit', compact('user'));
    }

    public function editUser(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'gender' => 'required|max:255',
            'birthday' => 'required|max:255|date_format:Y-m-d',
            'email' => 'required|max:255|email',
            'address' => 'required|max:255',
            'phone_number' => 'required|min:10',
        ],
        [
            'firstname.required'=>'กรุณากรอกข้อมูล',
            'firstname.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
            'lastname.required'=>'กรุณากรอกข้อมูล',
            'lastname.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
            'gender.required'=>'กรุณากรอกข้อมูล',
            'gender.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
            'birthday.required'=>'กรุณากรอกข้อมูล',
            'birthday.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
            'birthday.date_format'=>'กรอกข้อมูลผิด',
            'email.required'=>'กรุณากรอกข้อมูล',
            'email.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
            'email.email'=>'กรอกข้อมูลผิด',
            'address.required'=>'กรุณากรอกข้อมูล',
            'address.max'=>'ห้ามกรอกเกิน 255 ตัวอักษร',
            'phone_number.required'=>'กรุณากรอกข้อมูล',
            'phone_number.min'=>'กรอกไม่ถึง 10 หลัก',
        ]
    );

        $user = User::find($id)
                    ->update([
                        'firstname' => $request->firstname,
                        'lastname' => $request->lastname,
                        'gender' => $request->gender,
                        'birthday' => $request->birthday,
                        'email' => $request->email,
                        'address' => $request->address,
                        'phone_number' => $request->phone_number,
                    ]);
        return redirect()->route('user')->with('success', "แก้ไขข้อมูลสำเร็จ");
    }

    public function delete(Request $request)
    {
        // dd($request->user_id);
        $department = User::find($request->user_id)
                        ->delete();

        return redirect()->back()->with('success', "ลบข้อมูลสำเร็จ");
    }

}

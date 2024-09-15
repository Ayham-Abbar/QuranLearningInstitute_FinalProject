<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
      $users = User::all();
      return view('admin.users.index', compact('users'));
    }
    public function create()
    {
      return view('admin.users.create');
    }
    public function store(Request $request)
    {
  $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
            'role' => ['required', 'string', 'in:student,teacher,admin'],
            'gender' => ['required', 'string', 'in:male,female'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'phone' => ['required', 'string', 'max:255'],
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            $imageName = null;
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
      return redirect()->route('admin.users.index');
    }
    public function edit($id)
    {
      $user = User::find($id);
      return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id); // الحصول على المستخدم أو إرسال خطأ إذا لم يتم العثور عليه

    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
        'password' => ['nullable', 'string', 'min:8'], // اجعل كلمة المرور اختيارية وتحقق من الحد الأدنى للطول
        'role' => ['required', 'string', 'in:student,teacher,admin'],
        'gender' => ['required', 'string', 'in:male,female'],
        'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        'phone' => ['required', 'string', 'max:255'],
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/users'), $imageName);
        $validatedData['image'] = $imageName;
    } else {
        // إذا لم تكن هناك صورة جديدة، لا تقم بتحديث حقل الصورة
        unset($validatedData['image']);
    }

    if ($request->filled('password')) {
        $validatedData['password'] = Hash::make($validatedData['password']);
    } else {
        // إذا لم تكن هناك كلمة مرور جديدة، لا تقم بتحديث حقل كلمة المرور
        unset($validatedData['password']);
    }

    $user->update($validatedData);

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
}
    public function delete($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('admin.users.index');
    }
}

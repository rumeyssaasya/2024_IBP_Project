<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
{
    return view('admin.dashboard');
}
public function manageUsers()
{
    $users = User::all();
    return view('admin.manage_users', compact('users'));
}

public function login(Request $request)
    {
        // Admin login işlemleri
    }

    public function storeUser(Request $request)
    {
        // Kullanıcı kayıt işlemleri
    }

    public function updateUser(Request $request)
    {
        // Kullanıcı güncelleme işlemleri
    }

    public function deleteUser(Request $request)
    {
        // Kullanıcı silme işlemleri
    }

// Kullanıcı tanımlama, silme ve güncelleme fonksiyonları burada tanımlanacak

public function createAnnouncement(Request $request)
    {
        // Gelen verileri doğrulama
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Doğrulama hatalarını kontrol et
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Yeni duyuru oluştur
        $announcement = new Announcement();
        $announcement->title = $request->input('title');
        $announcement->content = $request->input('content');
        $announcement->save();

        return response()->json(['message' => 'Duyuru başarıyla oluşturuldu', 'announcement' => $announcement], 201);
    }

}

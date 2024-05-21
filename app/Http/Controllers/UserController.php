<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
{
    return view('user.dashboard');
}
public function sendMessage(Request $request)
    {
        // Gelen verileri doğrulama
        $validator = Validator::make($request->all(), [
            'recipient_id' => 'required|integer|exists:users,id',
            'message' => 'required|string',
        ]);

        // Doğrulama hatalarını kontrol et
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Yeni mesaj oluştur
        $message = new Message();
        $message->sender_id = auth()->id(); // Gönderen kullanıcı kimliği
        $message->recipient_id = $request->input('recipient_id');
        $message->message = $request->input('message');
        $message->save();

        return response()->json(['message' => 'Mesaj başarıyla gönderildi', 'message' => $message], 201);
    }

    public function login(Request $request)
    {
        // User login işlemleri
    }

    public function updatePassword(Request $request)
    {
        // Şifre güncelleme işlemleri
    }

    public function showMessages()
    {
        // Mesajları gösterme işlemleri
    }
}

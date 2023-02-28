<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    public static $user;
    private static $image, $imageName, $directory, $imgUrl;
    use HasFactory;
    public static function saveUser($request)
    {
        $request->validate([
            'name' => ['required','alpha','max:50'],
            'email' => ['required','email:rfc,dns'],
            'phone' => ['required','numeric','max:11'],
        ]);
        self::$user = new BlogUser();
        self::$user->name = $request->name;
        self::$user->email = $request->email;
        self::$user->phone = $request->phone;
        self::$user->password = bcrypt($request->password);
        self::$user->image = self::saveImage($request);
        self::$user->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageName = rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'asset/image/user-image/';
        self::$imgUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imgUrl;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;




use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\DB;


// app/Models/innovationstarregistrations.php

class students extends Model
{
    protected $table = 'students'; // 指定模型对应的数据库表名

    protected $fillable = [
        'id',
        'account',
        'password',
        'grade',
        'major',
        'class',
        'name',
        'email'
    ];
    // 隐藏密码字段
    protected $hidden = [
        'password',
    ];

    public static function findstudent_id($user){
        try {
            $data = students::where('name',$user['name'])
                ->where('grade',$user['grade'])
                ->where('major',$user['major'])
                ->where('class',$user['class'])
                ->first();
            return $data;
        } catch (Exception $e) {
            return 'error' . $e->getMessage();
        }
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // 验证凭证的静态方法
    public static function validateCredentials($account, $password)
    {
        try {
            // 查找用户
            $user = self::where('account', $account)->first();

            // 检查用户是否存在以及密码是否正确
            if ($user && Hash::check($password, $user->password)) {
                // 如果密码正确，返回 true
                return true;
            }

            // 如果用户不存在或密码不正确，返回 false
            return false;

        } catch (Exception $e) {
            // 处理异常，记录日志或返回错误信息
            // Log::error('Error validating credentials: ' . $e->getMessage());
            return false;
        }
    }
}



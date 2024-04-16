<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'users'; // 테이블 이름을 'users'
    protected $primaryKey = 'id';
    protected $fillable = [
        'uid', 'name', 'email', 'password', 'grade', 'remember_token'
    ];

    // Authenticatable 인터페이스의 메소드를 오버라이드
    public function getAuthIdentifierName()
    {
        return 'id';
    }
}
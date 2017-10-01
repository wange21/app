<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    //数据库表
    protected $table = 'users';

    //该表的主键
    protected $primaryKey = 'UID';

    //表示主键是一个自增的int类型字段(其他类型设置为false)
    public $incrementing = true;

    //如果不希望使用自动管理的created_at和updated_at，设置false
    public $timestamps = false;
}

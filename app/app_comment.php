<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class app_comment extends Model
{
    //数据库表
    public $incrementing = true;

    //该表的主键
    public $timestamps = false;

    //表示主键是一个自增的int类型字段(其他类型设置为false)
    protected $table = 'app_comments';

    //如果不希望使用自动管理的created_at和updated_at，设置false
    protected $primaryKey = 'CID';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}

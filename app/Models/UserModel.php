<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'nama_user', 'role'];
    protected $useTimestamps = true;
}

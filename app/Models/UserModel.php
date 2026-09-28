<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username',
        'full_name',
        'avatar'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'full_name' => 'required|min_length[2]|max_length[100]'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required',
            'min_length' => 'Username must be at least 3 characters',
            'max_length' => 'Username cannot exceed 50 characters',
            'is_unique' => 'Username already exists'
        ],
        'full_name' => [
            'required' => 'Full name is required',
            'min_length' => 'Full name must be at least 2 characters',
            'max_length' => 'Full name cannot exceed 100 characters'
        ]
    ];
}
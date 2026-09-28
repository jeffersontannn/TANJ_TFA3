<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data['users'] = $userModel->findAll();

        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/new');
    }

    public function create()
    {
        $userModel = new UserModel();

        $avatar = $this->request->getFile('avatar');
        $avatarName = null;

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            $avatarName = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/uploads/avatars', $avatarName);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar' => $avatarName
        ];

        if ($userModel->insert($data)) {
            return redirect()->to(base_url('users'))->with('success', 'User created successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $userModel->errors());
        }
    }
}
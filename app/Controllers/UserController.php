<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthGroupsModel;
use App\Models\UsModel;
use Myth\Auth\Password;

class UserController extends BaseController
{
  protected $userModel, $gpModel;
  public function __construct()
  {
    $this->userModel = new UsModel();
    $this->gpModel = new AuthGroupsModel();
  }


  public function index()
  {
    $query = $this->db->query("SELECT
        auth_groups_users.user_id,
        users.email,
        users.username,
        users.fullname,
        users.user_image,
        users.created_at,
        auth_groups_users.group_id,
        auth_groups.name
      FROM
        users
        INNER JOIN auth_groups_users ON users.id = auth_groups_users.user_id
        INNER JOIN auth_groups
          ON auth_groups.id = auth_groups_users.group_id");


    $data = [
      'title' => 'Data User' . $this->nama,
      'user' => $query->getResultObject(),
    ];
    // dd($data);
    return view('admin_panel/user/index', $data);
  }

  public function detail($id = null)
  {
    $query = $this->db->query("SELECT
        auth_groups_users.user_id,
        users.email,
        users.username,
        users.fullname,
        users.user_image,
        users.created_at,
        auth_groups_users.group_id,
        auth_groups.name
      FROM
        users
        INNER JOIN auth_groups_users ON users.id = auth_groups_users.user_id
        INNER JOIN auth_groups
          ON auth_groups.id = auth_groups_users.group_id 
          where auth_groups_users.user_id = $id");

    $data = [
      'title' => 'Detail User' . $this->nama,
      'user' => $query->getRow(),
    ];
    return view('admin_panel/user/detail', $data);
  }

  public function create()
  {

    $data = [
      'title' => 'Tambah Data User' . $this->nama,
      'validation' => \Config\Services::validation(),
    ];
    return view('admin_panel/user/create', $data);
  }

  public function store()
  {
    if (!$this->validate([
      'username' => [
        'rules' => 'required|is_unique[users.username]|min_length[5]',
        'label' => 'Username',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah ada',
          'min_length' => '{field} minimal 5 karakter',
        ]
      ],
      'fullname' => [
        'rules' => 'required',
        'label' => 'Fullname',
        'errors' => [
          'required' => '{field} harus diisi',
        ]
      ],
      'email' => [
        'rules' => 'required|valid_email|is_unique[users.email]',
        'label' => 'Email',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah ada',
          'valid_email' => 'Format email tidak sesuai',
        ]
      ],
      'password' => [
        'rules' => 'required',
        'label' => 'Password',
        'errors' => [
          'required' => '{field} harus diisi',
        ]
      ],
      'level' => [
        'rules' => 'required',
        'label' => 'Level',
        'errors' => [
          'required' => 'Pilih {field} akses',
        ]
      ],
      'foto' => [
        'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'label' => 'Foto',
        'errors' => [
          'uploaded' => 'Pilih gambar terlebih dahulu',
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang ada pilih bukan gambar',
        ]
      ],
    ])) {
      return redirect()->to('dashboard/user/create')->withInput();
    } else {
      $file = $this->request->getFile('foto');
      $nama_file = $file->getRandomName();
      $image = \Config\Services::image()
        ->withFile($file)
        ->resize(256, 256, false, 'height')
        ->save(FCPATH . '/web_tril/img/' . $nama_file);
      $password = $this->request->getVar('password');
      $hashed_password = Password::hash($password);
      $this->userModel->save(
        [
          'username' =>  $this->request->getVar('username'),
          'fullname' => $this->request->getVar('fullname'),
          'email' => $this->request->getVar('email'),
          'password_hash' => $hashed_password,
          'user_image' => $nama_file,
          'active' => 1,
        ]
      );
      $username_ = $this->request->getVar('username');
      $data = $this->userModel->where('username', $username_)->first();
      $kode = $data['id'];
      if ($kode != '') {
        $this->gpModel->save(
          [
            'group_id' => $this->request->getVar('level'),
            'user_id' => $kode,
          ]
        );
      }
      return redirect('dashboard/user')->with('Pesan', 'Data berhasil ditambahkan');
    }
  }

  public function edit($id)
  {
    $query = $this->db->query("SELECT
        auth_groups_users.user_id,
        users.email,
        users.username,
        users.active,
        users.fullname,
        users.user_image,
        users.created_at,
        auth_groups_users.group_id,
        auth_groups.name
      FROM
        users
        INNER JOIN auth_groups_users ON users.id = auth_groups_users.user_id
        INNER JOIN auth_groups
          ON auth_groups.id = auth_groups_users.group_id 
          where auth_groups_users.user_id = $id");

    $data = [
      'title' => 'Edit Data User' . $this->nama,
      'validation' => \Config\Services::validation(),
      'user' => $query->getRow(),
    ];
    return view('admin_panel/user/edit', $data);
  }

  public function update($id)
  {
    $cari = $this->userModel->find($id);
    $username_lama = $cari['username'];
    $email_lama = $cari['email'];

    if ($username_lama == $this->request->getVar('username')) {
      $rules_username = 'required|min_length[5]';
    } else {
      $rules_username = 'required|is_unique[users.username]|min_length[5]';
    }
    if ($email_lama == $this->request->getVar('email')) {
      $rules_email = 'required|valid_email';
    } else {
      $rules_email = 'required|valid_email|is_unique[users.email]';
    }
    if (!$this->validate([
      'username' => [
        'rules' => $rules_username,
        'label' => 'Username',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah ada',
          'min_length' => '{field} minimal 5 karakter',
        ]
      ],
      'fullname' => [
        'rules' => 'required',
        'label' => 'Fullname',
        'errors' => [
          'required' => '{field} harus diisi',
        ]
      ],
      'email' => [
        'rules' => $rules_email,
        'label' => 'Email',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah ada',
          'valid_email' => 'Format email tidak sesuai',
        ]
      ],
      'level' => [
        'rules' => 'required',
        'label' => 'Level',
        'errors' => [
          'required' => 'Pilih {field} akses',
        ]
      ],
      'status' => [
        'rules' => 'required',
        'label' => 'Status',
        'errors' => [
          'required' => 'Pilih {field} user',
        ]
      ],
      'foto' => [
        'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        // 'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'label' => 'Foto',
        'errors' => [
          'uploaded' => 'Pilih gambar terlebih dahulu',
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang ada pilih bukan gambar',
        ]
      ],
    ])) {
      return redirect()->to('dashboard/user/edit/' . $id)->withInput();
    }
    $file_foto = $this->request->getFile('foto');
    if ($file_foto->getError() == 4) {
      $nama_file = $this->request->getVar('foto_lama');
    } else {
      $nama_file = $file_foto->getRandomName();
      $image = \Config\Services::image()
        ->withFile($file_foto)
        ->resize(256, 256, false, 'height')
        ->save(FCPATH . '/web_tril/img/' . $nama_file);
      unlink('web_tril/img/' . $this->request->getVar('foto_lama'));
    }
    $password = $this->request->getVar('password');
    if ($password == '') {
      $this->userModel->save(
        [
          'id' => $id,
          'username' =>  $this->request->getVar('username'),
          'fullname' => $this->request->getVar('fullname'),
          'email' => $this->request->getVar('email'),
          'user_image' => $nama_file,
          'active' => $this->request->getVar('status'),
        ]
      );
    } else {
      $hashed_password = Password::hash($password);
      $this->userModel->save(
        [
          'id' => $id,
          'username' =>  $this->request->getVar('username'),
          'fullname' => $this->request->getVar('fullname'),
          'email' => $this->request->getVar('email'),
          'password_hash' => $hashed_password,
          'user_image' => $nama_file,
          'active' => $this->request->getVar('status'),
        ]
      );
    }
    $builder = $this->db->table('auth_groups_users');
    $username_ = $this->request->getVar('username');
    $data = $this->userModel->where('username', $username_)->first();
    $kode = $data['id'];
    if ($kode != '') {
      $builder->set('group_id', $this->request->getVar('level'))
        ->where('user_id', $kode)
        ->update();
    }
    return redirect('dashboard/user')->with('Pesan', 'Data berhasil diubah');
  }

  public function delete($id)
  {
    $cari = $this->userModel->find($id);
    unlink('web_tril/img/' . $cari['user_image']);
    $this->userModel->delete($id);
    return redirect('dashboard/user')->with('Pesan', 'Data berhasil dihapus');
  }
}

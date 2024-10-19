<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KonfigurasiModel;
use App\Models\UsModel;
use Myth\Auth\Password;

class DashboardController extends BaseController
{
    protected $userModel, $konfigurasiModel;
    function __construct()
    {
        $this->userModel = new UsModel();
        $this->konfigurasiModel = new KonfigurasiModel();
    }
    public function index()
    {
        $jumlah_user = (string) $this->db->table('users')->countAll();
        $jumlah_berita = (string) $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->countAllResults();
        $jumlah_agenda = (string) $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Agenda')
            ->countAllResults();
        $jumlah_dokumen = (string) $this->db->table('tbl_dokumen')->countAllResults();
        $data = [
            'title' => 'Dashboard ' . $this->nama,
            'jumlah_user' => $jumlah_user,
            'jumlah_berita' => $jumlah_berita,
            'jumlah_agenda' => $jumlah_agenda,
            'jumlah_dokumen' => $jumlah_dokumen,
        ];

        // Return the dashboard view with data
        return view('dashboard/dashboard', $data);
    }


    public function profile()
    {
        $user_id = user_id();
        $query = $this->db->query("
        SELECT * FROM auth_logins WHERE user_id = $user_id order by id desc LIMIT 1");
        $data = [
            'title' => 'User Profile' . $this->nama,
            'logs' => $query->getResultObject(),
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/profile', $data);
    }

    public function update_profile()
    {
        $id = user_id();
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
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/PNG]',
                'label' => 'Foo',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                ]
            ],
        ])) {
            return redirect()->to('dashboard/profile')->withInput();
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
        $username = $this->request->getPost('username');
        $fullname = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $builder = $this->db->table('users');
        $builder->set('username', $username)
            ->set('fullname', $fullname)
            ->set('email', $email)
            ->set('user_image', $nama_file)
            ->where('id', $id)
            ->update();

        return redirect('dashboard/profile')->with('Pesan', 'Data berhasil diubah');
    }

    public function update_password()
    {

        $user_id = user_id();
        if (!$this->validate([
            'password' => [
                'rules' => 'required',
                'label' => 'Password',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'password_' => [
                'rules' => 'required|matches[password]',
                'label' => 'Konfirmasi Password',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'matches' => 'Konfirmasi Password Tidak Sesuai'
                ]
            ],
        ])) {
            return redirect()->to('dashboard/profile')->withInput();
        }
        $password = $this->request->getPost('password');
        $hashed_password = Password::hash($password);
        $builder = $this->db->table('users');
        $builder->set('password_hash', $hashed_password)
            ->where('id', $user_id)
            ->update();
        return redirect('dashboard/profile')->with('Pesan', 'Data berhasil diubah');
    }
    public function konfigweb()
    {
        $query = $this->db->query("
        SELECT * FROM tbl_konfigurasi WHERE id_konfigurasi = 21 ");
        $data = [
            'title' => 'User Profile' . $this->nama,
            'kampus' => $query->getRow(),
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/konfigweb', $data);
    }

    public function update_konfigweb()
    {
        if (!$this->validate([
            'nama_web' => [
                'rules' => 'required',
                'label' => 'Nama Web',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'singkatan' => [
                'rules' => 'required',
                'label' => 'Singkatan',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'label' => 'Nomor Telp',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'hp' => [
                'rules' => 'required',
                'label' => 'Nomor Hp',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'label' => 'Email',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email_cadangan' => [
                'rules' => 'required',
                'label' => 'Email Cadangan',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tagline' => [
                'rules' => 'required',
                'label' => 'Tagline',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'label' => 'Alamat',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'dosen' => [
                'rules' => 'required',
                'label' => 'dosen',
                'errors' => [
                    'required' => 'Jumlah {field} harus diisi',
                ]
            ],
            'prodi' => [
                'rules' => 'required',
                'label' => 'prodi',
                'errors' => [
                    'required' => 'Jumlah {field} harus diisi',
                ]
            ],
            'mahasiswa' => [
                'rules' => 'required',
                'label' => 'mahasiswa',
                'errors' => [
                    'required' => 'Jumlah {field} harus diisi',
                ]
            ],
            'lab' => [
                'rules' => 'required',
                'label' => 'lab',
                'errors' => [
                    'required' => 'Jumlah {field} harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('dashboard/konfigweb')->withInput();
        }
        $id = '2';
        $nama_web = $this->request->getPost('nama_web');
        $singkatan = $this->request->getPost('singkatan');
        $telepon = $this->request->getPost('telepon');
        $hp = $this->request->getPost('hp');
        $email = $this->request->getPost('email');
        $email_cadangan = $this->request->getPost('email_cadangan');
        $tagline = $this->request->getPost('tagline');
        $alamat = $this->request->getPost('alamat');
        $dosen = $this->request->getPost('dosen');
        $prodi = $this->request->getPost('prodi');
        $mahasiswa = $this->request->getPost('mahasiswa');
        $lab = $this->request->getPost('lab');
        $builder = $this->db->table('tbl_konfigurasi');
        $builder->set('nama_web', $nama_web)
            ->set('singkatan', $singkatan)
            ->set('telepon', $telepon)
            ->set('hp', $hp)
            ->set('email', $email)
            ->set('email_cadangan', $email_cadangan)
            ->set('tagline', $tagline)
            ->set('alamat', $alamat)
            ->set('dosen', $dosen)
            ->set('prodi', $prodi)
            ->set('mahasiswa', $mahasiswa)
            ->set('lab', $lab)
            ->where('id_konfigurasi', $id)
            ->update();

        return redirect('dashboard/konfigweb')->with('Pesan', 'Data berhasil diubah');
    }

    public function konfigsambutan()
    {
        $query = $this->db->query("
        SELECT * FROM tbl_sambutan WHERE id_artikel = 2 ");
        $data = [
            'title' => 'Sambutan' . $this->nama,
            'sambutan' => $query->getRow(),
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/sambutan', $data);
    }

    public function update_konfigsambutan()
    {
        if (!$this->validate([
            'judul_sambutan' => [
                'rules' => 'required',
                'label' => 'Judul',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'label' => 'Tanggal',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'label' => 'Foto',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                ]
            ],
            'konten' => [
                'rules' => 'required',
                'label' => 'Konten',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('dashboard/sambutan')->withInput();
        }
        $file_foto = $this->request->getFile('foto');
        if ($file_foto->getError() == 4) {
            $nama_file = $this->request->getVar('foto_lama');
        } else {
            $nama_file = $file_foto->getRandomName();
            $image = \Config\Services::image()
                ->withFile($file_foto)
                ->save(FCPATH . '/web_tril/img/' . $nama_file);
            unlink('web_tril/img/' . $this->request->getVar('foto_lama'));
        }
        $id_sambutan = '2';
        $ids = user_id();
        $judul_sambutan = $this->request->getVar('judul_sambutan');
        $gambar = $nama_file;
        $isi = $this->request->getVar('konten');
        $tanggal = $this->request->getVar('tanggal');
        $slug_artikel = strtolower(url_title($this->request->getVar('judul_sambutan')));
        $builder = $this->db->table('tbl_sambutan');


        $builder->set('judul_artikel', $judul_sambutan)
            ->set('tanggal', $tanggal)
            ->set('isi', $isi)
            ->set('slug_artikel', $slug_artikel)
            ->set('id_user', $ids)
            ->set('gambar', $gambar)
            ->where('id_artikel', $id_sambutan)
            ->update();

        return redirect('dashboard/sambutan')->with('Pesan', 'Data berhasil diubah');
    }
}

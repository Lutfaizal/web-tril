<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdiModel;
use App\Models\FakultasModel;

class ProdiController extends BaseController
{
    protected $prodiModel, $fakultasModel;

    function __construct()
    {
        $this->prodiModel = new ProdiModel();
    }


    public function index()
    {
        $query = $this->db->query("SELECT * FROM tbl_prodi order by created_at desc");
        $data = [
            'title' => 'Data Prodi' . $this->nama,
            'prodi' => $query->getResultObject(),
        ];
        return view('admin_panel/prodi/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Data Prodi' . $this->nama,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/prodi/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_prodi' => [
                'rules' => 'required|is_unique[tbl_prodi.nama_prodi]',
                'label' => 'Nama prodi',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
            'link' => [
                'rules' => 'required|is_unique[tbl_prodi.link]',
                'label' => 'Link prodi',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'label' => 'Foto',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'label' => 'Deskripsi',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

        ])) {
            return redirect()->to('dashboard/prodi/create')->withInput();
        } else {
            $file = $this->request->getFile('foto');
            $nama_file = $file->getRandomName();
            $image = \Config\Services::image()
                ->withFile($file)
                ->save(FCPATH . '/web_tril/img/' . $nama_file);
            $this->prodiModel->save(
                [
                    'nama_prodi' =>  $this->request->getVar('nama_prodi'),
                    'link' =>  $this->request->getVar('link'),
                    'gambar' => $nama_file,
                    'deskripsi' => $this->request->getVar('deskripsi'),
                ]
            );
            return redirect('dashboard/prodi')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_prodi  where id_prodi = $id");
        $data = [
            'title' => 'Edit Data prodi' . $this->nama,
            'validation' => \Config\Services::validation(),
            'prodi' => $query->getRow(),
        ];
        return view('admin_panel/prodi/edit', $data);
    }

    public function update($id)
    {
        $cari = $this->prodiModel->find($id);
        $nama_lama = $cari->nama_prodi;
        if ($nama_lama == $this->request->getVar('nama_prodi')) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[tbl_prodi.nama_prodi]';
        }

        $rules = [
            'nama_prodi' => [
                'rules' => $rules_nama,
                'label' => 'Nama prodi',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
            'link' => [
                'rules' => $rules_nama,
                'label' => 'Link prodi',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
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

            'deskripsi' => [
                'rules' => 'required',
                'label' => 'Deskripsi',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/prodi/edit/' . $id)->withInput();
        } else {
            $ids = user_id();
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
            $this->prodiModel->save(
                [
                    'id_prodi' => $id,
                    'nama_prodi' =>  $this->request->getVar('nama_prodi'),
                    'link' =>  $this->request->getVar('link'),
                    'gambar' => $nama_file,
                    'deskripsi' => $this->request->getVar('deskripsi'),
                ]
            );
            return redirect('dashboard/prodi')->with('Pesan', 'Data berhasil diubah');
        }
    }
    public function delete($id)
    {
        $cari = $this->prodiModel->find($id);
        unlink('web_tril/img/' . $cari->gambar);
        $this->prodiModel->delete($id);
        return redirect('dashboard/prodi')->with('Pesan', 'Data berhasil dihapus');
    }
}

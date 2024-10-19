<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisPenelitianModel;

class JenisPenelitianController extends BaseController
{
    protected $jenispenelitianModel;
    function __construct()
    {
        $this->jenispenelitianModel = new JenisPenelitianModel();
    }

    public function index()
    {
        $query = $this->jenispenelitianModel->orderBy('id_jenis', 'DESC')->get()->getResult();
        $data = [
            'title' => 'Data Jenis Penelitian' . $this->nama,
            'jenis' =>  $query,
        ];
        return view('admin_panel/jenis penelitian/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/jenis penelitian/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_jenis' => [
                'rules' => 'required|is_unique[tbl_jenis.nama_jenis]',
                'label' => 'Nama jenis',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/jenispenelitian/create')->withInput();
        } else {
            $this->jenispenelitianModel->save(
                [
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenispenelitian')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenis' => $this->jenispenelitianModel->find($id),
        ];
        return view('admin_panel/jenis penelitian/edit', $data);
    }

    public function update($id)
    {
        $cari = $this->jenispenelitianModel->find($id);
        $nama_lama = $cari->nama_jenis;
        if ($nama_lama == $this->request->getVar('nama_jenis')) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[tbl_jenis.nama_jenis]';
        }
        $rules = [
            'nama_jenis' => [
                'rules' => $rules_nama,
                'label' => 'Nama jenis',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/jenispenelitian/edit/' . $id)->withInput();
        } else {
            $this->jenispenelitianModel->save(
                [
                    'id_jenis' => $id,
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenispenelitian')->with('Pesan', 'Data berhasil diubah');
        }
    }

    public function delete($id)
    {
        $this->jenispenelitianModel->delete($id);
        return redirect('dashboard/jenispenelitian')->with('Pesan', 'Data berhasil dihapus');
    }
}

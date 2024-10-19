<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisPublikasiModel;

class JenisPublikasiController extends BaseController
{
    protected $JenispublikasiModel;
    function __construct()
    {
        $this->JenispublikasiModel = new JenisPublikasiModel();
    }

    public function index()
    {
        $query = $this->JenispublikasiModel->orderBy('id_jenis', 'DESC')->get()->getResult();
        $data = [
            'title' => 'Data Jenis Publikasi' . $this->nama,
            'jenis' =>  $query,
        ];
        return view('admin_panel/jenis publikasi/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/jenis publikasi/create', $data);
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
            return redirect()->to('dashboard/jenispublikasi/create')->withInput();
        } else {
            $this->JenispublikasiModel->save(
                [
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenispublikasi')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenis' => $this->JenispublikasiModel->find($id),
        ];
        return view('admin_panel/jenis publikasi/edit', $data);
    }

    public function update($id)
    {
        $cari = $this->JenispublikasiModel->find($id);
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
            return redirect()->to('dashboard/jenispublikasi/edit/' . $id)->withInput();
        } else {
            $this->JenispublikasiModel->save(
                [
                    'id_jenis' => $id,
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenispublikasi')->with('Pesan', 'Data berhasil diubah');
        }
    }

    public function delete($id)
    {
        $this->JenispublikasiModel->delete($id);
        return redirect('dashboard/jenispublikasi')->with('Pesan', 'Data berhasil dihapus');
    }
}

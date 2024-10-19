<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisDokumenModel;

class JenisDokumenController extends BaseController
{
    protected $jenisdokumenModel;
    function __construct()
    {
        $this->jenisdokumenModel = new JenisDokumenModel();
    }

    public function index()
    {
        $query = $this->jenisdokumenModel->orderBy('id_jenis', 'DESC')->get()->getResult();
        $data = [
            'title' => 'Data Jenis Dokumen' . $this->nama,
            'jenis' =>  $query,
        ];
        return view('admin_panel/jenis dokumen/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/jenis dokumen/create', $data);
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
            return redirect()->to('dashboard/jenisdokumen/create')->withInput();
        } else {
            $this->jenisdokumenModel->save(
                [
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenisdokumen')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenis' => $this->jenisdokumenModel->find($id),
        ];
        return view('admin_panel/jenis dokumen/edit', $data);
    }

    public function update($id)
    {
        $cari = $this->jenisdokumenModel->find($id);
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
            return redirect()->to('dashboard/jenisdokumen/edit/' . $id)->withInput();
        } else {
            $this->jenisdokumenModel->save(
                [
                    'id_jenis' => $id,
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenisdokumen')->with('Pesan', 'Data berhasil diubah');
        }
    }

    public function delete($id)
    {
        $this->jenisdokumenModel->delete($id);
        return redirect('dashboard/jenisdokumen')->with('Pesan', 'Data berhasil dihapus');
    }
}

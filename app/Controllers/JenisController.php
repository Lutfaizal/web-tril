<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisModel;

class JenisController extends BaseController
{
    protected $jenisModel;
    function __construct()
    {
        $this->jenisModel = new JenisModel();
    }

    public function index()
    {
        $query = $this->jenisModel->orderBy('id_jenis', 'DESC')->get()->getResult();
        $data = [
            'title' => 'Data Jenis' . $this->nama,
            'jenis' =>  $query,
        ];
        return view('admin_panel/jenis/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/jenis/create', $data);
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
            return redirect()->to('dashboard/jenis/create')->withInput();
        } else {
            $this->jenisModel->save(
                [
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenis')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenis' => $this->jenisModel->find($id),
        ];
        return view('admin_panel/jenis/edit', $data);
    }

    public function update($id)
    {
        $cari = $this->jenisModel->find($id);
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
            return redirect()->to('dashboard/jenis/edit/' . $id)->withInput();
        } else {
            $this->jenisModel->save(
                [
                    'id_jenis' => $id,
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenis')->with('Pesan', 'Data berhasil diubah');
        }
    }

    public function delete($id)
    {
        $this->jenisModel->delete($id);
        return redirect('dashboard/jenis')->with('Pesan', 'Data berhasil dihapus');
    }
}

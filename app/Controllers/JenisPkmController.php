<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisPkmModel;

class JenisPkmController extends BaseController
{
    protected $jenispkmModel;
    function __construct()
    {
        $this->jenispkmModel = new JenisPkmModel();
    }

    public function index()
    {
        $query = $this->jenispkmModel->orderBy('id_jenis', 'DESC')->get()->getResult();
        $data = [
            'title' => 'Data Jenis Pengabdian' . $this->nama,
            'jenis' =>  $query,
        ];
        return view('admin_panel/jenis pkm/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/jenis pkm/create', $data);
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
            return redirect()->to('dashboard/jenispkm/create')->withInput();
        } else {
            $this->jenispkmModel->save(
                [
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenispkm')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Jenis' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenis' => $this->jenispkmModel->find($id),
        ];
        return view('admin_panel/jenis pkm/edit', $data);
    }

    public function update($id)
    {
        $cari = $this->jenispkmModel->find($id);
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
            return redirect()->to('dashboard/jenispkm/edit/' . $id)->withInput();
        } else {
            $this->jenispkmModel->save(
                [
                    'id_jenis' => $id,
                    'nama_jenis' => $this->request->getVar('nama_jenis'),
                ]
            );
            return redirect('dashboard/jenispkm')->with('Pesan', 'Data berhasil diubah');
        }
    }

    public function delete($id)
    {
        $this->jenispkmModel->delete($id);
        return redirect('dashboard/jenispkm')->with('Pesan', 'Data berhasil dihapus');
    }
}

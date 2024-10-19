<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class LayananController extends BaseController
{
    protected $layananModel;
    function __construct()
    {
        $this->layananModel = new LayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Layanan' . $this->nama,
            'layanan' =>  $this->layananModel->orderBy('id_layanan', 'DESC')->get()->getResult(),
        ];
        return view('admin_panel/layanan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Layanan' . $this->nama,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/layanan/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_layanan' => [
                'rules' => 'required|is_unique[tbl_layanan.nama_layanan]',
                'label' => 'Nama layanan',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
            'link' => [
                'rules' => 'required',
                'label' => 'Situs / Link',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/layanan/create')->withInput();
        } else {
            $this->layananModel->save(
                [
                    'nama_layanan' => $this->request->getVar('nama_layanan'),
                    'link' => $this->request->getVar('link'),
                ]
            );
            return redirect('dashboard/layanan')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Layanan' . $this->nama,
            'validation' => \Config\Services::validation(),
            'layanan' => $this->layananModel->find($id),
        ];
        return view('admin_panel/layanan/edit', $data);
    }

    public function update($id)
    {
        $cari = $this->layananModel->find($id);
        $nama_lama = $cari->nama_layanan;
        if ($nama_lama == $this->request->getVar('nama_layanan')) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[tbl_layanan.nama_layanan]';
        }

        $rules = [
            'nama_layanan' => [
                'rules' => $rules_nama,
                'label' => 'Nama layanan',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
            'link' => [
                'rules' => 'required',
                'label' => 'Situs / Link',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/layanan/edit/' . $id)->withInput();
        } else {
            $this->layananModel->save(
                [
                    'id_layanan' => $id,
                    'nama_layanan' => $this->request->getVar('nama_layanan'),
                    'link' => $this->request->getVar('link'),
                ]
            );
            return redirect('dashboard/layanan')->with('Pesan', 'Data berhasil diubah');
        }
    }

    public function delete($id)
    {
        $this->layananModel->delete($id);
        return redirect('dashboard/layanan')->with('Pesan', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use App\Models\JenisDokumenModel;

class DokumenController extends BaseController
{
    protected $dokumenModel, $jenisModel;
    public function __construct()
    {
        $this->dokumenModel = new DokumenModel();
        $this->jenisModel = new JenisDokumenModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Dokumen' . $this->nama,
            'dokumen' =>  $this->dokumenModel->orderBy('id_dokumen', 'DESC')->get()->getResult(),
        ];
        return view('admin_panel/dokumen/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Dokumen' . $this->nama,
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/dokumen/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_dokumen' => [
                'rules' => 'required',
                'label' => 'Nama Dokumen',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'jenis' => [
                'rules' => 'required',
                'label' => 'Jenis',
                'errors' => [
                    'required' => 'Pilih {field} Dokumen',
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|mime_in[file,application/pdf]|max_size[file,5000]',
                'label' => 'file',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'Ukuran file maksimal 5MB',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/dokumen/create')->withInput();
        } else {
            $file_pdf = $this->request->getFile('file');
            $nama_file = $file_pdf->getRandomName();
            $file_pdf->move('web_tril/doc', $nama_file);

            $this->dokumenModel->save(
                [
                    'nama_dokumen' => $this->request->getVar('nama_dokumen'),
                    'jenis_dokumen' => $this->request->getVar('jenis'),
                    'file' => $nama_file,
                ]
            );
            return redirect('dashboard/dokumen')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {

        $data = [
            'title' => 'Edit Data Dokumen' . $this->nama,
            'validation' => \Config\Services::validation(),
            'dokumen' => $this->dokumenModel->find($id),
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
        ];
        return view('admin_panel/dokumen/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_dokumen' => [
                'rules' => 'required',
                'label' => 'Nama Dokumen',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'jenis' => [
                'rules' => 'required',
                'label' => 'Jenis',
                'errors' => [
                    'required' => 'Pilih {field} Dokumen',
                ]
            ],
            'file' => [
                'rules' => 'mime_in[file,application/pdf]|max_size[file,5000]',
                'label' => 'file',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'Ukuran file maksimal 5MB',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/dokumen/edit/' . $id)->withInput();
        } else {
            $file_pdf = $this->request->getFile('file');
            if ($file_pdf->getError() == 4) {
                $nama_file = $this->request->getVar('file_lama');
            } else {
                $nama_file = $file_pdf->getRandomName();
                $file_pdf->move('web_tril/doc', $nama_file);
                unlink('web_tril/doc/' . $this->request->getVar('file_lama'));
            }
            $this->dokumenModel->save(
                [
                    'id_dokumen' => $id,
                    'nama_dokumen' => $this->request->getVar('nama_dokumen'),
                    'jenis_dokumen' => $this->request->getVar('jenis'),
                    'file' => $nama_file,
                ]
            );
            return redirect('dashboard/dokumen')->with('Pesan', 'Data berhasil diubah');
        }
    }

    public function delete($id)
    {
        $cari = $this->dokumenModel->find($id);
        unlink('web_tril/doc/' . $cari->file);
        $this->dokumenModel->delete($id);
        return redirect('dashboard/dokumen')->with('Pesan', 'Data berhasil dihapus');
    }
}

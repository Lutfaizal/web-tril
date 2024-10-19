<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PublikasiModel;
use App\Models\JenisPublikasiModel;

class PublikasiController extends BaseController
{
    protected $publikasi, $jenisModel;

    function __construct()
    {
        $this->publikasi = new PublikasiModel();
        $this->jenisModel = new JenisPublikasiModel();
    }


    public function index()
    {
        $query = $this->db->query("SELECT * FROM view_publikasi order by created_at desc");
        $data = [
            'title' => 'Data Publikasi' . $this->nama,
            'publikasi' => $query->getResultObject(),
        ];
        return view('admin_panel/publikasi/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Data Publikasi' . $this->nama,
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/publikasi/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'tim_pelaksana' => [
                'rules' => 'required',
                'label' => 'Tim Pelaksana',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'label' => 'Judul Publikasi',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'label' => 'Jenis',
                'errors' => [
                    'required' => 'Pilih {field} Artikel',
                ]
            ],
            'dokumen' => [
                'rules' => 'required',
                'label' => 'Link dokumen',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'label' => 'Tahun',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

        ])) {
            return redirect()->to('dashboard/publikasi/create')->withInput();
        } else {
            $this->publikasi->save(
                [
                    'tim_pelaksana' =>  $this->request->getVar('tim_pelaksana'),
                    'judul' =>  $this->request->getVar('judul'),
                    'id_jenis' => $this->request->getVar('jenis'),
                    'tahun' => $this->request->getVar('tahun'),
                    'dokumen' => $this->request->getVar('dokumen'),
                ]
            );
            return redirect('dashboard/publikasi')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $query = $this->db->query("SELECT * FROM view_publikasi  where id_publikasi = $id");
        $data = [
            'title' => 'Edit Data Publikasi' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'publikasi' => $query->getRow(),
        ];
        return view('admin_panel/publikasi/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'tim_pelaksana' => [
                'rules' => 'required',
                'label' => 'Tim Pelaksana',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'label' => 'Judul Publikasi',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'label' => 'Jenis',
                'errors' => [
                    'required' => 'Pilih {field} Artikel',
                ]
            ],
            'dokumen' => [
                'rules' => 'required',
                'label' => 'Link dokumen',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'label' => 'Tahun',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/publikasi/edit/' . $id)->withInput();
        } else {
            $this->publikasi->save(
                [
                    'id_publikasi' => $id,
                    'tim_pelaksana' =>  $this->request->getVar('tim_pelaksana'),
                    'judul' =>  $this->request->getVar('judul'),
                    'id_jenis' => $this->request->getVar('jenis'),
                    'tahun' => $this->request->getVar('tahun'),
                    'dokumen' => $this->request->getVar('dokumen'),
                ]
            );
            return redirect('dashboard/publikasi')->with('Pesan', 'Data berhasil diubah');
        }
    }
    public function delete($id)
    {
        $this->publikasi->delete($id);
        return redirect('dashboard/publikasi')->with('Pesan', 'Data berhasil dihapus');
    }
}

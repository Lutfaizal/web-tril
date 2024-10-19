<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\JenisPenelitianModel;

class PenelitianController extends BaseController
{
    protected $penelitian, $jenisModel;

    function __construct()
    {
        $this->penelitian = new PenelitianModel();
        $this->jenisModel = new JenisPenelitianModel();
    }


    public function index()
    {
        $query = $this->db->query("SELECT * FROM view_penelitian order by created_at desc");
        $data = [
            'title' => 'Data Penelitian' . $this->nama,
            'penelitian' => $query->getResultObject(),
        ];
        return view('admin_panel/penelitian/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Data Penelitian' . $this->nama,
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/penelitian/create', $data);
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
                'label' => 'Judul Penelitian',
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
            return redirect()->to('dashboard/penelitian/create')->withInput();
        } else {
            $this->penelitian->save(
                [
                    'tim_pelaksana' =>  $this->request->getVar('tim_pelaksana'),
                    'judul' =>  $this->request->getVar('judul'),
                    'id_jenis' => $this->request->getVar('jenis'),
                    'tahun' => $this->request->getVar('tahun'),
                    'dokumen' => $this->request->getVar('dokumen'),
                ]
            );
            return redirect('dashboard/penelitian')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $query = $this->db->query("SELECT * FROM view_penelitian  where id_penelitian = $id");
        $data = [
            'title' => 'Edit Data Penelitian' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'penelitian' => $query->getRow(),
        ];
        return view('admin_panel/penelitian/edit', $data);
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
                'label' => 'Judul Penelitian',
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
            return redirect()->to('dashboard/penelitian/edit/' . $id)->withInput();
        } else {
            $this->penelitian->save(
                [
                    'id_penelitian' => $id,
                    'tim_pelaksana' =>  $this->request->getVar('tim_pelaksana'),
                    'judul' =>  $this->request->getVar('judul'),
                    'id_jenis' => $this->request->getVar('jenis'),
                    'tahun' => $this->request->getVar('tahun'),
                    'dokumen' => $this->request->getVar('dokumen'),
                ]
            );
            return redirect('dashboard/penelitian')->with('Pesan', 'Data berhasil diubah');
        }
    }
    public function delete($id)
    {
        $this->penelitian->delete($id);
        return redirect('dashboard/penelitian')->with('Pesan', 'Data berhasil dihapus');
    }
}

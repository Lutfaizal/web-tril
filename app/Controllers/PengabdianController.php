<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengabdianModel;
use App\Models\JenisPkmModel;

class PengabdianController extends BaseController
{
    protected $pengabdian, $jenisModel;

    function __construct()
    {
        $this->pengabdian = new PengabdianModel();
        $this->jenisModel = new JenisPkmModel();
    }


    public function index()
    {
        $query = $this->db->query("SELECT * FROM view_pengabdian order by created_at desc");
        $data = [
            'title' => 'Data Pengabdian' . $this->nama,
            'pengabdian' => $query->getResultObject(),
        ];
        return view('admin_panel/pengabdian/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Data Pengabdian' . $this->nama,
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/pengabdian/create', $data);
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
                'label' => 'Judul Pengabdian',
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
            return redirect()->to('dashboard/pengabdian/create')->withInput();
        } else {
            $this->pengabdian->save(
                [
                    'tim_pelaksana' =>  $this->request->getVar('tim_pelaksana'),
                    'judul' =>  $this->request->getVar('judul'),
                    'id_jenis' => $this->request->getVar('jenis'),
                    'tahun' => $this->request->getVar('tahun'),
                    'dokumen' => $this->request->getVar('dokumen'),
                ]
            );
            return redirect('dashboard/pengabdian')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $query = $this->db->query("SELECT * FROM view_pengabdian  where id_pengabdian = $id");
        $data = [
            'title' => 'Edit Data Pengabdian' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'pengabdian' => $query->getRow(),
        ];
        return view('admin_panel/pengabdian/edit', $data);
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
                'label' => 'Judul Pengabdian',
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
            return redirect()->to('dashboard/pengabdian/edit/' . $id)->withInput();
        } else {
            $this->pengabdian->save(
                [
                    'id_pengabdian' => $id,
                    'tim_pelaksana' =>  $this->request->getVar('tim_pelaksana'),
                    'judul' =>  $this->request->getVar('judul'),
                    'id_jenis' => $this->request->getVar('jenis'),
                    'tahun' => $this->request->getVar('tahun'),
                    'dokumen' => $this->request->getVar('dokumen'),
                ]
            );
            return redirect('dashboard/pengabdian')->with('Pesan', 'Data berhasil diubah');
        }
    }
    public function delete($id)
    {
        $this->pengabdian->delete($id);
        return redirect('dashboard/pengabdian')->with('Pesan', 'Data berhasil dihapus');
    }
}

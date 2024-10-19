<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\JenisModel;

class ArtikelController extends BaseController
{
    protected $artikelModel, $jenisModel;

    function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->jenisModel = new JenisModel();
    }


    public function index()
    {
        $query = $this->db->query("SELECT * FROM view_artikel order by created_at desc");
        $data = [
            'title' => 'Data Artikel' . $this->nama,
            'artikel' => $query->getResultObject(),
        ];
        return view('admin_panel/artikel/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Data Artikel' . $this->nama,
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/artikel/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'judul_artikel' => [
                'rules' => 'required|is_unique[tbl_artikel.judul_artikel]',
                'label' => 'Judul artikel',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'label' => 'Foto',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'label' => 'Status',
                'errors' => [
                    'required' => 'Pilih {field} Artikel',
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'label' => 'Jenis',
                'errors' => [
                    'required' => 'Pilih {field} Artikel',
                ]
            ],
            'konten' => [
                'rules' => 'required',
                'label' => 'Konten',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'label' => 'Tanggal',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

        ])) {
            return redirect()->to('dashboard/artikel/create')->withInput();
        } else {
            $id = user_id();
            $file = $this->request->getFile('foto');
            $nama_file = $file->getRandomName();
            $image = \Config\Services::image()
                ->withFile($file)
                ->save(FCPATH . '/web_tril/img/' . $nama_file);
            $this->artikelModel->save(
                [
                    'judul_artikel' =>  $this->request->getVar('judul_artikel'),
                    'status_artikel' => $this->request->getVar('status'),
                    'jenis_artikel' => $this->request->getVar('jenis'),
                    'tanggal' => $this->request->getVar('tanggal'),
                    'gambar' => $nama_file,
                    'isi' => $this->request->getVar('konten'),
                    'ringkasan' => $this->request->getVar('konten'),
                    'id_user' => $id,
                    'slug_artikel'    => strtolower(url_title($this->request->getVar('judul_artikel'))),
                ]
            );
            return redirect('dashboard/artikel')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $query = $this->db->query("SELECT * FROM view_artikel  where id_artikel = $id");
        $data = [
            'title' => 'Edit Data artikel' . $this->nama,
            'validation' => \Config\Services::validation(),
            'jenisData' =>  $this->jenisModel->orderBy('nama_jenis', 'ASC')->get()->getResult(),
            'artikel' => $query->getRow(),
        ];
        return view('admin_panel/artikel/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul_artikel' => [
                'rules' => 'required',
                'label' => 'Judul artikel',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'label' => 'Foto',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'label' => 'Status',
                'errors' => [
                    'required' => 'Pilih {field} Artikel',
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'label' => 'Jenis',
                'errors' => [
                    'required' => 'Pilih {field} Artikel',
                ]
            ],
            'konten' => [
                'rules' => 'required',
                'label' => 'Konten',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'label' => 'Tanggal',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/artikel/edit/' . $id)->withInput();
        } else {
            $ids = user_id();
            $file_foto = $this->request->getFile('foto');
            if ($file_foto->getError() == 4) {
                $nama_file = $this->request->getVar('foto_lama');
            } else {
                $nama_file = $file_foto->getRandomName();
                $image = \Config\Services::image()
                    ->withFile($file_foto)
                    ->save(FCPATH . '/web_tril/img/' . $nama_file);
                unlink('web_tril/img/' . $this->request->getVar('foto_lama'));
            }
            $this->artikelModel->save(
                [
                    'id_artikel' => $id,
                    'judul_artikel' =>  $this->request->getVar('judul_artikel'),
                    'status_artikel' => $this->request->getVar('status'),
                    'jenis_artikel' => $this->request->getVar('jenis'),
                    'tanggal' => $this->request->getVar('tanggal'),
                    'gambar' => $nama_file,
                    'isi' => $this->request->getVar('konten'),
                    'ringkasan' => strip_tags($this->request->getVar('konten')),
                    'id_user' => $ids,
                    'slug_artikel'    => strtolower(url_title($this->request->getVar('judul_artikel'))),
                ]
            );
            return redirect('dashboard/artikel')->with('Pesan', 'Data berhasil diubah');
        }
    }
    public function delete($id)
    {
        $cari = $this->artikelModel->find($id);
        unlink('web_tril/img/' . $cari->gambar);
        $this->artikelModel->delete($id);
        return redirect('dashboard/artikel')->with('Pesan', 'Data berhasil dihapus');
    }
}

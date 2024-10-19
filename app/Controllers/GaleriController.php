<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class GaleriController extends BaseController
{
    protected $galeriModel;

    function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Galeri' . $this->nama,
            'galeri' =>  $this->galeriModel->orderBy('id_galeri', 'ASC')->get()->getResult(),
        ];
        return view('admin_panel/galeri/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Galeri' . $this->nama,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin_panel/galeri/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'label' => 'Foto',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                ]
            ],
        ])) {
            return redirect()->to('dashboard/galeri/create')->withInput();
        } else {
            $file = $this->request->getFile('foto');
            $nama_file = $file->getRandomName();
            $image = \Config\Services::image()
                ->withFile($file)
                ->resize(800, 600, false, 'height')
                ->save(FCPATH . '/web_tril/img/' . $nama_file);
            $this->galeriModel->save(
                [
                    'gambar' => $nama_file,
                ]
            );
            return redirect('dashboard/galeri')->with('Pesan', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data galeri' . $this->nama,
            'validation' => \Config\Services::validation(),
            'galeri' => $this->galeriModel->find($id),
        ];
        return view('admin_panel/galeri/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'foto' => [
                'rules' => 'max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'label' => 'Foto',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/galeri/edit/' . $id)->withInput();
        } else {
            $file_foto = $this->request->getFile('foto');
            if ($file_foto->getError() == 4) {
                $nama_file = $this->request->getVar('foto_lama');
            } else {
                $nama_file = $file_foto->getRandomName();
                $image = \Config\Services::image()
                    ->withFile($file_foto)
                    ->resize(800, 600, false, 'height')
                    ->save(FCPATH . '/web_tril/img/' . $nama_file);
                unlink('web_tril/img/' . $this->request->getVar('foto_lama'));
            }
            $this->galeriModel->save(
                [
                    'id_galeri' => $id,
                    'gambar' => $nama_file,
                ]
            );
            return redirect('dashboard/galeri')->with('Pesan', 'Data berhasil diubah');
        }
    }
    public function delete($id)
    {
        $cari = $this->galeriModel->find($id);
        unlink('web_tril/img/' . $cari->gambar);
        $this->galeriModel->delete($id);
        return redirect('dashboard/galeri')->with('Pesan', 'Data berhasil dihapus');
    }
}

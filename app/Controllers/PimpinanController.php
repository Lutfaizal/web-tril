<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PimpinanModel;

class PimpinanController extends BaseController
{
    protected $pimpinanModel;

    function __construct()
    {
        $this->pimpinanModel = new PimpinanModel();
    }


    public function index()
    {
        $query = $this->db->query("SELECT * FROM tbl_pimpinan order by id_pimpinan asc");
        $data = [
            'title' => 'Data Pimpinan' . $this->nama,
            'pimpinan' => $query->getResultObject(),
        ];
        return view('admin_panel/pimpinan/index', $data);
    }

    public function edit($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_pimpinan  where id_pimpinan = $id");
        $data = [
            'title' => 'Edit Data pimpinan' . $this->nama,
            'validation' => \Config\Services::validation(),
            'pimpinan' => $query->getRow(),
        ];
        return view('admin_panel/pimpinan/edit', $data);
    }

    public function update($id)
    {
        $cari = $this->pimpinanModel->find($id);
        $nama_lama = $cari->nama_pimpinan;
        if ($nama_lama == $this->request->getVar('nama_pimpinan')) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[tbl_pimpinan.nama_pimpinan]';
        }

        $rules = [
            'nama_pimpinan' => [
                'rules' => $rules_nama,
                'label' => 'Nama pimpinan',
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
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('dashboard/pimpinan/edit/' . $id)->withInput();
        } else {
            $file_foto = $this->request->getFile('foto');
            if ($file_foto->getError() == 4) {
                $nama_file = $this->request->getVar('foto_lama');
            } else {
                $nama_file = $file_foto->getRandomName();
                $image = \Config\Services::image()
                    ->withFile($file_foto)
                    ->resize(600, 600, false, 'height')
                    ->save(FCPATH . '/web_tril/img/' . $nama_file);
                unlink('web_tril/img/' . $this->request->getVar('foto_lama'));
            }
            $this->pimpinanModel->save(
                [
                    'id_pimpinan' => $id,
                    'nama_pimpinan' =>  $this->request->getVar('nama_pimpinan'),
                    'gambar' => $nama_file,
                ]
            );
            return redirect('dashboard/pimpinan')->with('Pesan', 'Data berhasil diubah');
        }
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SlideModel;

class SlideController extends BaseController
{
    protected $slideModel;

    function __construct()
    {
        $this->slideModel = new SlideModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Slide' . $this->nama,
            'slide' =>  $this->slideModel->orderBy('id_slide', 'ASC')->get()->getResult(),
        ];
        return view('admin_panel/slide/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data slide' . $this->nama,
            'validation' => \Config\Services::validation(),
            'slide' => $this->slideModel->find($id),
        ];
        return view('admin_panel/slide/edit', $data);
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
            return redirect()->to('dashboard/slide/edit/' . $id)->withInput();
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
            $this->slideModel->save(
                [
                    'id_slide' => $id,
                    'gambar' => $nama_file,
                ]
            );
            return redirect('dashboard/slide')->with('Pesan', 'Data berhasil diubah');
        }
    }
}

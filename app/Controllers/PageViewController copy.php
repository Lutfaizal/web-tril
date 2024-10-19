<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\DokumenModel;

class PageViewController extends BaseController
{
    protected $artikelModel;

    function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        $query_populer = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Berita' AND 
        view_artikel.status_artikel = 'Publish' order by hits desc LIMIT 5");

        $query_sidebar = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Pengumuman' AND 
        view_artikel.status_artikel = 'Publish' order by created_at desc LIMIT 5");

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;
        $total = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->countAllResults();
        $query = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get();
        $totalPages = ceil($total / $perPage);

        $data = [
            'title' => 'Berita',
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => $totalPages,
        ];

        return view('home/artikel', $data);
    }
    public function read($slug_artikel = '')
    {
        $data = $this->artikelModel->where('slug_artikel', $slug_artikel)->first();
        $kode = $data->id_artikel;
        $artikel = $this->db->table('tbl_artikel');
        if ($kode != '') {
            $artikel->set('hits', $data->hits + 1)
                ->where('id_artikel', $kode)
                ->update();
        }

        $query_populer = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Berita' AND 
        view_artikel.status_artikel = 'Publish' order by hits desc LIMIT 5");

        $query_sidebar = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Pengumuman' AND 
        view_artikel.status_artikel = 'Publish' order by created_at desc LIMIT 5");

        $query = $this->db->query("
        SELECT * FROM view_artikel 
        WHERE slug_artikel = '$slug_artikel'");

        $data = [
            'title' => 'Artikel',
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data__populer' => $query_populer->getResultObject(),
            'data_artikel' => $query->getRow(),
        ];
        return view('home/read', $data);
    }

    public function read_jenis($jenis = '')
    {
        $query = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Artikel' AND 
        view_artikel.status_artikel = 'Publish' AND  view_artikel.nama_jenis='$jenis' order by created_at desc");

        $data = [
            'title' => 'Artikel',
            'data_artikel' => $query->getResultObject(),
        ];
        return view('home/artikel', $data);
    }

    public function pengumuman()
    {
        $query_populer = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Berita' AND 
        view_artikel.status_artikel = 'Publish' order by hits desc LIMIT 5");

        $query_sidebar = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Pengumuman' AND 
        view_artikel.status_artikel = 'Publish' order by created_at desc LIMIT 5");

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;
        $total = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->countAllResults();
        $query = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get();
        $totalPages = ceil($total / $perPage);

        $data = [
            'title' => 'Pengumuman',
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => $totalPages,
        ];

        return view('home/artikel', $data);
    }

    public function agenda()
    {
        $query_populer = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Berita' AND 
        view_artikel.status_artikel = 'Publish' order by hits desc LIMIT 5");

        $query_sidebar = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Pengumuman' AND 
        view_artikel.status_artikel = 'Publish' order by created_at desc LIMIT 5");


        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;
        $total = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Agenda')
            ->where('status_artikel', 'Publish')
            ->countAllResults();
        $query = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Agenda')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get();

        $totalPages = ceil($total / $perPage);

        $data = [
            'title' => 'Agenda',
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => $totalPages,
        ];
        return view('home/artikel', $data);
    }

    public function karir()
    {
        $query_populer = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Berita' AND 
        view_artikel.status_artikel = 'Publish' order by hits desc LIMIT 5");

        $query_sidebar = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Pengumuman' AND 
        view_artikel.status_artikel = 'Publish' order by created_at desc LIMIT 5");

        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;
        $total = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Karir')
            ->where('status_artikel', 'Publish')
            ->countAllResults();
        $query = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Karir')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get();
        $totalPages = ceil($total / $perPage);

        $data = [
            'title' => 'Karir',
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => $totalPages,
        ];
        return view('home/artikel', $data);
    }



    public function readsambutan()
    {
        $query_populer = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Berita' AND 
        view_artikel.status_artikel = 'Publish' order by hits desc LIMIT 5");

        $query_sidebar = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Pengumuman' AND 
        view_artikel.status_artikel = 'Publish' order by created_at desc LIMIT 5");

        $query = $this->db->query("SELECT * FROM view_sambutan  where id_artikel=2 ");

        $data = [
            'title' => 'Sambutan',
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data__populer' => $query_populer->getResultObject(),
            'data_artikel' => $query->getRow(),
        ];
        return view('home/read', $data);
    }
    public function kontak()
    {
        $query_populer = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Berita' AND 
        view_artikel.status_artikel = 'Publish' order by hits desc LIMIT 5");

        $query_sidebar = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Pengumuman' AND 
        view_artikel.status_artikel = 'Publish' order by created_at desc LIMIT 5");

        $data = [
            'title' => 'Sambutan',
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data__populer' => $query_populer->getResultObject(),
        ];
        return view('home/kontak', $data);
    }

    public function byJenis($jenis_dokumen)
    {
        $query = $this->db->query("SELECT * FROM tbl_dokumen WHERE jenis_dokumen = ? ORDER BY id_dokumen DESC", [$jenis_dokumen]);
        $data = $query->getResult();
        if (empty($data)) {
            return redirect()->to('/');
        }
        return view('home/download', ['data' => $data, 'jenis' => $jenis_dokumen]);
    }
}

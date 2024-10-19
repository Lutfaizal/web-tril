<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\PengabdianModel;

class PageViewController extends BaseController
{
    protected $artikelModel;

    function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        $query_populer = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('hits', 'desc')
            ->limit(5)
            ->get();

        $query_sidebar = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();


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
        $data = [
            'title' => 'Berita',
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => ceil($total / $perPage),
        ];

        return view('home/artikel', $data);
    }
    public function read($slug_artikel = '')
    {
        $data = $this->artikelModel->where('slug_artikel', $slug_artikel)->first();
        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        $this->db->table('tbl_artikel')
            ->set('hits', $data->hits + 1)
            ->where('id_artikel', $data->id_artikel)
            ->update();

        $query_populer = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('hits', 'desc')
            ->limit(5)
            ->get();

        $query_sidebar = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $data = [
            'title' => $data->judul_artikel,
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data__populer' => $query_populer->getResultObject(),
            'data_artikel' => $data,
        ];
        return view('home/read', $data);
    }

    public function pengumuman()
    {
        $query_populer = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('hits', 'desc')
            ->limit(5)
            ->get();
        $query_sidebar = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
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
        $data = [
            'title' => 'Pengumuman',
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => ceil($total / $perPage),
        ];
        return view('home/artikel', $data);
    }

    public function agenda()
    {
        $query_populer = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('hits', 'desc')
            ->limit(5)
            ->get();
        $query_sidebar = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
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
        $data = [
            'title' => 'Agenda',
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => ceil($total / $perPage),
        ];
        return view('home/artikel', $data);
    }
    public function karir()
    {
        $query_populer = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('hits', 'desc')
            ->limit(5)
            ->get();
        $query_sidebar = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
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
        $data = [
            'title' => 'Karir',
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => ceil($total / $perPage),
        ];
        return view('home/artikel', $data);
    }

    public function readsambutan()
    {
        $query_populer = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('hits', 'desc')
            ->limit(5)
            ->get();
        $query_sidebar = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $query = $this->db->table('view_sambutan')
            ->where('id_artikel', 2)
            ->get();
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
        $query_populer = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('hits', 'desc')
            ->limit(5)
            ->get();
        $query_sidebar = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $data = [
            'title' => 'Sambutan',
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data__populer' => $query_populer->getResultObject(),
        ];
        return view('home/kontak', $data);
    }

    public function byJenis($jenis_dokumen)
    {
        $query = $this->db->table('tbl_dokumen')
            ->where('jenis_dokumen', $jenis_dokumen)
            ->orderBy('id_dokumen', 'asc')
            ->get();

        if ($query->getNumRows() === 0) {
            return redirect()->to('/');
        }
        $data = [
            'data' => $query->getResult(),
            'jenis' => $jenis_dokumen

        ];
        return view('home/download', $data);
    }

    public function byJenisMahasiswa($kategori)
    {
        $kategoriMapping = [
            'penelitian' => 'Penelitian Mahasiswa',
            'pengabdian' => 'Pengabdian Mahasiswa',
            'prestasi' => 'Prestasi Mahasiswa',
            'organisasi' => 'Organisasi Mahasiswa'
        ];

        if (!array_key_exists($kategori, $kategoriMapping)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $jenisArtikel = $kategoriMapping[$kategori];

        $query_populer = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Berita')
            ->where('status_artikel', 'Publish')
            ->orderBy('hits', 'desc')
            ->limit(5)
            ->get();
        $query_sidebar = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Pengumuman')
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;
        $total = $this->db->table('view_artikel')
            ->where('jenis_artikel', 'Karir')
            ->where('status_artikel', 'Publish')
            ->countAllResults();


        $query = $this->db->table('view_artikel')
            ->where('jenis_artikel', $jenisArtikel)
            ->where('status_artikel', 'Publish')
            ->orderBy('created_at', 'desc')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get();
        $data = [
            'title' => $jenisArtikel,
            'data__populer' => $query_populer->getResultObject(),
            'data_sidebar' => $query_sidebar->getResultObject(),
            'data_artikel' => $query->getResultObject(),
            'pager' => \Config\Services::pager(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => ceil($total / $perPage),
        ];
        return view('home/artikel', $data);
    }

    public function pengabdian()
    {
        $query = $this->db->table('view_pengabdian')
            ->orderBy('tahun', 'desc')
            ->get();
        $data = [
            'title' => 'Pengabdian Dosen',
            'data' => $query->getResult(),
        ];
        return view('home/pengabdian', $data);
    }

    public function penelitian()
    {
        $query = $this->db->table('view_penelitian')
            ->orderBy('tahun', 'desc')
            ->get();
        $data = [
            'title' => 'Penelitian Dosen',
            'data' => $query->getResult(),
        ];
        return view('home/penelitian', $data);
    }

    public function publikasi()
    {
        $query = $this->db->table('view_publikasi')
            ->orderBy('tahun', 'desc')
            ->get();
        $data = [
            'title' => 'Publikasi Dosen',
            'data' => $query->getResult(),
        ];
        return view('home/publikasi', $data);
    }
}

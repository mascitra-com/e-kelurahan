<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {
    private $_data;
    public function __construct()
    {
        parent::__construct();
        $this->_accessable = TRUE;
        $this->load->helper(array('dump', 'potong_teks', 'cek_file'));
        $this->load->model(array('organisasi_m', 'agenda_m', 'regulasi_m', 'info_m', 'galeri_m', 'galeri_kategori_m'));

        if (is_null($this->session->userdata('visitor')))
        {
            $this->session->set_userdata('visitor', array('ip' => $this->input->ip_address(), 'visited_articles' => array()));
        } else
        {
            if ($this->session->userdata('visitor')['ip'] !== $this->input->ip_address())
            {
                $this->session->sess_destroy();
                $this->session->set_userdata('visitor', array('ip' => $this->input->ip_address(), 'visited_articles' => array()));
            }
        }
        $this->load->model(array('pengumuman_m', 'info_m', 'organisasi_m'));
        $this->_data['pengumuman'] = $this->pengumuman_m->get_all(array('id_organisasi' => $this->checkSlug($this->uri->segment(2))));
        $this->_data['profil'] = $this->info_m->fields('slug, judul')->get_all(array('id_organisasi' => $this->checkSlug($this->uri->segment(2))));
        $this->_data['list_kelurahan'] = $this->organisasi_m
        ->fields('slug, nama')
        ->where(array('status' => '1', 'id >' => '1'))
        ->get_all();
    }

    public function index()
    {
        if (is_null($this->_slug))
        {
            $slug = 'kecamatan-lumajang';
            $judul = 'Kecamatan ';
        } else
        {
            $slug = $this->uri->segment(2, 'kecamatan-lumajang');
            $judul = 'Kelurahan ';
        }

        //AMBIL ID ORG BERDASARKAN SLUG
        $id_organisasi = $this->checkSlug($this->_slug);

        //JUDUL HALAMAN
        $data['judul'] = $judul . $this->organisasi_m->get($id_organisasi)->nama;

        $this->load->model(array('berita_m', 'agenda_m', 'regulasi_m', 'profil_m'));

        //PROFIL ORGANISASI
        $data['profile'] = $this->profil_m
        ->where('id_organisasi', $id_organisasi)
        ->fields('deskripsi')
        ->get();

        //BERITA
        $data['berita_terbarus'] = $this->berita_m
        ->where('status', '0')
        ->where('id_organisasi', $id_organisasi)
        ->order_by('tanggal_publish', 'desc')
        ->limit(8)
        ->fields('judul, isi, slug, gambar, tanggal_publish')
        ->get_all();

        $data['berita_populers'] = $this->berita_m
        ->where('status', '0')
        ->where('id_organisasi', $id_organisasi)
        ->order_by(array(
            'count' => 'desc',
            'tanggal_publish' => 'desc'
            ))
        ->limit(4)
        ->fields('judul, isi, slug, gambar, tanggal_publish')
        ->get_all();

        $data['headline'] = $this->berita_m
        ->where('tipe', '1')
        ->where('id_organisasi', $id_organisasi)
        ->order_by(array(
            'tanggal_publish' => 'desc'
            ))
        ->fields('judul, isi, slug, gambar, tanggal_publish')
        ->get();

        //AGENDA
        $data['agendas'] = $this->agenda_m
        ->order_by('tanggal_agenda', 'desc')
        ->limit(4)
        ->fields('perihal, tanggal_agenda')
        ->get_all(array(
            'id_organisasi' => $id_organisasi
            ));

        //REGULASI
        $data['regulations'] = $this->regulasi_m
        ->order_by('tgl_dikeluarkan')
        ->fields('id, judul, tgl_dikeluarkan')
        ->limit(4)
        ->get_all('id_organisasi', $id_organisasi);

        // Galeri Foto
        $data['foto'] = $this->galeri_m
        ->where('tipe', '0')
        ->limit(4)
        ->get_all('id_organisasi', $id_organisasi);

        // Galeri Video
        $data['video'] = $this->galeri_m
        ->where('tipe', '1')
        ->limit(4)
        ->get_all('id_organisasi', $id_organisasi);

        $data['banner'] = $this->organisasi_m->fields('banner_atas, banner_samping, banner_bawah')
        ->get('id_organisasi', $id_organisasi);

        $this->render('homepage/homepage', array_merge($data, $this->_data));
    }

    private function checkSlug($slug = NULL)
    {
        if (is_null($slug) || empty($slug))
        {
            return 1;
        } else
        {
            //cek slug apakah ada di tabel organisasi
            $query = $this->organisasi_m
            ->fields('id, slug')
            ->get(array('slug' => $slug));
            if ($query === FALSE)
            {
                return FALSE;
            } else
            {
                return $query->id;
            }
        }
    }

    public function berita($search_status = FALSE)
    {
        if ($id_organisasi = $this->checkSlug($this->_slug))
        {
            $this->load->model('berita_m');

            if ($search_status == FALSE)
            {
                $this->session->unset_userdata('search_homepages');
            }

            $data['search'] = $this->session->userdata('search_homepages');

            //BERITA
            $query = $this->berita_m
            ->order_by('tanggal_publish', 'desc')
            ->limit(4)
            ->fields('judul, isi, slug, gambar, tanggal_publish')
            ->with_akun('fields:username')
            ->get_all(array(
                'id_organisasi' => $id_organisasi,
                'status' => '0'
                ));
            $data['beritas'] = $query;
            $this->render('homepage/berita', array_merge($data, $this->_data));
        } else
        {
            $this->message('Kelurahan tidak ditemukan', 'danger');
            $this->go('homepage');
        }
    }

    public function berita_selengkapnya($slug = NULL)
    {
        if ($id_organisasi = $this->checkSlug($this->_slug))
        {
            $this->load->model('berita_m');
            if (is_null($slug) || empty($slug))
            {
                $this->message('Berita tidak ditemukan', 'warning');
                $this->go('homepage/' . $this->_slug . '/berita');
            } else
            {
                $query = $this->berita_m
                ->order_by('tanggal_publish', 'desc')
                ->limit(4)
                ->fields('judul, isi, slug, gambar, tanggal_publish')
                ->with_akun('fields:username')
                ->get(array(
                    'id_organisasi' => $id_organisasi,
                    'status' => '0',
                    'slug' => $slug
                    ));

                //BERITA POPULER
                $populer = $this->berita_m
                ->where('status', '0')
                ->where('id_organisasi', $id_organisasi)
                ->order_by(array(
                    'count' => 'desc',
                    'tanggal_publish' => 'desc'
                    ))
                ->limit(4)
                ->fields('judul, isi, slug, gambar, tanggal_publish')
                ->get_all();

                if ($query === FALSE)
                {
                    $this->message('Berita tidak ditemukan', 'danger');
                    $this->go('homepage');
                } else
                {
                    $data['berita'] = $query;
                    $data['populers'] = $populer;
                    $this->render('homepage/berita_detail', array_merge($data, $this->_data));
                }
            }
        } else
        {
            $this->message('Kelurahan tidak ditemukan', 'danger');
            $this->go('homepage');
        }
    }

    public function agenda()
    {
        if ($id_organisasi = $this->checkSlug($this->_slug))
        {
            $data['agenda'] = $this->agenda_m->get_all(array('id_organisasi' => $id_organisasi));
            $this->render('homepage/agenda', array_merge($data, $this->_data));
        } else
        {
            $this->message('Kelurahan tidak ditemukan', 'danger');
            $this->go('homepage');
        }
    }

    public function regulasi()
    {
        if ($id_organisasi = $this->checkSlug($this->_slug))
        {
            $data['regulasi'] = $this->regulasi_m->get_all(array('id_organisasi' => $id_organisasi));
            $this->render('homepage/regulasi', array_merge($data, $this->_data));
        } else
        {
            $this->message('Kelurahan tidak ditemukan', 'danger');
            $this->go('homepage');
        }
    }

    public function profil($slug)
    {
        if ($id_organisasi = $this->checkSlug($this->_slug))
        {
            $data['profil_detail'] = $this->info_m->get(array('id_organisasi' => $id_organisasi, 'slug' => $slug));
            $this->render('homepage/profil', array_merge($data, $this->_data));
        } else
        {
            $this->message('Kelurahan tidak ditemukan', 'danger');
            $this->go('homepage');
        }
    }

    public function album()
    {
        if ($id_organisasi = $this->checkSlug($this->_slug))
        {
            $data['album'] = $this->galeri_kategori_m->with_galeri()->get_all(array('id_organisasi' => $id_organisasi));
            $this->render('homepage/album', array_merge($data, $this->_data));
        } else
        {
            $this->message('Kelurahan tidak ditemukan', 'danger');
            $this->go('homepage');
        }
    }

    public function galeri($id)
    {
        $data['album'] = $this->galeri_kategori_m->get($id);
        $data['foto'] = $this->galeri_m->get_all(array('id_kategori' => $id));
        $this->render('homepage/galeri', array_merge($data, $this->_data));
    }

    public function video()
    {
        if ($id_organisasi = $this->checkSlug($this->_slug))
        {
            $data['videos'] = $this->galeri_m->get_all(array('id_organisasi' => $id_organisasi, 'tipe' => '1'));
            $this->render('homepage/video', array_merge($data, $this->_data));
        } else
        {
            $this->message('Kelurahan tidak ditemukan', 'danger');
            $this->go('homepage');
        }
    }
}

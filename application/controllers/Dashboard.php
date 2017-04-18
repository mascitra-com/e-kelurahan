<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model(array('surat_m'));
    }

    public function index()
    {
        $data['surats'] = $this->surat_m
            ->where('status', '0')
            ->with_penduduk('fields:nama')
            ->where('id_organisasi', $this->ion_auth->get_current_id_org())
            ->fields('id, jenis, status, tanggal_verif, keterangan, nama_pengambil, created_at, updated_at, updated_by')
            ->get_all();
        $this->render('dashboard/index', $data);
    }

    public function notifikasi()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        if ( ! $result = $this->cache->get('result'))
        {
            $this->load->helper('surat');
            $data = $this->db
                ->select('jenis, COUNT(id) as jumlah')
                ->where('status', '0')
                ->group_by('jenis')
                ->having('jumlah >', '0')
                ->get('surat')
                ->result();
            $total_notif = 0;
            foreach ($data as $index => $value)
            {
                $data[$index]->jenis = get_tipe_surat($value->jenis);
                $data[$index]->link = 'surat/' . strtolower(str_replace(' ', '_', $data[$index]->jenis));
                $total_notif += $data[$index]->jumlah;
            }
            // TODO Tambahkan Notifikasi Surat lainnya
            $result = array('notif_count' => $total_notif,
                'notif_list' => $data
            );
            $this->cache->save('result', $result, 270);
        }
        echo json_encode($result);
    }
}
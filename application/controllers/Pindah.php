<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('dump'));
        $this->load->model(array('organisasi_m','provinsi_m', 'kabupaten_m', 'kecamatan_m', 'kelurahan_m', 'mutasi_keluar_m', 'mutasi_keluar_detail_m', 'penduduk_m'));
    }

    public function index($page = NULL)
    {
        if(!$page){
            $this->go('pindah/page/1');
        }
        // Get Filter and Order By from Session
        $filter = $this->session->userdata('fpi');
        // Setting up Pagination
        $this->load->library('pagination');
        $total_data = $this->mutasi_keluar_m
            ->with_penduduk('fields:nama')
            ->where('id_organisasi', $this->ion_auth->get_current_id_org())
            ->where($filter, 'like', '%')->count_rows();
        $data['mutasi_keluars'] = $this->mutasi_keluar_m->where($filter, 'like', '%')
        ->where('id_organisasi', $this->ion_auth->get_current_id_org())
        ->fields('id ,created_at, updated_at')
        ->with_penduduk('fields:nama')
        ->paginate(10, $total_data, $page);
        $data['mutasi_keluar_search'] = $this->mutasi_keluar_m
        ->where('id_organisasi', $this->ion_auth->get_current_id_org())
        ->with_penduduk('fields:nama')
        ->get_all();
        $data['pagination'] = $this->mutasi_keluar_m->all_pages;
        $this->generateCsrf();
        $this->render('kelurahan/pindah', $data);
    }

    /**
     * Use to make URI looks good
     *
     * @param int $page
     */
    public function page($page = 1)
    {
        $this->index($page);
    }

    /**
     * Call when user want to search specific data
     * Store filter in Session
     */
    public function search()
    {
        $data = $this->input->post();
        $data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], "|")));
        $this->session->unset_userdata('fpi');
        $this->session->set_userdata('fpi', $data);
        $this->go('pindah');
    }

    /**
     * Reset any filter made while user search specific data
     */
    public function refresh()
    {
        $this->session->unset_userdata('fpi');
        $this->go('pindah');
    }


    public function arsip()
    {
        $data['mutasi_keluars'] = $this->mutasi_keluar_m
        ->fields('id ,created_at, updated_at')
        ->with_penduduk('fields:nama')
        ->only_trashed()
        ->where('id_organisasi', $this->ion_auth->get_current_id_org())
        ->get_all();
        $this->render('kelurahan/pindah_arsip', $data);
    }

    public function tambah()
    {
        $data['provinsi'] = $this->provinsi_m->get_all();
        $data['penduduk'] = $this->penduduk_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->get_all();

        $this->generateCsrf();
        $this->render('kelurahan/pindah_pengajuan', $data);
    }
    
    public function simpan()
    {
        $data = $this->input->post();
        $data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
        $data['id_organisasi'] = $this->ion_auth->get_current_id_org();
        $pengikut = $data['pengikut'];
        unset($data['pengikut']);
        if($id_mutasi = $this->mutasi_keluar_m->insert($data)){
            $this->message('Berhasil menyimpan data Pindah');
            foreach ($pengikut as $item){
                $temp = array('id_mutasi' => $id_mutasi, 'nik' => $item);
                $this->mutasi_keluar_detail_m->insert($temp);
            }
        }
        $this->go('pindah');
    }
    
    public function detail($id = NULL)
    {
        $mutasi = $this->mutasi_keluar_m
        ->with_penduduk()
        ->get($id);
        $data['penduduk'] = $this->penduduk_m
        ->where(array(
            'id_organisasi' => $this->ion_auth->get_current_id_org(),
            'nik <>' => $mutasi->nik
            ))
        ->get_all();
        $data['pengikut'] = $this->mutasi_keluar_detail_m
        ->fields('id')
        ->with_penduduk('fields:nik,nama')
        ->where('id_mutasi', $id)
        ->get_all();
        $data['provinsi'] = $this->provinsi_m->get_all();
        $data['kabupaten'] = $this->kabupaten_m->where('id_provinsi', $mutasi->id_prov_tujuan)->get_all();
        $data['kecamatan'] = $this->kecamatan_m->where('id_kabupaten', $mutasi->id_kab_tujuan)->get_all();
        $data['kelurahan'] = $this->kelurahan_m->where('id_kecamatan', $mutasi->id_kec_tujuan)->get_all();
        $data['mutasi'] = $mutasi;

        $this->generateCsrf();
        $this->render('kelurahan/pindah_detail', $data);
    }

    public function pratinjau($id = NULL)
    {
        if ($id != NULL && !empty($id)) {

            $jumlah_pengikut = $this->mutasi_keluar_m
            ->fields('id')
            ->with_mutasi_keluar_details('fields:*count*')
            ->get($id);

            if ($jumlah_pengikut) {
                $data['cetak'] = $this->ambilDataSuratPengajuan($id);
                if (is_null($jumlah_pengikut->mutasi_keluar_details)) {
                    $data['j_pengikut'] = '';
                }else{
                    $data['j_pengikut'] = $jumlah_pengikut->mutasi_keluar_details[0]->counted_rows;
                }
                $data['current_kelurahan'] = $this->organisasi_m->fields('nama, nip, nama_pimpinan')->get($this->ion_auth->get_current_id_org());
                $data['current_kecamatan'] = $this->organisasi_m->fields('nama, nip, nama_pimpinan')->get(1);
                $this->load->helper(array('agama', 'terbilang', 'date'));
                $this->render('kelurahan/pindah_pengajuan_cetak', $data);
            }else{
                $this->message('Terjadi kesalahan sistem saat mengambil data untuk mencetak. Coba Lagi nanti.', 'warning');
                $this->go('pindah');
            }
        }else{
            $this->message('Data cetak tidak ditemukan', 'warning');
            $this->go('pindah');
        }
    }

    public function cetak($id = NULL)
    {
        if ($id != NULL && !empty($id)) {

            $jumlah_pengikut = $this->mutasi_keluar_m
            ->fields('id')
            ->with_mutasi_keluar_details('fields:*count*')
            ->get($id);

            if ($jumlah_pengikut) {
               if (is_null($jumlah_pengikut->mutasi_keluar_details)) {
                $data['j_pengikut'] = '';
            }else{
                $data['j_pengikut'] = $jumlah_pengikut->mutasi_keluar_details[0]->counted_rows;
            }
            $data['current_kelurahan'] = $this->organisasi_m->fields('nama, nip, nama_pimpinan')->get($this->ion_auth->get_current_id_org());
            $data['current_kecamatan'] = $this->organisasi_m->fields('nama, nip, nama_pimpinan')->get(1);
            $this->load->helper(array('agama', 'terbilang', 'date'));

            $this->load->library('pdfgenerator');

            //ambil data pengikut
            $data['cetak'] = $this->ambilDataSuratPengajuan($id);
            if (!is_null($data['cetak']->mutasi_keluar_details)) {
               $j=0;
               $data['pengikuts'] ="";
               foreach ($data['cetak']->mutasi_keluar_details as $pengikut) {
                if ($pengikut->penduduk->jenis_kelamin === '0') {
                    $jk = "v";
                }elseif ($pengikut->penduduk->jenis_kelamin === '1') {
                    $jk = "v";
                }
                else{
                    $jk = "-";
                }

                if($pengikut->penduduk->status_nikah == '0'){
                    $st_nk ="Belum Kawin";
                } 
                elseif($pengikut->penduduk->status_nikah == '1'){
                    $st_nk ="Kawin";
                }
                elseif($pengikut->penduduk->status_nikah == '2'){
                    $st_nk ="Cerai Hidup";
                }
                elseif($pengikut->penduduk->status_nikah == '3'){
                    $st_nk ="Cerai Mati";
                }
                else{
                    $st_nk ="Tidak ada Data";
                }
                $umur = date('Y') - date('Y',strtotime($pengikut->penduduk->tanggal_lahir));
                $data['pengikuts'] .="<tr><td>". ++$j ."</td>"."<td>". $pengikut->penduduk->nama ."</td><td>".$jk."</td><td><td>". $umur ."</td><td>".$st_nk."</td><td></td></tr>";
            }   
        }

        $this->render('kelurahan/format_cetak', $data);    
            // $this->pdfgenerator->generate($html,'Surat Pindah No '. $data['cetak']->no_surat .' ('.$data['cetak']->nik.')');            
    }else{
        $this->message('Terjadi kesalahan saat mengambil data untuk mencetak', 'danger');
    }
}else{
    $this->message('Data cetak tidak ditemukan', 'danger');
}
}

public function ubah($id = NULL)
{
    $data = $this->input->post();
    $pengikut_lama = $this->mutasi_keluar_detail_m->where('id_mutasi', $id)->get_all();
    foreach ($pengikut_lama as $item){
        $this->mutasi_keluar_detail_m->delete($item->id);
    }
    $pengikut_baru = $data['pengikut'];
    unset($data['no_surat'], $data['nik'], $data['pengikut']);
    foreach ($pengikut_baru as $item){
        $temp = array('id_mutasi' => $id, 'nik' => $item);
        $this->mutasi_keluar_detail_m->insert($temp);
    }
    if($this->mutasi_keluar_m->update($data, $id)){
        $this->message('Berhasil Mengubah Data Pengajuan Pindah', 'success');
    } else {
        $this->message('Terjadi Kesalahan Saat Mengubah Data Pengajuan Pindah', 'danger');
    }
    $this->go('pindah/detail/'.$id);
}

public function arsipkan($id = NULL)
{
    if ($id !== NULL && !empty($id)) {
        $query = $this->mutasi_keluar_m->delete($id);
        if ($query === FALSE) {
            $this->message('Terjadi Kesalahan Saat Mengarsipkan', 'danger');
        }else{
            $this->message('Berhasil Mengarsipkan Mutasi', 'success');
            $this->go('pindah');
        }
    }else{
        $this->message('Terjadi Kesalahan Saat Membatalkan Pengajuan | ID Tidak Ditemukan', 'danger');
    }
    $this->go('pindah/arsipkan');
}

public function kembalikan($id = NULL)
{
    if ($id !== NULL && !empty($id)) {
        if ($this->mutasi_keluar_m->restore($id)) {
            if ($this->mutasi_keluar_detail_m->restore(array('id_mutasi', $id))) {
                $this->go('pindah/arsip');
                $this->message('Berhasil Mengembalikan Mutasi', 'success');
            }else{
                $this->message('Terjadi Kesalahan Saat Mengembalikan Mutasi Detail', 'danger');
            }
        }else{
            $this->message('Terjadi Kesalahan Saat Mengembalikan Mutasi', 'danger');
        }
    }else{
        $this->message('Terjadi Kesalahan Saat Mengembalikan Mutasi | ID Tidak Ditemukan');
    }
}

    /**
     * Get All Cities by Province ID
     */
    public function getCitiesByProvince()
    {
        $idProvince = $this->input->post('idProvince');
        $cities = $this->kabupaten_m->where('id_provinsi', $idProvince)->get_all();
        $data = array('<option value="">Pilih Kabupaten / Kota</option>');

        // Store all cities to array as combo box attribute
        foreach ($cities as $list) {
            $data[] = "<option value='$list->id'>$list->nama</option>";
        }
        echo json_encode($data);
    }

    /**
     * Get All Districts by City ID
     */
    public function getDistrictByCity()
    {
        $idCity = $this->input->post('idCity');
        $districts = $this->kecamatan_m->where('id_kabupaten', $idCity)->get_all();
        $data = array('<option value="">Pilih Kecamatan Tujuan</option>');

        // Store all districts to array as combo box attribute
        foreach ($districts as $list) {
            $data[] = "<option value='$list->id'>$list->nama</option>";
        }
        echo json_encode($data);
    }

    /**
     * Get All Districts by City ID
     */
    public function getVillageByDistrict()
    {
        $idDistrict = $this->input->post('idDistrict');
        $villages = $this->kelurahan_m->where('id_kecamatan', $idDistrict)->get_all();
        $data = array('<option value="">Pilih Kelurahan/Desa Tujuan</option>');

        // Store all districts to array as combo box attribute
        foreach ($villages as $list) {
            $data[] = "<option value='$list->id'>$list->nama</option>";
        }
        echo json_encode($data);
    }

    /**
     * Mengambil data untuk keperluan cetak & pratinjau
     */
    public function ambilDataSuratPengajuan($id = NULL)
    {
        if ($id != NULL && !empty($id)) {
            $query = $this->mutasi_keluar_m
            ->fields('no_surat, nik, alamat_asal, alamat_tujuan, rt_tujuan, rw_tujuan, keterangan')
            ->with_penduduk(array(
                'fields' => 'nama, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, status_nikah, rt, rw',
                'with' => array(
                    'relation' => 'pekerjaan',
                    'fields' => 'pekerjaan'
                    )
                ))
            ->with_mutasi_keluar_details(array(
                'fields' => 'nik',
                'with'=>array(
                    'relation'=>'penduduk',
                    'fields'=>'nama, jenis_kelamin, status_nikah, tanggal_lahir'
                    )
                ))
            ->with_provinsi('fields:nama')
            ->with_kabupaten('fields:nama')
            ->with_kecamatan('fields:nama')
            ->with_kelurahan('fields:nama')
            ->get($id);

            if ($query) {
                return $query;
            }else{
                die('terjadi kesalahan saat mengambil data untuk mencetak');
            }
        }else{
            die('data cetak tidak ditemukan');
        }
    }
}


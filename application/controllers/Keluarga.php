<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends MY_Controller
{
	
	function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->library(array('form_validation'));
		$this->load->helper(array('dump', 'string'));
		$this->load->model(array('organisasi_m'));
		$this->load->model(array('keluarga_m', 'penduduk_m', 'pendidikan_m', 'detail_kk_m', 'status_keluarga_m'));
	}

	public function index()
	{
		$data['keluargas'] = $this->keluarga_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->fields('no, alamat, rt, rw, updated_at')->with_penduduk('fields:nama')->get_all();
		$this->generateCsrf();
		$this->render('keluarga/index', $data);
	}

	public function detail($no = NULL)
	{
	    if(is_null($no)){
	        $this->go('keluarga');
        }
		$data['keluarga'] = $this->keluarga_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->fields('no, alamat, rt, rw, kode_pos')->with_penduduk('fields:nik,nama')->get($no);
		$data['detail'] = $this->detail_kk_m->order_by('no_urut_kk')->with_status()->with_pendidikan()->with_penduduk()->get_all(array('no_kk' => $data['keluarga']->no));
        $data['penduduk'] = $this->penduduk_m->ambilPendudukHidup($this->ion_auth->get_current_id_org());
        $data['status'] = $this->status_keluarga_m->get_all(array('id_statuskeluarga >' =>'1'));
        $data['pendidikan'] = $this->pendidikan_m->get_all();
        $this->generateCsrf();
		$this->render('keluarga/detail', $data);
	}

	public function simpan()
	{
		$current_id_org = $this->ion_auth->get_current_id_org();

		$data= $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], "|")));
		$data['rt'] = ltrim($data['rt'], '0');
		$data['rw'] = ltrim($data['rw'], '0');
		$id_org = array('id_organisasi' => $current_id_org);
		$insert= array_merge($data, $id_org);
		if (!empty($data['nik'])) {
			$this->keluarga_m->insert($insert);	
			//insert ke detail_kk
			$insert_detail = array(
				'no_kk' => $data['no'],
				'nik' => $data['nik'],
				);
			if ($this->detail_kk_m->insert($insert_detail)) {
				$this->go('keluarga/detail/'.$data['no']);
			}else{
				die('terjadi kesalahan saat insert tabel detail keluarga');
			}
		}else{
			die('terjadi kesalahan saat insert | nik kosong');
		}
	}

	public function sunting($no)
	{
		$current_id_org = $this->ion_auth->get_current_id_org();

		$data= $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], "|")));
		$data['rt'] = ltrim($data['rt'], '0');
		$data['rw'] = ltrim($data['rw'], '0');
		$id_org = array('id_organisasi' => $current_id_org);
		$update= array_merge($data, $id_org);
		if (!empty($data['nik'])) {
			$this->keluarga_m->where('no',$no)->update($update);	
			//update ke detail_kk
			$update_detail = array(
				'no_kk' => $data['no'],
				);
			if ($this->detail_kk_m->where('no_kk',$no)->update($update_detail)) {
			    $this->message('Berhasil Mengganti Data Keluarga', 'success');
                $this->go('keluarga/detail/'.$data['no']);
            }else{
                $this->message('Terjadi Kegagalan Saat Mengganti Data Anggota Keluarga', 'danger');
			}
		}else{
            $this->message('Terjadi Kegagalan Saat Mengganti Data Keluarga', 'danger');
        }
        $this->go('keluarga/detail/'.$no);
    }

	public function ambil_kep_nik()
	{
		$current_id_org = $this->ion_auth->get_current_id_org();
		$penduduk_hidup =$this->penduduk_m->ambilPendudukHidup($current_id_org);

		if ($penduduk_hidup) {
			if ( $penduduk_hidup !== 'Penduduk tidak ditemukan') {
				echo json_encode($penduduk_hidup);
			}else{
				echo(json_encode(FALSE));
			}
		}else{
			die('Kesalahan query saat mengambil penduduk hidup');
		}
	}

    public function simpan_anggota()
    {
        $data = $this->input->post();
        $data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
        if($this->detail_kk_m->insert($data)){
            $this->message('Berhasil Menyimpan Anggota Keluarga Baru', 'success');
        } else {
            $this->message('Gagal Menyimpan Anggota Keluarga Baru', 'danger');
        }
        $this->go('keluarga/detail/'.$data['no_kk']);
	}

    public function hapus_anggota($id = NULL)
    {
        $no_kk = $this->detail_kk_m->fields('no_kk')->get($id)->no_kk;
        dump($no_kk);
        if($this->detail_kk_m->delete($id)){
            $this->message('Berhasil Menghapus Anggota Keluarga Baru', 'success');
        } else {
            $this->message('Gagal Menghapus Anggota Keluarga Baru', 'danger');
        }
        $this->go('keluarga/detail/'.$no_kk);
	}
}
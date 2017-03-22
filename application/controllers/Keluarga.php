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

	public function index($page = NULL)
	{
        if(!$page){
            $this->go('keluarga/page/1');
        }
        // Get Filter and Order By from Session
        $filter = $this->session->userdata('fk');
        $order_by = $this->session->userdata('obk');
        $order_type = $this->session->userdata('otk');
        // Setting up Pagination
        $this->load->library('pagination');
        $total_data = $this->keluarga_m
            ->where($filter, 'like', '%')
            ->where('id_organisasi', $this->ion_auth->get_current_id_org())
            ->count_rows();
		$data['keluargas'] = $this->keluarga_m
            ->order_by($order_by, $order_type)
            ->where($filter, 'like', '%')
            ->where('id_organisasi', $this->ion_auth->get_current_id_org())
            ->fields('no, alamat, rt, rw, updated_at')
            ->with_penduduk('fields:nama')
            ->paginate(10, $total_data, $page);
        $data['pagination'] = $this->keluarga_m->all_pages;
        $data['order_by'] = $order_by;
        $data['order_type'] = $order_type === 'asc' ? 'desc' : 'asc';
        $this->generateCsrf();
		$this->render('keluarga/index', $data);
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
     * Order the data
     *
     * @param $order_by
     * @param string $order_type
     */
    public function urut($order_by, $order_type = 'asc')
    {
        $this->session->unset_userdata(array('obk', 'otk'));
        $this->session->set_userdata('obk', $order_by);
        $this->session->set_userdata('otk', $order_type);
        $this->go('keluarga');
    }

    /**
     * Call when user want to search specific data
     * Store filter in Session
     */
    public function search()
    {
        $data = $this->input->post();
        $this->session->unset_userdata('fk');
        $this->session->set_userdata('fk', $data);
        $this->go('keluarga');
    }

    /**
     * Reset any filter made while user search specific data
     */
    public function refresh()
    {
        $this->session->unset_userdata(array('fk', 'obk', 'otk'));
        $this->go('keluarga');
    }

	public function detail($no = NULL)
	{
	    if(is_null($no)){
	        $this->go('keluarga');
        }
		$data['keluarga'] = $this->keluarga_m
            ->where('id_organisasi', $this->ion_auth->get_current_id_org())
            ->fields('no, alamat, rt, rw, kode_pos')
            ->with_penduduk('fields:nik,nama')->get($no);
		$data['detail'] = $this->detail_kk_m
            ->order_by('no_urut_kk')
            ->with_status()
            ->with_pendidikan()
            ->with_penduduk()
            ->get_all(array('no_kk' => $data['keluarga']->no));
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
			    $this->ion_auth->register($data['nik'], '123456', array('id_organisasi' => $this->ion_auth->get_current_id_org()), array(3));
                $this->message('Berhasil Menambahkan Anggota Keluarga', 'success');
                $this->go('keluarga/detail/'.$data['no']);
			}else{
				$this->message('Terjadi Kesalahan Saat Menambahkan Anggota Keluarga', 'danger');
            }
        }else{
            $this->message('Terjadi Kesalahan Saat Menambahkan Data Keluarga', 'danger');
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

    public function ubah_anggota($id)
    {
        $data = $this->input->post();
        $data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
        $data = array_filter($data, function($value) { return $value !== ''; });
        if($this->detail_kk_m->update($data, $id)){
            $this->message('Berhasil Menyimpan Anggota Keluarga Baru', 'success');
        } else {
            $this->message('Gagal Menyimpan Anggota Keluarga Baru', 'danger');
        }
        $this->go('keluarga/detail/'.$data['no_kk']);
	}

    public function hapus_anggota($id = NULL)
    {
        $no_kk = $this->detail_kk_m->fields('no_kk')->get($id)->no_kk;
        if($this->detail_kk_m->delete($id)){
            $this->message('Berhasil Menghapus Anggota Keluarga Baru', 'success');
        } else {
            $this->message('Gagal Menghapus Anggota Keluarga Baru', 'danger');
        }
        $this->go('keluarga/detail/'.$no_kk);
	}
}
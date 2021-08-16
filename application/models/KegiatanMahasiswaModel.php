<?php
/**
 * This model for managing data kegiatan mahasiwa
 */
class KegiatanMahasiswaModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('kegiatan_mahasiswa')->result();
	}

	public function saveData($data)
	{
		return $this->db->insert('kegiatan_mahasiswa',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('kegiatan_mahasiswa',['id' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		return $this->db->update('kegiatan_mahasiswa');
	}

	public function deleteData($id)
	{
		return $this->db->delete('kegiatan_mahasiswa',['id' => $id]);
	}
}
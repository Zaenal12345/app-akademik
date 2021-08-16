<?php 
/**
 * This model for managing data mahasiswa 
 */
class MahasiswaModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('mahasiswa')->result();
	}

	public function saveData($data)
	{
		return $this->db->insert('mahasiswa',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('mahasiswa',['id_mahasiswa' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_mahasiswa',$id);
		return $this->db->update('mahasiswa');
	}

	public function deleteData($id)
	{
		return $this->db->delete('mahasiswa',['id_mahasiswa' => $id]);
	}

}
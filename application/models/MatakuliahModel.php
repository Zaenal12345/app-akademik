<?php 
/**
 * This model for managing data jurusan 
 */
class MatakuliahModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('matakuliah')->result();
	}

	public function saveData($data)
	{
		return $this->db->insert('matakuliah',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('matakuliah',['id_matakuliah' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_matakuliah',$id);
		return $this->db->update('matakuliah');
	}

	public function deleteData($id)
	{
		return $this->db->delete('matakuliah',['id_matakuliah' => $id]);
	}

}
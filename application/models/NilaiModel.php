<?php
/**
 * This model for managing data nilai
 */
class NilaiModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('nilai')->result();
	}

	public function saveData($data)
	{
		return $this->db->insert('nilai',$data);
	}
	
    public function saveMultipleData($data)
	{
		return $this->db->insert_batch('nilai',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('nilai',['id_nilai' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_nilai',$id);
		return $this->db->update('nilai');
	}

	public function deleteData($id)
	{
		return $this->db->delete('nilai',['id_nilai' => $id]);
	}
}
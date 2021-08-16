<?php 
/**
 * This model for managing data kelas 
 */
class KRSModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('krs')->result();
	}

	// SAVE MULTIPLE DATA
	public function saveDataMultiple($data)
	{
		return $this->db->insert_batch('krs',$data);
	}

	// SAVE SINGLE DATA
	public function saveData($data)
	{
		return $this->db->insert('krs',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('krs',['id_krs' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_krs',$id);
		return $this->db->update('krs');
	}

	public function deleteData($id)
	{
		return $this->db->delete('krs',['id_krs' => $id]);
	}

}
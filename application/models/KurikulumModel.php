<?php 
/**
 * This model for managing data kelas 
 */
class KurikulumModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('kurikulum')->result();
	}

	// SAVE MULTIPLE DATA
	public function saveDataMultiple($data)
	{
		return $this->db->insert_batch('kurikulum',$data);
	}

	// SAVE SINGLE DATA
	public function saveData($data)
	{
		return $this->db->insert('kurikulum',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('kurikulum',['id_kurikulum' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_kurikulum',$id);
		return $this->db->update('kurikulum');
	}

	public function deleteData($id)
	{
		return $this->db->delete('kurikulum',['id_kurikulum' => $id]);
	}

}
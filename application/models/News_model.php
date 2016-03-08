<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

    // ------------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------------    

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    // ------------------------------------------------------------------------------    

    public function count_news()
    {
        return $this->db->count_all('news');
    }

    // ------------------------------------------------------------------------------    

    public function get_all_news($limit, $offset)
    {
        $data = array();
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('news');

        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data[] = $row;
            }
        }
        $query->free_result();
        return $data;
    }

    // ------------------------------------------------------------------------------    

    public function set_news()
    {
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title'      => $this->input->post('title'),
            'slug'       => $slug,
            'excerpt'    => $this->input->post('excerpt'),
            'text'       => $this->input->post('text'),
        );
        return $this->db->insert('news', $data);
    }

    // ------------------------------------------------------------------------------    

    public function update_news()
    {
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title'      => $this->input->post('title'),
            'slug'       => $slug,
            'excerpt'    => $this->input->post('excerpt'),
            'text'       => $this->input->post('text'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('news', $data);
    }

    // ------------------------------------------------------------------------------    

    public function delete_news($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('news');
    }

    // ------------------------------------------------------------------------------    
}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */
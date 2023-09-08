<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HomeDb extends CI_Model

{

  public function  getData($table='',$cond=NULL,$limit='0',$start='',$order=array('','asc'))

  {

    $this->db->select('*')->from($table)->order_by($order[0],$order[1]);

    if(!empty($limit))

      $this->db->limit($limit,$start);

    if(!empty($cond))

      $this->db->where($cond);

    $res=$this->db->get();



    if($res->num_rows()>0)

    {

      return $res->result();

    }

    return false;

  }

  public function  getDetailedData($select='*',$table='',$cond=NULL,$limit='0',$start='',$order=array('','asc'),$join=array(),$num_rows=NULL)

  {

    $this->db->select($select)->from($table);

    if(!empty($order[0]))

      $this->db->order_by($order[0],$order[1]);

    if(!empty($start) || !empty($limit))

    {

      $this->db->limit($limit,$start);

    }

    if(!empty($join))

    {

      foreach($join as $j)

      {

        $this->db->join($j[0],$j[1],$j[2]);

      }

    }

    if(!empty($cond))

      $this->db->where($cond);

    if(!empty($where_in))

      $this->db->where_in($where_in);

    $res=$this->db->get();



    if($res->num_rows()>0)

    {

      if($num_rows)

        return $res->num_rows();

      else

        return $res->result();

    }

    return false;

  }

  public function batch_insert($data,$table)



  {



    $this->db->trans_start();



    $count=$this->db->insert_batch($table,$data);



    $db_error = $this->db->error();



    $this->db->trans_complete();



    if ($this->db->trans_status() === FALSE)



    {        



     if (!empty($db_error['message']))



     {



       return $db_error['message'];



     }



   }



   else



     return $count;



 }

  public function insert($data, $table)

  {

    $this->db->insert($table,$data);
    // $db_error = $this->db->error();
    // tsi($db_error);
    
    return $this->db->insert_id();

  }

  public function update($data, $table, $cond)

  {

    $this->db->where($cond);

    return $this->db->update($table,$data);

  }

  public function delete($item,$cond)

  {

    $this->db->where($cond);

    return $this->db->delete($item);

  }

  public function grab($dbdata)

  {

      if (!empty($dbdata['distinct'])) {

          $this->db->distinct();

      }

      if (empty($dbdata['select'])) {

          $dbdata['select'] = '*';

      }

      if (empty($dbdata['limit'])) {

          $dbdata['limit'] = NULL;

      }

      if (empty($dbdata['offset'])) {

          $dbdata['offset'] = NULL;

      }

      if (!empty($dbdata['select'])) {

          $this->db->select($dbdata['select']);

      }

      if (!empty($dbdata['where'])) {

          $this->db->where($dbdata['where']);

      }

      if (!empty($dbdata['or_where'])) {

          $this->db->group_start();

          $this->db->or_where($dbdata['or_where']);

          $this->db->group_end();

      }

      if (!empty($dbdata['where_in'])) {

          foreach ($dbdata['where_in'] as $key => $value) {

              $this->db->where_in($key, $value);

          }

      }

      if (!empty($dbdata['or_where_in'])) {

          $this->db->or_where_in($dbdata['or_where_in'][0], $dbdata['or_where_in'][1]);

      }

      if (!empty($dbdata['group_by'])) {

          $this->db->group_by($dbdata['group_by']);

      }

      if (!empty($dbdata['where_not_in'])) {

          $this->db->group_start();

          $this->db->where_not_in($dbdata['where_not_in'][0], $dbdata['where_not_in'][1]);

          $this->db->group_end();

      }

      if (!empty($dbdata['order_by'])) {

          $this->db->order_by($dbdata['order_by'][0], $dbdata['order_by'][1]);

      }

      if (!empty($dbdata['like'])) {

          $this->db->group_start();

          $this->db->like($dbdata['like']);

          $this->db->group_end();

      }

      if (!empty($dbdata['or_like'])) {

          $this->db->group_start();

          $this->db->or_like($dbdata['or_like']);

          $this->db->group_end();

      }

      if (!empty($dbdata['join_table'])) {

          $c = count($dbdata['join_table']);

          $jn = $dbdata['join_table'];

          for ($i = 0; $i < $c; $i++) {

              if (!empty($jn[$i + 2]))

                  $this->db->join($jn[$i], $jn[$i + 1], $jn[$i + 2]);

              else

                  $this->db->join($jn[$i], $jn[$i + 1]);

              $i = $i + 2;

          }

      }

      $result = $this->db->get($dbdata['table'], $dbdata['limit'], $dbdata['offset']);
      if ( !empty($result))
      {
      if ($result->num_rows() > 0  ) {

          if (!empty($dbdata['count'])) {

              return $result->num_rows();

          }

          if (!empty($dbdata['object'])) {

              return $result->result();

          } else {

              return $result->result_array();

          }

      } else {

          return FALSE;

      }
    }
    else
    {

    return FALSE;

    }

  }
public function getCount($select='*',$table='',$cond='')
  {
    $this->db->select();
    $this->db->from($table);
    $this->db->where($cond);
    $query = $this->db->get();
    return $query->num_rows();
  }
    function getProducts($limit='0',$start='',$getData=null)
  {
    $this->db->limit($limit,$start);
    $this->db->select("c.c_title,p.pr_id,p.pr_slug,p.pr_cat_id,p.pr_mrp,p.pr_title,p.pr_model,p.pr_product_color,p.pr_selling_price,pv.pv_eye_size,pv.pv_bridge,pv.pv_temple");
    $this->db->from("pr_product p");
    $this->db->join("pv_variation pv","pv.pv_product_id=p.pr_id","left");
    $this->db->join("c_category c","c.c_id=p.pr_cat_id","left");
    $this->db->where("p.pr_status","1");
     if(!empty($getData['category']))
    {
      $cat = str_replace('_', ' ', $getData['category']);
      //$this->db->where_like("c.c_title",$getData['category']);
      $this->db->like('c.c_title', $cat, 'both'); 
    }
    if(!empty($getData['sort']))
    {
        if($getData['sort']=="price_asc")
            $this->db->order_by("p.pr_selling_price","asc");
        elseif($getData['sort']=="price_desc")
            $this->db->order_by("p.pr_selling_price","desc");
        elseif($getData['sort']=="recency_desc")
            $this->db->order_by("p.pr_id","desc");
        else
             $this->db->order_by("p.pr_id","desc");
    }
    else
    $this->db->order_by("p.pr_id","desc");
    $qry = $this->db->get();
    return $qry->result();

  }
  function getSingleProducts($id)
  {
  
    $this->db->select("s.s_title,b.*,c.c_title,p.*");
    $this->db->from("pr_product p");
   
    $this->db->join("c_category c","c.c_id=p.pr_cat_id","left");
    $this->db->join("b_brand b","b.b_id=p.pr_brand","left");
    $this->db->join("s_style s","s.s_id=p.pr_style","left");
    
    
    $this->db->where("p.pr_id",$id);
    $qry = $this->db->get();
    return $qry->result();

  }
}
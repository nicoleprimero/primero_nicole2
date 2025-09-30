<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'magicusers';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($username, $email, $password, $role) {
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role
        );
        return $this->db->table('magicusers')->insert($data);
    }   

    public function get_one($id){
       return $this->db->table('magicusers')->where('id', $id)->get();
    }

    

   public function delete($id) {
       return $this->db->table('magicusers')->where('id', $id)->delete();
   }

   public function page($q, $records_per_page = null, $page = null) {
            if (is_null($page)) {
                return $this->db->table('magicusers')->get_all();
            } else {
                $query = $this->db->table('magicusers');
                
                // Build LIKE conditions
                $query->like('id', '%'.$q.'%')
                    ->or_like('username', '%'.$q.'%')
                    ->or_like('email', '%'.$q.'%')
                    ->or_like('role', '%'.$q.'%');
                    

                // Clone before pagination
                $countQuery = clone $query;

                $data['total_rows'] = $countQuery->select_count('*', 'count')
                                                ->get()['count'];

                $data['records'] = $query->pagination($records_per_page, $page)
                                        ->get_all();

                return $data;
            }
        }


        /*
    public function count_all_records()
    {
        $sql = "SELECT COUNT({$this->primary_key}) as total FROM {$this->table} WHERE 1=1";
        $result = $this->db->raw($sql);
        return $result ? $result->fetch(PDO::FETCH_ASSOC)['total'] : 0;
    }

    public function get_records_with_pagination($limit_clause)
    {
        $sql = "SELECT * FROM {$this->table} WHERE 1=1 ORDER BY {$this->primary_key} DESC {$limit_clause}";
        $result = $this->db->raw($sql);
        return $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
    }

    public function count_filtered_records($q)
{
    $like = "%{$q}%";
    $sql = "SELECT COUNT({$this->primary_key}) as total
            FROM {$this->table}
            WHERE username LIKE ? OR email LIKE ? OR role LIKE ?";
    $result = $this->db->raw($sql, [$like, $like, $like]);
    $row = $result ? $result->fetch(PDO::FETCH_ASSOC) : null;
    return $row ? (int)$row['total'] : 0;
}

public function get_filtered_records($q, $limit, $offset)
{
    $like = "%{$q}%";
    $sql = "SELECT * FROM {$this->table}
            WHERE username LIKE ? OR email LIKE ? OR role LIKE ?
            ORDER BY {$this->primary_key} DESC
            LIMIT {$offset}, {$limit}";
    $result = $this->db->raw($sql, [$like, $like, $like]);
    return $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
}

*/
}
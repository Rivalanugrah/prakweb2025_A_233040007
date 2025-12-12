<?php


class Player_model
{
    private $table = 'players';
    private $db;

    public function __construct()
    {
        
        $this->db = new Database;
    }

    /**
     * Ambil semua pemain
     * @return array
     */
    public function getAllPlayers()
    {
        $this->db->query("SELECT * FROM {$this->table} ORDER BY id ASC");
        return $this->db->resultSet();
    }

    /**
     * 
     * @param int 
     * @return array|false
     */
    public function getPlayerById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    /**
     * 
     *
     * @param array 
     * @return int  
     */
    public function tambahDataPlayer($data)
{
    $name = $data['name'] ?? $data['nama'] ?? null;
    $position = $data['position'] ?? $data['posisi'] ?? null;
    $number = $data['number'] ?? $data['nomor_punggung'] ?? null;
    $age = $data['age'] ?? $data['umur'] ?? null;
    $nationality = $data['nationality'] ?? $data['negara'] ?? null;

    if (empty($name) || empty($position) || $number === null || $number === '' || empty($nationality) || empty($age)) {
        return 0;
    }

    $this->db->query("INSERT INTO {$this->table} (name, position, number, nationality, age)
                      VALUES (:name, :position, :number, :nationality, :age)");
    
    $this->db->bind('name', $name);
    $this->db->bind('position', $position);
    $this->db->bind('number', $number);
    $this->db->bind('nationality', $nationality);
    $this->db->bind('age', $age);
    
    $this->db->execute();

    return $this->db->rowCount();
}


    /**
     * 
     * @param array 
     * @return int
     */
    public function ubahDataPlayer($data)
    {
        
        $id = $data['id'] ?? null;
        $name = $data['name'] ?? $data['nama'] ?? null;
        $position = $data['position'] ?? $data['posisi'] ?? null;
        $number = $data['number'] ?? $data['nomor_punggung'] ?? null;
        $nationality = $data['nationality'] ?? $data['negara'] ?? null;

        if (empty($id) || empty($name) || empty($position) || $number === null || $number === '' || empty($nationality)) {
            return 0;
        }

        $this->db->query("UPDATE {$this->table} SET 
                            name = :name, 
                            position = :position, 
                            number = :number, 
                            nationality = :nationality
                          WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->bind('name', $name);
        $this->db->bind('position', $position);
        $this->db->bind('number', $number);
        $this->db->bind('nationality', $nationality);
        $this->db->execute();

        return $this->db->rowCount();
    }

    /**
     * 
     * @param int $id
     * @return int
     */
    public function hapusDataPlayer($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
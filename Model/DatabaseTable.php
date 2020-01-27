<?php
class DatabaseTable {

	public function __construct($pdo,$table,$primaryKey = 'id',$className = '\stdClass',$constructorArgs = []) 
	{
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
		$this->className = $className;
		$this->constructorArgs = $constructorArgs;
	}

	public function query($sql, $parameters = []) 
	{
		/*echo "$sql<br>";
		var_dump($parameters);
		echo "<br>";*/
		$query = $this->pdo->prepare($sql);
		$query->execute($parameters);
		return $query;
	}	

	public function total($field = null, $value = null) 
	{
		$sql = "SELECT COUNT(*) FROM `$this->table`";
		$parameters = [];

		if (!empty($field)) {
			$sql .= " WHERE `$field` = :value";
			$parameters = ['value' => $value];
		}
		
		$query = $this->query($sql, $parameters);
		$row = $query->fetch();
		return $row[0];
	}

	public function table($sql, $parameters) 
	{
		$query = $this->query($sql, $parameters);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function findById($value) 
	{
		$query = "SELECT * FROM `$this->table` WHERE `$this->primaryKey` = :value";
		$parameters = ['value' => $value];
		$query = $this->query($query, $parameters);
		return $query->fetchObject();
	}

	public function find($column, $value, $orderBy = null, $limit = null, $offset = null) 
	{
		$query = "SELECT * FROM $this->table WHERE  $column = :value";
		$parameters = ['value' => $value];
		if ($orderBy != null) $query .= " ORDER BY $orderBy";
		if ($limit != null) $query .= " LIMIT $limit";
		if ($offset != null) $query .= " OFFSET $offset";
		$query = $this->query($query, $parameters);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function search($fields, $op, $orderBy = null, $limit = null, $offset = null) 
	{
		$query = "SELECT * FROM $this->table WHERE";
		foreach ($fields as $key => $value) $query .= "`$key` LIKE :$key $op";
		$query = rtrim($query, $op);
		$fields = $this->processDates($fields);
		if ($orderBy != null) $query .= " ORDER BY $orderBy";
		if ($limit != null) $query .= " LIMIT $limit";
		if ($offset != null) $query .= " OFFSET $offset";
		foreach ($fields as $key => $value) {
			$fields[$key] = "%$value%";
		}
		$result = $this->query($query, $fields);
		return $result->fetchAll(\PDO::FETCH_OBJ);

	}


	private function insert($fields) 
	{
		$query = "INSERT INTO `$this->table` (";
		foreach ($fields as $key => $value) $query .= "`$key`,";
		$query = rtrim($query, ',');
		$query .= ") VALUES (";
		foreach ($fields as $key => $value) $query .= ":$key,";
		$query = rtrim($query, ',');
		$query .= ")";
		$fields = $this->processDates($fields);
		$this->query($query, $fields);
		return $this->pdo->lastInsertId();
	}


	public function update($fields) 
	{
		$query = " UPDATE `$this->table` SET ";
		foreach ($fields as $key => $value) $query .= "`$key` = :$key,";
		$query = rtrim($query, ',');
		$query .= " WHERE `$this->primaryKey` = :primaryKey";
		$fields['primaryKey'] = $fields[$this->primaryKey];
		$fields = $this->processDates($fields);
		$this->query($query, $fields);
	}


	public function delete($id) 
	{
		$parameters = [':id' => $id];
		$this->query("DELETE FROM `$this->table` WHERE `$this->primaryKey` = :id", $parameters);
	}

	public function deleteWhere($column, $value) 
	{
		$query = "DELETE FROM $this->table WHERE $column = :value";
		$parameters = ['value' => $value];
		$query = $this->query($query, $parameters);
	}

	public function findAll($orderBy = null, $limit = null) 
	{
		$query = "SELECT * FROM $this->table";
		if ($orderBy != null) $query .= " ORDER BY $orderBy";
		if ($limit != null) $query .= " LIMIT $limit";
		$result = $this->query($query);
		return $result->fetchAll(\PDO::FETCH_OBJ);
	}

	private function processDates($fields) 
	{
		foreach ($fields as $key => $value) 
		if ($value instanceof \DateTime) $fields[$key] = $value->format('Y-m-d');
		return $fields;
	}


	public function save($record) 
	{
		$entity = new $this->className(...$this->constructorArgs);
		try {
			$insertId = $this->insert($record);
			$entity->{$this->primaryKey} = $insertId;
		}
		catch (\PDOException $e) {
			$this->update($record);
		}

		foreach ($record as $key => $value) 
		if (!empty($value)) $entity->$key = $value;
		return $entity;	
	}
}
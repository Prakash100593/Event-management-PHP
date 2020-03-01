

<?php
session_start();

class DB {
    private $dbh;   // db handle
    function __construct(){
        try{
            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}", 

            $_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Bad database connection");
        }
    }

    public function Create1($name, $password, $role)
    {
        $query = $this->dbh->prepare("INSERT INTO attendee(name, password,role) VALUES (:name,:password,:role)");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("password", $password, PDO::PARAM_STR);
        $query->bindParam("role", $role, PDO::PARAM_STR);
        $query->execute();
        return $this->dbh->lastInsertId();
    }
    public function create($name,$password,$role)
	{
		try
		{
			$stmt = $this->dbh->prepare(
				"INSERT INTO attendee(name,password,role) 
						VALUES(:name, :password, :role)");
			$stmt->bindparam(":name",$name);
            $stmt->bindparam(":password",$password);
			$stmt->bindparam(":role",$role);            
			return $stmt->execute();
		}
		catch(PDOException $e) 
		{					   
			echo $e->getMessage();	
			return false;
		}	
	}
	
	public function getID($idattendee) 
	{
		$stmt = $this->dbh->prepare("SELECT * FROM attendee WHERE idattendee=:idattendee");
		$stmt->execute(array(":idattendee"=>$idattendee));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC); 
		return $editRow;
	}
	public function update($idattendee,$name,$password,$role)
	{
		try
		{
            echo "$idattendee,$name,$password,$role";
			$stmt=$this->dbh->prepare(" UPDATE attendee 
                                        SET name=:name, 
		                                password=:password,
                                        role=:role 
										WHERE idattendee=:idattendee ");
			// affectation des valeurs :
			$stmt->bindparam(":name",$name);
            $stmt->bindparam(":password",$password);
			$stmt->bindparam(":role",$role);            
			$stmt->bindparam(":idattendee",$idattendee);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($idattendee)
	{
		$stmt = $this->dbh->prepare("DELETE FROM attendee WHERE idattendee=:idattendee"); 
		$stmt->bindparam(":idattendee",$idattendee);
		$stmt->execute(); 
		return true;
	}   



    function validate_user(){
        $message = '';
        if(isset($_POST["login"]))  
        {  
  
             if(empty($_POST["name"]) || empty($_POST["password"]))  
             {  
                  $message = '<label>All fields are required</label>';  
             }  
             else  
             {  
                  $query = "SELECT * FROM attendee WHERE name = :name AND password = :password";  
                  $statement = $this->dbh->prepare($query);  
                  $statement->execute(  
                       array(  
                            'name'     =>     $_POST["name"],  
                            'password'     =>     $_POST["password"]  
                       )  
                  );  
                  $count = $statement->rowCount();  
                  if($count > 0)  
                  {  
                       $_SESSION["loggedin"] = true;
                       $_SESSION["role"] = $_POST["role"];
                       $_SESSION["idattendee"] = $idattendee;
                       $_SESSION["name"] = $_POST["name"];  
                       $message = 'Login Success'; 
                        echo "<h1>the value is {$_SESSION['loggedin']}</h1>";
                        
                  }  
                  else  
                  {  
                       $message = '<label>Wrong Data</label>';  
                  }  
             }  
        }
        // var_dump($_SESSION["loggedin"]);
        // echo "the value is {$_SESSION['loggedin']}";
        return $message;    
    
    }

    public function dataview($query) 
	{
		$stmt = $this->dbh->prepare($query); 
		$stmt->execute(); 	
		if($stmt->rowCount() > 0) 
		{	
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
			{									       
				?>
                <tr>
                	<td><?php print($row['idattendee']); ?></td> 
                	<td><?php print($row['name']); ?></td>
                	<td><?php print($row['password']); ?></td>
                	<td><?php print($row['role']); ?></td>
                	<td align="center">
                	<a href="edit-data.php?edit_id=<?php print($row['idattendee']); ?>">
					<i class="glyphicon glyphicon-edit"></i> 
					</a>
                	</td>
                	<td align="center">
                	<a href="delete.php?delete_id=<?php print($row['idattendee']); ?>">
					<i class="glyphicon glyphicon-remove-circle"></i>
					</a>
                	</td>
                </tr>
                <?php
			}
		}
		else 
		{
			?>
            <tr>
            <td></td>
            </tr>
            <?php
		}
	}	

        function getAllusers() {
            try{
                $data = array();
                $stmt = $this->dbh->prepare("select * from attendee");
                $stmt->execute();
    
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
                while($row=$stmt->fetch()){
                    $data[] = $row;
                }
                return $data;
    
            } catch (PDOException $e) {
                echo $e->getMessage();
                return [];
            }
        }

        function getAllvenues() {
            try{
                $data = array();
                $stmt = $this->dbh->prepare("select * from venue");
                $stmt->execute();
    
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
                while($row=$stmt->fetch()){
                    $data[] = $row;
                }
                return $data;
    
            } catch (PDOException $e) {
                echo $e->getMessage();
                return [];
            }
        }
    
        function getAllusersAsTable($data){
            if (count($data) > 0) {
                $bigString = "<table border='1'>\n
                                <tr>
                                <th>idattendee</th><th>name</th><th>password</th><th>role</th><th>Actions</th>
                                </tr>\n";
    
                foreach($data as $row) {
                    $keys = array_keys($row);
                    $bigString .= "<tr>";
                    foreach ($row as $k => $v){
                            $bigString .= "<td>{$v}</td>";
                    }
                    $bigString .= "<td><a href=\"edit_data.php?idattendee=$row[idattendee]\">Edit</a> | <a href=\"delete.php?idattendee=$row[idattendee]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    $bigString .= "</tr>\n";
                }
                $bigString .= "</table>\n";
            } else {
                $bigString = "<h2>No People record Exist.</h2>";
            }
    
            return $bigString;
        }
    }
?>
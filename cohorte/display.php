 <?php  
 //methode qui permet d afficher les matieres du professeur connecter
 require_once'config.php';
 session_start();
 extract($_POST);
 if (isset($_SESSION['login'])) { 
  $username= $_SESSION['login'];
 $conn = mysqli_connect("localhost", "root", "", "cohorte");  
 $output = array();  
 $query = "SELECT M.Intitule AS MIN, C.nb_absences AS CN FROM COURS C JOIN MATIERE M
  ON C.matiere_id = M.id JOIN USERS U ON M.professeur_id = U.id
  WHERE U.user_email = '".$username."'";   
 $result = mysqli_query($conn, $query);  
 if(mysqli_num_rows($result) > 0) {  
      while($row = mysqli_fetch_array($result)) {  
           $output[] = $row;  
      }  
      echo json_encode($output); 
	 
 }
 
 }  
 ?>  

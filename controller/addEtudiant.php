
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        
        include_once '../racine.php';
        include_once RACINE . '/service/EtudiantService.php';

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $ville = $_POST['ville'];
        $sexe = $_POST['sexe'];
        $photo = $target_file;  

        $es = new EtudiantService();
        $es->create(new Etudiant(null, $nom, $prenom, $ville, $sexe, $photo));

        header('Content-type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Student added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error uploading photo']);
    }
}

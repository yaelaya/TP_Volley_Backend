<?php
include_once '../racine.php';
include_once RACINE . '/service/EtudiantService.php';
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$ville = $_POST['ville'];
$sexe = $_POST['sexe'];
$photo = $_POST['photo'];
$es = new EtudiantService();
$es->update(new Etudiant($id, $nom, $prenom, $ville, $sexe,$photo));
header("location:../index.php");
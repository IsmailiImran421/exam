<?php
    require_once "fpdf/fpdf.php";
    require_once "Connexion.php";
    $stmt = $conn->query("SELECT e.nom, e.prenom, e.email, SUM(a.nombreHeure) as totalAbs
    FROM etudiants as e
    INNER JOIN filieres as f
        ON f.idFiliere = e.idFiliere AND f.designation = 'MIP1'
    INNER JOIN absences as a
    ON e.idEtudiant = a.idEtudiant
    GROUP BY e.idEtudiant");


    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    $pdf->Cell(0,10,"Liste des absences", 0,1,'C');
    $pdf->Cell(0,10,"Filiere : MIP1",0,1,'C');
    $pdf->Cell(0,10,"Mois : 03/2019", 0,1,'C');

    $pdf->SetFont('Arial', '',12);
    $pdf->Cell(40,10,'Nom', 1,0);
    $pdf->Cell(50,10, 'Prenom', 1, 0);
    $pdf->Cell(70, 10, 'Email', 1,0);
    $pdf->Cell(30, 10, 'Total absence', 1,1);

    while($tab = $stmt->fetch_assoc()){
        $pdf->Cell(40,10,$tab['nom'], 1,0);
        $pdf->Cell(50,10, $tab['prenom'], 1, 0);
        $pdf->Cell(70, 10, $tab['email'], 1,0);
        $pdf->Cell(30, 10, $tab['totalAbs'], 1,1);
    }

    $pdf->Output('I', "ListeAbs.pdf");
    

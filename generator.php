<?php
       
$numbOfPuzzles = $_POST['numbOfPuzzles'];
$puzzleType = $_POST['puzzleType'];
$extension = $_POST['extension'];
$solutions = $_POST['solutions'];
$pageSize = $_POST['pageSize'];
$customTxtSize = 14;
$puzzleSrc = $_POST['puzzleSrc'];
$symmetry = $_POST['symmetry'];
$url = '';
$solUrl = '';

if($symmetry == "no" && $puzzleType == "sudoku"){
    switch($puzzleSrc){
        case 'easy':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/easy';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/easy/solutions';
            break;
        case 'medium':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/medium';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/medium/solutions';
            break;
        case 'hard':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/hard';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/hard/solutions';
            break;
         
        case 'super':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/super';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/super/solutions';
            break;
        }
} elseif($symmetry == "yes" && $puzzleType == "sudoku") {
    switch($puzzleSrc){
        case 'easy':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/symmetry_easy';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/symmetry_easy/solutions';
            break;
        case 'medium':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/symmetry_medium';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/symmetry_medium/solutions';
            break;
        case 'hard':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/symmetry_hard';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/symmetry_hard/solutions';
            break;
            
        case 'super':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/symmetry_super';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/symmetry_super/solutions';
            break;
        }
} elseif($symmetry == "no" && $puzzleType == "sudokuKiller") {
    switch($puzzleSrc){
        case 'easy':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_easy';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_easy/solutions';
            break;
        case 'medium':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_medium';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_medium/solutions';
            break;
        case 'hard':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_hard';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_hard/solutions';
            break;
            
        case 'super':
            $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_super';
            $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_super/solutions';
            break;
        }
    } elseif($symmetry == "yes" && $puzzleType == "sudokuKiller") {
        switch($puzzleSrc){
            case 'easy':
                $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_symmetry_easy';
                $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_symmetry_easy/solutions';
                break;
            case 'medium':
                $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_symmetry_medium';
                $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_symmetry_medium/solutions';
                break;
            case 'hard':
                $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_symmetry_hard';
                $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_symmetry_hard/solutions';
                break;
                
            case 'super':
                $url = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_symmetry_super';
                $solUrl = 'https://www.shirtvintage.com/jjm/PDF_puzzle_generator/img/sudoku/killer_symmetry_super/solutions';
                break;
            }
        }

//GENERATIN RANDOM ARRAY
    $totOfNb = 1000;

    $m = 0;
    $array = [];
    for($m = 0; $m < $totOfNb; $m++){
        $array[$m] = $m +1;
    };

    //Randomizing the array
    $max = sizeof($array);

    for($n = $max -1; $n >= 0; $n--){
        $rndNb = rand(0,100) / 100;
        $h = floor(number_format($rndNb * $n,0));
        $temp = $array[$n];
        $array[$n] = $array[$h];
        $array[$h] = $temp;
    }


    $k = 0;
    $nbOfValues = $numbOfPuzzles;
    //Putting values into the final array
    $finalArray = [];
    for($k = 0; $k < $nbOfValues; $k++){
        $finalArray[$k] = $array[$k];
    }

//Load FPDF
require('fpdf.php');

//Class EXTENDS

class PDF extends FPDF{
        // Page footer
        function Footer()
        {
            $footer_Y_N = $_POST['footer_Y_N'];
            if($footer_Y_N == 'yes'){
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',10);
                // Page number
                $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }
    }
    

    //Select Page Size
        if($pageSize == 'a4'){
            $pageWidth = 210;
            $pageHeight = 297;
        } elseif ($pageSize == 'a5'){
            $pageWidth = 148;
            $pageHeight = 210;
        } else{
            $pageWidth = 152.4;
            $pageHeight = 228.6;
        }




// Instanciation of inherited class
$pdf = new PDF('P','mm',array($pageWidth,$pageHeight));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);


//BLOQUE GENERADOR A4    

//PAGE SIZE SWITCH
switch($pageSize){
    case 'a4':
        $imgWidth = 100;
        $img_X = 55;
        $img1_Y = 25;
        $img2_Y = 160;
        $txt_Ln1 = 115;
        $txt_Ln2 = 135;
        $pdf->SetFont('Arial','B',$customTxtSize);
        break;
    case 'a5':
        $imgWidth = 70;
        $img_X = 40;
        $img1_Y = 20;
        $img2_Y = 105;
        $txt_Ln1 = 80;
        $txt_Ln2 = 84;
        break;
    case '6x9':
        $imgWidth = 80;
        $img_X = 35;
        $img1_Y = 20;
        $img2_Y = 115;
        $txt_Ln1 = 90;
        $txt_Ln2 = 95;
        break;
}     


    
    //BLOQUE GENERADOR PUZZLES

    for($i=0; $i < $numbOfPuzzles; $i = $i+2){ 
        $q = $finalArray[$i];
        $qq = $finalArray[$i+1];

        $puzzleNb1 = $i +1;
        $puzzleNb2 = $i +2;

        $pdf->Image($url."/$q.$extension",$img_X,$img1_Y,$imgWidth,$extension);
        $pdf->Ln($txt_Ln1);
        $pdf->Cell(0,10,$puzzleType.' '.$puzzleNb1,0,0,'C');

        $pdf->Image($url."/$qq.$extension",$img_X,$img2_Y,$imgWidth,$extension);
        $pdf->Ln($txt_Ln2);
        $pdf->Cell(0,10,$puzzleType.' '.$puzzleNb2,0,0,'C');

        if($i < $numbOfPuzzles - 2){ 
            $pdf->AddPage();
        }
    }

    //BLOQUE GENERADOR SOLUCIONES A4
    if($solutions == 'yes'){
         $pdf->AddPage();
         $pdf->Cell(0,10,'SOLUTIONS',0,0,'C');

        for($isol=0; $isol < $numbOfPuzzles; $isol = $isol+2){
            $qsol = $finalArray[$isol];
            $qqsol = $finalArray[$isol+1];

            $puzzleNb1sol = $isol +1;
            $puzzleNb2sol = $isol +2;

            $pdf->Image($solUrl."/$qsol.$extension",$img_X,$img1_Y,$imgWidth,$extension);
            $pdf->Ln($txt_Ln1);
            $pdf->Cell(0,10,$puzzleType.' '.$puzzleNb1sol,0,0,'C');
             
            $pdf->Image($solUrl."/$qqsol.$extension",$img_X,$img2_Y,$imgWidth,$extension);
            $pdf->Ln($txt_Ln2);
            $pdf->Cell(0,10,$puzzleType.' '.$puzzleNb2sol,0,0,'C');

            if($isol < $numbOfPuzzles - 2){ 
                $pdf->AddPage();
            }
        }
    }
    


$pdf->Output();
?>

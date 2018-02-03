<?php
namespace Model;
use Libs\FPDF as FPDF;

class FPDFModel extends FPDF
{

    private $info= array();
    private  $periodo =1;

    public function Header()
    {
    // Select Arial bold 15
        if($this->info['logo_byte'] != NULL)
        {
            $pic = 'data:image/png;base64,'.base64_encode($this->info["logo_byte"]);
            //$info = getimagesize($pic);

            // Logo
            $this->Image($pic, 30, 12, 15, 15, 'png');
        }

        $this->SetFont('Arial','B',11);
    // Move to the right
        $this->SetX(25);
    // Framed title
        $this->Cell(161,8,utf8_decode($this->info['nombre_inst']),'LTR',1,'C');

        $this->SetFont('Arial','B',10);
        $this->SetX(25);
        $this->Cell(161,5,strtoupper(utf8_decode("SEDE: ".$this->info['sede'])),'LR',1,'C');
        

        $this->SetFont('Arial','',8);        
        $this->SetX(25);
        $this->Cell(161,7,strtoupper(utf8_decode("listado por puesto en el grupo")),'LBR',1,'C');       

        //Grupo
        $this->SetX(25);
        $this->Cell(40,5,strtoupper(utf8_decode("GRUPO: ".$this->info['nombre_grupo'])),'LB',0,'L');
        $this->SetX(65);
        $this->Cell(121,5,strtoupper(utf8_decode("")),'BR',1,'C');

        //Director Grupo
        $this->SetX(25);
        $this->Cell(80,5,strtoupper(utf8_decode("director grupo: ".$this->info['primer_apellido']." ".$this->info['primer_nombre'])),'LBR',0,'L');
        $this->SetX(105);
        $this->Cell(40,5,strtoupper(utf8_decode("Periodo:  ".$this->periodo)),'LBR',0,'C');
         $this->SetX(145);
        $this->Cell(41,5,strtoupper(utf8_decode("Fecha: ".date("Y-m-d"))),'LBR',0,'C');   
       


    // Line break
        $this->Ln(8);
    }


    public function Footer()
    {
    // Go to 1.5 cm from bottom
        $this->SetY(-15);
    // Select Arial italic 8
        $this->SetFont('Arial','I',8);
    // Print centered page number
        $this->Cell(0,10,utf8_decode('Ágora - Página '.$this->PageNo()),0,0,'C');
    }


    function TableHeader($info,$periodo)
    {
        $this->info = $info[0];
        $this->periodo = $periodo;

    }
// Tabla coloreada
    public function FancyTable($header, $data, $puestos)
    {
    // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
    // Cabecera
        $this->SetX(25);
        $w = array(10, 50, 19, 7, 7, 7,  7, 15,  19, 20);
        for($i=0;$i<count($header);$i++)

            $this->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C',true);

        $this->Ln();
    // Restauración de colores y fuentes
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('','',8);
    // Datos
        $fill = false;
        $cont=1;
        foreach($data as $row)
    {   //var_dump($row);

        foreach ($puestos as $value) {
            if($row['id_estudiante']== $value['id']){
             $this->SetX(25);
             $this->Cell($w[0],7,$cont,'LR',0,'C',$fill);
             $this->Cell($w[1],7,utf8_decode($row['primer_apellido'])." ".utf8_decode($row['primer_nombre']),'LR',0,'L',$fill);
             $this->Cell($w[2],7,utf8_decode($value['puesto']),'LR',0,'C',$fill);        
             $this->Cell($w[3],7,($row['S']=="0"?"":$row['S']),'LR',0,'C',$fill);
             $this->Cell($w[4],7,($row['A']=="0"?"":$row['A']),'LR',0,'C',$fill);
             $this->Cell($w[5],7,($row['B']=="0"?"":$row['B']),'LR',0,'C',$fill);
             $this->Cell($w[6],7,($row['V']=="0"?"":$row['V']),'LR',0,'C',$fill);
             $this->Cell($w[7],7,($row['TAV']=="0"?"":$row['TAV']),'LR',0,'C',$fill);
             $this->Cell($w[8],7,($row['Promedio']=="0"?"":$row['Promedio']),'LR',0,'C',$fill);
             $this->Cell($w[9],7,utf8_decode($row['Desempeno']),'LR',0,'C',$fill);
         }
     }



     $this->Ln();
     $fill = !$fill;
     $cont++;
 }
    // Línea de cierre
 $this->SetX(25);
 $this->Cell(array_sum($w),0,'','T');
}


}
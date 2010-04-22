<?php

/**
 * MyPDF class.
 *
 * @package    Huemul
 * @author     Laura Melo

 */
class MyPDF extends sfTCPDF {
    //Page header
    public function Header() {
        // Logo
        $this->Image(K_PATH_IMAGES.PDF_HEADER_LOGO, 93, 10, PDF_HEADER_LOGO_WIDTH);
        // Set font
        $this->SetFont('helvetica', 'B', 14);
        // Move to the right
        $this->Ln(25);
        // Title
        $this->Cell(0,0, PDF_HEADER_TITLE, 0, 0, 'C');
        $this->Ln(8);
        $this->Cell(0,0, PDF_HEADER_STRING, 0, 0, 'C');
        // Line break
        $this->Ln(30);
        }

    // Page footer
    public function Footer() {
        // Position at 1.5 cm from bottom
       /* $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 0, 'C');*/
    }
}
<?php

/**
 * sfTCPDF actions.
 *
 * @package    Huemul
 * @subpackage sfTCPDF
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfTCPDFActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  public function executeConstancia()
  {
    $config = sfTCPDFPluginConfigHandler::loadConfig();

    // create new PDF document
    $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //set some language-dependent strings
    //$pdf->setLanguageArray($l);

    // ---------------------------------------------------------

    // add a page
    $pdf->AddPage();

    // print a line using Cell()
    $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B U', PDF_FONT_SIZE_MAIN+2);
    $pdf->Cell(0, 20, 'CONSTANCIA', 0, 1, 'C');
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
    $pdf->MultiCell(0, 0,'La presente constancia habilita al profesional actuante a iniciar el expediente municipal para el registro del plano de obra, en las condiciones descriptas y según los datos que a continuación se detallan.', 0, 1, 'L');
    $pdf->Ln(1);
    $pdf->Cell(70, 0,'EXPEDIENTE:', 0, 0, 'L');
    $pdf->Cell(0, 0,'EXPEDIENTE', 0, 1, 'L');
    $pdf->Cell(70, 0,'PROPIETARIO:', 0, 0, 'L');
    $pdf->Cell(0, 0,'PROPIETARIO', 0, 1, 'L');
    $pdf->Cell(70, 0,'TIPO TRAMITE:', 0, 0, 'L');
    $pdf->Cell(0, 0,'TIPO TRAMITE', 0, 1, 'L');
    $pdf->Cell(70, 0,'DOMICILIO DEL INMUEBLE:', 0, 0, 'L');
    $pdf->Cell(0, 0,'DOMICILIO DEL INMUEBLE', 0, 1, 'L');
    $pdf->Cell(70, 0,'BARRIO:', 0, 0, 'L');
    $pdf->Cell(0, 0,'BARRIO', 0, 1, 'L');
    $pdf->Cell(70, 0,'NOMECLATURA CATASTRAL:', 0, 0, 'L');
    $pdf->Cell(0, 0,'NOMECLATURA CATASTRAL', 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 0,'OBSERVACIONES PENDIENTES/DOCUMENTACION A ANEXAR CON EL PLANO:', 0, 1, 'L');
    $pdf->MultiCell(0, 0,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed nulla nibh. Etiam porta fermentum pellentesque. Duis pretium erat vitae massa tristique eu luctus felis mattis. In felis erat, cursus sed suscipit nec, mollis a enim. Sed vulputate urna felis. Praesent vitae malesuada dolor. Praesent consequat bibendum purus ut egestas. In dui elit, gravida vitae vehicula nec, semper at lacus. Vivamus sed lorem at nisl consectetur lacinia ut eu magna. Suspendisse luctus mi ac velit congue id tempor felis pretium. Quisque sed mi vel elit ornare semper nec id massa. In hac habitasse platea dictumst. Vivamus iaculis, lacus eu ullamcorper faucibus, mauris nisi pellentesque augue, eu fringilla ipsum elit vel dolor. In eget faucibus sapien. Praesent orci augue, consequat nec vulputate sed, consequat et sapien. Aenean molestie congue fermentum. In eget ligula tortor, id euismod sem.', 0, 1, 'L');
    $pdf->Ln(30);
    $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
    $pdf->Cell(40, 0,'FIRMA DEL PROPIETARIO', 0, 0, 'L');
    $pdf->Cell(0, 0,'FIRMA DEL PROFESIONAL ACTUANTE', 0, 1, 'R');
    $pdf->Ln(60);
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
    $pdf->Cell(0, 0,'DIRECCION DE DESARROLLO URBANO Y CATASTRO', 0, 1, 'C');
    $pdf->Cell(0, 0,'MUNICIPALIDAD DE CIPOLLETTI', 0, 1, 'C');
    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('constancia.pdf', 'I');
  }
  
  
  public function executePermiso()
  {
    $config = sfTCPDFPluginConfigHandler::loadConfig();

    // create new PDF document
    $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //set some language-dependent strings
    //$pdf->setLanguageArray($l);

    // ---------------------------------------------------------

    // add a page
    $pdf->AddPage();

    // print a line using Cell()
    $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B U', PDF_FONT_SIZE_MAIN+2);
    $pdf->Cell(0, 20, 'PERMISO DE CONTRUCCION', 0, 1, 'C');
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
    $pdf->Cell(70, 0,'EXPEDIENTE:', 0, 0, 'L');
    $pdf->Cell(0, 0,'EXPEDIENTE', 0, 1, 'L');
    $pdf->Cell(70, 0,'PROPIETARIO:', 0, 0, 'L');
    $pdf->Cell(0, 0,'PROPIETARIO', 0, 1, 'L');
    $pdf->Cell(70, 0,'DOMICILIO DEL INMUEBLE:', 0, 0, 'L');
    $pdf->Cell(0, 0,'DOMICILIO DEL INMUEBLE', 0, 1, 'L');
    $pdf->Cell(70, 0,'BARRIO:', 0, 0, 'L');
    $pdf->Cell(0, 0,'BARRIO', 0, 1, 'L');
    $pdf->Cell(70, 0,'NOMECLATURA CATASTRAL:', 0, 0, 'L');
    $pdf->Cell(0, 0,'NOMECLATURA CATASTRAL', 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 0,'OBSERVACIONES PENDIENTES/DOCUMENTACION A ANEXAR CON EL PLANO:', 0, 1, 'L');
    $pdf->MultiCell(0, 0,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed nulla nibh. Etiam porta fermentum pellentesque.', 0, 1, 'L');
    $pdf->Ln(10);
    $pdf->Cell(0, 0,'DOMICILIO Y TELEFONO:', 0, 1, 'L');
    $pdf->Cell(0, 0,'MATRICULA:', 0, 1, 'L');
    $pdf->Cell(0, 0,'CALCULO:', 0, 1, 'L');
    $pdf->Cell(150, 0,'Firma: ', 0, 1, 'R');
    $pdf->Cell(0, 0,'DOMICILIO Y TELEFONO:', 0, 1, 'L');
    $pdf->Cell(0, 0,'MATRICULA:', 0, 1, 'L');
    $pdf->Cell(0, 0,'DIRECTOR DE OBRA:', 0, 1, 'L');
    $pdf->Cell(150, 0,'Firma: ', 0, 1, 'R');
    $pdf->Cell(0, 0,'DOMICILIO Y TELEFONO:', 0, 1, 'L');
    $pdf->Cell(0, 0,'MATRICULA:', 0, 1, 'L');
    $pdf->Cell(0, 0,'EJECUTOR:', 0, 1, 'L');
    $pdf->Cell(0, 0,'DOMICILIO Y TELEFONO:', 0, 1, 'L');
    $pdf->Cell(0, 0,'MATRICULA:', 0, 1, 'L');
    $pdf->Cell(150, 0,'Firma: ', 0, 1, 'R');
    $pdf->Ln(20);
    $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
  	$pdf->Cell(150, 0,'Arq.Roberto A. Bianchi', 0, 1, 'R');
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
    $pdf->Cell(147, 0,'Dep. Obras Privadas', 0, 1, 'R');
    $pdf->Ln(5);
    $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN-2);
    $pdf->Cell(0, 0,'NOTAS', 0, 1, 'L');
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN-2);
    $pdf->MultiCell(0, 0,'-Es obligación colocar letrero sobre el frente de la obra con los datos que constan en este certificado.-
-Recuerde mantener el espacio público (vereda y calle) en perfectas condiciones de orden y limpieza. El presente permiso no habilita la ocupación del mismo, en caso de ser necesaria debe tramitarlo por separado. Resguarde la seguridad de los bienes y personas en general y en particular en lo que respecta a los inmuebles linderos, y en la vía pública utilice de bandejas protectoras y demás elementos de seguridad y señalización.-
-Si necesita deprimir napa prevea el asesoramiento municipal para la evacuación del agua sin volcado a la vía pública.
-Prevea las condiciones necesarias y obligatorias de seguridad y sanitarias del personal afectado a la obra.
-Concluida la obra deberá tramitar certificado parcial/final de obra, requisito necesario para la obtención del permiso de conexión de gas. Si surgieran ampliaciones o modificaciones en el transcurso de la ejecución de la misma deberá presentar planos previo a su inicio, caso contrario adjuntar planos conforme a obra para la obtención del certificado.-
-El presente permiso exime del pago de impuesto al baldío y multas por falta de cerco y vereda durante la vigencia del mismo.-
                          ', 0, 1, 'L');
$pdf->SetFont(PDF_FONT_NAME_MAIN, 'b', PDF_FONT_SIZE_MAIN-1);
    $pdf->MultiCell(0, 0,'Recibió:
Firma:
Aclaración:', 0, 1, 'L');



    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('permiso.pdf', 'I');
  }
}
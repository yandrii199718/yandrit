<?php
// Include the main TCPDF library (search for installation path).

$colorE = "#e70810cf";#e708108c
$colorT = "#47524F";
$color_titulos = "#e70810cf";

/*
$arrayConfiguracion = getConfiguracion();
var_dump($arrayConfiguracion);
exit;
$logo = $arrayConfiguracion['logo'];*/



$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->SetPrintFooter(false);
Fuente: https://www.iteramos.com/pregunta/64344/-cambiar-o-eliminar-header-ampamp-footer-en-el-tcpdf-

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set font
$pdf->SetFont('helvetica', 'BI', 12);
//$pdf->SetFont('verdana', '', 12);

// add a page
$pdf->AddPage('','A4');

//variables que se muestran en la tabla
$razonSocial = $configuracion['razon_social'];
$cite = session('sede');
$direccion = $ordenes[0]['direccion_sede'];


if($configuracion['logo'] == "" || $configuracion['logo'] == 'no_image.jpg'){
  $logoEmpresa = URL_IMG_CONFIGURACION.'0/no_image.jpg';
} else {
  $logoEmpresa = URL_IMG_CONFIGURACION.$configuracion['id_configuracion'].'/'.$configuracion['logo'];
}

if($ordenes[0]['imagen_sede'] == "" || $ordenes[0]['imagen_sede'] == 'no_image.jpg'){
  $logoCite = URL_IMG_SEDE.'0/no_image.jpg';
} else {
  $logoCite = URL_IMG_SEDE.$ordenes[0]['idsede'].'/'.$ordenes[0]['imagen_sede'];
}


$tipoMantenimiento = "MANTENIMIENTO ".$ordenes[0]['tipo_mantenimiento'];
$fechaOt = $ordenes[0]['fecha_registro'];
$numeroOt = $ordenes[0]['nro_orden'];
$codigo = $ordenes[0]['id_orden'];
$equipo = $ordenes[0]['nombre_equipo'];
$marca = $ordenes[0]['nombre_marca'];
$modelo = $ordenes[0]['modelo'];
$descripcion = $ordenes[0]['descripcion_servicio'];
$herramientas = $ordenes[0]['repuestos_utilizados'];
$horaInicio = $ordenes[0]['hora_inicio'];
$horaFin = $ordenes[0]['hora_final'];
$duracion = $ordenes[0]['horas_total'];
$fechaEmision = $ordenes[0]['fecha_orden'];

$html = '<table border="0">
  <tr>
    <th style="border: 1px solid grey;">
      <table cellpadding="3">
        <tr>
          <td width="20%" style="text-align:center">

                <img width="100px" src="'.$logoEmpresa.'" >

          </td>
          <td width="60%" style="text-align:center">
            <span></span><br>
            <span style="font-size:12px; margin:0;">'.$razonSocial.' </span><br>
              <span style="font-size:10px;">'.$cite.'</span><br>
            <span style="font-size:8px;">'.$direccion.'</span>
          </td>
          <td width="20%">

            <img width="100px" src="'.$logoCite.'" >

          </td>
        </tr>
      </table>
    </th>
  </tr>
  <tr>
    <td style="padding:2px; border: 1px solid grey; background-color: red; text-align:center">
      <table cellpadding="2">
        <tr>
          <td>
            <span style="color: #fff; padding:2px">Orden de trabajo</span>
          </td>
        </tr>
      </table>

    </td>
  </tr>
  <tr>
    <td style="border: 1px solid grey; font-size: 10px; text-align:center;">
      <table cellpadding="8">
        <tr>
          <td width="25%">
            <span>Fecha O.T</span> <br>
            '.$fechaOt.'
          </td>
          <td width="50%">
            <span style="font-size: 12px;">
              '.$tipoMantenimiento.'
            </span>
          </td>
          <td width="25%">
            <span>N° O.T.</span><br>
            <span>'.$numeroOt.'</span>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid grey; padding: 10px">
    <table>
      <tr>
        <td width="100%"></td>
      </tr>
      <tr>
        <td width="1%"></td>
        <td width="96%" style="border: 1px solid gray; font-size:10px;">
          <table cellpadding="6">
            <tr>
              <td width="15%;"></td>
              <td width="50%;">
                Codigo: <span style="color: '.$colorT.';">'.$codigo.'</span>
              </td>
              <td>
                Marca: <span style="color: '.$colorT.';">'.$marca.'</span>
              </td>
            </tr>
            <tr>
              <td width="15%;"></td>
              <td width="50%;">
                Equipo:  <span style="color: '.$colorT.';">'.$equipo.'</span>
              </td>
              <td>
                Modelo:  <span style="color: '.$colorT.';">'.$modelo.'</span>
              </td>
            </tr>
          </table>
        </td>
        <td width="1%"></td>
      </tr>
      <tr>
        <td width="100%"></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid grey; background-color: red;">
      <table cellpadding="1">
        <tr>
          <td>
            <span style="color: #fff; padding:2px">Descripción:</span>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid grey;">
      <table>
        <tr>
          <td width="100%"></td>
        </tr>
        <tr>
          <td width="1%"></td>
          <td width="96%" style="border: 1px solid gray;">
            <br>
            <table cellpadding="4">
              <tr>
                <td>
                  <span style="color: '.$colorT.';">'.$descripcion.'</span>
                </td>
              </tr>
            </table>
            <br>
            <br><br>
          </td>
          <td width="1%"></td>
        </tr>
        <tr>
          <td width="100%"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="padding:2px; border: 1px solid grey; background-color: red;">
      <table cellpadding="1">
        <tr>
          <td>
            <span style="color: #fff; padding:2px">Herramientas utilizadas:</span>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid grey;">
      <table>
        <tr>
          <td width="100%"></td>
        </tr>
        <tr>
          <td width="1%"></td>
          <td width="96%" style="border: 1px solid gray;">
          <br>
          <table cellpadding="4">
            <tr>
              <td>
                <span style="color: '.$colorT.';">'.$herramientas.'</span>
              </td>
            </tr>
          </table>
          <br>
          <br><br>
          </td>
          <td width="1%"></td>
        </tr>
        <tr>
          <td width="100%"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid grey;">
      <table>
        <tr>
          <td width="100%"></td>
        </tr>
        <tr>
          <td width="1%"></td>
          <td width="96%" style="border: 1px solid grey; font-size: 10px;" >
            <table>
              <tr>
                <td width="100%"></td>
              </tr>
              <tr>
                <td width="15%"></td>
                <td width="40%">
                  Hora inicio:
                  <span style="color:'.$colorT.';">'.$horaInicio.'</span>
                </td>
                <td width="35%">
                  Duración de mtto:
                  <span style="color:'.$colorT.';">'.$duracion.'</span>
                </td>
              </tr>
              <tr>
                <td width="15%"></td>
                <td width="40%">
                  Hora final:
                  <span style="color:'.$colorT.';">'.$horaFin.'</span>
                </td>
                <td width="35%">
                  Fecha de Emisión:
                  <span style="color:'.$colorT.';">'.$fechaEmision.'</span>
                </td>
              </tr>
              <tr>
                <td width="100%"></td>
              </tr>
            </table>
          </td>
          <td width="1%"></td>
        </tr>
        <tr>
          <td width="100%"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="padding:2px; border: 1px solid grey; background-color: red;">
      <table cellpadding="1">
        <tr>
          <td>
            <span style="color: #fff; padding:2px">Nombre y firma</span>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="33.3%" style="border: 1px solid grey;">
      <br>
      <br>
      <br>
      <br>
      <br>
    </td>
    <td width="33.4%" style="border: 1px solid grey;">

    </td>
    <td width="33.3%" style="border: 1px solid grey;">

    </td>
  </tr>
  <tr style="text-align:center">
    <td width="33.3%" style="border: 1px solid grey;">
      RESPONSABLE
    </td>
    <td width="33.4%" style="border: 1px solid grey;">
      DIRECTOR
    </td>
    <td width="33.3%" style="border: 1px solid grey;">
      TÉCNICO
    </td>
  </tr>
</table>';


// ---------------------------------------------------------
/*
$html = '<div></div><table cellpadding="4" style="border: 1px solid '.$colorE.'; font-size: 12px;">
		<tr>
			<th width="3%" style="border: 1px solid '.$colorE.';">#</th>
			<th width="7%" style="border: 1px solid '.$colorE.';">Codigo</th>
			<th width="7%" style="border: 1px solid '.$colorE.';">Codigo M</th>
			<th width="8%" style="border: 1px solid '.$colorE.';">Fecha orden</th>
			<th width="8%" style="border: 1px solid '.$colorE.';">Nro orden</th>
      <th width="15%" style="border: 1px solid '.$colorE.';">nombre usuario</th>
      <th width="15%" style="border: 1px solid '.$colorE.';">descripción</th>
			<th width="12%" style="border: 1px solid '.$colorE.';">area</th>
			<th width="8%" style="border: 1px solid '.$colorE.';">Costo</th>
			<th width="7%" style="border: 1px solid '.$colorE.';">total horas</th>
      <th width="10%" style="border: 1px solid '.$colorE.';">Estado</th>
		</tr>';



//echo '<pre>'; var_dump($usuarios); exit;
foreach($ordenes as $key => $dato){

  $codigo = $dato["codigo"];
  $equipoM = $dato["codigo_mantenimiento"];
  $fechaOrden = $dato['fecha_orden'];
  $nroOrden = $dato['nro_orden'];
  $nombres = $dato['nombres'];
  $descripcion = $dato['descripcion_servicio'];
  $nombreArea = $dato['nombre_area'];
  $costo = $dato['costo'];
  $totalHoras = $dato['horas_total'];
  $estado = $dato['estado'];

  if($estado == 0)
    $estado = "PENDIENTE";

  if($estado == 1)
    $estado = "FINALIZADO";


  $html .= '<tr style="font-size: 12px; color: #2E2E2E;">
    <td style="border: 1px solid '.$colorE.';">'.$key.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$codigo.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$equipoM.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$fechaOrden.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$nroOrden.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$nombres.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$descripcion.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$nombreArea.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$costo.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$totalHoras.'</td>
    <td style="border: 1px solid '.$colorE.';">'.$estado.'</td>
  </tr>';

}

		$html .='</table>';*/

$pdf->writeHTML($html, true, false, true, false, '');


//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
exit;

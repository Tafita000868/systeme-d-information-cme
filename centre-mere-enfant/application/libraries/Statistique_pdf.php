

<?php
require("fpdf17/fpdf.php");
class Statistique_pdf extends FPDF
{
    private $_data;
    public function __construct($Data){
        parent::__construct('L');
        $this->setData($Data);
        $this->setFont('Times', '');
        $this->AliasNbPages();

        $this->AddPage('L','A4',0);
        $this->title("RECAPITULATION PRODUIT");
        $this->HeaderTable();
        $this->ContainedTable();
        
        $this->AddPage('L','A4',0);
        $this->title("RECAPITULATION STATION");
        $this->HeaderTableStation();
        $this->ContainedTableStation();

        $this->AddPage('L','A4',0);
        $this->title("REPRESENTATION GRAPHIQUE");
        $this->Chart();

    }

    public function setData($Data){
        $this->_Data = $Data;
        // var_dump($Data);
    }

    public function getData(){
        return $this->_Data;
    }

    function Header()
    {
        // $this->Image(site_url().'assets/images/img-01.png',10,6,30,25);
        $this->setFont('Arial', 'B', 20);
        $this->Cell(290,5,'Analyses statistiques',0,0,'C');
        $this->Ln();
    }

    function title($title="")
    {
        $this->setFont('Arial', 'B', 14);
        $this->Cell(100,50,$title,0,0,'C');
        $this->Ln(10);
        $this->Ln(40);
    }

    function HeaderTable()
    {	
        $this->SetFont('Times','B',12);
        $this->Cell(60,10,'Produit',1,0,'C');
        $this->Cell(60,10,'Quantite vendu',1,0,'C');
        $this->Cell(60,10,'Vente',1,0,'C');
        $this->Cell(60,10,'Revient',1,0,'C');
        $this->Cell(60,10,'Benefice par produit',1,0,'C');
        $this->Ln();
    }

    function HeaderTableStation()
    {   
        $this->SetFont('Times','B',12);
        $this->Cell(100,10,'Station',1,0,'C');
        $this->Cell(60,10,'Quantite vendu',1,0,'C');
        $this->Cell(60,10,'Prix total vendu',1,0,'C');
        $this->Ln();
    }

    function ContainedTable()
    {
        // foreach ($this->getData()['produits'] as $produit) {
        //     $this->SetFont('Times','',12);
        //     $this->Cell(60,10, $produit['nom'],1,0,'L');
        //     $this->Cell(60,10,$produit['qte_sortie'],1,0,'L');
        //     $this->Cell(60,10,round($produit['vente_produit'], 3),1,0,'L');
        //     $this->Cell(60,10,round($produit['revient_produit'], 3),1,0,'L');
        //     $this->Cell(60,10,round($produit['benefice_produit'],3 ),1,0,'L');
        //     $this->Ln();
        // }
        // $this->SetFont('Times','',12);
        // $this->Cell(100,10, '',0,0,'L');
        // $this->Cell(60,10,'',0,0,'L');
        // $this->Cell(60,10,'Benefice Total',1,0,'L');
        // $this->Cell(60,10,$this->getData()['benefice_total']['benefice_total'],1,0,'L');
        // $this->Ln();
        // $this->Ln();
        // $this->Ln();
    }

    function ContainedTableStation()
    {
        // foreach ($this->getData()['stations'] as $station) {
        //     $this->SetFont('Times','',12);
        //     $this->Cell(100,10, $station['nom_station'],1,0,'L');
        //     $this->Cell(60,10,$station['qte_sortie'],1,0,'L');
        //     $this->Cell(60,10,round($station['montant_sortie'], 3),1,0,'L');
        //     // $this->Cell(60,10,$station['montant_sortie'],1,0,'L');
        //     $this->Ln(10);
        // }
    }

    function Chart(){

    //     $this->SetFont('Times','',12);
    //     // position
    //     $chartX=50;
    //     $chartY=30;
    //     // dimension
    //     $chartWidth=150;
    //     $chartHeight=100;
    //     // padding
    //     $chartTopPadding=10;
    //     $chartLeftPadding=20;
    //     $chartBottomPadding=10;
    //     $chartRightPadding=5;
    //     // chart box
    //     $chartBoxX=$chartX+$chartLeftPadding;
    //     $chartBoxY=$chartY+$chartTopPadding;
    //     $chartBoxWidth=$chartWidth-$chartLeftPadding-$chartRightPadding;
    //     $chartBoxHeight=$chartHeight-$chartTopPadding-$chartBottomPadding;
    //     // bar
    //     $barWidth=20;
    //     // chart data
    //     // $datas=Array(
    //     //     'lorem'=>[
    //     //         'color' =>[260,0,0],
    //     //         'value' =>100
    //     //     ],
    //     // );
    //     // data max
    //     $dataMax=0;
    //     $datas=$this->getData()['statistiques'];

    //     foreach($datas as $item){
    //         if($item['montant_sortie']>$dataMax) $dataMax=$item['montant_sortie'];
    //     }
    //     // foreach($datas as $item){
    //     //     if($item['value']>$dataMax) $dataMax=$item['value'];
    //     // }
    //     // data step
    //     $dataStep=50;
    //     // set font, line width, and color
    //     $this->SetFont('Arial','',9);
    //     $this->SetLineWidth(0.2);
    //     $this->SetDrawColor(0);
    //     // chart boundary
    //     // $this->Rect($chartX,$chartY,$chartWidth,$chartHeight);
    //     // vertical axis line
    //     $this->Line(
    //         $chartBoxX,
    //         $chartBoxY,
    //         $chartBoxX,
    //         $chartBoxY+$chartBoxHeight
    //     );
    //     // horizontal axis line
    //     $this->Line(
    //         $chartBoxX-2,
    //         $chartBoxY+$chartBoxHeight,
    //         $chartBoxX+$chartBoxWidth,
    //         $chartBoxY+$chartBoxHeight
    //     );
    //     // vertical axis
    //     // calculate chart's y axis scale unit
    //     $yAxixUnits=$chartBoxHeight/$dataMax;
    //     // draw the vertical (y) axis
    //     for($i=0;$i<$dataMax;$i+=$dataStep){
    //         // y position
    //         $yAxisPos=$chartBoxY+($yAxixUnits*$i);
    //         // draw y axis lines
    //         $this->Line(
    //             $chartBoxX-2,
    //             $yAxisPos,
    //             $chartBoxX,
    //             $yAxisPos
    //         );
    //         // set cell position for y axis labels
    //         $this->SetXY($chartBoxX-$chartLeftPadding,$yAxisPos-2);
    //         // write labels
    //         $this->Cell($chartLeftPadding-4,5,$dataMax-$i,0,0,'R');
    //     }
    //     // horizontal axis
    //     // set cell position
    //     $this->SetXY($chartBoxX,$chartBoxY+$chartBoxHeight);
    //     // cell's width
    //     $xLabelWidth=$chartBoxWidth/count($datas);
    //     // loop horizontal axis and draw the bars
    //     $barXPos=0;
    //     foreach($datas as $itemName=>$item){
    //         // print the label
    //         // $this->Cell($xLabelWidth,5,$itemName,1,0,'C');
    //         $this->Cell($xLabelWidth,5,$item['date_stock'],1,0,'C');
    //         // $this->Cell($xLabelWidth,10,$itemName['produit'],1,0,'C');
    //         // $this->Cell($xLabelWidth,5,$itemName,1,0,'C');
    //         // drawing the bar
    //         // bar color
    //         // $this->SetFillColor($item['color'][0],$item['color'][1],$item['color'][2]);
    //         // bar height
    //         $barHeight=$yAxixUnits*$item['montant_sortie'];
    //         // bar x position
    //         $barX=($xLabelWidth/2)+($xLabelWidth*$barXPos);
    //         $baxX=$barX-($barWidth/2);
    //         $barX=$barX+$chartBoxX;
    //         // bar y position
    //         $barY=$chartBoxHeight-$barHeight;
    //         $barY=$barY+$chartBoxY;
    //         // draw the bar
    //         $this->Rect($barX,$barY,$barWidth,$barHeight,'DF');
    //         // increment barXPos
    //         $barXPos++;
    //     }
    //     // foreach($datas as $itemName){
    //     //     $this->Cell($xLabelWidth,5,$itemName['produit'],1,0,'C');
    //     // }
    //     // Axis labels
    //     $this->SetFont('Arial','B',12);
    //     $this->SetXY($chartX,$chartY);
    //     $this->Cell(100,10,"Sortie");
    //     $this->SetXY(($chartWidth/2)-50+$chartX, $chartY+$chartHeight-($chartBottomPadding/2));
    //     $this->Cell(100,11,"Produits",0,0,'C');

    //     $this->Ln(10); 
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

}

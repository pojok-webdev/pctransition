<?php
class Pdf extends FPDF{
	function showPDF($title, $subject = 'Rekap Ticket', $sub = '2015', $header = array(), $data = array()){
		$this->SetTitle($title);
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('','B');
		$this->Cell(190,6,$subject,'',0,'C',false);
		$this->Ln();

		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('','');
		$this->Cell(190,6,$sub,'',0,'C',false);
		$this->Ln();
		$this->Ln();

		$this->SetFillColor(136,136,136);
		$this->SetTextColor(255);
		$this->SetDrawColor(48,48,48);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		$this->SetFontSize(10);

		$w = array(40, 65, 40, 45);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();

		$this->SetFillColor(232,232,232);
		$this->SetTextColor(0);
		$this->SetFont('');
		$this->SetFontSize(10);

		$fill = false;
		foreach($data as $row){
			$this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
			$this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
			$this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
			$this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		$this->Cell(array_sum($w),0,'','T');

		$this->Ln();
		$this->Ln();
		$this->Ln();
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('','');
		$this->Cell(160,6,'Total '.count($data),'',0,'R',false);
		$this->Ln();

	}
} 
?>

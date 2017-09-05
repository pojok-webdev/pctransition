<?php
class Pdftable extends FPDF{
	var $lasty = 0;
	function BasicTable($header,$data){
		foreach($header as $col){
			//$this->Cell(40,7,$col,1);
		}
		$this->Ln();
		foreach($data as $col){
			for($i = 0;$i<count($col);$i++){
				$this->Cell(40,6,$col[$i],1);
			}
			$this->Ln();
		}
	}
	
	function ImprovedTable($header,$data){
		$w = array(40,35,40,45);
		for($i=0;$i<count($header);$i++){
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		}
		$this->Ln();
		foreach ($data as $row){
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,$row[1],'LR');
			$this->Cell($w[2],6,$row[2],'LR');
			$this->Cell($w[3],6,$row[3],'LR');
			$this->Ln();
		}
		$this->Cell(array_sum($w),6,'','T');
	}
	
	function FancyTable($header, $data){
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		$w = array(40,35,40,45);
		for($i=0;$i<count($header);$i++){
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		}
		$this->Ln();
		$fill = false;
		foreach($data as $row){
			$this->Cell($w[0],6,'satuo','LR',0,'L',$fill);
			$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
			$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
			$this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
		}
		$this->Cell(array_sum($w),0,'T');
	}
	
	function PujiTable($header,$data, $cellborder = 1,$autowidth = false){
		$colheight = 16;
		foreach($header as $col){
			//$this->Cell(40,7,$col,1);
		}
		$this->Ln();
		foreach($data as $col){
			$colheight = 16;
			if($autowidth){
				if(count($col>0)){
					$colwidth = floor(180/count($col)); 
				}
			}else{
				$colwidth = 40;
			}
			//define colheight
			for($i=0;$i<count($col);$i++){
				if(is_array($col[$i])){
					if($col[$i]['type']==='image'){
						$colheight = 40;
					}
				}
				else{
					//$colheight = 16;
				}
			}
			for($i = 0;$i<count($col);$i++){
				
				if (is_array($col[$i])){
					switch ($col[$i]['type']){
						case 'text':
							$coldata = $col[$i]['val'];
							break;
						case 'image':
							$coldata = $this->Image($col[$i]['val'], $this->GetX(), $this->GetY(), $colwidth,40);//$col[$i]['val'];
							break;
					}
				}else{	
					$coldata = $col[$i];
				}
				$this->Cell($colwidth,$colheight,$coldata,$cellborder);
			}
			$this->Ln();
		}
	}
	
	function PujiTable2($header,$data, $autowidth = false){
		foreach($header as $col){
			//$this->Cell(40,7,$col,1);
		}
		$this->Ln();
		foreach($data as $col){
			if($autowidth){
				if(count($col>0)){
					$colwidth = floor(180/count($col)); 
				}
			}else{
				$colwidth = 40;
			}
			for($i = 0;$i<count($col);$i++){
				if (count($col[$i])>0){
					switch ($col[$i]['type']){
						
					}
				}else{
					$coldata = $col[$i];
				}
				$this->Cell($colwidth,16,$col[$i],1);
			}
			$this->Ln();
		}
	}
	
	function objecttable($data,$colamount = 2){
		$c = 0;
		$y = 0;
		$x = 10;
		foreach($data['Sites'] as $cell){
			$absis = $this->manage_absis($c,$this->GetY(),$colamount);
			$this->SetY($absis['y']);
			$this->lasty = $this->GetY();
			$this->SetX($absis['x']);

			$this->SetX($absis['x']);
			$this->Cell(10,10,"Absis X : " . $absis['x'] . ", Absis Y : " . $absis['y']);
			$this->Ln();
			
			$this->SetX($absis['x']);
			$this->Cell(10,10,$cell['name']);
			$this->Ln();

			$this->SetX($absis['x']);
			$this->Cell(10,10,$cell['location']);
			$this->Ln();
			
			if(isset($cell['images'])){
				$this->SetX($absis['x']);
//				$this->Cell(10,10,$cell['images'][0]);
				$this->Image('./application/images/' . $cell['images'][0], $this->GetX(), $this->GetY(), $absis['w'],40);
				$this->Ln();				
			}

			$this->SetX($absis['x']);
			$this->Cell(10,10,"X : " . $this->GetX() . ", Y : " . $this->GetY());
			$this->Ln();

			$this->SetX($absis['x']);
			$this->Cell(10,10,"Absis X : " . $absis['x'] . ", Absis Y : " . $absis['y']);
			$this->Ln();

			$c++;
		}
		$this->Output();
	}
	
	function manage_absis($x,$y,$colamount = 2){
		$divider = $x%$colamount;
		return array("x"=>($divider*floor(200/$colamount))+10,"y"=>($divider === 0)?$y:$this->lasty,"w"=>floor(200/$colamount));
	}	
}

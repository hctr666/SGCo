<?php 
	require("../fpdf/fpdf.php");

	class RepContrato extends FPDF
	{

		function ChapterTitle($label){
		    // Arial 10
		    $this->SetFont('Arial','B',10);
		    // Color de fondo
		    #$this->SetFillColor(200,220,255);
		    // Título
		    $this->MultiCell(0,5,$label,false);
		    // Salto de línea
		    $this->Ln(3);
		}

		function ChapterBody($file){
	    	// Leemos el fichero
	    	$txt = utf8_decode(file_get_contents($file));
	    	$this->SetFont('Arial','',10);
	    	//remueve los '?'
	    	$txt = ltrim($txt, '?');
	    	// Imprimimos el texto justificado
	    	$this->MultiCell(0,5,$txt);
	    	// Salto de línea
	    	$this->Ln(7);
		}

		function footer(){
			//posicion a 1,5 del final
			$this->SetY(-15);
			//fuente arial
			$this->SetFont('Arial','',10);
			//numero de pagina
			$this->Cell(0,6,'~ '.$this->PageNo().' ~',0,0,'C');
		}

		function PrintChapter($title, $file){
		    $this->ChapterTitle($title);
		    $this->ChapterBody($file);
		}

		function tablaBasica($columnas, $data){
			#Columnas
			foreach ($columnas as $columna) {
				$this->Cell(40, 7, $columna, 1);
			}
			$this->Ln();

			#Data
			foreach ($data as $fila) {
				foreach ($fila as $columna) {
					$this->Cell(40, 6, $columna, 1);
				}
				$this->Ln();
			}
		}

		function customTable1($columnas, $data){
			#ancho de columnas
			$w = array(40,35,40,45);

			//columnas
		    for($i=0;$i<count($columnas);$i++){
		        $this->Cell($w[$i],7,$columnas[$i],1,0,'C');
		    }
	    	$this->Ln();
	    	//Data
	    	foreach($data as $fila){
	        	$this->Cell($w[0],6,$fila[0],'LR');
	        	$this->Cell($w[1],6,$fila[1],'LR');
	        	$this->Cell($w[2],6,number_format($fila[2]),'LR',0,'R');
	        	$this->Cell($w[3],6,number_format($fila[3]),'LR',0,'R');
	        	$this->Ln();
	    	}
    		//Closure line
    		$this->Cell(array_sum($w),0,'','T');
		}

		function customTable2($columnas, $data){
			#Colores, ancho de linea y grosor de fuente
		    $this->SetFillColor(255,0,0);
		    $this->SetTextColor(255);
		    $this->SetDrawColor(128,0,0);
		    $this->SetLineWidth(.3);
		    $this->SetFont('','B');

		    #Header
		    $w=array(40,35,40,45);
		    for($i = 0; $i < count($columnas); $i++){
		        $this->Cell($w[$i], 7, $columnas[$i], 1, 0, 'C', 1);
		    }
		    $this->Ln();
		    
		    #restauracion de fuente y color
		    $this->SetFillColor(224,235,255);
		    $this->SetTextColor(0);
		    $this->SetFont('');

		    #Data
		    $fill=0;
		    foreach($data as $fila){
		        $this->Cell($w[0],6,$fila[0],'LR',0,'L',$fill);
		        $this->Cell($w[1],6,$fila[1],'LR',0,'L',$fill);
		        $this->Cell($w[2],6,number_format($fila[2]),'LR',0,'R',$fill);
		        $this->Cell($w[3],6,number_format($fila[3]),'LR',0,'R',$fill);
		        $this->Ln();
		        $fill=!$fill;
		    }
		    $this->Cell(array_sum($w),0,'','T');
		}

    	#Funciones para la creación de tablas
	    var $widths;
	    var $aligns;

	    function SetWidths($w){
	        //Set the array of column widths
	        $this->widths=$w;
	    }

	    function SetAligns($a){
	        //Set the array of column alignments
	        $this->aligns=$a;
	    }

	    function Row($data){
	        //Calculate the height of the row
	        $nb=0;
	        for($i=0;$i<count($data);$i++){
	            $nb=max($nb, $this->NbLines($this->widths[$i], $data[$i]));
	        }

	        $h=5*$nb;
	        //Issue a page break first if needed
	        $this->CheckPageBreak($h);
	        //Draw the cells of the row
	        for($i=0;$i<count($data);$i++)
	        {
   		        $this->SetDrawColor(0,144,144);
	            $w=$this->widths[$i];
	            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
	            //Save the current position
	            $x=$this->GetX();
	            $y=$this->GetY();
	            //Draw the border
	            $this->Rect($x, $y, $w, $h);
	            //Print the text
	            $this->MultiCell($w, 5, $data[$i], 0, $a);
	            //Put the position to the right of the cell
	            $this->SetXY($x+$w, $y);
	        }
	        //Go to the next line
	        $this->Ln($h);
	    }

	    function CreateHeader($header){
	        // Header
	        $this->SetFillColor(0, 144,144);
	        $this->SetDrawColor(255);
	        $this->SetTextColor(255);
	        $this->SetFont('Arial','B',9);
	        
	        foreach ($header as $col) {
	            //Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
	            $this->Cell($col[1], 10, $col[0], 1, 0, 'C', true);
	        }
	        $this->Ln();
	    }

	    function CheckPageBreak($h)
	    {
	        //If the height h would cause an overflow, add a new page immediately
	        if($this->GetY()+$h>$this->PageBreakTrigger){
	            $this->AddPage($this->CurOrientation);
	            $x_ = $this->GetX();
				$x_ = $x_-13;
				$this->SetX($x_);
	        }
	    }

	    function NbLines($w, $txt)
	    {
	        //Computes the number of lines a MultiCell of width w will take
	        $cw=&$this->CurrentFont['cw'];
	        if($w==0){
	            $w=$this->w-$this->rMargin-$this->x;
	        }

	        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	        $s=str_replace("\r", '', $txt);
	        $nb=strlen($s);
	        if($nb>0 and $s[$nb-1]=="\n"){
	            $nb--;
	        }

	        $sep=-1;
	        $i=0;
	        $j=0;
	        $l=0;
	        $nl=1;

	        while($i<$nb){
	            $c=$s[$i];

	            if($c=="\n"){
	                $i++;
	                $sep=-1;
	                $j=$i;
	                $l=0;
	                $nl++;
	                continue;
	            }
	            
	            if($c==' '){
	                $sep=$i;
	            }

	            $l+=$cw[$c];

	            if($l>$wmax){
	                if($sep==-1){
	                    if($i==$j){
	                        $i++;
	                    }
	                } else {
	                    $i=$sep+1;
	                }

	                $sep=-1;
	                $j=$i;
	                $l=0;
	                $nl++;
	            } else {
	                $i++;
	            }
	        }
	        return $nl;
	    }
	}
 ?>
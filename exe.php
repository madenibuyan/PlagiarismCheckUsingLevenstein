<?php
if(isset($_POST['detect'])){
	
	echo '<h3>Analysis Result</h3><br><div class="row" style="margin-bottom:30px;">';
	
	$rate=$r=0;
	$arr=str_ireplace(",","",str_ireplace(".","",$_POST['text1']));
	$em=str_split($_POST['text1'],20);
	if(count($em)>0){
			echo '<div class="col-md-6" style="border:1px solid gray;"> <br><h4 style="text-decoration:underline;">Plagisrized Phrases</h4><br><div align="left" style="max-height:500px; overflow-x:auto;">';
		$no=0;
	for($i=0; $i<count($em); $i++){
		$com = stristr($_POST['text2'],$em[$i]);
		if($com){
			$no=$no+1;
			$r=1;
			
			$highlighted_text = "<span style='font-weight:bold; color:#ffc300;'>".$em[$i]."</span>";
			echo $no.'. '.str_ireplace($em[$i], $highlighted_text, $_POST['text2']).'<hr>';
			
			
			
		}else{
			$no=$no+0;
			$r=0;
		}
		$rate +=$r;
	}
	echo '</div></div>';
	
	$per=(($rate/count($em))*100);
	if($per<=40){
		$color="green";
	}else if($per>40 && $per<=50){
		$color="#ffc300";
	}else if($per>50){
		$color="red";
	}

	echo '<div class="col-md-6" style="border:1px solid gray;"><br><h4 style="text-decoration:underline;">Detailed Analysis & Result </h4><br>';
	//to calc percentage
	echo 'Number of Text in Text Block 1 = '.strlen($_POST['text1']).'<br>';
	echo 'Number of Text in Text Block 2 = '.strlen($_POST['text2']).'<br>';
	echo 'Number of Chunk Similarities = '.$rate.'<br>';
	echo '<br><h4 style="font-weight:600;">Text 1 Plagiarism Rate= <span style="color:'.$color.';">'.round((($rate/count($em))*100),2).'%</span></h4><br>';
	
	echo '<br></div>';
	
	}else{
		echo '<div class="alert alert-danger alert-dismissable" style="margin-top:8px;">
			<p class="pull-left"><i class="fa fa-ban"></i> &nbsp; Oops! &nbsp; Unknown Request.</p>
				<div class="clearfix"></div></div>';
	}
	echo stristr("Hello world!","dos"); 
	
	echo '</div>';
}

?>
<?php 
 	//
	//if(isset($_POST['update']))
 		//print_r($_POST);
 		//exit;
	Class HTML{
        public function text($name,$label,$value,$div_name){

            
            $output	=	'<label>'.$label.'</label>'.'<input type="text" name="'.$name.'" value="'.$value.'" id="'.$name.'">';
			$output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'text',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function text_area($name,$label,$value,$div_name){

            
            $output	=	'<label>'.$label.'</label>'.'<textarea name="'.$name.'" id="'.$name.'">'.$value.'</textarea>';
            	
            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'text_area',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function password($name,$label,$value,$div_name){

           
            $output	=	'<label>'.$label.'</label>'.'<input type="password" name="'.$name.'" value="'.$value.'" id="'.$name.'">';

            	
            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'password',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function submit($name,$label,$value,$div_name){

            $output	=	'<input type="submit" name="'.$name.'" value='.$label.' id="'.$name.'">';

             $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'Submit',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function radio($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'<input type="radio" name="'.$name.'" value="'.$value[0].'" id="'.$name.'">'.$value[0];
            $output.=	'<input type="radio" name="'.$name.'" value="'.$value[1].'" id="'.$name.'">'.$value[1];
			
			 $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'radio',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;

           
        }	
        public function checkbox($name,$label,$value,$div_name){
            //<input type="checkbox" name="vehicle" value="Bike">

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'&nbsp;&nbsp;&nbsp;&nbsp;';
            foreach($value as $values){
                $output.=	'<input type="checkbox" name="'.$name.'" value="'.$values.'" id='.$name.'>'.$values.'&nbsp;&nbsp;';
            }

            
			 $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'checkbox',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;

        }
        public function button($name,$label,$value,$div_name){

            $label	=	'<button type="button" name="'.$name.'" id="'.$name.'">'.$label.'</button>';
            $output	=	$label;

            
			 $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'radio',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;

        }
        public function select($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label;
            $output.=	'&nbsp;&nbsp;<select name="'.$name.'" id="'.$name.'">';	
            foreach($value as $values){
                $output.=	'<option value='.$values.'>'.$values.'</option>';
            }
            $output.=	'</select>';

            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'select',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function file_html($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'&nbsp;&nbsp;<input type="file" name="'.$name.'" id="'.$name.'">';

            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'file_html',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function hidden($name,$label,$value,$div_name){

            $output	=	'<input type="hidden" name="'.$name.'" value="'.$label.'" id="'.$name.'">';	
           $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'hidden',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }

        public function label($name,$label,$value,$div_name){

            $label	=	'<label id="'.$name.'">'.$label.'</label>';
            $output	=	$label;

            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'label',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function table($name,$label,$value,$div_name){

            $label	=	'<table id="'.$name.'">'.'</table>';

            $output	=	$label;	
            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'table',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function list_html($name,$label,$value,$div_name){

            $label	=	'<ul id="'.$name.'">';
            $output	=	$label;
            foreach($value as $values){
                $output.=	'<li value="'.$values.'">'.$values.'</li>';
            }
            $output.=	'</ul>';

            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'list',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function form($name,$label,$value,$div_name){

            $label	=	'<form name="'.$name.'" method="post" action="'.$label.'" id="'.$name.'"></form>';
            $output	=	$label;	

            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'form',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function image($name,$label,$value,$div_name){

            $output	=	'<img src="'.$label.'" id="'.$name.'">';	

            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'image',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function fieldset($name,$label,$value,$div_name){

            $output	=	'<fieldset id="'.$name.'"></fieldset>';

            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'fieldset',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function table_row($name,$label,$value,$div_name){

            $output	=	'<tr id="'.$name.'"></tr>';	
            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'table_row',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function table_data($name,$label,$value,$div_name){
            $output	=	'<td id="'.$name.'"></td>';
            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'table_data',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        public function href($name,$label,$value,$div_name){

            $output	=	'<a href="'.$name.'">'.$label.'</a>';
            $output.=	'</div>';	
            $output_json	=	array(
			'LABEL'	=>	$label,
			'ELEMENT'	=>	'href',
			'VARIABLE'	=>	$name,
			'VALUE'	=>	$value,
			'ID'	=>	$name,
			'DIV'	=>	$div_name,
			'HTML'	=>	$output
			);
			$data	=	json_encode($output_json);
            return $data;
        }
        function write_to_file($data,$html_file_name,$css_file_name,$data_css)
        {
           /* if(!isset($html_file_name) || $html_file_name == ''){$html_file_name	=	'output';$css_file_name	=	'output';}
            $start_html	=	'<html><head><link rel="stylesheet" type="text/css" href="'.$css_file_name.'.css"></head><body>';
            $end_html	=	'</body></html>';
            $file = 'dummy/'.$html_file_name.'.html';
            $myfile = fopen($file, "w");

            //$current = file_get_contents($file);
            $current = '';
            // Append code to the file
            $current .= $start_html;
            $current .= $data;
            $current .= $end_html;
            // Write the contents back to the file
            file_put_contents($file, $current);

            ////////////////////////////////writing in the CSS file//////////////////////////////
            if(!isset($css_file_name) || $css_file_name == ''){$css_file_name	=	'output';}
            $file = 'dummy/'.$css_file_name.'.css';
            $myfile = fopen($file, "w");

            $current = file_get_contents($file);
            $current = '';
            // Append code to the file

            $current .= $data_css;

            // Write the contents back to the file
            file_put_contents($file, $current);*/
        }	

    }//end of class HTML
    Class CSS{
        function styles($var_name,$color,$width,$height,$x_pos,$y_pos,$z_index,$font_size,$font_color){
            $output	=	'#'.$var_name.'{'.'background-color:'.$color.';width:'.$width.'px;height:'.$height.'px;margin-top:'.$x_pos.'px;margin-bottom:'.$y_pos.'px;z-index:'.$z_index.';font-size:'.$font_size.';color:'.$font_color.';position:relative;}';
			
			$data_CSS	=	array('NAME'	=>	$var_name,
			'NAME'	=>	$var_name,
			'BACKGROUND_COLOR'	=>	$color,
			'WIDTH'	=>	$width,
			'HEIGHT'	=>	$height,
			'X_POS'	=>	$x_pos,
			'Y_POS'	=>	$y_pos,
			'Z_INDEX'	=>	$z_index,
			'FONT_SIZE'	=>	$font_size,
			'FONT_COLOR'	=>	$font_color,
			'CSS_OUTPUT'	=> $output
			);
			$data	=	json_encode($data_CSS);
            return $data;
            #id{color:#FFF;width:23px;height:23px;}
        }
        function write_to_file($data,$css_file_name)
        {/*
            if(!isset($css_file_name) || $css_file_name == ''){$css_file_name	=	'output';}
            $file = 'dummy/'.$css_file_name.'.css';
            $myfile = fopen($file, "w");
            // Open the file to get existing content
            $current = file_get_contents($file);
            $current = '';
            // Append code to the file

            $current .= $data;

            // Write the contents back to the file
            file_put_contents($file, $current);
        */}	

    }
    $obj		=	new HTML;
    $obj_css	=	new CSS;

    if(isset($_POST['update'])){

        //create DB connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $select1				=		'SELECT MAX(FORM_ID) AS ID1 FROM `CMS`.`html_css`';
        $result1				=		$conn->query($select1);
        $row1				=		mysqli_fetch_assoc($result1);


        $select				=		'SELECT MAX(FORM_ID) AS ID FROM `CMS`.`html_css`  WHERE STATUS	=	"1"';
        $result				=		$conn->query($select);
        $row				=		mysqli_fetch_assoc($result);
        $index_of_form		=		$row['ID'];
        if($row['ID']	==	NULL){$index_of_form		=		$row1['ID1'];$index_of_form	=	$index_of_form	+ 1;}
        if($index_of_form	==	'' || $index_of_form	==	NULL){$index_of_form	=	0;}

        $row				=		NULL;

        //files

        $html_file_name	=	'';
        $css_file_name	=	'';

        //html
        $var_name				=			$_POST['var_name'];
        $label					=			$_POST['label'];
        $html_element			=			$_POST['html_element'];
        $div_name				=			'';
        /*$div_name				=			$_POST['div_name'];*/


        //css
        if(isset($_POST['color'])){$color						=			$_POST['color'];}
        $position												=			'absolute';	
        if(isset($_POST['height'])){$height						=			$_POST['height'];}
        if(isset($_POST['width'])){$width						=			$_POST['width'];}
        if(isset($_POST['x_position'])){$x_position				=			$_POST['x_position'];}
        if(isset($_POST['y_position'])){$y_position				=			$_POST['y_position'];}
        if(isset($_POST['z_index'])){$z_index					=			$_POST['z_index'];}
        if(isset($_POST['font_size'])){$font_size				=			$_POST['font_size'];}
        if(isset($_POST['font_color'])){$font_color				=			$_POST['font_color'];}

        //radio
        if(isset($_POST['radio1'])){$radio1						=			$_POST['radio1'];}
        if(isset($_POST['radio2'])){$radio2						=			$_POST['radio2'];}

        //checkbox
        if(isset($_POST['checkbox1'])){$checkbox1				=			$_POST['checkbox1'];}
        if(isset($_POST['checkbox2'])){$checkbox2				=			$_POST['checkbox2'];}
        if(isset($_POST['checkbox3'])){$checkbox3				=			$_POST['checkbox3'];}
        if(isset($_POST['checkbox4'])){$checkbox4				=			$_POST['checkbox4'];}
        if(isset($_POST['checkbox5'])){$checkbox5				=			$_POST['checkbox5'];}

        //dropdown
        if(isset($_POST['select1'])){$select1					=			$_POST['select1'];}
        if(isset($_POST['select2'])){$select2					=			$_POST['select2'];}
        if(isset($_POST['select3'])){$select3					=			$_POST['select3'];}
        if(isset($_POST['select4'])){$select4					=			$_POST['select4'];}
        if(isset($_POST['select5'])){$select5					=			$_POST['select5'];}


        //list
        if(isset($_POST['list1'])){$list1						=			$_POST['list1'];}
        if(isset($_POST['list2'])){$list2						=			$_POST['list2'];}
        if(isset($_POST['list3'])){$list3						=			$_POST['list3'];}
        if(isset($_POST['list4'])){$list4						=			$_POST['list4'];}
        if(isset($_POST['list5'])){$list5						=			$_POST['list5'];}

        $value													=			'';

        switch ($html_element) {
            case 'text':

                $data_html	=	$obj->text($var_name,$label,$value,$div_name);

                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;


                $result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                if($_POST['update']	==	"false")
                    $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                else
                    $insert_div_data	=	"update
                    `CMS`.`divs` 
                    set `ELEMENT`='$data_html'
                    WHERE `HTML_CSS_ID` = ".$_POST["update_id"];

                $result	=	$conn->query($insert_div_data);
				$array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'text_area':
                $data_html	=	$obj->text_area($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                //echo $data_html;
				$array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;




                break;
            case 'password':
                $data_html	=	$obj->password($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'Submit':
                $data_html	=	$obj->submit($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'radio':
                $radio_values	=	array();
                array_push($radio_values,$radio1,$radio2);//more than one values will be handled in an array
                $data_html	=	$obj->radio($var_name,$label,$radio_values,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'checkbox':
                $checkbox	=	array();
                if(isset($checkbox1)){array_push($checkbox,$checkbox1);}
                if(isset($checkbox2)){array_push($checkbox,$checkbox2);}
                if(isset($checkbox3)){array_push($checkbox,$checkbox3);}
                if(isset($checkbox4)){array_push($checkbox,$checkbox4);}
                if(isset($checkbox5)){array_push($checkbox,$checkbox5);}

                $data_html	= $obj->checkbox($var_name,$label,$checkbox,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'button':
                $data_html	= $obj->button($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'select':

                $select	=	array();
                if(isset($select1)){array_push($select,$select1);}
                if(isset($select2)){array_push($select,$select2);}
                if(isset($select3)){array_push($select,$select3);}
                if(isset($select4)){array_push($select,$select4);}
                if(isset($select5)){array_push($select,$select5);}
                $data_html	= $obj->select($var_name,$label,$select,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'file_html':
                $data_html	= $obj->file_html($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'hidden':
                $data_html	= $obj->hidden($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'label':
                $data_html	= $obj->label($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'table':
                $data_html =	$obj->table($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'list':
                $list	=	array();
                if(isset($list1)){array_push($list,$list1);}
                if(isset($list2)){array_push($list,$list2);}
                if(isset($list3)){array_push($list,$list3);}
                if(isset($list4)){array_push($list,$list4);}
                if(isset($list5)){array_push($list,$list5);}
                $data_html	= $obj->list_html($var_name,$label,$list,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'form':

                $data_html	= $obj->form($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'image':
                $data_html	= $obj->image($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'fieldset':
                $data_html	= $obj->fieldset($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'table_row':
                $data_html	= $obj->table_row($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'table_data':
                $data_html	= $obj->table_data($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;
            case 'href':
                $data_html	= $obj->href($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                
                if($_POST['update']	==	"false")
                    $insert	=	"INSERT INTO `CMS`.`html_css` (`ID`, `HTML`, `CSS`,  `FORM_ID`,`STATUS`, `NAME`) VALUES (NULL, '$data_html', '$data_css', $index_of_form,'1', '$label');";
                else
                    $insert	=	"update  `CMS`.`html_css`
                    set `HTML`='$data_html' ,
                    `CSS`='$data_css',											  
                    `NAME`='$label'
                    WHERE `ID`=" .$_POST["update_id"]  ;$result	=	$conn->query($insert);
                $ID	=	mysqli_insert_id($conn);
                $insert_div_data	=	"INSERT INTO `CMS`.`divs` (`ID`, `ELEMENT`, `HTML_CSS_ID`) VALUES (NULL, '$data_html',$ID);";
                $result	=	$conn->query($insert_div_data);
                $array	=	array('HTML'	=>	$data_html,
							 'CSS'	=>	$data_css);
                $array_send	=	json_encode($array);
				echo $array_send;





                break;


            default:
                echo 'Invalid Selection';
        }//end of switch
    }//end of isset
?>
<?php
    Class HTML{
        public function text($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'<input type="text" name="'.$name.'" value="'.$value.'" id="'.$name.'">';

            return $output;
        }
        public function text_area($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'<textarea name="'.$name.'" id="'.$name.'">'.$value.'</textarea>';
            $output.=	'</div>';	
            return $output;
        }
        public function password($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'<input type="password" name="'.$name.'" value="'.$value.'" id="'.$name.'">';

            return $output;
        }
        public function submit($name,$label,$value,$div_name){

            $output	=	'<input type="submit" name="'.$name.'" value='.$label.' id="'.$name.'">';

            return $output;
        }
        public function radio($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'<input type="radio" name="'.$name.'" value="'.$value[0].'" id="'.$name.'">'.$value[0];
            $output.=	'<input type="radio" name="'.$name.'" value="'.$value[1].'" id="'.$name.'">'.$value[1];

            return $output;
        }	
        public function checkbox($name,$label,$value,$div_name){
            //<input type="checkbox" name="vehicle" value="Bike">

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'&nbsp;&nbsp;&nbsp;&nbsp;';
            foreach($value as $values){
                $output.=	'<input type="checkbox" name="'.$name.'" value="'.$values.'" id='.$name.'>'.$values.'&nbsp;&nbsp;';
            }

            return $output;
        }
        public function button($name,$label,$value,$div_name){

            $label	=	'<button type="button" name="'.$name.'" id="'.$name.'">'.$label.'</button>';
            $output	=	$label;

            return $output;
        }
        public function select($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label;
            $output.=	'&nbsp;&nbsp;<select name="'.$name.'" id="'.$name.'">';	
            foreach($value as $values){
                $output.=	'<option value='.$values.'>'.$values.'</option>';
            }
            $output.=	'</select>';

            return $output;
        }
        public function file_html($name,$label,$value,$div_name){

            $label	=	'<label>'.$label.'</label>';
            $output	=	$label.'&nbsp;&nbsp;<input type="file" name="'.$name.'" id="'.$name.'">';

            return $output;
        }
        public function hidden($name,$label,$value,$div_name){

            $output	=	'<input type="hidden" name="'.$name.'" value="'.$label.'" id="'.$name.'">';	
            return $output;
        }

        public function label($name,$label,$value,$div_name){

            $label	=	'<label id="'.$name.'">'.$label.'</label>';
            $output	=	$label;

            return $output;
        }
        public function table($name,$label,$value,$div_name){

            $label	=	'<table id="'.$name.'">'.'</table>';

            $output	=	$label;	
            return $output;
        }
        public function list_html($name,$label,$value,$div_name){

            $label	=	'<ul id="'.$name.'">';
            $output	=	$label;
            foreach($value as $values){
                $output.=	'<li value="'.$values.'">'.$values.'</li>';
            }
            $output.=	'</ul>';

            return $output;
        }
        public function form($name,$label,$value,$div_name){

            $label	=	'<form name="'.$name.'" method="post" action="'.$label.'" id="'.$name.'"></form>';
            $output	=	$label;	

            return $output;
        }
        public function image($name,$label,$value,$div_name){

            $output	=	'<img src="'.$label.'" id="'.$name.'">';	

            return $output;
        }
        public function fieldset($name,$label,$value,$div_name){

            $output	=	'<fieldset id="'.$name.'"></fieldset>';

            return $output;
        }
        public function table_row($name,$label,$value,$div_name){

            $output	=	'<tr id="'.$name.'"></tr>';	
            return $output;
        }
        public function table_data($name,$label,$value,$div_name){
            $output	=	'<td id="'.$name.'"></td>';
            return $output;
        }
        public function href($name,$label,$value,$div_name){

            $output	=	'<a href="'.$name.'">'.$label.'</a>';
            $output.=	'</div>';	
            return $output;
        }
        function write_to_file($data,$html_file_name,$css_file_name,$data_css)
        {
            if(!isset($html_file_name) || $html_file_name == ''){$html_file_name	=	'output';$css_file_name	=	'output';}
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
            file_put_contents($file, $current);
        }	

    }//end of class HTML
    Class CSS{
        function styles($var_name,$color,$width,$height,$x_pos,$y_pos,$z_index,$font_size,$font_color){
            $output	=	'#'.$var_name.'{'.'background-color:'.$color.';width:'.$width.'px;height:'.$height.'px;margin-top:'.$x_pos.'px;margin-bottom:'.$y_pos.'px;z-index:'.$z_index.';font-size:'.$font_size.';color:'.$font_color.';position:relative;}';
            return $output;
            #id{color:#FFF;width:23px;height:23px;}
        }
        function write_to_file($data,$css_file_name)
        {
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
        }	

    }
    $obj		=	new HTML;
    $obj_css	=	new CSS;

    if(isset($_POST['submit'])){

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
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';






                break;
            case 'text_area':
                $data_html	=	$obj->text_area($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'password':
                $data_html	=	$obj->password($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'Submit':
                $data_html	=	$obj->submit($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'radio':
                $radio_values	=	array();
                array_push($radio_values,$radio1,$radio2);//more than one values will be handled in an array
                $data_html	=	$obj->radio($var_name,$label,$radio_values,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





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
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'button':
                $data_html	= $obj->button($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





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
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'file_html':
                $data_html	= $obj->file_html($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'hidden':
                $data_html	= $obj->hidden($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'label':
                $data_html	= $obj->label($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'table':
                $data_html =	$obj->table($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





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
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'form':

                $data_html	= $obj->form($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'image':
                $data_html	= $obj->image($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'fieldset':
                $data_html	= $obj->fieldset($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'table_row':
                $data_html	= $obj->table_row($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'table_data':
                $data_html	= $obj->table_data($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;
            case 'href':
                $data_html	= $obj->href($var_name,$label,$value,$div_name);
                $data_css 	=	$obj_css->styles($var_name,$color,$width,$height,$x_position,$y_position,$z_index,$font_size,$font_color);
                $obj->write_to_file($data_html,$html_file_name,$css_file_name,$data_css);
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
                echo 'HTML & CSS Code created successfully<br/>';





                break;


            default:
                echo 'Invalid Selection';
        }//end of switch
    }//end of isset

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap/css/bootstrap.css"              rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   
    <script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/manage_nested_tab_handler.js"></script>


    <style type="text/css">

        .container{
            margin-top: 10px;
        }

        .nav-tabs > li {
            position:relative;    
        }

        .nav-tabs > li > a {
            display:inline-block;
        }

        .nav-tabs > li > span {
            display:none;
            cursor:pointer;
            position:absolute;
            right: 6px;
            top: 8px;
            color: red;
        }

        .nav-tabs > li:hover > span {
            display: inline-block;
        }        

    </style>


</head>

<body>
 <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $select_div				=		'SELECT * FROM `CMS`.`divs`';
        $result_div				=		$conn->query($select_div);
        $dropdown=	'';
        while($row=mysqli_fetch_assoc($result_div)){
            $data	 		= 		$row['NAME'];
            $ID				=		$row['HTML_CSS_ID'];
            $dropdown.=		'<option value="'.$ID.'">'.$data.'</option>';
        }
        $select_div             =       'SELECT PAGE_ID,PAGE_TITLE FROM `CMS`.`pages`';
        $result_div             =       $conn->query($select_div);
        $goto_dropdown=  ''; 
        while($row=mysqli_fetch_assoc($result_div)){
            $data           =       $row['PAGE_TITLE'];
            $ID             =       $row['PAGE_ID'];
            if($data !== $_GET['p'])
            $goto_dropdown.=     '<option value="'.$ID.'">'.$data.'</option>';
        }
    ?>
    <div class="container">
        <ul class="nav nav-tabs outer-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a><span>x</span></li>
            <li><a href="#" class="add-outer-tab" data-toggle="tab">+ Add Tab</a></li>
        </ul>
        <div style="    margin-top: -37px; float: right;"> <button type="button" class="btn btn-primary" onClick="openPopUp()" >Save </button> </div>
        <div class="tab-content outer-tab-content">
            <div id="tab_1" class="tab-pane active" >
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1_1" data-toggle="tab">Tab 1.1</a><span>x</span></li>                        
                        <li><a href="#" class="add-inner-tab" data-toggle="tab">+ Add Tab</a></li>
                    </ul>
                    <div class="tab-content inner-tab-content">
                        <div id="tab_1_1" class="tab-pane active" > 
                            <form method="post" action="">
                                <label>Select DIV:</label>
                                <select name="div_load" id="div_load">
                                    <?php echo $dropdown;?>
                                </select>


                                <h2>HTML Attributes</h2>
                                <label>Enter variable name:</label>
                                <input type="text" name="var_name" id="var_name"/><br/>

                                <label>Enter Label:</label>
                                <input type="text" name="label" id="label"/><br/>

                                <label>Select HTML Element:</label>
                                <select name="html_element" id="html_element">
                                    <option value="text_area">Text Area</option>
                                    <option value="text">Text</option>
                                    <option value="password">Password</option>
                                    <option value="Submit">Submit</option>
                                    <option value="radio">Radio</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="button">Button</option>
                                    <option value="select">Select</option>
                                    <option value="file_html">File</option>
                                    <option value="hidden">Hidden</option>
                                    <option value="label">Label</option>
                                    <option value="table">Table</option>
                                    <option value="list">List</option>
                                    <option value="form">Form</option>
                                    <option value="image">Image</option>
                                    <option value="fieldset">Filedset</option>
                                    <option value="table_row">Table row</option>
                                    <option value="table_data">Table data</option>
                                    <option value="href">Href</option>
                                </select><br/>
                                <span id="radio" style="display:none;">
                                    <label>Enter Radio button option 1:</label>
                                    <input type="text" name="radio1" />

                                    <label>Enter Radio button option 2:</label>
                                    <input type="text" name="radio2"/>
                                </span>

                                <span id="checkbox" style="display:none;">
                                    <label>Enter checkbox value 1:</label>
                                    <input type="text" name="checkbox1" />

                                    <label>Enter checkbox value 2:</label>
                                    <input type="text" name="checkbox2" />

                                    <label>Enter checkbox value 3:</label>
                                    <input type="text" name="checkbox3" />

                                    <label>Enter checkbox value 4:</label>
                                    <input type="text" name="checkbox4" />

                                    <label>Enter checkbox value 5:</label>
                                    <input type="text" name="checkbox5" />
                                </span>


                                <span id="select" style="display:none;">
                                    <label>Enter dropdown value 1:</label>
                                    <input type="text" name="select1" />

                                    <label>Enter dropdown value 2:</label>
                                    <input type="text" name="select2" />

                                    <label>Enter dropdown value 3:</label>
                                    <input type="text" name="select3" />

                                    <label>Enter dropdown value 4:</label>
                                    <input type="text" name="select4" />

                                    <label>Enter dropdown value 5:</label>
                                    <input type="text" name="select5" />
                                </span>

                                <span id="list" style="display:none;">
                                    <label>Enter list value 1:</label>
                                    <input type="text" name="list1" />

                                    <label>Enter list value 2:</label>
                                    <input type="text" name="list2" />

                                    <label>Enter list value 3:</label>
                                    <input type="text" name="list3" />

                                    <label>Enter list value 4:</label>
                                    <input type="text" name="list4" />

                                    <label>Enter list value 5:</label>
                                    <input type="text" name="list5" />
                                </span>

                                <!--<label>Enter DIV's class and ID Name:</label>
                                <input type="text" name="div_name" /><br/>-->

                                <h2>CSS Attributes</h2>
                                <label>Background Color:</label>
                                <input type="color" name="color" value="#FFFFFF" id="color"/><br/>

                                <label>Font Color:</label>
                                <input type="color" name="font_color" value="#FFFFFF" id="font_color"/><br/>

                                <label>Font Size:</label>
                                <input type="text" name="font_size" id="font_size"/><br/>


                                <!--<label>Position:</label>
                                <input type="text" name="position" />px<br/>-->

                                <label>Height:</label>
                                <input type="text" name="height" id="height"/>px<br/>

                                <label>Width:</label>
                                <input type="text" name="width" id="width"/>px<br/>

                                <label>X-position:</label>
                                <input type="text" name="x_position" id="x_position"/>px<br/>

                                <label>Y-position:</label>
                                <input type="text" name="y_position" id="y_position"/>px<br/>

                                <label>Z-index:</label>
                                <input type="text" name="z_index" id="z_index"/><br/>


                                <input type="submit" name="submit" value="save element" />
                                <input type="hidden" name="update" id="update" value="false">
                                <input type="hidden" name="update_id" id="update_id" value="0"> 
                            </form>

                        </div>                        
                    </div>
                </div>  

            </div>            
        </div>

       

    </div>





    <div id="vc_Popup" style="display: none;" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div style="background: black; color: gray;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove white" aria-hidden="true" style="color: white;"></span></button>
                    <h4 class="modal-title">PopUp</h4>
                </div>
                <div class="modal-body" style="height: 200px;"> 

                    <div>

                        <div class="col-md-12" style="margin-top: 10px;">
                            <label class=" control-label col-md-6 " style="text-align: left;" >Button Name:</label>
                            <button type="button" class="btn btn-primary col-md-6"  onclick="">Action</button>                          
                        </div>

                        <div class="col-md-12" style="margin-top: 10px;">
                            <label class=" control-label col-md-4" style="text-align: left;" >Next:</label>
                            <select class="form-control col-md-4"  id="next_dropdown" style="width: 33%;" onChange="nextDropDownChangeHandler();" >   
                                <option id="0"  selected="selected">Select one...</option>                            
                                <option id="input">input</option>                            
                                <option id="test">test</option>                            
                                <option id="goto">Goto</option>                            
                            </select>
                            <select class="form-control col-md-4"  id="goto_dropdown" style="width: 33%; display: none;" >
                                <option id="0"  selected="selected">Select one...</option>                            
                               <?php echo $goto_dropdown;?>                         
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                          
                    <button type="button" class="btn btn-primary" >OK</button>                          
                </div>
            </div>
        </div>
    </div>
</body>


    


@php
	function menuParent($data,$parent=0,$str='--',$select=0){
		foreach($data as $val){
			$id = $val->id;
			$name = $val->cat_name;
			if($val->parent_id==$parent){
				if($select!=0 && $id == $select){
					echo "<option value='$id' selected>$str $name</option>";
				}else{
					echo "<option value='$id'>$str $name</option>";
				}
				menuParent($data,$id,$str.'--',$select);
			}
		}
	}
@endphp
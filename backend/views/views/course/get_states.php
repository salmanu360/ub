        <?php
        $options="<option value=''>Select</option>";
        foreach($state as $value){
             $options .= "<option value='".$value->id."'>".$value->name."</option>";
        }
        ?>
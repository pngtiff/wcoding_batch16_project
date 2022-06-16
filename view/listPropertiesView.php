<?php
    if(count($properties)>0){
        ?>
        <div id='properties'>
            <h2>Properties</h2>
            <div id='propertiesContainer'>
                <?php
                foreach($properties as $property)
                {
                    include('propertyCard.php');
                } ?>
            </div>
        </div>
    <?php
    }else {
        echo "No properties yet :)";
    }
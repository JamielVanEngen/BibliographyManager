<?php


/*
====================================


helpers



====================================


*/


if (! function_exists('dropForeignKeysByName')) {

    /**
     * Take a table name and an array of foreign key names and drops them.
     *
     * Credits to Sergio Compean
     *
     * @param  table  $array
     * @return array
     */
  	function dropForeignKeysByName($table ,$array)
    {

        foreach ($array as $fk ) {

           echo('Dropping foreign key: '.$fk.' on '.$table."\n");

           Schema::table($table, function($t) use ($table, $fk)
            {
                $t->dropForeign($table.'_'.$fk.'_foreign');
            });


        }


    }
}

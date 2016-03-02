<?php
/**
 * Function Name
 *
 * Function description
 *
 * @access	public
 * @param	type	name
 * @return	type	
 */

if (! function_exists('get_disk'))
{
	function get_disk($param = '1024')
	{
		$Type=array("", "K", "M", "G", "T", "P", "exa", "zetta", "yotta");
		$Index=0;
		while($param>=1024)
		{
			$param/=1024;
			$Index++;
		}
		return(round($param, 2, PHP_ROUND_HALF_DOWN).' '.$Type[$Index]."B");
	}
}
?>
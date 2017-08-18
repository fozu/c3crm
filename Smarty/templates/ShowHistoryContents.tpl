{*<!--

/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/

-->*}

<table width="100%" border=0 cellspacing=0 cellpadding=0 class="small" >
     <tr><td style="padding:5px" align="right">{$RECORD_COUNTS}&nbsp;&nbsp;&nbsp;&nbsp;{$NAVIGATION}</td></tr>
</table>
<table border=0 cellspacing=1 cellpadding=3 width=100% style="background-color:#cccccc;" class="small">

	<tr style="background-color:#efefef">
		{foreach item=header from=$LIST_HEADER}
			<td class="lvtCol">{$header}</td>
		{/foreach}
	</tr>
{foreach item=entity key=entity_id from=$LIST_ENTRIES}
	<tr bgcolor=white onMouseOver="this.className='lvtColDataHover'" onMouseOut="this.className='lvtColData'"  >
	{foreach item=data from=$entity}	
		<td>{$data}</td>
	{/foreach}
	{foreachelse}
	<tr bgcolor=white>
	<td colspan="5" height="100px" align="center"><b><font size="6px">{$MOD.LBL_NO_DATA}</font></b>
	</td>
	</tr>
{/foreach}
</table>

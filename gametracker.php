<?php
# @ 2016 Vitaliy Zhukov. All rights reserved. GNU/GPL v3 licence

# Assert file included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

#GameTracker Content Plugin
class plgContentGameTracker extends JPlugin
{

	function PluginGameTracker( &$subject, $params )
	{
		parent::__construct( $subject, $params );
	}

	function onContentPrepare ( $context, &$article, &$params, $page = 0)
		{
		global $mainframe;

		if ( JString::strpos( $article->text, '{gametracker}'))
		{
            $article->text = preg_replace_callback('|{gametracker}(.*){\/gametracker}|',function ($match){return $this->GameBanner($match[1]);}, $article->text);
        }

		return true;
	}

	function GameBanner($gCode)
	{
	 	$params = $this->params;

		$width = $params->get('width', 425);
		$height = $params->get('height', 344);

		return 'somecodehere';

        /*
         * <!--550x95-->
<a href="http://www.gametracker.com/server_info/1.1.1.1:00000/" target="_blank"><img src="http://cache.www.gametracker.com/server_info/1.1.1.1:00000/b_560_95_1.png" border="0" width="560" height="95" alt=""/></a>
<!--banner red-->
<a href="http://www.gametracker.com/server_info/1.1.1.1:00000/" target="_blank"><img src="http://cache.www.gametracker.com/server_info/1.1.1.1:00000/b_350_20_692108_381007_FFFFFF_000000.png" border="0" width="350" height="20" alt=""/></a>
<!--banner orange-->
<a href="http://www.gametracker.com/server_info/1.1.1.1:00000/" target="_blank"><img src="http://cache.www.gametracker.com/server_info/1.1.1.1:00000/b_350_20_FFAD41_E98100_000000_591F11.png" border="0" width="350" height="20" alt=""/></a>

<a href="http://www.gametracker.com/server_info/1.1.1.1:00000/" target="_blank"><img src="http://cache.www.gametracker.com/server_info/1.1.1.1:00000/b_160_400_1_ffffff_c5c5c5_ffffff_000000_0_1_0.png" border="0" width="160" height="248" alt=""/></a>

<iframe src="http://cache.www.gametracker.com/components/html0/?host=1.1.1.1:00000&bgColor=333333&fontColor=CCCCCC&titleBgColor=222222&titleColor=FF9900&borderColor=555555&linkColor=FFCC00&borderLinkColor=222222&showMap=1&currentPlayersHeight=100&showCurrPlayers=1&topPlayersHeight=100&showTopPlayers=1&showBlogs=0&width=240" frameborder="0" scrolling="no" width="240" height="536"></iframe>

         */
	}
}

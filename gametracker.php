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
            $article->text = preg_replace_callback('|{gametracker}(.*){\/gametracker}|',function ($match){return $this->GameBigBanner($match[1]);}, $article->text);
        }

		return true;
	}

	function GameBigBanner($sAddr)
    {
		return '<a href="http://www.gametracker.com/server_info/'.$sAddr.'/" target="_blank"><img src="http://cache.www.gametracker.com/server_info/'.$sAddr.'/b_560_95_1.png" border="0" width="560" height="95" alt="'.$sAddr.' Big banner"/></a>';
    }

    function GameBanner($sAddr)
    {
        #var init
        $params = $this->params;

        $color = $params->get('color', 'custom'); //color preset
        $top_color = $params->get('color', '692108');
        $font_color = $params->get('color', 'FFFFFF');
        $bottom_color = $params->get('color', '381007');
        $border_color = $params->get('color', '000000');

        #logic
    switch ($color)
        {
        case 'red':
            $image = 'b_350_20_692108_381007_FFFFFF_000000.png';
            break;
        case 'orange':
            $image = 'b_350_20_FFAD41_E98100_000000_591F11.png';
            break;
        case 'green':
            $image = 'b_350_20_5A6C3E_383F2D_D2E1B5_2E3226.png';
            break;
        case 'blue':
            $image = 'b_350_20_323957_202743_F19A15_111111.png';
            break;
        case 'custom':
            $image = 'b_350_20_'.$top_color.'_'.$bottom_color.'_'.$font_color.'_'.$border_color.'.png';
            break;
        }
            return '<a href="http://www.gametracker.com/server_info/'.$sAddr.'/" target="_blank"><img src="http://cache.www.gametracker.com/server_info/'.$sAddr.'/'.$image.'" border="0" width="350" height="20" alt="GT '.$sAddr.' '.$color.' game banner"/></a>';
    }

    function GameBlock($sAddr)
    {
        #var init
        $params = $this->params;

        $color = $params->get('color', 'red');
        $font_color = $params->get('color', 'ffffff');
        $title_color = $params->get('color', 'c5c5c5');
        $name_color = $params->get('color', 'ffffff');
        $bg_color = $params->get('color', 'ffffff');
        $player_graph = $params->get('color', '1');;
        $top_players = $params->get('color', '1');;
        $map_screenshot = $params->get('color', '1');;


        #logic
        $height = 182; // wight = 160
        if($player_graph) $height = $height + 66;
        if($top_players) $height = $height + 82;
        if($map_screenshot) $height = $height + 106;
        settype($height, "string");
        switch ($color) {
            case 'custom': //color id = 0
                $image = 'b_160_400_0_'.$font_color.'_'.$title_color.'_'.$name_color.'_'.$bg_color.'_'.$map_screenshot.'_'.$player_graph.'_'.$top_players.'.png';
                break;
            case 'gray': //color id = 1
                $image = 'b_160_400_1_ffffff_c5c5c5_ffffff_000000_'.$map_screenshot.'_'.$player_graph.'_'.$top_players.'.png';
                break;
            case 'red': //color id = 2
                $image = 'b_160_400_2_ffffff_c5c5c5_ff9900_000000_'.$map_screenshot.'_'.$player_graph.'_'.$top_players.'.png';
                break;
        }

        return '<a href="http://www.gametracker.com/server_info/'.$sAddr.'/" target="_blank"><img src="http://cache.www.gametracker.com/server_info/'.$sAddr.'/b_160_400_1_ffffff_c5c5c5_ffffff_000000_0_1_0.png" border="0" width="160" height="'.$height.'" alt=""/></a>/></a>';
    }

    function GameHtmlBlock($sAddr)
    {
        #var init
        $params = $this->params;

        $color = $params->get('color', 'red');

        #logic

        return '<iframe src="http://cache.www.gametracker.com/components/html0/?host='.$sAddr.'&bgColor=333333&fontColor=CCCCCC&titleBgColor=222222&titleColor=FF9900&borderColor=555555&linkColor=FFCC00&borderLinkColor=222222&showMap=1&currentPlayersHeight=100&showCurrPlayers=1&topPlayersHeight=100&showTopPlayers=1&showBlogs=0&width=240" frameborder="0" scrolling="no" width="240" height="536"></iframe>';

    }
}

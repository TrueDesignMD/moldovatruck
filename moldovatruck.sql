-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 20 2016 г., 13:39
-- Версия сервера: 5.5.25
-- Версия PHP: 5.5.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `moldovatruck`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buianov_blocks`
--

CREATE TABLE IF NOT EXISTS `buianov_blocks` (
  `blockId` int(3) NOT NULL AUTO_INCREMENT,
  `Content` text NOT NULL,
  `Active` int(1) NOT NULL,
  `langAbb` varchar(3) NOT NULL,
  `blockName` varchar(30) NOT NULL,
  PRIMARY KEY (`blockId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `buianov_blocks`
--

INSERT INTO `buianov_blocks` (`blockId`, `Content`, `Active`, `langAbb`, `blockName`) VALUES
(1, '$_ViewForm(1);$_\n', 1, 'ru', 'formBlock');

-- --------------------------------------------------------

--
-- Структура таблицы `buianov_forms`
--

CREATE TABLE IF NOT EXISTS `buianov_forms` (
  `formId` int(3) NOT NULL AUTO_INCREMENT,
  `Content` text NOT NULL,
  `formName` varchar(25) NOT NULL,
  `langAbb` varchar(3) NOT NULL,
  PRIMARY KEY (`formId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `buianov_forms`
--

INSERT INTO `buianov_forms` (`formId`, `Content`, `formName`, `langAbb`) VALUES
(1, '<p>{jumi [cargo/mainForm.php]}</p>', 'Заказ', 'ru');

-- --------------------------------------------------------

--
-- Структура таблицы `buianov_languages`
--

CREATE TABLE IF NOT EXISTS `buianov_languages` (
  `langId` int(3) NOT NULL AUTO_INCREMENT,
  `langTitle` varchar(10) NOT NULL,
  `langIcon` varchar(255) NOT NULL,
  `langAbb` varchar(3) NOT NULL,
  PRIMARY KEY (`langId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `buianov_languages`
--

INSERT INTO `buianov_languages` (`langId`, `langTitle`, `langIcon`, `langAbb`) VALUES
(1, 'Русский', '', 'ru'),
(2, 'Romana', '', 'ro'),
(3, 'English', '', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `buianov_menu`
--

CREATE TABLE IF NOT EXISTS `buianov_menu` (
  `menuId` int(3) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Active` int(1) NOT NULL,
  `Order` int(23) NOT NULL,
  `Parent` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `menuTypeId` int(3) NOT NULL,
  `langAbb` varchar(3) NOT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=229 ;

--
-- Дамп данных таблицы `buianov_menu`
--

INSERT INTO `buianov_menu` (`menuId`, `menuName`, `URL`, `Active`, `Order`, `Parent`, `date`, `menuTypeId`, `langAbb`) VALUES
(0, 'Меню', '', 1, 0, 0, '2016-07-14 05:23:01', 1, 'ru'),
(1, 'Перевозки грузов', 'ru/perevozki-gruzov.php', 1, 9, 0, '2016-07-14 04:43:26', 1, 'ru'),
(2, 'Заказать перевозку On-line', 'ru/zakazat-on-line-transport-dlya-perevozki-gruza.php', 1, 12, 0, '2016-07-14 04:43:26', 1, 'ru'),
(3, 'Направления перевозок', 'ru/napravleniya-perevozok-/index.php', 1, 16, 0, '2016-07-14 04:43:26', 1, 'ru'),
(4, 'Авто грузоперевозки', 'ru/avtomobilnyie-perevozki-transportnyie-uslugi-servis-zakazchikam-i-partnyoram.php', 1, 11, 0, '2016-07-14 04:43:26', 1, 'ru'),
(5, 'Экспедиционные услуги', 'ru/organizatsiya-transportirovki-gruza-ekspeditorskie-uslugi.php', 1, 17, 0, '2016-07-14 04:43:26', 1, 'ru'),
(6, 'Контакты', 'ru/kontaktyi-menedzherov-otdela-gruzoperevozok-zakaz-transporta-zakaz-perevozok.php', 1, 19, 0, '2016-07-14 04:43:26', 1, 'ru'),
(7, 'О компании', 'ru/', 1, 2, 0, '2016-07-14 04:43:26', 1, 'ru'),
(8, 'Вакансии', 'ru/vakansii-transportno-ekspeditsionnaya-kompaniya-priglashaet-rabota-v-moldove-kishinyove-i-tiraspole.php', 1, 18, 0, '2016-07-14 04:43:26', 1, 'ru'),
(9, 'Новости', 'ru/novosti', 1, 3, 0, '2016-07-14 04:43:26', 1, 'ru'),
(10, 'Заказ услуг', '', 1, 1, 10, '2016-07-15 18:07:17', 2, 'ru'),
(11, 'Главные направления', '', 1, 1, 11, '2016-07-15 18:07:17', 2, 'ru'),
(12, 'Доставка посылок', '', 1, 3, 12, '2016-07-15 18:08:03', 2, 'ru'),
(13, 'Рекомендации', '', 1, 4, 13, '2016-07-15 18:08:03', 2, 'ru'),
(14, 'Типы грузоперевозок', '', 1, 14, 14, '2016-07-15 18:08:44', 2, 'ru'),
(15, 'Перевозки товарных груп', '', 1, 1, 15, '2016-07-15 18:08:44', 2, 'ru'),
(16, 'Морские, контейнерные перевозки', '', 1, 1, 16, '2016-07-15 18:09:31', 2, 'ru'),
(17, 'Пассажирские перевозки', '', 1, 1, 17, '2016-07-15 18:09:31', 2, 'ru'),
(18, 'Инфо-Новости', '', 1, 1, 18, '2016-07-15 18:09:57', 2, 'ru'),
(19, 'Для грузовладельцев и заказчиков перевозок', 'ru/dlya-gruzovladeltsev-i-zakazchikov-perevozok.php', 1, 1, 10, '2016-07-15 18:34:04', 2, 'ru'),
(20, 'Расчитать бюджет перевозки', 'ru/kak-rasschitat-byudzhet-perevozki-nepereplachivaya-perevozchiku-za-dostavku-gruza.php', 1, 2, 10, '2016-07-15 18:34:04', 2, 'ru'),
(21, 'Правильно заказать перевозку', 'ru/pravilno-zakazat-perevozku-bez-uscherba-dlya-kompanii.php', 1, 3, 10, '2016-07-15 18:34:04', 2, 'ru'),
(22, 'Как найти транспортную компанию ', 'ru/kak-nayti-nedoroguyu-transportnuyu-kompaniyu-v-internete-i-zakazat-perevozku.php', 1, 4, 10, '2016-07-15 18:34:04', 2, 'ru'),
(23, 'Таможенно-брокерские услуги  в Молдове и Приднестровье', 'ru/tamozhenno-brokerskie-uslugi-v-moldove-i-pridnestrove.php', 1, 5, 10, '2016-07-15 18:34:04', 2, 'ru'),
(24, 'Заказать перевозку ON-LINE', 'ru/zakazat-on-line-transport-dlya-perevozki-gruza.php', 1, 6, 10, '2016-07-15 18:34:05', 2, 'ru'),
(25, 'Как оплатить за грузоперевозку', 'ru/kak-oplatit-za-mezhdunarodnuyu-gruzoperevozku.php', 1, 7, 10, '2016-07-15 18:34:05', 2, 'ru'),
(26, 'Грузоперевозки Румыния', 'ru/gruzoperevozki-rumyiniya-rossiya-ukraina-belarus-pribaltika-finlyandiya-i-obratno-v-rumyiniyu.php', 1, 1, 11, '2016-07-15 18:34:05', 2, 'ru'),
(27, 'Перевозки из Турции', 'ru/perevozki-iz-turtsii-v-rossiyu-perevozki-iz-turtsii-v-moldovu-ukrainu-belarus.php', 1, 2, 11, '2016-07-15 18:34:05', 2, 'ru'),
(28, 'Перевозки грузов Балканы', 'ru/perevozki-gruzov-balkanyi-stranyi-sng.php', 1, 3, 11, '2016-07-15 18:34:05', 2, 'ru'),
(29, 'Перевозки из Европы', 'ru/perevozki-iz-evropyi-v-moldovu-rossiyu.-obratnyie-perevozki-v-evropu.php', 1, 4, 11, '2016-07-15 18:34:05', 2, 'ru'),
(30, 'Перевозки Молдова', 'ru/perevozki-iz-moldovyi-v-rossiyu-evropu-dostavka-gruzov-iz-i-v-turtsiyu-finlyandiyu-pribaltiku.php', 1, 5, 11, '2016-07-15 18:34:05', 2, 'ru'),
(31, 'Перевозки: города России', 'ru/perevozki-iz-gorodov-rossii-v-rumyiniyu-moldaviyu-bolgariyu-serbiyu.php', 1, 6, 11, '2016-07-15 18:34:05', 2, 'ru'),
(32, 'Грузоперевозки в Приднестровье', 'ru/gruzoperevozki-v-pridnestrove-transportnyie-uslugi-po-dostavke-gruzov-v-pmr.php', 1, 7, 11, '2016-07-15 18:34:05', 2, 'ru'),
(33, 'Международные перевозки посылок', 'ru/dostavka-posyilok/mezhdunarodnyie-perevozki-posyilok.php', 1, 1, 12, '2016-07-15 18:34:05', 2, 'ru'),
(34, 'Транспорт для перевозки посылок', 'ru/dostavka-posyilok/transport-dlya-perevozki-posyilok.php', 1, 2, 12, '2016-07-15 18:34:05', 2, 'ru'),
(35, 'Стоимость доставки посылки', 'ru/dostavka-posyilok/stoimost-dostavki-posyilki.php', 1, 3, 12, '2016-07-15 18:34:05', 2, 'ru'),
(36, 'Памятка для перевозчика', 'ru/pamyatka-i-rekomendatsii-dlya-perevozchika.php', 1, 1, 13, '2016-07-15 18:34:05', 2, 'ru'),
(37, 'Рекомендуем при перевозках', 'ru/rekomendatsii-dlya-transportnoy-kompanii-pri-perevozki-gruzov.php', 1, 2, 13, '2016-07-15 18:34:05', 2, 'ru'),
(38, 'Рекомендуем транспортнику', 'ru/rekomendatsii-dlya-uchastnikov-transportnyih-gruzovyih-perevozok.php', 1, 3, 13, '2016-07-15 18:34:05', 2, 'ru'),
(39, 'Рекомендации перевозчику', 'ru/rekomendatsii-perevozchiku-pri-priyome-gruza.php', 1, 4, 13, '2016-07-15 18:34:05', 2, 'ru'),
(40, 'Рекомендации водителям в пути', 'ru/rekomendatsii-pri-perevozki-gruzov-v-puti-sledovaniya.php', 1, 5, 13, '2016-07-15 18:34:05', 2, 'ru'),
(41, 'Безопасные перевозки', 'ru/bezopasnost-gruzoperevozok.php', 1, 6, 13, '2016-07-15 18:34:05', 2, 'ru'),
(42, 'Поиск грузов, найти груз в Интернете', 'ru/poisk-gruzov-nayti-gruz-v-internete.php', 1, 7, 13, '2016-07-15 18:34:05', 2, 'ru'),
(43, 'Типы перевозок', 'ru/tipyi-perevozok-zakaz-transporta-vse-vidyi-gruzoperevozok.php', 1, 1, 14, '2016-07-15 18:34:05', 2, 'ru'),
(44, 'Перевозка сборных грузов ', 'ru/perevozka-sbornyih-gruzov-iz-turtsii-rossii.-evropyi.php', 1, 2, 14, '2016-07-15 18:34:05', 2, 'ru'),
(45, 'Перевозка опасных грузов', 'ru/perevozka-opasnyih-gruzov-iz-rossii-evropyi-turtsii-v-moldovu-rumyiniyu.php', 1, 3, 14, '2016-07-15 18:34:05', 2, 'ru'),
(46, 'Перевозка негабаритных грузов ', 'ru/perevozka-obyomnyih-i-negabaritnyih-gruzov.php', 1, 4, 14, '2016-07-15 18:34:05', 2, 'ru'),
(47, 'Перевозка грузов рефрижераторами', 'ru/perevozka-produktov-pitaniya-i-skoroportyaschihsya-produktov-refrizheratorami.php', 1, 5, 14, '2016-07-15 18:34:05', 2, 'ru'),
(48, 'Автоперевозки контейнеров ', 'ru/avtoperevozki-konteynerov.php', 1, 6, 14, '2016-07-15 18:34:05', 2, 'ru'),
(49, 'Перевозка сыпучих и жидких грузов', 'ru/perevozka-syipuchih-i-zhidkih-gruzov.php', 1, 7, 14, '2016-07-15 18:34:05', 2, 'ru'),
(50, 'Перевозка автомобилей', 'ru/perevozka-avtomobiley.php', 1, 8, 14, '2016-07-15 18:34:05', 2, 'ru'),
(51, 'Мультимодальные перевозки', 'ru/multimodalnyie-perevozki-gruzov-avto-more-avia-zh-d.php', 1, 9, 14, '2016-07-15 18:34:05', 2, 'ru'),
(52, 'Перевозка зерна', 'ru/perevozka-zerna-zernovozyi-dlya-perevozok-zernovyih.php', 1, 10, 14, '2016-07-15 18:34:05', 2, 'ru'),
(53, 'Перевозка спецтехники', 'ru/perevozka-spetstehniki-transport-dlya-perevozki-agrotehniki.php', 1, 11, 14, '2016-07-15 18:34:05', 2, 'ru'),
(54, 'Железнодорожные грузоперевозки', 'ru/zheleznodorozhnyie-gruzoperevozki.-polnyiy-kompleks-uslug-perevozka-gruzov-vsemi-tipami-zh.d.-vagonami.php', 1, 12, 14, '2016-07-15 18:34:05', 2, 'ru'),
(55, 'Авиа перевозки грузов', 'ru/avia-perevozki-gruzov-avia-dostavka-gruza.php', 1, 13, 14, '2016-07-15 18:34:05', 2, 'ru'),
(56, 'Перевозка продуктов питания', 'ru/pravilnaya-perevozka-produktov-pitaniya-vsemi-vidami-transporta.php', 1, 1, 15, '2016-07-15 18:34:05', 2, 'ru'),
(57, 'Перевозка лекарств', 'ru/perevozka-lekarstv-i-lekarstvennyih-preparatov-medikamentov-i-badov.php', 1, 2, 15, '2016-07-15 18:34:05', 2, 'ru'),
(58, 'Перевозки стройматериалов', 'ru/perevozka-stroymaterialov-dlya-stroitelstva-i-remonta.php', 1, 3, 15, '2016-07-15 18:34:05', 2, 'ru'),
(59, 'Перевозка мебели', 'ru/perevozka-mebeli-iz-dereva-perevozki-myagkoy-mebeli.php', 1, 4, 15, '2016-07-15 18:34:05', 2, 'ru'),
(60, 'Перевозка одежды и обуви', 'ru/perevozki-shveynyih-izdeliy-tkaney-i-gotovoy-odezhdyi-na-veshalkah.php', 1, 5, 15, '2016-07-15 18:34:05', 2, 'ru'),
(61, 'Перевозка авто запчастей', 'ru/perevozki-zapchastey-avtomasel-perevozki-avtoshin.php', 1, 6, 15, '2016-07-15 18:34:05', 2, 'ru'),
(62, 'Перевозка оборудования', 'ru/perevozka-oborudovaniya-avto-perevozka-stankov-iz-evropyi-.-rossii-.-ukrainyi-rumyinii.php', 1, 7, 15, '2016-07-15 18:34:05', 2, 'ru'),
(63, 'Грузоперевозки бумаги', 'ru/perevozki-bumagi-i-izdeliy-iz-bumagi.php', 1, 8, 15, '2016-07-15 18:34:05', 2, 'ru'),
(64, 'Перевозка бытовой химии', 'ru/perevozki-stiralnyih-poroshkov-i-byitovoy-kosmetiki-himii.php', 1, 9, 15, '2016-07-15 18:34:05', 2, 'ru'),
(65, 'Перевозки домашних вещей', 'ru/perevozka-lichnyih-i-domashnih-veschey-pereezd-na-p.m.zh.php', 1, 10, 15, '2016-07-15 18:34:05', 2, 'ru'),
(66, 'Перевозка цветов', 'ru/perevozka-tsvetov-avto-i-avia-dostavka-tsvetochnoy-produktsii.php', 1, 11, 15, '2016-07-15 18:34:05', 2, 'ru'),
(67, 'Контейнерные перевозки', 'ru/konteynernyie-perevozki-po-moryu-i-avto-konteynerovozami.php', 1, 1, 16, '2016-07-15 18:34:05', 2, 'ru'),
(68, 'Правила морских перевозок', 'ru/pravila-morskih-perevozok.php', 1, 2, 16, '2016-07-15 18:34:05', 2, 'ru'),
(69, 'Организация морской перевозки', 'ru/organizatsiya-morskoy-perevozki.php', 1, 3, 16, '2016-07-15 18:34:05', 2, 'ru'),
(70, 'Стоимость морских грузоперевозок', 'ru/stoimost-morskih-gruzoperevozok.php', 1, 4, 16, '2016-07-15 18:34:05', 2, 'ru'),
(71, 'Типы контейнеров', 'ru/tipyi-i-razmeryi-morskih-konteynerov-ispolzuemyie-dlya-morskih-perevozok.php', 1, 5, 16, '2016-07-15 18:34:05', 2, 'ru'),
(72, 'Условия грузоперевозок: incoterms', 'ru/usloviya-gruzoperevozok-inkoterms-incoterms-morskie-i-multimodalnyie-gruzoperevozki.php', 1, 6, 16, '2016-07-15 18:34:05', 2, 'ru'),
(73, 'Международные пассажирские перевозки', 'ru/mezhdunarodnyie-passazhirskie-perevozki.php', 1, 1, 17, '2016-07-15 18:34:05', 2, 'ru'),
(74, 'Пассажирский транспорт', 'ru/passazhirskiy-transport.php', 1, 2, 17, '2016-07-15 18:34:05', 2, 'ru'),
(75, 'Стоимость пассажирской перевозки', 'ru/stoimost-passazhirskoy-perevozki.php', 1, 3, 17, '2016-07-15 18:34:05', 2, 'ru'),
(76, 'Пассажирские перевозки СНГ', 'ru/passazhirskie-perevozki-sng.php', 1, 4, 17, '2016-07-15 18:34:05', 2, 'ru'),
(77, 'Пассажирские перевозки страны Европы', 'ru/passazhirskie-perevozki-stranyi-evropyi.php', 1, 5, 17, '2016-07-15 18:34:05', 2, 'ru'),
(78, 'Торговые отношения России, Молдовы, Гагаузии, Приднестровья – объективный взгляд на ситуацию.', 'ru/novosti/torgovyie-otnosheniya-rossii-moldovyi-gagauzii-pridnestrovya-obektivnyiy-vzglyad-na-situatsiyu.php', 1, 6, 18, '2016-07-15 18:34:05', 2, 'ru'),
(79, 'Подать объявление о транспортных услугах, объявления грузоперевозок, таможенных услугах.', 'ru/novosti/podat-obyavlenie-o-transportnyih-uslugah-obyavleniya-gruzoperevozok-tamozhennyih-uslugah.php', 1, 7, 18, '2016-07-15 18:34:05', 2, 'ru'),
(80, 'Написать отзыв, оставить отзыв, поиск отзывов на компанию клиента, перевозчика, экспедитора.', 'ru/novosti/napisat-otzyiv-ostavit-otzyiv-poisk-otzyivov-na-kompaniyu-klienta-perevozchika-ekspeditora.php', 1, 8, 18, '2016-07-15 18:34:05', 2, 'ru'),
(81, 'Транспортный сайт биржа грузов и транспорта для перевозчиков и грузовладельцев ', 'ru/novosti/transportnyiy-sayt-birzha-gruzov-i-transporta-dlya-perevozchikov-i-gruzovladeltsev.php', 1, 9, 18, '2016-07-15 18:34:05', 2, 'ru'),
(82, 'Транспортный грузовой сайт, транспортная и грузовая биржа.', 'ru/novosti/transportnyiy-gruzovoy-sayt-transportnaya-i-gruzovaya-birzha.php', 1, 10, 18, '2016-07-15 18:34:05', 2, 'ru'),
(83, 'Экспедиционные услуги,  грузовладельцам поиск транспорта .', 'ru/novosti/ekspeditsionnyie-uslugi-gruzovladeltsam-poisk-transporta.php', 1, 11, 18, '2016-07-15 18:34:05', 2, 'ru'),
(84, 'Перевозки грузов в Молдову , и таможенные правила, брокерские услуги ', 'ru/novosti/perevozki-gruzov-v-moldovu-i-tamozhennyie-pravila-brokerskie-uslugi.php', 1, 12, 18, '2016-07-15 18:34:05', 2, 'ru'),
(85, 'Транспортный сайт- быстрый заказ транспортных услуг.', 'ru/novosti/transportnyiy-sayt-byistryiy-zakaz-transportnyih-uslug.php', 1, 13, 18, '2016-07-15 18:34:05', 2, 'ru'),
(86, 'Особенности перевозок, решения транспортных задач страны СНГ', 'ru/novosti/osobennosti-perevozok-resheniya-transportnyih-zadach-stranyi-sng.php', 1, 14, 18, '2016-07-15 18:34:05', 2, 'ru'),
(87, 'Договор на международную перевозку грузов', 'ru/novosti/dogovor-na-mezhdunarodnuyu-perevozku-gruzov.php', 1, 15, 18, '2016-07-15 18:34:05', 2, 'ru'),
(90, 'Перевозки меню', '', 1, 1, 90, '2016-07-15 19:25:32', 3, 'ru'),
(91, 'Перевозки грузов страны Европы', 'ru/avtomobilnyie-gruzoperevozki-evropa.php', 1, 1, 90, '2016-07-15 19:26:47', 3, 'ru'),
(92, 'Перевозки грузов страны СНГ', 'ru/perevozki-gruzov-rossia-sng.php', 1, 2, 90, '2016-07-15 19:26:47', 3, 'ru'),
(93, 'Перевозки грузов страны Азии', 'ru/perevozka-dostavka-gruza-iz-i-v-stranyi-azii.php', 1, 3, 90, '2016-07-15 19:28:31', 3, 'ru'),
(94, 'Транспорт для автоперевозок ', 'ru/tipyi-transporta-dlya-gruzovyih-avtoperevozok-nayti-transport-zakazat-perevozku-2.php', 1, 4, 90, '2016-07-15 19:28:31', 3, 'ru'),
(95, 'Расчитать стоимость перевозки', 'ru/raschitat-stoimost-perevozki-zakazat-transportirovku-gruza.php', 1, 5, 90, '2016-07-15 19:29:58', 3, 'ru'),
(96, 'Предложения', '', 1, 1, 96, '2016-07-15 19:29:58', 4, 'ru'),
(97, 'Грузы', 'ru/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php', 1, 1, 96, '2016-07-15 19:30:47', 4, 'ru'),
(98, 'Транспорт', 'ru/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php', 1, 2, 96, '2016-07-15 19:30:47', 4, 'ru'),
(99, 'Предложить транспорт', 'ru/razmestit-transport-dobavit-svobodnyiy-transport-nayti-gruz.php', 1, 3, 96, '2016-07-15 19:32:02', 4, 'ru'),
(100, 'Предложить груз', 'ru/razmestit-gruz-dobavit-gruz-zakazat-perevozku-nayti-transport.php', 1, 3, 96, '2016-07-15 19:32:02', 4, 'ru'),
(101, 'Предложения грузов/транспорта', 'ru/svodnaya-tablitsa-gruzov-transporta-po-stranam-statistika-transporta-i-gruzov.php', 1, 5, 96, '2016-07-15 19:32:44', 4, 'ru'),
(102, 'Заказ услуг', '', 1, 1, 10, '2016-07-15 18:07:17', 5, 'ru'),
(103, 'Главные направления', '', 1, 1, 11, '2016-07-15 18:07:17', 5, 'ru'),
(104, 'Доставка посылок', '', 1, 3, 12, '2016-07-15 18:08:03', 5, 'ru'),
(105, 'Рекомендации', '', 1, 4, 13, '2016-07-15 18:08:03', 5, 'ru'),
(106, 'Типы грузоперевозок', '', 1, 14, 14, '2016-07-15 18:08:44', 5, 'ru'),
(107, 'Перевозки товарных груп', '', 1, 1, 15, '2016-07-15 18:08:44', 5, 'ru'),
(108, 'Морские, контейнерные перевозки', '', 1, 1, 16, '2016-07-15 18:09:31', 5, 'ru'),
(109, 'Пассажирские перевозки', '', 1, 1, 17, '2016-07-15 18:09:31', 5, 'ru'),
(110, 'Инфо-Новости', '', 1, 1, 18, '2016-07-15 18:09:57', 5, 'ru'),
(111, 'Для грузовладельцев и заказчиков перевозок', 'ru/dlya-gruzovladeltsev-i-zakazchikov-perevozok.php', 1, 1, 10, '2016-07-15 18:34:04', 5, 'ru'),
(112, 'Расчитать бюджет перевозки', 'ru/kak-rasschitat-byudzhet-perevozki-nepereplachivaya-perevozchiku-za-dostavku-gruza.php', 1, 2, 10, '2016-07-15 18:34:04', 5, 'ru'),
(113, 'Правильно заказать перевозку', 'ru/pravilno-zakazat-perevozku-bez-uscherba-dlya-kompanii.php', 1, 3, 10, '2016-07-15 18:34:04', 5, 'ru'),
(114, 'Как найти транспортную компанию ', 'ru/kak-nayti-nedoroguyu-transportnuyu-kompaniyu-v-internete-i-zakazat-perevozku.php', 1, 4, 10, '2016-07-15 18:34:04', 5, 'ru'),
(115, 'Таможенно-брокерские услуги  в Молдове и Приднестровье', 'ru/tamozhenno-brokerskie-uslugi-v-moldove-i-pridnestrove.php', 1, 5, 10, '2016-07-15 18:34:04', 5, 'ru'),
(116, 'Заказать перевозку ON-LINE', 'ru/zakazat-on-line-transport-dlya-perevozki-gruza.php', 1, 6, 10, '2016-07-15 18:34:05', 5, 'ru'),
(117, 'Как оплатить за грузоперевозку', 'ru/kak-oplatit-za-mezhdunarodnuyu-gruzoperevozku.php', 1, 7, 10, '2016-07-15 18:34:05', 5, 'ru'),
(118, 'Грузоперевозки Румыния', 'ru/gruzoperevozki-rumyiniya-rossiya-ukraina-belarus-pribaltika-finlyandiya-i-obratno-v-rumyiniyu.php', 1, 1, 11, '2016-07-15 18:34:05', 5, 'ru'),
(119, 'Перевозки из Турции', 'ru/perevozki-iz-turtsii-v-rossiyu-perevozki-iz-turtsii-v-moldovu-ukrainu-belarus.php', 1, 2, 11, '2016-07-15 18:34:05', 5, 'ru'),
(120, 'Перевозки грузов Балканы', 'ru/perevozki-gruzov-balkanyi-stranyi-sng.php', 1, 3, 11, '2016-07-15 18:34:05', 5, 'ru'),
(121, 'Перевозки из Европы', 'ru/perevozki-iz-evropyi-v-moldovu-rossiyu.-obratnyie-perevozki-v-evropu.php', 1, 4, 11, '2016-07-15 18:34:05', 5, 'ru'),
(122, 'Перевозки Молдова', 'ru/perevozki-iz-moldovyi-v-rossiyu-evropu-dostavka-gruzov-iz-i-v-turtsiyu-finlyandiyu-pribaltiku.php', 1, 5, 11, '2016-07-15 18:34:05', 5, 'ru'),
(123, 'Перевозки: города России', 'ru/perevozki-iz-gorodov-rossii-v-rumyiniyu-moldaviyu-bolgariyu-serbiyu.php', 1, 6, 11, '2016-07-15 18:34:05', 5, 'ru'),
(124, 'Грузоперевозки в Приднестровье', 'ru/gruzoperevozki-v-pridnestrove-transportnyie-uslugi-po-dostavke-gruzov-v-pmr.php', 1, 7, 11, '2016-07-15 18:34:05', 5, 'ru'),
(125, 'Международные перевозки посылок', 'ru/dostavka-posyilok/mezhdunarodnyie-perevozki-posyilok.php', 1, 1, 12, '2016-07-15 18:34:05', 5, 'ru'),
(126, 'Транспорт для перевозки посылок', 'ru/dostavka-posyilok/transport-dlya-perevozki-posyilok.php', 1, 2, 12, '2016-07-15 18:34:05', 5, 'ru'),
(127, 'Стоимость доставки посылки', 'ru/dostavka-posyilok/stoimost-dostavki-posyilki.php', 1, 3, 12, '2016-07-15 18:34:05', 5, 'ru'),
(128, 'Памятка для перевозчика', 'ru/pamyatka-i-rekomendatsii-dlya-perevozchika.php', 1, 1, 13, '2016-07-15 18:34:05', 5, 'ru'),
(129, 'Рекомендуем при перевозках', 'ru/rekomendatsii-dlya-transportnoy-kompanii-pri-perevozki-gruzov.php', 1, 2, 13, '2016-07-15 18:34:05', 5, 'ru'),
(130, 'Рекомендуем транспортнику', 'ru/rekomendatsii-dlya-uchastnikov-transportnyih-gruzovyih-perevozok.php', 1, 3, 13, '2016-07-15 18:34:05', 5, 'ru'),
(131, 'Рекомендации перевозчику', 'ru/rekomendatsii-perevozchiku-pri-priyome-gruza.php', 1, 4, 13, '2016-07-15 18:34:05', 5, 'ru'),
(132, 'Рекомендации водителям в пути', 'ru/rekomendatsii-pri-perevozki-gruzov-v-puti-sledovaniya.php', 1, 5, 13, '2016-07-15 18:34:05', 5, 'ru'),
(133, 'Безопасные перевозки', 'ru/bezopasnost-gruzoperevozok.php', 1, 6, 13, '2016-07-15 18:34:05', 5, 'ru'),
(134, 'Поиск грузов, найти груз в Интернете', 'ru/poisk-gruzov-nayti-gruz-v-internete.php', 1, 7, 13, '2016-07-15 18:34:05', 5, 'ru'),
(135, 'Типы перевозок', 'ru/tipyi-perevozok-zakaz-transporta-vse-vidyi-gruzoperevozok.php', 1, 1, 14, '2016-07-15 18:34:05', 5, 'ru'),
(136, 'Перевозка сборных грузов ', 'ru/perevozka-sbornyih-gruzov-iz-turtsii-rossii.-evropyi.php', 1, 2, 14, '2016-07-15 18:34:05', 5, 'ru'),
(137, 'Перевозка опасных грузов', 'ru/perevozka-opasnyih-gruzov-iz-rossii-evropyi-turtsii-v-moldovu-rumyiniyu.php', 1, 3, 14, '2016-07-15 18:34:05', 5, 'ru'),
(138, 'Перевозка негабаритных грузов ', 'ru/perevozka-obyomnyih-i-negabaritnyih-gruzov.php', 1, 4, 14, '2016-07-15 18:34:05', 5, 'ru'),
(139, 'Перевозка грузов рефрижераторами', 'ru/perevozka-produktov-pitaniya-i-skoroportyaschihsya-produktov-refrizheratorami.php', 1, 5, 14, '2016-07-15 18:34:05', 5, 'ru'),
(140, 'Автоперевозки контейнеров ', 'ru/avtoperevozki-konteynerov.php', 1, 6, 14, '2016-07-15 18:34:05', 5, 'ru'),
(141, 'Перевозка сыпучих и жидких грузов', 'ru/perevozka-syipuchih-i-zhidkih-gruzov.php', 1, 7, 14, '2016-07-15 18:34:05', 5, 'ru'),
(142, 'Перевозка автомобилей', 'ru/perevozka-avtomobiley.php', 1, 8, 14, '2016-07-15 18:34:05', 5, 'ru'),
(143, 'Мультимодальные перевозки', 'ru/multimodalnyie-perevozki-gruzov-avto-more-avia-zh-d.php', 1, 9, 14, '2016-07-15 18:34:05', 5, 'ru'),
(144, 'Перевозка зерна', 'ru/perevozka-zerna-zernovozyi-dlya-perevozok-zernovyih.php', 1, 10, 14, '2016-07-15 18:34:05', 5, 'ru'),
(145, 'Перевозка спецтехники', 'ru/perevozka-spetstehniki-transport-dlya-perevozki-agrotehniki.php', 1, 11, 14, '2016-07-15 18:34:05', 5, 'ru'),
(146, 'Железнодорожные грузоперевозки', 'ru/zheleznodorozhnyie-gruzoperevozki.-polnyiy-kompleks-uslug-perevozka-gruzov-vsemi-tipami-zh.d.-vagonami.php', 1, 12, 14, '2016-07-15 18:34:05', 5, 'ru'),
(147, 'Авиа перевозки грузов', 'ru/avia-perevozki-gruzov-avia-dostavka-gruza.php', 1, 13, 14, '2016-07-15 18:34:05', 5, 'ru'),
(148, 'Перевозка продуктов питания', 'ru/pravilnaya-perevozka-produktov-pitaniya-vsemi-vidami-transporta.php', 1, 1, 15, '2016-07-15 18:34:05', 5, 'ru'),
(149, 'Перевозка лекарств', 'ru/perevozka-lekarstv-i-lekarstvennyih-preparatov-medikamentov-i-badov.php', 1, 2, 15, '2016-07-15 18:34:05', 5, 'ru'),
(150, 'Перевозки стройматериалов', 'ru/perevozka-stroymaterialov-dlya-stroitelstva-i-remonta.php', 1, 3, 15, '2016-07-15 18:34:05', 5, 'ru'),
(151, 'Перевозка мебели', 'ru/perevozka-mebeli-iz-dereva-perevozki-myagkoy-mebeli.php', 1, 4, 15, '2016-07-15 18:34:05', 5, 'ru'),
(152, 'Перевозка одежды и обуви', 'ru/perevozki-shveynyih-izdeliy-tkaney-i-gotovoy-odezhdyi-na-veshalkah.php', 1, 5, 15, '2016-07-15 18:34:05', 5, 'ru'),
(153, 'Перевозка авто запчастей', 'ru/perevozki-zapchastey-avtomasel-perevozki-avtoshin.php', 1, 6, 15, '2016-07-15 18:34:05', 5, 'ru'),
(154, 'Перевозка оборудования', 'ru/perevozka-oborudovaniya-avto-perevozka-stankov-iz-evropyi-.-rossii-.-ukrainyi-rumyinii.php', 1, 7, 15, '2016-07-15 18:34:05', 5, 'ru'),
(155, 'Грузоперевозки бумаги', 'ru/perevozki-bumagi-i-izdeliy-iz-bumagi.php', 1, 8, 15, '2016-07-15 18:34:05', 5, 'ru'),
(156, 'Перевозка бытовой химии', 'ru/perevozki-stiralnyih-poroshkov-i-byitovoy-kosmetiki-himii.php', 1, 9, 15, '2016-07-15 18:34:05', 5, 'ru'),
(157, 'Перевозки домашних вещей', 'ru/perevozka-lichnyih-i-domashnih-veschey-pereezd-na-p.m.zh.php', 1, 10, 15, '2016-07-15 18:34:05', 5, 'ru'),
(158, 'Перевозка цветов', 'ru/perevozka-tsvetov-avto-i-avia-dostavka-tsvetochnoy-produktsii.php', 1, 11, 15, '2016-07-15 18:34:05', 5, 'ru'),
(159, 'Контейнерные перевозки', 'ru/konteynernyie-perevozki-po-moryu-i-avto-konteynerovozami.php', 1, 1, 16, '2016-07-15 18:34:05', 5, 'ru'),
(160, 'Правила морских перевозок', 'ru/pravila-morskih-perevozok.php', 1, 2, 16, '2016-07-15 18:34:05', 5, 'ru'),
(161, 'Организация морской перевозки', 'ru/organizatsiya-morskoy-perevozki.php', 1, 3, 16, '2016-07-15 18:34:05', 5, 'ru'),
(162, 'Стоимость морских грузоперевозок', 'ru/stoimost-morskih-gruzoperevozok.php', 1, 4, 16, '2016-07-15 18:34:05', 5, 'ru'),
(163, 'Типы контейнеров', 'ru/tipyi-i-razmeryi-morskih-konteynerov-ispolzuemyie-dlya-morskih-perevozok.php', 1, 5, 16, '2016-07-15 18:34:05', 5, 'ru'),
(164, 'Условия грузоперевозок: incoterms', 'ru/usloviya-gruzoperevozok-inkoterms-incoterms-morskie-i-multimodalnyie-gruzoperevozki.php', 1, 6, 16, '2016-07-15 18:34:05', 5, 'ru'),
(165, 'Международные пассажирские перевозки', 'ru/mezhdunarodnyie-passazhirskie-perevozki.php', 1, 1, 17, '2016-07-15 18:34:05', 5, 'ru'),
(166, 'Пассажирский транспорт', 'ru/passazhirskiy-transport.php', 1, 2, 17, '2016-07-15 18:34:05', 5, 'ru'),
(167, 'Стоимость пассажирской перевозки', 'ru/stoimost-passazhirskoy-perevozki.php', 1, 3, 17, '2016-07-15 18:34:05', 5, 'ru'),
(168, 'Пассажирские перевозки СНГ', 'ru/passazhirskie-perevozki-sng.php', 1, 4, 17, '2016-07-15 18:34:05', 5, 'ru'),
(169, 'Пассажирские перевозки страны Европы', 'ru/passazhirskie-perevozki-stranyi-evropyi.php', 1, 5, 17, '2016-07-15 18:34:05', 5, 'ru'),
(170, 'Торговые отношения России, Молдовы, Гагаузии, Приднестровья – объективный взгляд на ситуацию.', 'ru/novosti/torgovyie-otnosheniya-rossii-moldovyi-gagauzii-pridnestrovya-obektivnyiy-vzglyad-na-situatsiyu.php', 1, 6, 18, '2016-07-15 18:34:05', 5, 'ru'),
(171, 'Подать объявление о транспортных услугах, объявления грузоперевозок, таможенных услугах.', 'ru/novosti/podat-obyavlenie-o-transportnyih-uslugah-obyavleniya-gruzoperevozok-tamozhennyih-uslugah.php', 1, 7, 18, '2016-07-15 18:34:05', 5, 'ru'),
(172, 'Написать отзыв, оставить отзыв, поиск отзывов на компанию клиента, перевозчика, экспедитора.', 'ru/novosti/napisat-otzyiv-ostavit-otzyiv-poisk-otzyivov-na-kompaniyu-klienta-perevozchika-ekspeditora.php', 1, 8, 18, '2016-07-15 18:34:05', 5, 'ru'),
(173, 'Транспортный сайт биржа грузов и транспорта для перевозчиков и грузовладельцев ', 'ru/novosti/transportnyiy-sayt-birzha-gruzov-i-transporta-dlya-perevozchikov-i-gruzovladeltsev.php', 1, 9, 18, '2016-07-15 18:34:05', 5, 'ru'),
(174, 'Транспортный грузовой сайт, транспортная и грузовая биржа.', 'ru/novosti/transportnyiy-gruzovoy-sayt-transportnaya-i-gruzovaya-birzha.php', 1, 10, 18, '2016-07-15 18:34:05', 5, 'ru'),
(175, 'Экспедиционные услуги,  грузовладельцам поиск транспорта .', 'ru/novosti/ekspeditsionnyie-uslugi-gruzovladeltsam-poisk-transporta.php', 1, 11, 18, '2016-07-15 18:34:05', 5, 'ru'),
(176, 'Перевозки грузов в Молдову , и таможенные правила, брокерские услуги ', 'ru/novosti/perevozki-gruzov-v-moldovu-i-tamozhennyie-pravila-brokerskie-uslugi.php', 1, 12, 18, '2016-07-15 18:34:05', 5, 'ru'),
(177, 'Транспортный сайт- быстрый заказ транспортных услуг.', 'ru/novosti/transportnyiy-sayt-byistryiy-zakaz-transportnyih-uslug.php', 1, 13, 18, '2016-07-15 18:34:05', 5, 'ru'),
(178, 'Особенности перевозок, решения транспортных задач страны СНГ', 'ru/novosti/osobennosti-perevozok-resheniya-transportnyih-zadach-stranyi-sng.php', 1, 14, 18, '2016-07-15 18:34:05', 5, 'ru'),
(179, 'Договор на международную перевозку грузов', 'ru/novosti/dogovor-na-mezhdunarodnuyu-perevozku-gruzov.php', 1, 15, 18, '2016-07-15 18:34:05', 5, 'ru'),
(180, 'Перевозки меню', '', 1, 1, 90, '2016-07-15 19:25:32', 5, 'ru'),
(181, 'Перевозки грузов страны Европы', 'ru/avtomobilnyie-gruzoperevozki-evropa.php', 1, 1, 90, '2016-07-15 19:26:47', 5, 'ru'),
(182, 'Перевозки грузов страны СНГ', 'ru/perevozki-gruzov-rossia-sng.php', 1, 2, 90, '2016-07-15 19:26:47', 5, 'ru'),
(183, 'Перевозки грузов страны Азии', 'ru/perevozka-dostavka-gruza-iz-i-v-stranyi-azii.php', 1, 3, 90, '2016-07-15 19:28:31', 5, 'ru'),
(184, 'Транспорт для автоперевозок ', 'ru/tipyi-transporta-dlya-gruzovyih-avtoperevozok-nayti-transport-zakazat-perevozku-2.php', 1, 4, 90, '2016-07-15 19:28:31', 5, 'ru'),
(185, 'Расчитать стоимость перевозки', 'ru/raschitat-stoimost-perevozki-zakazat-transportirovku-gruza.php', 1, 5, 90, '2016-07-15 19:29:58', 5, 'ru'),
(186, 'Предложения', '', 1, 1, 96, '2016-07-15 19:29:58', 5, 'ru'),
(187, 'Грузы', 'ru/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php', 1, 1, 96, '2016-07-15 19:30:47', 5, 'ru'),
(188, 'Транспорт', 'ru/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php', 1, 2, 96, '2016-07-15 19:30:47', 5, 'ru'),
(189, 'Предложить транспорт', 'ru/razmestit-transport-dobavit-svobodnyiy-transport-nayti-gruz.php', 1, 3, 96, '2016-07-15 19:32:02', 5, 'ru'),
(190, 'Предложить груз', 'ru/razmestit-gruz-dobavit-gruz-zakazat-perevozku-nayti-transport.php', 1, 3, 96, '2016-07-15 19:32:02', 5, 'ru'),
(191, 'Предложения грузов/транспорта', 'ru/svodnaya-tablitsa-gruzov-transporta-po-stranam-statistika-transporta-i-gruzov.php', 1, 5, 96, '2016-07-15 19:32:44', 5, 'ru');

-- --------------------------------------------------------

--
-- Структура таблицы `buianov_truckicons`
--

CREATE TABLE IF NOT EXISTS `buianov_truckicons` (
  `truckIconId` int(3) NOT NULL AUTO_INCREMENT,
  `truckIconName` varchar(500) NOT NULL,
  `truckIconLink` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Image` varchar(500) NOT NULL,
  PRIMARY KEY (`truckIconId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `buianov_truckicons`
--

INSERT INTO `buianov_truckicons` (`truckIconId`, `truckIconName`, `truckIconLink`, `date`, `Image`) VALUES
(1, '<p><i class="fa fa-truck fa-4x" aria-hidden="true"></i></p>\n<h4>Автоперевозки</h4>', 'ru/avtoperevozki-konteynerov.php', '2016-07-16 18:13:38', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/tenti.jpg'),
(2, '<p><i class="fa fa-ship fa-4x" aria-hidden="true"></i></p>\n<h4>Морские грузоперевозки</h4>', 'ru/konteynernyie-perevozki-po-moryu-i-avto-konteynerovozami.php', '2016-07-16 18:13:38', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/ref2.jpg'),
(3, '<p><i class="fa fa-train fa-4x" aria-hidden="true"></i></p>\n<h4>Железнодорожные грузоперевозки</h4>', 'ru/zheleznodorozhnyie-gruzoperevozki.-polnyiy-kompleks-uslug-perevozka-gruzov-vsemi-tipami-zh.d.-vagonami.php', '2016-07-16 18:16:29', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/obiemnie_legkie_.jpg'),
(4, '<p><i class="fa fa-plane fa-4x" aria-hidden="true"></i></p>\n<h4>Авиа доставка грузов</h4>', 'ru/avia-perevozki-gruzov-avia-dostavka-gruza.php', '2016-07-16 18:16:29', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/gruzi_do_5t.jpg'),
(5, '<p><i class="fa fa-suitcase fa-4x" aria-hidden="true"></i></p>\n<h4>Доставка пасылок</h4>', 'ru/dostavka-posyilok/mezhdunarodnyie-perevozki-posyilok-i-sbornyih-gruzov.php', '2016-07-16 18:17:23', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/standartn_sbornie.jpg'),
(6, '<p><i class="fa fa-users fa-4x" aria-hidden="true"></i></p>\n<h4>Пассажирские перевозки</h4>', 'ru/mezhdunarodnyie-passazhirskie-perevozki.php', '2016-07-16 18:17:23', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/gruzi_do_10t.jpg'),
(7, '<p><i class="fa fa-plus-square fa-4x" aria-hidden="true"></i></p>\n<h4>Перевозки грузов в п/прицепе Юмбо</h4>', 'ru/perevozki-gruzov-v-p-pritsepe-yumbo-dlya-obyomnogo-i-negabaritnogo-gruza.php', '2016-07-16 18:18:27', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/jumbo3.05m.5-1.jpg'),
(8, '<p><i class="fa fa-check-circle-o fa-4x" aria-hidden="true"></i></p>\n<h4>Грузоперевозки насыпных, сыпучих грузов</h4>', 'ru/gruzoperevozki-nasyipnyih-syipuchih-gruzov.php', '2016-07-16 18:18:27', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/nasipnie_sipucie.jpg'),
(9, '<p><i class="fa fa-archive fa-4x" aria-hidden="true"></i></p>\n<h4>Контейнерные перевозки</h4>', 'ru/konteynernyie-perevozki-v-moldovu-po-moryu-i-konteynerovozami-do-sklada.php', '2016-07-16 18:19:31', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/konteinernie.jpg'),
(10, '<p><i class="fa fa-flask fa-4x" aria-hidden="true"></i></p>\n<h4>Доставка жидких, наливных грузов</h4>', 'ru/dostavka-zhidkih-nalivnyih-gruzov-v-avtotsisternah-termosah.php', '2016-07-16 18:19:31', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/nalivnie2.jpg'),
(11, '<p><i class="fa fa-ship fa-4x" aria-hidden="true"></i></p>\n<h4>Организация морской перевозки, стандартные и сборные грузы</h4>', 'ru/morskie-perevozki-iz-kitaya-turtsii-emiratov-v-moldovu-standartnyie-i-sbornyie-gruzyi.php', '2016-07-16 18:20:45', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/7-28.jpg'),
(12, '<p><i class="fa fa-pagelines fa-4x" aria-hidden="true"></i></p>\n<h4>Грузоперевозка зерновых</h4>', 'ru/avtozernovoz.tipyi-ispolzuemyih-zernovozov-dlya-perevozki-zernovyih.php', '2016-07-16 18:20:45', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/zernovozi/vybor_y_zakaz_trans.jpg'),
(13, '<p><i class="fa fa-tasks fa-4x" aria-hidden="true"></i></p>\n<h4>Перевозка спецтехники</h4>', 'ru/transport-dlya-perevozki-spets.tehniki.tipyi-polupritsepov-dlya-perevozki-spetstehniki.php', '2016-07-16 18:21:43', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/spetztehnika/hruzoperevozky_spetstekhnyky.jpg'),
(14, '<p><i class="fa fa-train fa-4x" aria-hidden="true"></i></p>\n<h4>Железнодорожные грузоперевозки грузовыми ж.д. вагонами. Вагоны в аренду.</h4>', 'ru/zheleznodorozhnyie-gruzoperevozki-gruzovyimi-zh-d-vagonami-vagonyi-v-arendu.php', '2016-07-16 18:21:43', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/jeleznodorojnie_perevozki/gruzopervozki_zh_d_vagonami.jpg'),
(15, '<p><i class="fa fa-plane fa-4x" aria-hidden="true"></i></p>\n<h4>Правила Авиа грузоперевозки</h4>', 'ru/pravila-avia-gruzoperevozki.php', '2016-07-16 18:22:11', 'http://moldovatruck.md/imgsize.php?w=120&img=images/stories/avia_perevozki/zagruzochnaya_ploshadka_dlya_avia_gruzov.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 08:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_borrowed` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id_create` bigint(20) UNSIGNED DEFAULT NULL,
  `borrowed_at` timestamp NULL DEFAULT NULL,
  `return_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `category_id`, `image`, `pdf_file`, `created_at`, `updated_at`, `is_borrowed`, `user_id`, `user_id_create`, `borrowed_at`, `return_at`) VALUES
(3, 'از عرش به فرش', 'جیم کالینز', 'شما در برابر سقوط آسیب پذیر هستید. هیچ قانون طبیعی ای وجود ندارد که تضمین کند قدرتمندترین ها قطعا بر قله می مانند. هر کسی می تواند ورشکسته شود و عاقبت، سرانجامش چنین خواهد بود.', 28, 'images/cFB596saXQIjf2hXpkkyDPOfaZZW3S5ZBriCEYxv.jpg', 'pdfs/qykPiZpX66Q53bd5eBR5YFfAQ0TC3freA43dDfy0.pdf', '2024-01-08 04:58:16', '2024-01-11 11:13:21', 0, NULL, 1, NULL, NULL),
(4, 'آدم های ناباب', 'هاینریش بل', 'هاینریش بل نویسنده‌ی آلمانی برنده‌ی جایزه‌ی نوبل است. او به عنوان یکی از پرکارترین و مشهورترین نویسندگان آلمانی شناخته می‌شود. از آثار برجسته‌ی هاینریش بل می‌توان به کتاب «عقاید یک دلقک» اشاره کرد. اغلب آثار بل به موضوع جنگ و آثار مخرب آن می‌پردازند.', 30, 'images/VKJ1c577oAuyq41YVUaisT7ZxhAhds5LgJKpZnnc.jpg', 'pdfs/SqtGdp6kplrfAKC3hGbZ1U2ydz9iVCQ4pv2Fqaq5.pdf', '2024-01-08 05:02:04', '2024-01-12 02:31:09', 1, 1, 1, '2024-01-12 02:31:09', '2024-01-14 02:31:09'),
(5, 'سال اسپاگتی', 'هاروکی موراکامی', 'کتاب سال اسپاگتی، مجموعه‌ای متشکل از ده داستان کوتاه شنیدنی از هاروکی موراکامی، نویسنده‌ی پرافتخار ژاپنی است. با گوش سپردن به قصه‌های گردآمده در این اثر، درخواهید یافت که موراکامی نه تنها رمان‌نویسی بزرگ است، بلکه در کوتاه‌نویسی نیز استادی کاربلد و بی‌همتاست.', 30, 'images/ynqrwk2KDg0YLBH93VfYtx72pPMi6AVkdIr9wVxC.jpg', 'pdfs/FMGKMkYh53oj9kj1htwSaeW9lx60buIzbvTO6fP0.pdf', '2024-01-08 05:07:04', '2024-01-11 11:13:34', 1, 1, 1, '2024-01-11 11:13:34', '2024-01-13 11:13:34'),
(6, 'دیدن دختری صددرصد دلخواه درصبح زیبای ماه آوریل', 'هاروکی موراکامی', 'از او متنفر نبودم. اما احساسی هم نسبت به او نداشتم. ممکن نیست آدم نسبت به کسی که هیچ احساسی درباره اش ندارد، احساس بدی داشته باشد.', 30, 'images/qhzp5iCafisGgARuf1ytZGp9vzlZYlkVCZjR3IM7.jpg', 'pdfs/cRjY1DcBGRT9ykvhEZs08ebkiKKuw7vI4yJW6lDO.pdf', '2024-01-08 05:09:15', '2024-01-08 05:09:15', 0, NULL, 1, NULL, NULL),
(7, 'قضیه ی غیب شدن فیل', 'هاروکی موراکامی', 'یک مرد شاهد ناپدید شدن فیل محبوبش در هوا می شود، یک مرد و زن تازه ازدواج کرده از شدت گرسنگی به یک رستوران مک دونالد می روند اما اتفاقی عجیب در آنجا رخ می دهد، یک زن جوان در میابد در مقابل هیولای سبز رنگ کوچکی که در حیاط خلوط خانه اش لانه کرده است بی اراده است. شاید کمتر نویسنده ای مانند موراکامی بتواند مرز های خیال و واقعیت را این چنین در هم تنیده و داستانی خارق العاده بسازد.', 30, 'images/mYCUDKMmQK5C0j5FNidRHsAFaZjIIRs7ifMHbJPx.jpg', 'pdfs/GFjcgQOa7h7Pu31jyBiOVwJw7DufYGaifLqqKOlG.pdf', '2024-01-08 05:10:59', '2024-01-09 05:06:35', 0, NULL, 1, NULL, NULL),
(8, 'تونی تاکیتانی', 'هاروکی موراکامی', 'تونی تاکیتانی نام یکی از داستان های کوتاه موراکامی است که در کتاب گربه های آدمخوار می توانید آن را بخوانید. تونی نام شخصیت اصلی داستانی است که در ابتدای آن به معرفی و شرح ماوقع زندگی پدرش “شوزابورا تاکیتانی” پرداخته می شود.', 30, 'images/MPCQFZYK2OvGQ7mifzj0b5PTyI9LrdZhxqiDRsuI.jpg', 'pdfs/GFCLEP32ZNTGmPpyAp3pu2fYvZRzXiJUN14mfmI4.pdf', '2024-01-08 05:12:45', '2024-01-08 05:12:45', 0, NULL, 1, NULL, NULL),
(9, 'سرزمین عجایب بیرحم ته دنیا', 'هاروکی موراکامی', 'چرا از گذشته ام جدا شدم و به اینجا آمدم، ته دنیا؟ چه حادثه ی ممکن یا معنا و مفهومی می توانست در این کار بوده باشد؟ چرا هیچی یادم نمی آید؟', 22, 'images/dagKS1CPNyRgwYAonbCY2EmtYHA5Rj9zxM6daz1n.jpg', 'pdfs/IHGJOqbpirnoVN4xVa8FEehbNUWFKRu6E0Whra0G.pdf', '2024-01-08 05:14:38', '2024-01-09 05:06:35', 0, NULL, 1, NULL, NULL),
(10, 'قدرت وجلال', 'گراهام گرین', 'تفاوت هاست که زندگی را این همه خواستنی می کند. اینکه آدم، زاده ی محیط و شرایط، ناچار درگیر دوروبری ها و مسائل پیرامون خویش و انتخاب های پی درپی در لحظه است. اینکه آدم تا چه حد بتواند جوابگوی وجدان خود باشد.', 23, 'images/kbkrOhVpIVf8zsoEvxO0GtoObqhUUksKlTSsBmNu.jpg', 'pdfs/mWTIwne5qRcOmfE9qmcS7sCTRqQxEJckylVwrlxN.pdf', '2024-01-08 05:33:07', '2024-01-08 05:33:07', 0, NULL, 1, NULL, NULL),
(11, 'پابرهنه ها', 'زاهاریا استانکو', 'خلاصه کتاب :پابرهنه ها رمانی از زاهاریا استانکو(1974- 1920 )، نویسنده رومانیایی،‌که در 1948 منتشر گردید و در 1960 به صورت رمانی سه­ گانه بسط داده شد. واقعه، پیش از قیام مردمی و بزرگ 1907،‌ در روستایی در اولتنین رخ می‌دهد. داریه،‌ جوانکی کشاورز،‌ داستان زندگی والدین و پدربزرگ و مادربزرگش را از زبان عمه خود می‌شنود: مادرش در پانزده سالگی ازدواج می‌کند. پس از دو سال، ‌بیوه‌ای فقیر شده و مجبور می‌شود با دو فرزند خود نزد والدینش ...', 31, 'images/VaKwigJd9dl1IpnW3E2Aw5S7b3GNSH5P8SZdHmc5.jpg', 'pdfs/mo81T2Rd7XcSc9w1e4YbgTUKwODCpecBdUCeNCka.pdf', '2024-01-08 05:39:33', '2024-01-08 05:39:33', 0, NULL, 1, NULL, NULL),
(12, 'روان شناسی انسان سلطه جو', 'اورت شوستروم', 'انسان سلطه‌جو کسی‌ست که خود و دیگران را به مانند یک شیء استثمار و کنترل می‌کند و برای رسیدن به منافع شخصی مورد استفاده قرار می‌دهد. سلطه‌جویان را می‌توان به چند گروه انسانی از جمله دیکتاتورها و آدم‌های ضعیف و وابسته تقسیم کرد. در این میان، فرایندهای مشاوره‌ای و روان‌شناسی مانند گروه درمانی به انسان سلطه‌جو کمک می‌کند تا دیگران را برای دیدن خویش آیینه قرار دهد. افزون بر گروه درمانی می‌توان از راه‌های مشاوره، خودفهمی و... نیز برای درمان سلطه‌جویی استفاده کرد.', 28, 'images/71T27zj2aNrgdRH17swzYK48lbAciVhhpdbhFbft.jpg', 'pdfs/uhc39UUa2aqzaGVbTQ0bkpOFgxGk98DO7o2n92Ti.pdf', '2024-01-08 05:41:29', '2024-01-08 05:41:29', 0, NULL, 1, NULL, NULL),
(13, 'بینوایان', 'ویکتور هوگو', 'ویکتور هوگو ۱۷ سال را صرف نوشتن این اثر برجسته کرده است. ژان والژان کسی است که برای سیر کردن شکم بچه‌های خواهرش دست به دزدی می‌زند. او فقط یک قرص نان می‌دزد اما به ۵ سال زندان محکوم می‌شود. در زندان براثر اتفاقات و شرایط مختلف ۴ بار تلاش می‌کند که فرار کند اما هر بار دستگیر می‌شود و به مدت محکومیتش افزوده می‌شود. نهایتا پس از ۱۹ سال از زندان آزاد می‌شود. اما این تازه شروع بدبختی‌های اوست...', 31, 'images/8bUePwjsC64Xj4Cplj0SeRmOrztuY3ikeQctOLMR.jpg', 'pdfs/yHLqB1pGGA8QhGT92yCEayTNhQOE7dyAHUPi0TG4.pdf', '2024-01-08 05:43:39', '2024-01-08 05:43:39', 0, NULL, 1, NULL, NULL),
(14, 'فریدون سه پسر داشت', 'عباس معروفی', 'فریدون سه پسر داشت درباره‌ی خانواده‌ی امانی است که هر کدام از چهار فرزند پسر خانواده به جنبش‌های مختلف انقلاب ۵۷ ایران می‌پیوندند.  وجه تسمیه‌ی اسم کتاب اشاره به داستان اسطوره‌ایِ شاهنامه درباره‌ی فریدون و فرزندانش است فریدون سه پسر داشت :  ایرج و سلم و تور،که جهان را بین آنان تقسیم کرد. ایران را که بهترین بخش بود به ایرج سپرد. یونان و روم و شام را به سلم داد و تورا ن‌ زمین را به تور اما سلم و تور به ایرج حسد بردند دوستانه او را دعوت کردند و در جنگی از پا درش آوردند.', 31, 'images/p8aTSxGJxXRJrLN91vDe8NqxpBr1richS4KqfqED.jpg', 'pdfs/pLDe6Mn6qASC8hFLdT4uLoON2LJvWWqBJDzIxqok.pdf', '2024-01-08 05:46:15', '2024-01-08 05:46:15', 0, NULL, 1, NULL, NULL),
(15, 'ملکه مارگو', 'الکساندر دوما', 'بخشی ازتاریخ فرانسه را در قالب رمانی دلکش و زیبا روایت می کند و ماجراهای آن مربوط به دوران سلطنت شارل نهم، کشتار سن بارتلمی، توطئه های ملکه مادر (کاترین دو مدیچی) و … است. این کتاب مربوط به یک دوره از تاریخ اروپا و فرانسه می باشد که در آن فرق مختلف سیاسی و نیز فرقه های گوناگون دیانت مسیح به سخت ترین طرزی با یکدیگر مبارزه می کردند و آنقدر متعصب بودند که جان انسان در آن عهد در قبال آن همه مبارزه های سیاسی', 31, 'images/Fsr350dNhkGmMRMqxjHk2r094cUCucBkuvfTzprl.jpg', 'pdfs/eA6EtwquYobmom2YsFSrWILV0cn117lf6z3OtTcW.pdf', '2024-01-08 05:47:53', '2024-01-08 05:47:53', 0, NULL, 1, NULL, NULL),
(16, 'صدساله تنهایی', 'گابریل گارسیا مارکز', 'صد سال تنهایی نام رمانی به زبان اسپانیایی نوشته گابریل گارسیا مارکز که چاپ نخست آن در سال ۱۹۶۷ در آرژانتین با تیراژ ۸۰۰۰ نسخه منتشر شد. تمام نسخه‌های چاپ اول صد سال تنهایی به زبان اسپانیایی در همان هفته نخست کاملاً به فروش رفت. در ۳۰ سالی که از نخستین چاپ این کتاب گذشت بیش از ۳۰ میلیون نسخه از آن در سراسر جهان به فروش رفته و به بیش از ۳۰ زبان ترجمه شده است. جایزه نوبل ادبیات ۱۹۸۲ به گابریل گارسیا مارکز به خاطر خلق این اثر تعلق گرفت.', 31, 'images/wCyK0vjMs31RILeGgwtKVRiNsHv8eENupVZmv1DN.jpg', 'pdfs/RpdTyHIFHy6eGQVc4aSwQmAPT8a6z90zzKwRUBsq.pdf', '2024-01-08 05:49:52', '2024-01-08 05:49:52', 0, NULL, 1, NULL, NULL),
(17, 'باغ آلبالو', 'آنتوان چخوف', 'باغ آلبالو داستان زندگی زنی اشرافی به نام رانوسکی است. باغ آلبالوی بزرگی از طرف اجدادش به او ارث رسیده است. از آنجایی که تنها سرمایه باقی‌مانده خانواده رانوسکی همین باغ است، باغ آلبالو نیز به زودی در ازای بدهی‌هایشان توسط بانک فروخته خواهد شد. اما خانم رانوسکی هیچگونه تلاشی برای حفظ باغ خود نمی‌کند اگرچه که آن را یادگار خانوادگی و تداعی‌ کننده خاطرات کودکی‌اش می‌داند. رانوسکی و برادرش باغ را نشانه هویت خود می‌دانند اما در عین حال در برابر از دست دادن آن خنثی و منتظر تقدیر هستند. در نهایت باغ آلبالو ...', 31, 'images/1RcyH4kFsUsihqBAzKT0HNoHkdM1dDOz9nvCMWfz.jpg', 'pdfs/4zXVZQuaQUl561xFoZnv4HZfVfG8zAy1A2rh0ctq.pdf', '2024-01-08 05:52:52', '2024-01-08 05:52:52', 0, NULL, 1, NULL, NULL),
(18, 'شیطان و دوشیزه پریم', 'پائولو کوئیلو', 'پائولو کوئیلو در این داستان ما را با شرایط مختلف برای گرفتن تصمیمات نیک و پلید آدمیان همراه می کند. داستان در دهکده ی دور افتاده ای به نام «ویسکوز» رخ می دهد...', 25, 'images/tczpxo9XyS8XD6aIpP3y20gh6H5xT6oNWguYAkyZ.jpg', 'pdfs/GQdDzE553zXphGsCI7xSGmpXqV2SV9diLiXfDM7P.pdf', '2024-01-08 05:55:20', '2024-01-08 05:55:20', 0, NULL, 1, NULL, NULL),
(19, 'از حال بد به حال خوب', 'دیوید برنز', 'موضوع اصلی این کتاب استفاده از «شناخت درمانی» برای درمان بیماری‌هایی همچون افسردگی و اضطراب است. این شیوه‌ی درمانی مبتنی بر نظریه‌ی ساده‌ای است که می‌گوید به جای حوادث بیرونی، افکار و طرز تلقی‌های شماست که روحیه‌ی شما را شکل می‌دهد. همه‌ی ما در مواقعی افسرده و ناامید می‌شویم. این‌ها احساساتی همگانی و از جمله ویژگی‌های انسانی است.', 28, 'images/5yM23Q4RfKabTzutY6HTogIw0VDvtfLUx8Lao6Lk.jpg', 'pdfs/83k6lowv73hYgQzjl5mlJhJaYnNbvoL5a3vWH85V.pdf', '2024-01-08 05:57:12', '2024-01-08 05:57:12', 0, NULL, 1, NULL, NULL),
(20, 'زنان کوچک', 'لوییزا می الکات', 'ماجرای کتاب زنان کوچک، در بوستون و درست پس از پایان جنگ داخلی، اتفاق می‌افتد و داستان چهار خواهری را تعریف می کند که برای غلبه بر فقر و تبدیل شدن به زنانی مفید و خودکفا، سخت در تلاش اند و ...', 31, 'images/98aNCubl6rOtdLjD40sXCqbitTKxzaDWdNt27ln4.jpg', 'pdfs/Fvu1MlCeVtFd20fZ8YwjrFPyugSwetAV9pc8uu60.pdf', '2024-01-08 05:58:53', '2024-01-08 05:58:53', 0, NULL, 1, NULL, NULL),
(21, 'ترس از تاریکی', 'سیدنی شلدون', 'در چهار شهر از مناطق گوناگون در دور و اطراف جهان چهار مرگ مرموز رخ می دهد. زنی داخل خیابان های شهر برلین گم می شود و داخل پاریس مردی از برج ایفل به پایین آن پرتاب می گردد و در دنور هواپیمایی کوچک در گردباد گرفتار می شود و سقوط می نماید. در منهتن زیر پل انسانی کشته شده روی شنهای رودخانه افتاده است. در اول به نظر رسیده بود که همه ی این اتفاقات تصادفی هستند ولی پلیس به زودی فهمید که این چهار تن از قربانیان گروهی بین المللی می باشد. در این میان کلی هریس و دایان استیونز بیوه جوان دو تن از قربانیهای داخل نیویورک با هم آشنا می گردند', 33, 'images/tJKwmFbGVCcU4eRfCAaIurn1d4hz2H1HRkrFLKXj.jpg', 'pdfs/2aohUiJ07b13jaXqL2YUSxaL9JeGd8c9RHQLpQYF.pdf', '2024-01-08 06:01:02', '2024-01-08 06:01:02', 0, NULL, 1, NULL, NULL),
(22, 'جهانی که من میشناسم', 'برتراند راسل', 'راسل در دامان سرمایه داری غرب پرورش یافته و از طبقات مرفه جامعه بود، ولی از عملکرد آنها نفرت داشت از این رو به طرفداری از سوسیالیسم روسیه پرداخت، ولی بعد از مدتی به این نکته پی برد که روش آنان نیز مثل سرمایه داری غرب، ناموفق و شکست خورده است. مسیحیت هم برای او جذابیتی نداشت.', 25, 'images/m053yeUsYRM5G36lNuP9gEcWi00gSiO3mG5VIZim.jpg', 'pdfs/PROFTBhFhqJS3aq6epEguAKUWkPdP5UU7AxOZ7wP.pdf', '2024-01-08 06:03:16', '2024-01-08 06:03:16', 0, NULL, 1, NULL, NULL),
(23, 'بار هستی', 'میلان کوندرا', 'کتاب به شرحی از وضعیت زندگی هنرمندان و روشنفکران چکسلواکی پس از بهار پراگ، یعنی پس از حملهٔ اتحاد شوروی به چکسلواکی، می‌ پردازد. شخصیت اصلی کتاب توما نام دارد. توما که جراحی معروف است، انتقادات فراوانی به کمونیست‌ های چک دارد و این موجب می‌ شود که او شغل‌ خود را از دست بدهد. در ادامه توما با ترزا آشنا می شود و پس از مدتی با او ازدواج می کند اما…', 25, 'images/u6ppsYIlq9A8YpoanKRw9M2vzm9PQjlq3amc1sRx.jpg', 'pdfs/c6rNl9yaeguFXMQtd6Y51naw9IdSpJKHl302Amtn.pdf', '2024-01-08 06:05:24', '2024-01-08 06:05:24', 0, NULL, 1, NULL, NULL),
(24, 'کوه جادو', 'توماس مان', 'کوه جادو به شکلی بسیار باورپذیر، بیماری را وضعیتی در ابتدا روحی و سپس جسمی نشان میدهد. مهندسی جوان و ساده لوح به اسم هانس، به منظور ملاقات با عموزاده‌ی بیمار خود، به آسایشگاه بین‌المللی برگوف در ارتفاعات کوه‌های سوئیس می‌رود. خود هانس در آن‌جا، مبتلا به بیماری سل تشخیص داده شده و سفر چند هفته‌ای، به اقامتی چند ماهه و سپس چندساله تبدیل می‌شود.', 27, 'images/rAXNypcnT5yXfCWhKxL02Hk8v1XOxNmkt1KmdPCI.jpg', 'pdfs/1xkyJ1Muq6cJJckLsOjMj1DhGC4rR2opZOFNInHh.pdf', '2024-01-08 06:07:54', '2024-01-08 06:07:54', 0, NULL, 1, NULL, NULL),
(25, 'سر گذشت ندیمه', 'مارگارت اتوود', 'آفرد، شخصیت اصلی رمان سرگذشت ندیمه و ندیمه ای در جمهوری گیلیاد است. او در طول روز اجازه دارد یک بار خانه ی فرمانده را ترک کند و پیاده به خواربارفروشی هایی برود. او مجبور است که ماهی یک بار با فرمانده همبستر شده و دعا کند که از او بچه دار شود، چرا که در دوره ی افول زاد و ولد، آفرد و سایر ندیمه های همانند او زمانی ارزش پیدا می کنند که قابلیت باروری داشته باشند. آفرد سال های پیشین را به یاد می آورد: هنگامی که در کنار همسرش، لوک، زندگی خوب و عاشقانه ای را می گذراند....', 29, 'images/BWFQZc0e0x3Fm0o7w23TMtrf0fgugeMAHHn8kkUr.jpg', 'pdfs/OkRCyBN7FOi2SEPmGSuujSKv6CW5e5RtJPyDB9Pb.pdf', '2024-01-08 06:10:11', '2024-01-08 06:10:11', 0, NULL, 1, NULL, NULL),
(26, 'شاهزاده و گدا', 'مارک تواین', 'داستان شاهزاده و گدا درباره‌ی عوض شدن جای شاهزاده اداورد و تام پسرک فقیر است. روزی شاهزاده انگلستان ادوارد در محوطه قصر در حال بازی است که پسر بچه‌ای که نامش تام است توجه او را جلب می‌کند.', 34, 'images/1OZtj8hgmedxZOR3Ym8J655d3w8ZeUYrGH6avuvM.jpg', 'pdfs/XSw2Xm26TLEO2kdBonHHHh9Zsh5QIMK6X3P4ZZ7X.pdf', '2024-01-08 06:18:14', '2024-01-08 06:18:14', 0, NULL, 1, NULL, NULL),
(27, 'خودشفقتی برای نوجوانان', 'کارن بلاث', 'خودشفقتی مجموعه‌ای از رو‌ش‌های شناختی، عاطفی و رفتاری است که مسیر نوجوانان را به تجربه‌ زندگی بهتر و مقابله‌ی موثر با چالش‌های اجتناب‌ناپذیر زندگی هموار می‌کند. نوجوانانی که خودشفقتی بیشتری دارندْ استرس، اضطراب و افسردگی کمتری را تجربه می‌کنند، شادترند، رضایت بیشتری از زندگی دارند و در برابر چالش‌ها قوی‌تر و مقاوم‌تر هستند.', 28, 'images/I0SxyHDwDtUmNkQhSAFQAd0qzC2vbPaYHGMskrYu.jpg', 'pdfs/7YcC42PmEJDwwy9GPjyrzgc0F4JGyzLJUiTT7s37.pdf', '2024-01-08 06:22:08', '2024-01-08 06:22:08', 0, NULL, 1, NULL, NULL),
(28, 'خاطرات یک بیش فعال', 'کلیسا هود', 'این کتاب با نگاهی متفاوت به اختلال نقص توجه به جنبه‌های کمتر دیده شده و حتی مثبت آن می‌پردازد و  نشان می‌دهد که دستاوردهای درخشان افراد بیش‌فعال چطور اتفاق می‌افتند.', 28, 'images/LplEb2ON8oJsXpLqE8Q24AVO8jDTIWpWftJ3laYT.jpg', 'pdfs/Zk7peqPRCSH2OhYUEHVhaRjOaKDcyK9ZB96wpOG2.pdf', '2024-01-08 06:24:23', '2024-01-08 06:24:23', 0, NULL, 1, NULL, NULL),
(29, 'پروازهای خلاقیت', 'جولیا کامرون', 'هدف این کتاب اسطوره‌زدایی از خلاقیت و بسیاری از پرت‌و‌پلاهایی است که عامدانه در لفافی رازآلود پیچیده شده‌اند. همین‌طور حرف‌های دوپهلویی که باعث صدمه‌زدن به افراد خلاق شده‌اند. سخنانی که هنرمندان را از اقتدار و واقعیت دریافت شخصی‌شان محروم می‌کند.', 35, 'images/P8vWXDgSv2MQdV8DIoLweWEZrVR78Ev4oI5VsNIO.jpg', 'pdfs/P67GN3DpKrm9UYwUpcQ4Bkcci1vAhyCeHx4QEp15.pdf', '2024-01-08 06:28:21', '2024-01-08 06:28:21', 0, NULL, 1, NULL, NULL),
(31, 'kkkkkkkkkkkk', 'جعفر', 'داستان', 35, 'images/Szd2gUfnw6CA6xw080eWogzPanLsa85qnhkn4DU7.jpg', 'pdfs/e84IZU1Fdh4tYGrw4MHQp9kNpiZzJoMdAyRsJ5ru.pdf', '2024-01-13 09:47:18', '2024-01-13 09:47:18', 0, NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `parent_id`, `name`, `is_active`, `user_id`) VALUES
(22, '2024-01-01 17:23:19', '2024-01-01 17:23:19', NULL, 'علمی تخیلی', 1, 1),
(23, '2024-01-01 17:23:40', '2024-01-01 17:28:48', NULL, 'ادبی', 1, 1),
(25, '2024-01-01 17:24:27', '2024-01-01 17:24:27', NULL, 'فلسفی', 1, 1),
(27, '2024-01-01 17:25:08', '2024-01-01 17:25:08', NULL, 'طنز', 1, 1),
(28, '2024-01-01 17:25:27', '2024-01-01 17:25:27', NULL, 'روانشناسی', 1, 1),
(29, '2024-01-01 17:25:47', '2024-01-01 17:25:47', NULL, 'تاریخی', 1, 1),
(30, '2024-01-01 17:26:21', '2024-01-01 17:26:21', NULL, 'داستان کوتاه', 1, 1),
(31, '2024-01-01 17:26:43', '2024-01-01 17:26:43', NULL, 'رمان', 1, 1),
(33, '2024-01-01 17:28:06', '2024-01-01 17:28:06', NULL, 'معمایی', 1, 1),
(34, '2024-01-08 06:12:45', '2024-01-08 06:12:45', NULL, 'عاشقانه', 1, 1),
(35, '2024-01-08 06:25:16', '2024-01-13 10:12:16', NULL, 'توسعه اجتماعی', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_17_001544_create_sessions_table', 1),
(7, '2023_12_18_013902_create_categories_table', 2),
(8, '2023_12_18_020535_create_books_table', 2),
(9, '2023_12_18_144049_add_is_borrowed_to_books', 3),
(10, '2023_12_19_103753_add_user_id_to_books_table', 4),
(11, '2023_12_19_231902_add_user_id_to_categories_table', 5),
(12, '2023_12_20_233444_add_user_id_create_to_books_table', 6),
(13, '2023_12_21_001631_add_borrowed_at_to_books_table', 7),
(14, '2023_12_23_192349_add_pdf_file_to_books_table', 8),
(15, '2023_12_23_230925_add_return_at_to_books_table', 9),
(16, '2023_12_24_132423_add_fields_to_users_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('farid@gmail.com', '$2y$12$xCDz7v7mww3f2IQ6eW8oAuiWQEp05dq1MUNXpdeCGfzp7iGbOXCqO', '2023-12-27 19:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('58wxjuAmVmjuRqCwx3L5rluq1UvJj52RmxjmCiOa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1c1SGQyWWRiOEQyVUp4bFF2ejJETjhVNkZEcWQyRVR6N1JFaEJYUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1705304916),
('C6KREqaggQxXqTvNDNlz7RE2LPcQwdkNvBpfKMJg', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWVDZkZDSG9WU1Zxd1NQOGt1YjNoOEptNDdkeEVUTW43YTdybmtDWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1705228433),
('iGojVEvazkttxxtilf6chTJ26BDfRbkGoYNULn4M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWDV4NEEydFZyQWpueHhHbFZLRU12UHpBVzBZQzNpQk1mU3NLM1habCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705304917),
('ivfnmYrFkXCjyvUXiykqqcvzGRpvOYcgzN7FYqwv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUN0VWdSdGxreXRmaVdwTEJUSm0yTFZpTjhKWEtQU2pETHV0YTlKMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1705153476),
('MxMS2o9JqxmumDHv7CZYWb6dvDyFJa24jXeHdxLU', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia01iWWRJT3FqTUprSmU3RW1wWk1wY1planJDaVpzek43TEtPM2xrdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1705153118);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registration_expiration` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `registration_expiration`, `is_active`) VALUES
(1, 'hediye', 'asra4946@gmail.com', NULL, '$2y$12$P3st53YM.ZjElvnJHEKjJudWpkFv.PjvCuZJ6ooarPgcqtAgbkUwy', NULL, NULL, NULL, '3we49R1h871Y1QCSjO2yqMhUMz9pxnSb1yM1Z1QWYbwFyXX8GLSYLUcAKVeN', NULL, NULL, '2023-12-18 12:00:49', '2024-01-09 05:06:45', '2024-01-14 05:06:45', 1),
(2, 'هانیه', 'hani@gmail.com', NULL, '$2y$12$l4F1N560JOkA4XdDnIJbsOa7nhj4jP.hxlUL9SywpVBzGizDQgqzm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-20 20:18:52', '2023-12-25 16:40:54', '2023-12-30 16:40:54', 1),
(3, 'هما', 'homa@gmail.com', NULL, '$2y$12$3aFT0mLDpxUvG3xg2lHy0uS20XrSHrySqO4iOa6v9LkEivOcysPIq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-24 10:32:17', '2023-12-27 20:27:52', NULL, 0),
(4, 'فرید', 'farid@gmail.com', NULL, '$2y$12$vuX.5DSGZmyFGLu6RXIjKeqSi0H2er3/51P1k93hwUJLbBgF58ICm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-21 12:41:36', '2024-01-11 11:18:15', '2024-01-16 11:18:15', 1),
(5, 'اشرف', 'ashraf@gmail.com', NULL, '$2y$12$xiBLnBR/e5ODcEstC9Ooz.lTIk1dTm0aNdoo8g1tW2108kyssoFH.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-20 16:59:56', '2023-12-25 15:14:04', '2023-12-30 15:14:04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<?php
	// реєструємо змінну
	session_start();
	//session_register("secret_number");

	define('WIDTH', 110); // ширина картинки
	define('HEIGHT', 36); // висота картинки

	$font_arr = array('AdverGothicCamC', 'Arial', 'CharlesworthBold', 'CyrillicOld');

	$font = $font_arr[rand(0, 3)];

	// ім'я шрифту за замовчуванням (при бажанні його можна змінити)
	define('FONT_NAME', "./fonts/{$font}.ttf");

	// шрифти, які є в папці fonts в додаток до шрифту за замовчуванням:
	// AdverGothicCamC, Arial, CharlesworthBold, CyrillicOld

	define('FONT_SIZE', 24); // розмір шрифту

	// кольори українського стягу (блакитний, жовтий)
	$flag_colors = array(0x00b5ef, 0xfff700);


	// mt_srand() налаштовує MT-генератор випадкових чисел на нову послідовність
	mt_srand(time()+(double)microtime()*1000000);

	// функція mt_rand() повертає MT-випадкове число

	// координати (x,y) на малюнку 4-х цифр
	$coords = array(
		0 => array( 5  + mt_rand(0,5),  27 + mt_rand(-5,5) ),
		1 => array( 30 + mt_rand(-5,5), 27 + mt_rand(-5,5) ),
		2 => array( 55 + mt_rand(-5,5), 27 + mt_rand(-5,5) ),
		3 => array( 85 + mt_rand(-5,5), 27 + mt_rand(-5,5) ),
	);

	// генеруємо випадковим чином кути нахилу для 4-х цифр
	mt_srand(time()+(double)microtime()*1000000);
	$angles = array( mt_rand(-20,10), mt_rand(-10,25), mt_rand(-20,10), mt_rand(-10,25) );

    // ця ф-ція заливає фон певним кольором і виводить кожну з 4-х цифр окремо,
    // зміщуючи їх випадковим чином + змінюючи кут нахилу
	function draw_flag_part($image, $fon_color, $font_color, $font_name, $font_size){

            GLOBAL $coords, $angles;

            // заливаєм задній фон кольором (спочатку блакитним, а тоді жовтим)
            imagefill($image, 0, 0, $fon_color);

            // виводимо кожну цифру окремо, трохи зміщуючи випадковим чином

            imagettftext($image, $font_size, $angles[0], $coords[0][0], $coords[0][1], $font_color, $font_name, substr($_SESSION["secret_number"],0,1));
            imagettftext($image, $font_size, $angles[1], $coords[1][0], $coords[1][1], $font_color, $font_name, substr($_SESSION["secret_number"],1,1));
            imagettftext($image, $font_size, $angles[2], $coords[2][0], $coords[2][1], $font_color, $font_name, substr($_SESSION["secret_number"],2,1));
            imagettftext($image, $font_size, $angles[3], $coords[3][0], $coords[3][1], $font_color, $font_name, substr($_SESSION["secret_number"],3,1));

	}

	// створюємо зображення з блакитним фоном і жовтими буквами
	$flag_p1 = imagecreatetruecolor(WIDTH, HEIGHT) or die('Cannot create image!');

	// блакитна частина фону
	draw_flag_part($flag_p1, $flag_colors[0], $flag_colors[1], FONT_NAME, FONT_SIZE);

	// створюємо зображення з жовтим фоном і блакитними буквами
	$flag_p2 = imagecreatetruecolor(WIDTH, HEIGHT) or die('Cannot create image!');

	// жовта частина фону
	draw_flag_part($flag_p2, $flag_colors[1], $flag_colors[0], FONT_NAME, FONT_SIZE);

    // копіюємо верхню частину з малюнка $flag_p1 на малюнок $flag_p2
	imagecopy($flag_p2, $flag_p1, 0, 0, 0, 0, WIDTH, HEIGHT/2);

        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        // HTTP/1.1
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        // HTTP/1.0
//        header("Pragma: no-cache");

	header('Content-type: image/png');
        
//        header('Content-Disposition: attachment; filename=NULL');

	// генеруємо зображення
	imagepng($flag_p2);

	// звільняємо пам'ять
	imagedestroy($flag_p1);
	imagedestroy($flag_p2);



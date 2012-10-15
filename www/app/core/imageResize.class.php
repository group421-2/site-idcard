<?php



class imageResize {

// $infile - входящий графический файл
// $outfile - измененый файл
// $neww - новая ширина
// $newh - новая высота
// $quality - качество измененного рисунка
    public function resize($outfile, $infile, $neww, $newh, $quality) {
        $im = imagecreatefromjpeg($infile); // Создаем графический объект из входящего файла
// Далее вычесляем ширину и высоту входящего файла и создаваемого фала:
        $k1 = $neww / imagesx($im);
        $k2 = $newh / imagesy($im);
        $k = $k1 > $k2 ? $k2 : $k1;

        $w = intval(imagesx($im) * $k);
        $h = intval(imagesy($im) * $k);

        $im1 = imagecreatetruecolor($w, $h); // Создаем новый графический объект в который запишем измененный рисунок; $w,$h - ширина и высота
        imagecopyresampled($im1, $im, 0, 0, 0, 0, $w, $h, imagesx($im), imagesy($im)); // Копируем входящий рисунок в исходящий в начало координат.

        imagejpeg($im1, $outfile, $quality); // сохраняем файл в jpg формате с заданным качеством
        imagedestroy($im); // разрушаем входящий файл
        imagedestroy($im1); // разрушаем исходящий файл
    }

}

?>
